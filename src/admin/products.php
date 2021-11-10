
<?php
$conn = mysqli_connect('localhost', 'root', '', 'paleteria'); 

$consulta = 'SELECT * FROM producto;'; 
$productos = mysqli_query($conn, $consulta);

$categories_query = 'SELECT * FROM categoria;'; 
$result = mysqli_query($conn, $categories_query); 

$categories = mysqli_fetch_all($result); 
?>

<?php foreach(mysqli_fetch_all($productos) as $producto): ?>
    <li class="producto" id="<?=$producto[0]?>">
        <button class="mdc-icon-button material-icons-outlined añadir-articulo"><span class="material-icons-outlined">add_circle_outline</span><div class="mdc-icon-button__ripple"></div></button>
        <img src="img/helado_fresa.png" alt="">
            <div>
                <p class="s1"><?= $producto[1] ?></p>
                <p class="s1"><?= $producto[3] ?></p>
            </div>
    </li>
<?php endforeach; ?>