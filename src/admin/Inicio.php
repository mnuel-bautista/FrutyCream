
<?php
$pagina = "inicio"; 
session_start(); 
$session = $_SESSION['usuario'];        

if($session == null || $session == '') {
    echo "Usted no tiene autorización"; 
    die(); 
} 

$conn = mysqli_connect('localhost', 'root', '', 'paleteria'); 

$consulta = 'SELECT * FROM producto;'; 
$productos = mysqli_query($conn, $consulta);

$categories_query = 'SELECT * FROM categoria;'; 
$result = mysqli_query($conn, $categories_query); 

$categorias = mysqli_fetch_all($result); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/orden-articulo.css">
    <link rel="stylesheet" href="css/inicio.css">
    <script src="js/inicio.js" defer></script> 
    <script src="js/categorias.js" defer></script>
    <script src="js/orden.js" defer></script>
    <!-- Para agregar algunos iconos -->
</head>
<body>

    <div class="container">
        <div class="header">
            <?php include('menu/menu.php'); ?> 
        </div>

        <div class="content">
            <ul class="categorias s2">
                <li class="categoria selected">All</li>
                    <?php foreach($categorias as $categoria): ?>
                        <li class="categoria" id="<?=$categoria[0]?>"><?=$categoria[1]?></li>
                    <?php endforeach; ?>
                <span class="divider"></span>
            </ul>
            <ul class="productos"></ul>
        </div>


        <div class="orden">
            <div class="encabezado-orden">
                <h5>Orden</h5>
                <button class="mdc-icon-button material-icons-outlined eliminar-orden">close<div class="mdc-icon-button__ripple"></div></button>
            </div>
            <ul class="articulos"></ul>
            <button class="boton confirmar-orden">Confirmar</button>
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