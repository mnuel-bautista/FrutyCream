<?php 

include("../conexion/conexion.php"); 
$conn = conectar(); 

$consulta = "INSERT INTO ventas VALUES(NULL, CURRENT_DATE());";
$resultado = mysqli_query($conn, $consulta);  
$id_venta = mysqli_insert_id($conn); 

$productos = json_decode(file_get_contents('php://input'));  
print_r($productos);  

foreach($productos as $producto) { 
    $productoId = $producto->idProducto; 
    $cantidad = $producto->cantidad;  
    $consulta_insercion = "INSERT INTO articulos VALUES(NULL, '$productoId', '$cantidad', $id_venta);"; 
    mysqli_query($conn, $consulta_insercion);  
}  
?>