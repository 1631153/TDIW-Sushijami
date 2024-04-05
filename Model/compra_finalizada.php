<?php
include_once __DIR__ . "/connectaDB.php";
function fin_compra()
{
        $connexio = connectaBD();
        $data = date('Y-m-d H:i:s');
        //Insertar en la base de datos (comanda)
        $query = "INSERT INTO comanda (data_creacio, numero_elements, import_total, id_usuario) VALUES ($1, $2, $3, $4)";
        $result = pg_query_params($connexio, $query, array($data, $_SESSION['cantidad_total'], $_SESSION['precio_total'], $_SESSION['ID']));
        if (!$result) {
            die("Error en la consulta: " . pg_last_error());
        }

        //Pillar id de la comanda enviada
        $query = "SELECT id FROM comanda WHERE id_usuario = $1 and data_creacio = $2";
        $result = pg_query_params($connexio, $query, array($_SESSION['ID'],$data));
        $c = pg_fetch_row($result);
        $comanda_id = $c[0];
        if(!$result){
            die("ERROR al recuperar el id del pedido : " .pg_last_error());
        }

        //Insertar en la base de datos (linia_comanda)
        foreach ($_SESSION['productos_en_carrito'] as $producto) {
            $nombre = $producto['nombre'];
            $quantitat = $producto['cantidad'];
            $p_ind = $producto['precio'];
            $p_tot = $producto['cantidad'] * $producto['precio'];
            $producto_id = $producto['id'];
            $query = "INSERT INTO linia_comanda (product_id, comanda_id, nom_producte, quantitat, preu_unitari, preu_total) VALUES ($1, $2, $3, $4, $5, $6)";
            $result = pg_query_params($connexio, $query, array($producto_id, $comanda_id, $nombre, $quantitat, $p_ind, $p_tot));
            if (!$result) {
                die("Error en la consulta: " . pg_last_error());
            }
        }
}
?>