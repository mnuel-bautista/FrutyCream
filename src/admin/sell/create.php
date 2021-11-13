<?php 

$conn = mysqli_connect('localhost', 'root', '', 'paleteria'); 

$query = "INSERT INTO ventas VALUES(NULL, CURRENT_DATE());";
$result = mysqli_query($conn, $query);  
$sell_id = mysqli_insert_id($conn); 

$products = json_decode(file_get_contents('php://input'));  
print_r($products);  

foreach($products as $product) { 
    $productId = $product->productId; 
    $quantity = $product->quantity;  
    $insert_query = "INSERT INTO articulos VALUES(NULL, '$productId', '$quantity', $sell_id);"; 
    mysqli_query($conn, $insert_query);  
}  
?>