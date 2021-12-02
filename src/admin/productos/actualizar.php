<?php

$conn = mysqli_connect('localhost', 'root', '', 'paleteria');

$id_producto = $_POST['id']; 
//Recuperar los parametros que se enviaron con el metodo POST
$nombre = $_POST['nombre']; 
$descripcion = $_POST['descripcion']; 
$precio = $_POST['precio']; 
$img = $_POST['img']; 
$id_categoria = $_POST['categoria']; 

$consulta = "UPDATE producto SET nombre = '$nombre', descripcion = '$descripcion'"
    .", precio = '$precio', img = '$img', id_cat = $id_categoria WHERE id_producto = $id_producto;";

$resultado = $conn->query($consulta); 

if($resultado) {
    //La inseración fue exitosa
    header('Location: ../productos.php'); 
}


?>
