<!DOCTYPE html>
<html lang="en">
    
<?php

$pagina  = 'usuarios';

//Conexion
$conn = mysqli_connect('localhost', 'root', '', 'paleteria');
//Recuperar todas las categorias de usuarios
$consulta = "SELECT id, nombre, apellidos, telefono FROM usuarios;";
//Realiza la consulta a la base de datos
$resultado = mysqli_query($conn, $consulta);

//Convertir el resultado devuelto por mysql a un arreglo de categorias
$usuarios = mysqli_fetch_all($resultado);

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    
    <link rel="stylesheet" href="menu/menu.php">
    
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/admin-usu.css">
    <link rel="stylesheet" href="css/boton.css">
    <link rel="shortcut icon" href="../img/icon1.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="C:/Users/jczen/Desktop/Universidad/Semestre AD2021/ProWeb/proyecto-pw/src/img/icon1.ico"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    
        <?php include("menu/menu.php")?>
        <div class="contenido">
            <div>
                <div>
                    <div class="buscar">
                        <input type="text" placeholder="Buscar usuarios...">
                        <a class="boton"><a href ="Usuarios/Registrar_Usu.php" target="_blank"><button type="button" class="btn btn-link" data-bs-toggle="modal">Crear usuario</button></a>
                    </div>
                </div>
                
            <div class="usuarios">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($usuarios as $usuarios):  ?>
                            <tr>
                                <td scope="col"><?= $usuarios[0]?></td>
                                <td scope="col"><?= $usuarios[1]?></td>
                                <td scope="col"><?= $usuarios[2]?></td>
                                <td scope="col"><?= $usuarios[3]?></td>
                                <td scope="col"><a href ="Usuarios/Cambiar_contra.php" target="_blank">Cambiar contraseña</a></td>
                                <td scope="col"><a href ="Usuarios/Editar_Usu.php<?= "?id=".$usuarios[0]?>" target="_blank">Editar</a></td>
                                <td scope="col"><a href ="#" target="_blank">Eliminar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
      
        
        
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>