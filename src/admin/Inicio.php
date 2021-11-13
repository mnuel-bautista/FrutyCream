
<?php
$conn = mysqli_connect('localhost', 'root', '', 'paleteria'); 

$consulta = 'SELECT * FROM producto;'; 
$productos = mysqli_query($conn, $consulta);

$categories_query = 'SELECT * FROM categoria;'; 
$result = mysqli_query($conn, $categories_query); 

$categories = mysqli_fetch_all($result); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/orden-articulo.css">
    <link rel="stylesheet" href="css/inicio.css">
    <script src="js/inicio.js" defer></script> 
    <script src="js/categories.js" defer></script>
    <script src="js/order.js" defer></script>
    <!-- Para agregar algunos iconos -->
</head>
<body>

    <div class="container">
        <div class="header">

        </div>

        <div class="content">
            <ul class="categories s2">
                <li class="category selected">All</li>
                    <?php foreach($categories as $category): ?>
                        <li class="category" id="<?=$category[0]?>"><?=$category[1]?></li>
                    <?php endforeach; ?>
                <span class="divider"></span>
            </ul>
            <ul class="products"></ul>
        </div>


        <div class="orden">
            <div class="order-title">
                <h5>Order</h5>
                <button class="mdc-icon-button material-icons-outlined delete-order">close<div class="mdc-icon-button__ripple"></div></button>
            </div>
            <ul class="articulos"></ul>
            <button class="boton confirm-order">Confirmar</button>
        </div>
    </div>

    <template>
        <li class="articulo">
            <img src="https://images.unsplash.com/photo-1619761216693-a6d9e26a1ea0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=454&q=80" alt="">
            <div class="info">
                <p class="nombre-producto">Frappe</p>
                <div>
                    <span>$ 50 </span>
                    <div class="añadir-mas">
                        <button class="mdc-icon-button material-icons-outlined boton-disminuir">remove_circle_outline<div class="mdc-icon-button__ripple"></div></button>
                        <span>2</span>
                        <button class="mdc-icon-button material-icons-outlined boton-añadir">add_circle_outline<div class="mdc-icon-button__ripple"></div></button>
                    </div>
                    <span>$ 100</span>
                </div>
            </div>
            <button class="mdc-icon-button material-icons-outlined boton-remover">close<div class="mdc-icon-button__ripple"></div></button>
        </li>
    </template>

</body>

</html>