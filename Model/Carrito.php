<?php
function calcularPrecioTotal($producto) {
    return $producto['cantidad'] * $producto['precio'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizarCompra'])) {
    // Vaciar el carrito y limpiar la información de la sesión
    unset($_SESSION['productos_en_carrito']);
    unset($_SESSION['cantidad_total']);
    unset($_SESSION['precio_total']);

    // Respuesta exitosa con mensaje
    $response = array(
        'success' => true,
        'message' => '¡Compra finalitzada!'
    );

    header("Location: /pagina_confirmacion.php");

    echo json_encode($response);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = $_POST['index'];

    if (isset($_SESSION['productos_en_carrito'][$index])) {
        if (isset($_POST['accion']) && $_POST['accion'] == 'eliminar') {
            unset($_SESSION['productos_en_carrito'][$index]);
        }elseif (isset($_POST['accion']) && $_POST['accion'] == 'incrementar') {
            // Incrementar la cantidad del producto
            $_SESSION['productos_en_carrito'][$index]['cantidad']++;
        } elseif (isset($_POST['accion']) && $_POST['accion'] == 'decrementar') {
            // Decrementar la cantidad del producto
            $_SESSION['productos_en_carrito'][$index]['cantidad']--;

            // Verificar si la cantidad llega a cero y eliminar el producto del carrito en ese caso
            if ($_SESSION['productos_en_carrito'][$index]['cantidad'] <= 0) {
                unset($_SESSION['productos_en_carrito'][$index]);
            }
        }

        // Respuesta exitosa con nuevos datos
        $response = array(
            'success' => true,
            'cantidad' => $_SESSION['productos_en_carrito'][$index]['cantidad'],
            'precioTotal' => $_SESSION['productos_en_carrito'][$index]['cantidad'] * $_SESSION['productos_en_carrito'][$index]['precio']
        );

        echo json_encode($response);
        exit();
    } else {
        // Respuesta de error si el índice no es válido
        $response = array(
            'success' => false,
            'message' => 'Índice de producto no válido.'
        );

        echo json_encode($response);
        exit();
    }
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vaciar_carrito'])) {
    // Vaciar el carrito y limpiar la información de la sesión
    unset($_SESSION['productos_en_carrito']);
    unset($_SESSION['cantidad_total']);
    unset($_SESSION['precio_total']);

    // Respuesta exitosa con mensaje
    $response = array(
        'success' => true,
        'message' => '¡Cabàs buidat!'
    );

    echo json_encode($response);
    exit();
}
?>