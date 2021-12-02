const todasLasCategorias = Array.from(document.getElementsByClassName('categoria'));
const contenedorDeProductos = document.querySelector('.productos');

todasLasCategorias.forEach(category => {
    category.addEventListener('click', e => {
        //Cuando la categoria cambia, enviar una petición al servidor para que devuelva los productos. 
        fetch(`../admin/productos/productos.php?categoryId=${e.target.id}`)
            .then(response => response.text())
            .then(products => {
                contenedorDeProductos.innerHTML = products
                setAddItemButtonsClickListener();
            });
    })
});