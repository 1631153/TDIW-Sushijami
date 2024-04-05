<?php
error_reporting(E_ALL & ~E_NOTICE); //Quita el extraño Notice de que la variable no está definida
if ($productos_en_carrito > 0) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Producto</th>';
    echo '<th>Cantidad</th>';
    echo '<th>Precio</th>';
    echo '<th>Acciones</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $cantidadTotal = 0;
    foreach ($productos_en_carrito as $index => $producto) {
        echo '<tr id="fila_' . $index . '">';
        echo '<td>' . $producto['nombre'] . '</td>';
        echo '<td class="cantidad_prod" id="cantidad_' . $index . '">' . $producto['cantidad'] . '</td>';
        echo '<td class="precio_total_individual" id="precio_total_' . $index . '">' . calcularPrecioTotal($producto) . '€</td>';
        echo '<td>';
        echo '<button onclick="actualizarCantidad(' . $index . ', \'incrementar\')">+</button>';
        echo '<button onclick="actualizarCantidad(' . $index . ', \'decrementar\')">-</button>';
        echo '<button onclick="actualizarCantidad(' . $index . ', \'eliminar\')">Eliminar</button>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '<br>';

    $cantidadTotalProductos = array_sum(array_map(function ($producto) {
        return $producto['cantidad'];
    }, $productos_en_carrito));

    echo '<div id="cantidad_total_productos">Cantidad total de productos: ' . $cantidadTotalProductos . '</div>';

    $precioTotalTodos = array_sum(array_map(function ($producto) {
        return $producto['cantidad'] * $producto['precio'];
    }, $productos_en_carrito));
    $_SESSION['precio_total'] = $precioTotalTodos;

    echo '<div id="precio_total_todos">Precio Total: ' . $precioTotalTodos . '€</div>';
}
?>


