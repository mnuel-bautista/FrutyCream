
<?php
header('Location: iniciar_sesion.php'); 
ini_set('display_errors', '1'); 
ini_set('display_startup_errors', '1'); 
error_reporting(E_ALL); 

$name = 'Hello, world'; 

$conn = mysqli_connect('localhost', 'root', '', 'paleteria'); 

$consulta = 'SELECT * FROM producto;'; 
$productos = mysqli_query($conn, $consulta);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>

 <?php foreach(mysqli_fetch_all($productos) as $producto): ?>
    <p><?= $producto[0]; ?></p>
    <p><?= $producto[1]; ?></p>
 <?php endforeach; ?>

    <p><?= $name; ?></p>
</body>
</html>