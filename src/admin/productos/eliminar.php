<?php 

include("../conexion/conexion.php"); 
$conn = conectar();

$id_producto = $_POST['id']; 



$consulta = "DELETE FROM producto WHERE id_producto = $id_producto;";
$resultado = $conn->query($consulta);

if($resultado) {
    header('Location: ../productos.php');
} else {
    echo "<p> Un error ocurrió </p>"; 
    var_dump($id_producto); 
}

?>