<?php foreach ($detallesProducto as $detalle): ?>
    <p>
        <?php echo $detalle['campo1']; ?><br>
        <?php echo $detalle['campo2']; ?><br><br>
        <?php echo $detalle['campo3']."€" ?>
    </p>
    <form method="post">
        <input type="hidden" name="producto_id" value="<?php echo $productoId; ?>">
        <input type="submit" name="añadir_al_carrito" class="botonCarrito" value="Añadir al carrito">
    </form>
    <button onclick="retroceder()">Retroceder</button>
<?php endforeach ?>

