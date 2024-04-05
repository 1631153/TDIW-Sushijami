<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/css_slider.css"/>
    <link rel="stylesheet" href="css/css_registerForm.css"/>
    <title>SUSHIJAMI</title>
</head>
<body>

<header>
    <?php include_once "Controller/menu_desplegable.php"; ?>
</header>

<?php include 'registro.php'; ?>

<div class="slider" id="sliderContainer">
    <ul>
        <li>
            <img src="img/Sliders/promo1.jpg">
        </li>
        <li>
            <img src="img/Sliders/promo2.jpg">
        </li>
        <li>
            <img src="img/Sliders/promo3.jpg">
        </li>
        <li>
            <img src="img/Sliders/promo4.jpg">
        </li>
    </ul>
</div>


<script src="js/functions.js"></script>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/variables.js"></script>


</body>
</html>
