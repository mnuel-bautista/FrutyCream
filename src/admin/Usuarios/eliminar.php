<?php 

$conn = mysqli_connect('localhost', 'root', '', 'paleteria');

$id = $_POST['id']; 



$consulta = "DELETE FROM usuarios WHERE id = $id;";
$resultado = $conn->query($consulta);

if($resultado) {
    header('Location: ../Usuarios.php');
} else {
    echo "<p> Un error ocurrió </p>"; 
    
}

?>