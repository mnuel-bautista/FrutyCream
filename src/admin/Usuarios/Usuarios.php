<!DOCTYPE html>
<html lang="en">
    
<?php

$conn = mysqli_connect('localhost', 'root', '', 'paleteria');
//Recuperar todas las categorias de productos.
$consulta = "SELECT nombre, apellidos, telefono, tipo_usuario FROM usuarios;";
//Realiza la consulta a la base de datos
$resultado = mysqli_query($conn, $consulta);

//Convertir el resultado devuelto por mysql a un arreglo de categorias
$categorias = mysqli_fetch_all($resultado);

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../css/admin-usu.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="C:/Users/jczen/Desktop/Universidad/Semestre AD2021/ProWeb/proyecto-pw/src/img/icon1.ico"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="app.js" defer></script>
</head>
<body>
    
    <div class="flexbox-container">
        <nav class="nav-bar">
            <li><a href="#" class="mdc-icon-button material-icons-outlined">
                    <span>home</span>
                    <p class="s1">Inicio</p>
                </a></li>
            <li><a href="#" class="mdc-icon-button material-icons-outlined">
                    <span>shopping_bag</span>
                    <p class="s1">Ventas</p>
                </a></li>
            <li><a href="#" class="mdc-icon-button material-icons-outlined">
                    <span>inventory_2</span>
                    <p class="s1">Productos</p>
                </a></li>
            <li><a href="#" class="mdc-icon-button material-icons-outlined">
                    <span>money_off</span>
                    <p class="s1">Promociones</p>
                </a></li>
            <li><a href="http://localhost/proyecto-pw/src/admin/users/users.php" class="mdc-icon-button material-icons-outlined elemento-seleccionado">
                    <span>person</span>
                    <p class="s1">Usuarios</p>
                </a></li>
        </nav>
        <div class="flexbox-item flexbox-item-2">
            <div class="buscar">
                <input type="text" placeholder="Buscar usuarios..." required>
            </div>
            <hr>

            <div class="usuarios">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Tipo de usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categorias as $usuarios):  ?>
                            <tr>
                                <td scope="col"><?= $categorias[0]?></td>
                                <td scope="col"><?= $categorias[1]?></td>
                                <td scope="col"><?= $categorias[2]?></td>
                                <td scope="col"><?= $categorias[3]?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </div>
        <div class="flexbox-item flexbox-item-3">

        </div>
        
        
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>