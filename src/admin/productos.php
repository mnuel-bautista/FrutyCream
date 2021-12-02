<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


$conn = mysqli_connect('localhost', 'root', '', 'paleteria');

$consulta = 'SELECT p.id_producto, p.nombre, p.precio, p.img, c.categoria FROM producto p INNER JOIN categoria c ON p.id_cat = c.id_cat';

if (isset($_GET['categoryId']) && !empty($_GET['categoryId'] )) {
    //If the url contains a parameter specifying the category, then filter the result. 
    
    $category_id = $_GET['categoryId'];
    $consulta = $consulta . " where p.id_cat = " . $category_id . ";";
} else {
    $consulta = $consulta . ";";
}

$result = mysqli_query($conn, $consulta);


$products = $result->fetch_all(MYSQLI_ASSOC);


?>

<?php foreach ($products as $product) : ?>
    <li class="producto" id="<?= $product['id_producto'] ?>">

        <div class="imagen">
            <div class="capa"></div>
            <img class="img" src="<?= "../" . $product['img'] ?>" alt="">
        </div>
        <div>
            <p class="categoria"><?= $product['categoria'] ?></p>
            <p class="nombre s1"><?= $product['nombre'] ?></p>
            <p class="precio s1"><?= $product['precio'] ?></p>
        </div>
        <button class="mdc-icon-button material-icons-outlined añadir-articulo"><span class="material-icons-outlined">add_circle_outline</span>
            <div class="mdc-icon-button__ripple"></div>
        </button>
    </li>
<?php endforeach; ?>