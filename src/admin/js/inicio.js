const orden = {};

const elementoOrden = document.querySelector(".orden");

const añadirFrappe = document.querySelector("button");

const itemsContainer = document.querySelector('.articulos'); 

//Los botones para eliminar que se encuentran en cada producto. Aparecen como una X en la parte superior 
let eliminarBtns = document.querySelectorAll(".boton-remover");

let añadirBtns = document.querySelectorAll(".boton-añadir");

let disminuirBtns = document.querySelectorAll(".boton-disminuir");

let addItemButtons = document.querySelectorAll(".añadir-articulo"); 

const categories = []; 

getAllProducts(); 
actualizarEventos();  


let i = 0;

añadirFrappe.addEventListener('click', e => {
    productos[0]['id'] = "" + Math.floor((Math.random() * 100));
    const p = JSON.parse(JSON.stringify(productos[0]));
    añadirProducto(p);
})

function getAllProducts() {

    const productsContainer = document.querySelector('.products'); 

    fetch('http://localhost/proyecto-pw/src/admin/products.php')
        .then(response => response.text())
        .then(products => {
            productsContainer.innerHTML = products
            setAddItemButtonsClickListener();
        }); 

}


/**
 * 
 * Adds the item to the current order. 
 */
function addItem(productId) {
    console.log(productId); 
    const products = document.getElementsByClassName("producto")
    const productElement = products.namedItem(productId); 

    itemsContainer.innerHTML = '';

    //If the item is not found, add this product as a new item..
    const index = ps.findIndex(e => e.id === productId)  
    if(index === -1) {
        const id = productElement.id; 
        //The image url of the product. 
        const img = productElement.children[1].src;
        const name = productElement.children[2].firstElementChild.textContent; 
        const price = productElement.children[2].lastElementChild.textContent;  
    
        const product = {
            id: id, 
            nombre: name,
            precio: price, 
            cantidad: 1, 
            img: img,   
        }
    
        ps.push(product); 
    } else {
        //If product is found in the order items, only increase the quantity. 
        console.log(ps[index]['cantidad']);
        ps[index]['cantidad'] = ps[index]['cantidad'] + 1; 
    }

    

    ps.forEach(e => mostrarProducto(e)); 

    actualizarEventos(); 
}

const productos = [{
        id: "0754A",
        nombre: "Frappe",
        precio: 50,
        cantidad: 1,
        img: "https://images.unsplash.com/photo-1619761216693-a6d9e26a1ea0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=454&q=80"
    },
    {
        id: "0184A",
        nombre: "Frappe",
        precio: 50,
        cantidad: 2,
        img: "https://images.unsplash.com/photo-1619761216693-a6d9e26a1ea0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=454&q=80"
    },
    {
        id: "0127A",
        nombre: "Frappe",
        precio: 50,
        cantidad: 2,
        img: "https://images.unsplash.com/photo-1619761216693-a6d9e26a1ea0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=454&q=80"
    }
]

let ps = []


function confirmarOrden() {
    
}


function añadirProducto(producto) {

    itemsContainer.innerHTML = ''; 
    //Añadir el nuevo producto a la lista de productos. 
    ps.push(producto);

    //Mostrar en pantalla todos los productos dentro de la lista de productos 
    ps.forEach(e => mostrarProducto(e))

    actualizarEventos(); 
}

function eliminarProducto(productoId) {

    itemsContainer.innerHTML = ''; 

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


    itemsContainer.appendChild(template.content);  
}

/**
 * Aumenta la cantidad de determinado producto en la orden. 
 */
function incrementarCantidadProducto(productoId) {

    itemsContainer.innerHTML = ''; 

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

    itemsContainer.innerHTML = ''; 

    console.log(productoId)
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
            console.log(e.target.parentElement.id)
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
            console.log('click');
            //Después de identificar que boton fue presionado, acceder al padre del elemento
            //para obtener el id y poder eliminar el elemento. 
            incrementarCantidadProducto(e.target.parentElement.parentElement.parentElement.parentElement.id)
        })
    })

}

//Agrega los eventos de los botones para aumentar la cantidad de determinado producto 
function agregarEventoDisminuirCantidad() {
    disminuirBtns = document.querySelectorAll(".boton-disminuir");
    console.log(disminuirBtns);

    disminuirBtns.forEach(e => {
        e.addEventListener('click', e => {
            console.log('dism');
            //Después de identificar que boton fue presionado, acceder al padre del elemento
            //para obtener el id y poder eliminar el elemento. 
            disminuirCantidadProducto(e.target.parentElement.parentElement.parentElement.parentElement.id)
        })
    })
}

function setAddItemButtonsClickListener() {

    addItemButtons = document.querySelectorAll('.añadir-articulo'); 

    addItemButtons.forEach(button => {
        button.addEventListener('click', e => {
            console.log("fasdfad"); 
            addItem(e.target.parentElement.parentElement.id); 
        })
    })
}

function actualizarEventos() {
    agregarEventoDisminuirCantidad(); 
    agregarEventoIncrementarCantidad(); 
    agregarEventoClick(); 

    //setAddItemButtonsClickListener(); 
}