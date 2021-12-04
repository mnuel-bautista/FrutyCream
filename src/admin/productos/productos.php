<!DOCTYPE html>
<html lang="en">

<?php

$pagina = "productos"; 

$conn = mysqli_connect('localhost', 'root', '', 'paleteria');
//Retrieve all product categories.
$consulta = "SELECT id_cat, categoria FROM categoria;";
//Make the query to the database
$resultado = mysqli_query($conn, $consulta);

//Convert the result returned by mysql to an array of categories
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
    <link rel="stylesheet" href="../css/productos.css">
    <title>Products</title>
</head>

<body>
    <div class="contenedor">
       <?php include('../menu/menu.php');?>

        <div class="contenido">
            <div class="barra-superior">
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#crear-producto-modal">Add product</button>
            </div>

            <div class="productos">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
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
                                    <button type="button" class="btn btn-link" onclick="editarProducto(parentElement.parentElement.id);">Edit</button>
                                </td>
                                <td>
                                    <form action="http://localhost/proyecto-pw/src/admin/productos/eliminar.php" method="POST" onsubmit="return confirmarEliminacion();">
                                        <input type="hidden" name="id" value="<?= $producto[0];?>">
                                        <button type="submit" class="btn btn-link">Delete</button>
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
                            <h5 class="modal-title">Create product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="producto-formulario" enctype="multipart/form-data" method="POST" action="http://localhost/proyecto-pw/src/admin/productos/crear.php">
                                <div class="mb-3 form-group">
                                    <label for="nombre-producto">Name</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre-producto">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="descripcion-producto">Description</label>
                                    <input type="text" name="descripcion" class="form-control" id="descripcion-producto">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="precio-producto">Price</label>
                                    <input type="number" name="precio" class="form-control" id="precio-producto">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="imagen-producto">Image</label>
                                    <input type="file" name="img" class="form-control" id="imagen-producto" accept="image/*">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="categoria-producto">Category</label>
                                    <select name="categoria" name="categoria" class="form-control" id="categoria-producto">
                                        <?php foreach ($categorias as $categoria) : ?>
                                            <option value="<?= $categoria[0]; ?>"><?= $categoria[1] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" form="producto-formulario" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="productos.js"></script>
</html>