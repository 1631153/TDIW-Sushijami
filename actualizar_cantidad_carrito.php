<?php

session_start();

if (isset($_SESSION['productos_en_carrito']) && is_array($_SESSION['productos_en_carrito'])) {
    $sumaCantidades = array_sum(array_column($_SESSION['productos_en_carrito'], 'cantidad'));
    echo $sumaCantidades;
} else {
    echo '0';
}

// Después de realizar las operaciones necesarias en PHP
echo json_encode(array(
    'success' => true,
    'nuevaCantidad' => $_SESSION['productes_carrito'],
));

?>


