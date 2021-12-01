

function obtenerVentas() {
    const tabla = document.querySelector(".table");

    let productos = [];
    const filas = Array.from(tabla.rows);
    filas
        .filter((element, index) => index != 0)
        .forEach(fila => {
            const column = fila.cells
            productos.push({ "nombre": column[0].innerHTML, "cantidad": column[2].innerHTML })
        })

    //Agrupar los productos por su nombre 
    productos = productos
        .reduce((acc, producto) => {
            let key = producto['nombre'];
            if (!acc[key]) {
                acc[key] = producto['cantidad']
            } else {
                acc[key] = Number(acc[key]) + Number(producto['cantidad'])
            }
            return acc
        }, {})

    const ctx = document.querySelector('.grafica').getContext('2d');
    const grafica = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(productos).map(key => key),
            datasets: [
                {
                    label: "Grafica de productos",
                    data: Object.values(productos).map(value => value), 
                    backgroundColor: Object.keys(productos).map (_ => generarColorAleatorio())
                }
            ]   
        }
    })
}

function generarColorAleatorio() {
    return `rgb(${(Math.random() * 255) + 1}, ${(Math.random() * 255) + 1}, ${(Math.random() * 255) + 1})`
}



obtenerVentas();