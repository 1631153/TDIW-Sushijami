<div class="singleProduct">
    <?php foreach ($productes as $index => $product): ?>
        <div class="producto" id="producto_<?php echo $index; ?>">
            <div class="imagen-container">
                <img src="<?php echo $product['img_path'] ?>" id="img_comida_<?php echo $index; ?>" width='250' height='200' alt="" class="borde">
            </div>
            <div class="detalles" style="display: block;">
                <div class="nom_producte">
                    <p>
                    <h2><?php echo $product['nom'] ?></h2><br>
                    </p>
                </div>
                <p>
                    <?php echo $product['Descripcion'] ?><br>
                    <h3><?php echo "Preu: ".$product['preu']."€" ?></h3>
                </p>
                <form method="post">
                    <input type="hidden" name="producto_id" value="<?php echo $index; ?>">
                    <input type="submit" name="añadir_al_carrito" class="botonCarrito" value="Añadir al carrito">
                </form>
            </div>
        </div>
    <?php endforeach ?>
</div>
