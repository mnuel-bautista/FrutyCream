
<?php
ini_set('display_errors', '1'); 
ini_set('display_startup_errors', '1'); 
error_reporting(E_ALL); 


$conn = mysqli_connect('localhost', 'root', '', 'paleteria'); 

$consulta = 'SELECT * FROM producto'; 

if(isset($_GET['categoryId'])) {
    //If the url contains a parameter specifying the category, then filter the result. 
    $category_id = $_GET['categoryId']; 
    $consulta = $consulta." where id_cat = ".$category_id.";"; 
} else {
    $consulta = $consulta.";"; 
}

$result = mysqli_query($conn, $consulta); 

$products = mysqli_fetch_all($result); 


?>

<?php foreach($products as $product): ?>
    <li class="producto" id="<?=$product[0]?>">
        <button class="mdc-icon-button material-icons-outlined añadir-articulo"><span class="material-icons-outlined">add_circle_outline</span><div class="mdc-icon-button__ripple"></div></button>
        <img src="img/helado_fresa.png" alt="">
            <div>
                <p class="s1"><?= $product[1] ?></p>
                <p class="s1"><?= $product[3] ?></p>
            </div>
    </li>
<?php endforeach; ?>