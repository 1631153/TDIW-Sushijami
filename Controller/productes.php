<?php
include_once __DIR__."/../Model/gets.php";

$categoria_actual = null;
if (isset($_SESSION['categoria_actual'])) {
    $categoria_actual = $_SESSION['categoria_actual'];
}

//Verificar para ver si ha cambiado de categoría
if (isset($_REQUEST['categoria']) && $_REQUEST['categoria'] != $categoria_actual) {
    $_SESSION['categoria_actual'] = $_REQUEST['categoria'];
}

$categoria = 1;
if (isset($_SESSION['categoria_actual'])) {
    $categoria = $_SESSION['categoria_actual'];
}
$productes = getProduct($categoria);

include_once __DIR__."/../View/singleProduct.php";
?>
