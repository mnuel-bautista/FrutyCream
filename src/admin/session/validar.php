<?php 
$conn = mysqli_connect('localhost', 'root', '', 'paleteria');

$nombre = $_POST['nombre']; 
$contraseña = $_POST['pass']; 

//Recupera el usuario
$consulta = "SELECT nombre, pass FROM usuarios WHERE nombre = '$nombre'"; 
$resultado = $conn->query($consulta);
$usuario = $resultado->fetch_assoc();  

if(!isset($usuario)) {
    echo "Las credenciales no son válidas"; 
    die(); 
}

if($nombre == $usuario['nombre'] && $contraseña == $usuario['pass']) {
    header('Location: http://localhost/proyecto-pw/src/admin/Inicio.php'); 
} else {
    echo "<p>Credenciales incorrectas</p>"; 
}


?>