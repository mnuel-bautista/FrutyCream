const botonParaConfirmarOrden = document.querySelector('.confirmar-orden');

botonParaConfirmarOrden.addEventListener('click', e => {
    confirmarOrden();
})

const botonParaEliminarOrden = document.querySelector('.eliminar-orden');

botonParaEliminarOrden.addEventListener('click', e => {
    eliminarOrden();
})

/**
 * Vaciar el arreglo donde estan almacenados los articulos
 */
function eliminarOrden() {
    contenedorDeArticulos.innerHTML = '';

    while (ps.length > 0) { ps.pop(); }
}

/**
 * Confirmar la orden y guardarla en la base de datos
 */
function confirmarOrden() {

    //Validar que el número de articulos es mayor a 0 
    if (ps.length < 1) {
        alert('Add at least one item to the order');
    } else {
        //Lista de todos los ids de los articulos que se encuentran dentro de la orden. 
        articulos = ps.map(item => ({ idProducto: item['id'], cantidad: item['cantidad'] }))
        console.log(ps);
        console.log(JSON.stringify(articulos));
        //Enviar la información al servidor utilizando el método POST
        fetch('ventas/crear.php', {
                method: "POST",
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(articulos)
            })
            .then(response => {
                //La respuesta fue exitosa
                if (response.ok) {
                    swal("", 'La orden se ha guardado.', "success");

                    //Remover los articulos de la orden. 
                    while (ps.length > 0) { ps.pop(); }
                    contenedorDeArticulos.innerHTML = '';
                } else {
                    alert('Ocurrio algún error');
                }
            })

    }

}