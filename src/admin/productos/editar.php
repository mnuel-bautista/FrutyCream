<?php

$conn = mysqli_connect('localhost', 'root', '', 'paleteria');

$producto;

if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];


    $consulta = "SELECT nombre, descripcion, precio, id_cat FROM producto WHERE id_producto = $id_producto;";

    $resultado = $conn->query($consulta);
    $producto = mysqli_fetch_all($resultado)[0];

    //La categoria que ha sido seleccionada
    $consulta = "SELECT * FROM categoria WHERE id_cat=$producto[3];";
    error_log($consulta); 
    $resultado = $conn->query($consulta);  
    $categoria_seleccionada = $resultado->fetch_row();

    //Todas las categorias en la base de datos
    $consulta = "SELECT * FROM categoria;"; 
    $resultado = $conn->query($consulta); 
    $categorias = $resultado->fetch_all();
} else {
    echo "<h1> Ocurrio algun error</h1>";
    var_dump($_POST);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="producto-formulario" method="POST" action="https://localhost/proyecto-pw/src/admin/productos/actualizar.php">
                    
                    <input type="hidden" name="id" value="<?= $id_producto; ?>">
                    <div class="mb-3 form-group">
                        <label for="nombre-producto">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre-producto" value="<?= $producto[0]; ?>">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="descripcion-producto">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion-producto" value="<?=$producto[1];?>">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="precio-producto">Precio</label>
                        <input type="number" name="precio" class="form-control" id="precio-producto" value="<?=$producto[2];?>">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="imagen-producto">Imagen</label>
                        <input type="file" name="img" class="form-control" id="imagen-producto" accept="image/*">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="categoria-producto">Categoria</label>
                        <select name="categoria" name="categoria" class="form-control" id="categoria-producto">
                            <?php foreach ($categorias as $categoria) : ?>
                                <option <?php if($categoria[0] == $categoria_seleccionada[0]){ echo "selected";}?> value="<?= $categoria[0]; ?>"><?= $categoria[1] ?></option>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>