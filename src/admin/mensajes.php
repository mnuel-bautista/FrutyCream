<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/mensajes.css">
    <title>Mensajes</title>
</head>


<?php

$pagina = 'mensajes';

session_start();
$session = $_SESSION['usuario'];

if ($session == null || $session == '') {
    header('Location: iniciar_sesion.php'); 
}

include("conexion/conexion.php"); 
$conn = conectar();

?>

<?php if (isset($_POST['id'])) : ?>

    <?php
    $id = $_POST['id'];
    $consulta = "DELETE FROM mensajes WHERE id = $id";
    $mensaje_eliminado = $conn->query($consulta); ?>

<?php endif; ?>


<?php

$consulta = "SELECT * FROM mensajes;";
$resultado = $conn->query($consulta);

$mensajes = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<body>
    <div class="contenedor">
        <?php include('menu/menu.php'); ?>

        <div class="contenido">
            <div class="barra-superior">

            </div>

            <div class="mensajes">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mensaje</th>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mensajes as $mensaje) :  ?>
                            <tr id="<?= $mensaje['id'] ?>">
                                <td scope="col"><?= $mensaje['mensaje'] ?></td>
                                <td scope="col"><?= $mensaje['nombre'] ?></td>
                                <td scope="col"><?= $mensaje['email'] ?></td>
                                <td>
                                    <form id="form-eliminar" action="mensajes.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $mensaje['id']; ?>">
                                        <button type="submit" class="btn btn-link">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>



    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/mensajes.js"></script>

</html>

<?php if ($mensaje_eliminado) : ?>
    <script>
        swal("", "El mensaje se ha eliminado.", "success");
    </script>
<?php endif; ?>


<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>