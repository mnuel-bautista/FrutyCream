<?php 

$conn = mysqli_connect('localhost', 'root', '', 'paleteria');

$id_producto = $_POST['id']; 

$consulta = "DELETE FROM producto WHERE id_producto = $id_producto"; 
$resultado = $conn->query($consulta);

if($resultado) {
    header('Location: http://localhost/proyecto-pw/src/admin/productos/productos.php');
}

?>