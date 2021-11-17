
<?php 
/**
 * Crea un nuevo producto en la base de datos. Los datos son los que se enviaron desde el formulario.  
*/


$conn = mysqli_connect('localhost', 'root', '', 'paleteria');

$nombre = $_POST['nombre']; 
$descripcion = $_POST['descripcion']; 
$precio = $_POST['precio']; 
//Solo es la ruta de la imagen
$img = ""; 
$id_categoria = $_POST['categoria']; 

$consulta = "INSERT INTO producto VALUES(NULL, '$nombre', '$descripcion', $precio, '$img', $id_categoria);"; 
$resultado = mysqli_query($conn, $consulta); 

//Si la consulta fue exitosa, resultado tendrá el valor TRUE
if($resultado) {
    header('Location: http://localhost/proyecto-pw/src/admin/productos/productos.php'); 
} else {
    print_r($resultado);
}

?>