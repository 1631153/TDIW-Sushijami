<?php
if (isset($_SESSION['productos_en_carrito']) && is_array($_SESSION['productos_en_carrito'])) {
    $productos_en_carrito = $_SESSION['productos_en_carrito'];
} else {
    echo '<p>No hi ha productes al cabàs.</p>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = $_POST['index'];
    $response = actualizarCantidad($index, $_POST['accion']);
    echo json_encode($response);
    exit();
}

if (isset($_POST['finalizarCompra'])) {

    // Limpiar el contenido del carrito
    unset($_SESSION['productos_en_carrito']);
    unset($_SESSION['cantidad_total']);
    unset($_SESSION['precio_total']);

    // Redirigir a la página de confirmación sin salida de datos
    header("Location: /pagina_confirmacion.php");
    exit;
}

include_once __DIR__."/../View/Carrito.php";
?>