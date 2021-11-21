<!DOCTYPE html>
<html lang="en">

<?php


if(isset($_POST['fecha'])) {
    $fecha = $_POST['fecha']; 
} else {
    $fecha = date("Y-m-d"); 
}

$conn = mysqli_connect('localhost', 'root', '', 'paleteria');
//Recuperar todas las categorias de productos.
$consulta = "SELECT p.nombre, p.precio, a.cantidad, (a.cantidad * p.precio) as total, v.fecha FROM ventas v "
    . "INNER JOIN articulos a ON v.id_venta = a.id_venta INNER JOIN producto p ON a.id_producto = p.id_producto WHERE v.fecha = '$fecha';";
//Realiza la consulta a la base de datos
$resultado = mysqli_query($conn, $consulta);

//Convertir el resultado devuelto por mysql a un arreglo de categorias
$ventas = $resultado->fetch_all(MYSQLI_ASSOC);

//Recuperar el producto más vendido
$consulta = "
SELECT a.id_producto,
p.nombre,
Max(a.cantidad) AS mas_vendido
FROM   articulos a
INNER JOIN producto p
        ON a.id_producto = p.id_producto
INNER JOIN ventas v
        ON v.id_venta = a.id_venta
WHERE  v.fecha = '$fecha'
GROUP  BY id_producto
LIMIT  1; ";
$resultado = $conn->query($consulta);

$producto_mas_vendido = $resultado->fetch_assoc();

$consulta = "SELECT a.id_producto, p.nombre, MAX(a.cantidad) as mas_vendido FROM articulos a 
INNER JOIN producto p ON a.id_producto = p.id_producto
group by id_producto LIMIT 5;";

$resultado = $conn->query($consulta);
$productos_mas_vendidos = $resultado->fetch_all(MYSQLI_ASSOC);

//Consulta el total de los ingresos
$consulta = "SELECT sum(a.cantidad * p.precio) AS ingresos FROM articulos a INNER JOIN producto p ON a.id_producto = p.id_producto;"; 
$resultado = $conn->query($consulta);
$ingresos = $resultado->fetch_assoc(); 

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/ventas.css">
    <title>Productos</title>
</head>

<body>
    <div class="contenedor">
        <div class="header">
            <nav class="nav-bar">
                <li><a href="http://localhost/proyecto-pw/src/admin/Inicio.php" class="mdc-icon-button material-icons-outlined">
                        <span>home</span>
                        <p class="s1">Inicio</p>
                    </a></li>
                <li><a href="http://localhost/proyecto-pw/src/admin/ventas.php" class="mdc-icon-button material-icons-outlined elemento-seleccionado">
                        <span>shopping_bag</span>
                        <p class="s1">Ventas</p>
                    </a></li>
                <li><a href="http://localhost/proyecto-pw/src/admin/productos/productos.php" class="mdc-icon-button material-icons-outlined">
                        <span>inventory_2</span>
                        <p class="s1">Productos</p>
                    </a></li>
                <li><a href="#" class="mdc-icon-button material-icons-outlined">
                        <span>money_off</span>
                        <p class="s1">Promociones</p>
                    </a></li>
                <li><a href="#" class="mdc-icon-button material-icons-outlined">
                        <span>person</span>
                        <p class="s1">Usuarios</p>
                    </a></li>
            </nav>
        </div>

        <div class="contenido">
            <div class="barra-superior">
                <p>Manuel Bautista</p>
                <form action="http://localhost/proyecto-pw/src/admin/ventas.php" method="POST">
                    <input type="date" name="fecha" value="<?=$fecha?>">
                    <button type="input" class="btn btn-link">Actualizar</button>
                </form>
            </div>

            <div class="contenido-ventas">
                <div class="table-responsive" style="max-width: 100%">
                    <table class="table">
                        <thead>
                            <tr class="d-flex">
                                <th scope="col" style="width: 20%">Producto</th>
                                <th scope="col" style="width: 20%">Precio</th>
                                <th scope="col" style="width: 20%">Cantidad</th>
                                <th scope="col" style="width: 20%">Total</th>
                                <th scope="col" style="width: 20%">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventas as $venta) :  ?>
                                <tr class="d-flex">
                                    <td scope="col" style="width: 20%"><?= $venta['nombre'] ?></td>
                                    <td scope="col" style="width: 20%"><?= $venta['precio'] ?></td>
                                    <td scope="col" style="width: 20%"><?= $venta['cantidad'] ?></td>
                                    <td scope="col" style="width: 20%"><?= $venta['total'] ?></td>
                                    <td scope="col" style="width: 20%"><?= $venta['fecha'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>

                <div class="estadisticas">
                    <div class="producto-mas-vendido card">
                        <h6 class="card-title">Producto más vendido</h6>
                        <p class="b2"><?= (isset($producto_mas_vendido['nombre'])) ? $producto_mas_vendido['nombre'] : 'No hay información'; ?></p>
                    </div>
                    <div class="ingresos tarjeta">
                        <h6 class="card-title">Ingresos</h6>
                        <p class="b2"><?= $ingresos['ingresos']; ?></p>
                    </div>
                    <div class="productos-mas-vendidos card">
                        <h6 class="card-title">Productos más vendidos</h6>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($productos_mas_vendidos as $producto) : ?>
                                <li class="list-group-item"><?= $producto['nombre']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>



        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="productos.js"></script>

</html>