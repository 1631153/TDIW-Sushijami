<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/css_registerForm.css"/>
    <link rel="stylesheet" href="css/css_buffet.css"/>
    <title>SUSHIJAMI</title>
</head>
<body>

<header>
    <?php include_once "Controller/menu_desplegable.php"; ?>
</header>

<?php include 'registro.php'; ?>

<div class="formDiv" id="fetch">
    <form method="POST">
        <label for="categorias" id="categorias"><h3>Categories:</h3></label>
        <?php include_once "Controller/categories.php"; ?>
        <br>
        <label for="producte"><h3>Tria el menjar:</h3></label>
        <div id="dproductes">
            <?php include_once "Controller/productes.php"; ?>
            <?php include_once "Controller/Añadir_carrito.php"; ?>
        </div>
        <br>
    </form>
</div>

<script src="js/functions.js"></script>
<script src="js/jquery-3.7.1.min.js"></script>
</body>
</html>
