<?php
session_start();
include_once "Model/Carrito.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUSHIJAMI</title>
    <link rel="stylesheet" href="css/css_carrito.css"/>
</head>
<body>
<div class="all">
    <h2>Carrito de Compras</h2>
    <?php include_once "Controller/Carrito.php"; ?>
    <br>
    <button id="vaciarCarritoBtn" onclick="vaciarCarrito()">BUIDAR CABÀS</button>
    <br>
    <br>
    <nav class="buffet">
        <a href="buffet_dia.php"><button type="button">TORNAR AL BUFFET</button></a><br>
        <br>
        <form action="/index.php?accion=fin_compra" method="post">
            <button type="submit" onclick="finalizarCarrito()" name="finalizarCompra" >FINALITZAR COMPRA</button>
        </form>
    </nav>
</div>
<script src="js/functions.js"></script>
<script src="js/jquery-3.7.1.min.js"></script>

</body>
</html>
