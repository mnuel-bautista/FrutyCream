<?php

$conn = mysqli_connect('localhost', 'root', '', 'paleteria');

$consulta = 'SELECT * FROM producto;';
$productos = mysqli_query($conn, $consulta)->fetch_all(MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/menu-inicio.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="img/icon1.ico" />

    <script src="js/index.js" defer></script>
</head>

<body>
    <div class="hero">
        <nav>
            <div class="logo">
                <p>La michoacana</p>
            </div>
            <span class="material-icons-outlined nav-toggle">
                menu
            </span>
            <ul class="menu-navegacion">
                <li><a href="index.php" class="active">Inicio</a></li>
                <li><a href="Nosotros.html">Nosotros</a></li>
                <li><a href="Contacto.html">Contacto</a></li>
                <li class="boton-cerrar"><a href="">Cerrar</a></li>
            </ul>
        </nav>
        <div class="info">
            <h1 class="info-titulo">Prueba los mejores helados</h1>
            <p class="info-descripcion">La Heladería (Inserte nombre) le ofrece los sabores más exquisitos directo a tu paladar en forma de deliciosas paletas y helados elaborados tradicionalmente con ingredientes naturales</p>
            <a href="#nuestros-productos"><button class="ver-mas">Productos</button></a>
        </div>
    </div>
    <div class="content">

        <div class="nuestros-productos" id="nuestros-productos">
            <h2>Nuestros productos</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent cursus ligula ut varius dictum. Suspendisse.</p>
        </div>

        <div class="productos">
            <?php foreach ($productos as $producto) : ?>
                <div class="producto">
                    <div class="imagen">
                        <div class="capa">
                            <p class="descripcion"><?= $producto['descripcion'] ?></p>
                        </div>
                        <img src="<?= $producto['img'] ?>" alt="">
                    </div>
                    <p class="categoria b2">FRAPPES</p>
                    <p class="nombre s1"><?= $producto['nombre'] ?></p>
                    <p class="precio"><?= "$ " . "{$producto['precio']}" ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="footer">

        </div>
    </div>
</body>

</html>