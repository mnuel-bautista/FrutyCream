const orden = {};

let ps = [];

const elementoOrden = document.querySelector(".orden");

const contenedorDeArticulos = document.querySelector('.articulos');

//Los botones para eliminar que se encuentran en cada producto. Aparecen como una X en la parte superior 
let eliminarBtns = document.querySelectorAll(".boton-remover");

let añadirBtns = document.querySelectorAll(".boton-añadir");

let disminuirBtns = document.querySelectorAll(".boton-disminuir");

let añadirArticulosBtns = document.querySelectorAll(".añadir-articulo");



const categories = [];

getAllProducts();
actualizarEventos();


let i = 0;

function getAllProducts() {

    const productsContainer = document.querySelector('.productos');

    fetch('http://localhost/proyecto-pw/src/admin/productos.php')
        .then(response => response.text())
        .then(products => {
            productsContainer.innerHTML = products
            setAddItemButtonsClickListener();
        });

}


/**
 * 
 * Añadir el articulo a la orden 
 */
function añadirArticulo(idProducto) {
    const products = document.getElementsByClassName("producto")
    const elementoDeProducto = products.namedItem(idProducto);

    contenedorDeArticulos.innerHTML = '';

    //Si el articulo no se encuentra, añadirlo a la orden como un nuevo articulo
    const index = ps.findIndex(e => e.id === idProducto)
    if (index === -1) {
        const id = elementoDeProducto.id;
        //La url de la imagen del producto
        const img = elementoDeProducto.querySelector('.img').src;
        const name = elementoDeProducto.querySelector('.nombre').textContent;
        const price = elementoDeProducto.querySelector('.precio').textContent;

        const product = {
            id: id,
            nombre: name,
            precio: price,
            cantidad: 1,
            img: img,
        }

        ps.push(product);
    } else {
        //Si el producto ya se encuentra en la orden, solo aumenta la cantidad 
        ps[index]['cantidad'] = ps[index]['cantidad'] + 1;
    }



    ps.forEach(e => mostrarProducto(e));

    actualizarEventos();
}


function añadirProducto(producto) {

    contenedorDeArticulos.innerHTML = '';
    //Añadir el nuevo producto a la lista de productos. 
    ps.push(producto);

    //Mostrar en pantalla todos los productos dentro de la lista de productos 
    ps.forEach(e => mostrarProducto(e))

    actualizarEventos();
}

function eliminarProducto(productoId) {

    contenedorDeArticulos.innerHTML = '';

    ps = ps.filter(e =>
        e.id !== productoId);

    ps.forEach(e => mostrarProducto(e));

    eliminarBtns = document.querySelectorAll(".boton-remover")

    actualizarEventos();
}

function mostrarProducto(producto) {

    const { id, nombre, precio, cantidad, img } = producto

    const elementoProducto = `
            <li class="articulo" id="${id}">
                    <img src="${img}" alt="">
                    <div class="info">
                        <p class="nombre-producto">${nombre}</p>
                        <div>
                            <span>$ ${precio} </span>
                            <div class="añadir-mas">
                                <button class="mdc-icon-button material-icons-outlined boton-disminuir">remove_circle_outline<div class="mdc-icon-button__ripple"></div></button>
                                <span>${cantidad}</span>
                                <button class="mdc-icon-button material-icons-outlined boton-añadir">add_circle_outline<div class="mdc-icon-button__ripple"></div></button>
                            </div>
                            <span>$ ${precio * cantidad}</span>
                        </div>
                    </div>
                    <button class="mdc-icon-button material-icons-outlined boton-remover">close<div class="mdc-icon-button__ripple"></div></button>
            </li>`;

    const template = document.createElement("template");
    template.innerHTML = elementoProducto;


    contenedorDeArticulos.appendChild(template.content);
}

/**
 * Aumenta la cantidad de determinado producto en la orden. 
 */
function incrementarCantidadProducto(productoId) {

    contenedorDeArticulos.innerHTML = '';

    const producto = ps.find(e => e.id === productoId)
    const cantidadActual = producto['cantidad']

    producto['cantidad'] = cantidadActual + 1

    ps.forEach(e => mostrarProducto(e))

    actualizarEventos();
}


/**
 * Disminuye la cantidad de determinado producto en la orden. 
 */
function disminuirCantidadProducto(productoId) {

    contenedorDeArticulos.innerHTML = '';

    const producto = ps.find(e => e.id === productoId)
    const cantidadActual = producto['cantidad']

    if (cantidadActual > 0) {
        producto['cantidad'] = cantidadActual - 1
    }

    ps.forEach(e => mostrarProducto(e))

    actualizarEventos();
}

function agregarEventoClick() {
    eliminarBtns = document.querySelectorAll(".boton-remover")
    eliminarBtns.forEach(e => {
        e.addEventListener('click', e => {
            //Después de identificar que boton fue presionado, acceder al padre del elemento
            //para obtener el id y poder eliminar el elemento. 
            eliminarProducto(e.target.parentElement.id)
        })
    })
}


//Agrega los eventos de los botones para aumentar la cantidad de determinado producto 
function agregarEventoIncrementarCantidad() {
    añadirBtns = document.querySelectorAll(".boton-añadir");

    añadirBtns.forEach(e => {
        e.addEventListener('click', e => {
            //Después de identificar que boton fue presionado, acceder al padre del elemento
            //para obtener el id y poder eliminar el elemento. 
            incrementarCantidadProducto(e.target.parentElement.parentElement.parentElement.parentElement.id)
        })
    })

}

//Agrega los eventos de los botones para aumentar la cantidad de determinado producto 
function agregarEventoDisminuirCantidad() {
    disminuirBtns = document.querySelectorAll(".boton-disminuir");

    disminuirBtns.forEach(e => {
        e.addEventListener('click', e => {
            //Después de identificar que boton fue presionado, acceder al padre del elemento
            //para obtener el id y poder eliminar el elemento. 
            disminuirCantidadProducto(e.target.parentElement.parentElement.parentElement.parentElement.id)
        })
    })
}

function setAddItemButtonsClickListener() {

    añadirArticulosBtns = document.querySelectorAll('.añadir-articulo');

    añadirArticulosBtns.forEach(button => {
        button.addEventListener('click', e => {
            añadirArticulo(e.target.parentElement.parentElement.id);
        })
    })
}

function actualizarEventos() {
    agregarEventoDisminuirCantidad();
    agregarEventoIncrementarCantidad();
    agregarEventoClick();

    //setAddItemButtonsClickListener(); 
}