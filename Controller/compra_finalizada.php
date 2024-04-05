<?php
session_start();
include_once __DIR__ . "/../Model/compra_finalizada.php";
$productos_en_carrito = $_SESSION['productos_en_carrito'];
if ($productos_en_carrito > 0)
{
    $_SESSION['precio_total'] = 0;
    $_SESSION['cantidad_total'] = 0;
    foreach ($_SESSION['productos_en_carrito'] as $producto) {
        $_SESSION['precio_total'] += $producto['cantidad'] * $producto['precio'];
        $_SESSION['cantidad_total'] += $producto['cantidad'];
    }
    fin_compra();
    include __DIR__ . "/../View/pagina_confirmacion.php";
}else{
    header('Location: /../carrito.php');
}
?>