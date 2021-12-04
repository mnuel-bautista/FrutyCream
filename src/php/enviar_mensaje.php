<?php 

include("../admin/conexion/conexion.php"); 
$conn = conectar();

$nombre = $_POST['nombre']; 
$email = $_POST['email']; 
$mensaje = $_POST['mensaje']; 

$consulta = "INSERT INTO mensajes VALUES(NULL, '$mensaje', '$nombre', '$email');";
$resultado = mysqli_query($conn, $consulta);  

if($resultado) {
    header('Location: ../contacto.php'); 
}
?>