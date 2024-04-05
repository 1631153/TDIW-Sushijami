<select name="categorias" id="fcategorias" onchange="mostrarProducto();">
    <?php
    foreach ($categorias as $categoria) {
        $escapedNom = htmlentities($categoria['nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        echo "<option value=".$categoria['id'].">".$escapedNom."</option>";
    }
    ?>
</select>