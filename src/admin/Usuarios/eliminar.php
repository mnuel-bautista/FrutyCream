<?php 

include("../conexion/conexion.php"); 
$conn = conectar();

$id = $_POST['id']; 



$consulta = "DELETE FROM usuarios WHERE id = $id;";
$resultado = $conn->query($consulta);

if($resultado) {
    header('Location: ../usuarios.php');
} else {
    echo "<p> Un error ocurrió </p>"; 
    
}

?>