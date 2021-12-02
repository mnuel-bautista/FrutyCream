<!DOCTYPE html>
<html lang="en">

<?php

session_start();
$session = $_SESSION['usuario'];

if ($session == null || $session == '') {
    header('Location: iniciar_sesion.php'); 
}

$pagina = "productos"; 

$conn = mysqli_connect('localhost', 'root', '', 'paleteria');
//Recuperar todas las categorias de productos.
$consulta = "SELECT id_cat, categoria FROM categoria;";
//Realiza la consulta a la base de datos
$resultado = mysqli_query($conn, $consulta);

//Convertir el resultado devuelto por mysql a un arreglo de categorias
$categorias = mysqli_fetch_all($resultado);

$consulta_productos = "SELECT p.id_producto, p.nombre, p.descripcion, p.precio, c.categoria FROM "
    ."producto p INNER JOIN categoria c ON p.id_cat = c.id_cat;";
$resultado = mysqli_query($conn, $consulta_productos);

$productos = mysqli_fetch_all($resultado);

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
    <link rel="stylesheet" href="css/productos.css">
    <title>Productos</title>
</head>

<body>
    <div class="contenedor">
       <?php include('menu/menu.php');?>

        <div class="contenido">
            <div class="barra-superior">
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#crear-producto-modal">Agregar producto</button>
            </div>

            <div class="productos">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto) :  ?>
                            <tr id="<?= $producto[0]?>">
                                <td scope="col"><?= $producto[1] ?></td>
                                <td scope="col"><?= $producto[2] ?></td>
                                <td scope="col"><?= $producto[3] ?></td>
                                <td scope="col"><?= $producto[4] ?></td>
                                <td>
                                    <button type="button" class="btn btn-link" onclick="editarProducto(parentElement.parentElement.id);">Editar</button>
                                </td>
                                <td>
                                    <form action="productos/eliminar.php" method="POST" onsubmit="return confirmarEliminacion();">
                                        <input type="hidden" name="id" value="<?= $producto[0];?>">
                                        <button type="submit" class="btn btn-link">Eliminar</button>
                                    </form> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="modal" id="crear-producto-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crear producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="producto-formulario" enctype="multipart/form-data" method="POST" action="productos/crear.php">
                                <div class="mb-3 form-group">
                                    <label for="nombre-producto">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre-producto">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="descripcion-producto">Descripcion</label>
                                    <input type="text" name="descripcion" class="form-control" id="descripcion-producto">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="precio-producto">Precio</label>
                                    <input type="number" name="precio" class="form-control" id="precio-producto">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="imagen-producto">Imagen</label>
                                    <input type="file" name="img" class="form-control" id="imagen-producto" accept="image/*">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="categoria-producto">Categoria</label>
                                    <select name="categoria" name="categoria" class="form-control" id="categoria-producto">
                                        <?php foreach ($categorias as $categoria) : ?>
                                            <option value="<?= $categoria[0]; ?>"><?= $categoria[1] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" form="producto-formulario" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="productos/productos.js"></script>
</html>