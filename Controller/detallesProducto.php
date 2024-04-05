<?php
include_once __DIR__."/../Model/gets.php";

if (isset($_GET['categoria']) && isset($_GET['producto'])) {
    $categoria = $_GET['categoria'];
    $productoId = $_GET['producto'];

    // Obtener detalles del producto
    $detallesProducto = getDetallesProducto($categoria, $productoId);

    // Mostrar detalles
    include __DIR__."/../View/detallesProductoView.php";
}
?>
