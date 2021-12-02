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
    session_start(); 
    $_SESSION['usuario'] = $nombre; 
    header('Location: ../Inicio.php'); 
} else {
    echo "<p>Credenciales incorrectas</p>"; 
}


?>