<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['añadir_al_carrito'])) {
        $producto_id = $_POST['producto_id'];

        if (!isset($_SESSION['productos_en_carrito'])) {
            $_SESSION['productos_en_carrito'] = array();
        }

        // Identificador para el producto detectando el cambio de categoria
        $producto_existente = array_search($productes[$producto_id]['id'], array_column($_SESSION['productos_en_carrito'], 'id'));
        if ($producto_existente !== false) {
            $_SESSION['productos_en_carrito'][$producto_existente]['cantidad']++;
        } else {
            $_SESSION['productos_en_carrito'][] = array('id' => $productes[$producto_id]['id'], 'cantidad' => 1, 'nombre' => $productes[$producto_id]['nom'], 'precio' => $productes[$producto_id]['preu'], 'categoria' => $categoria);
        }

        // Contador de productos para la vista previa
        if (!isset($_SESSION['productes_carrito'])) {
            $_SESSION['productes_carrito'] = 0;
        }
        $_SESSION['productes_carrito']++;
        $nom = $productes[$producto_id]['nom'];
        echo "<script> alert('$nom (cantitat 1) afegit al cabàs'); </script>";
    }
}
?>
