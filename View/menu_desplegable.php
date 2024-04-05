<h1 id="mover_logo">
    <a href="https://tdiw-m7.deic-docencia.uab.cat/index.php">
        <img class="logo" src="img/SUSHIJAMI-6-11-2023.png"/></a>
</h1>
<nav class="navegar">
    <a href="https://tdiw-m7.deic-docencia.uab.cat/index.php">INICI</a>
    <a href="quiSom.php">QUI SOM?</a>
    <a href="buffet_dia.php">BUFFET</a>
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"  href="#" ><img></img>MENÚ</button>
        <div id="myDropdown" class="dropdown-content">
            <?php
            session_start();
            if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === true) {
                // Si el usuario ha iniciado sesión, muestra opciones personalizadas
                echo '<a href="cuenta.php">El meu compte</a>';
                echo '<a href="carrito.php">Les meves comandes</a>';
                echo '<a href="Model/Cerrar_session.php">Tancar sessió</a>';
            }else{
                // Si el usuario no ha iniciado sesión, muestra opción de inicio de sesión
                echo '<a id="loginLink" class="btnLogin">Iniciar Sessió</a>';
            } ?>
        </div>
    </div>
    <img src="../img/cart.jpg" alt="Carrito" style="width: 50px; height: 50px;">
    <?php
    include_once __DIR__ . "/../Model/gets.php";
    // Muestra la cantidad total de productos desde la sesión
    if (isset($_SESSION['cantidad_total'])) {
        $cantidadTotal = $_SESSION['cantidad_total'];
        echo '<span class="carrito-cantidad">PRODUCTES: ' . $cantidadTotal . '</span>';
    } else {
        echo '<span class="carrito-cantidad">PRODUCTES: 0</span>';
    }
    echo '<br>';
    if (isset($_SESSION['precio_total'])) {
        $precioTotalTodos = $_SESSION['precio_total'];
        echo '<span class="carrito-cantidad" style="margin-left: 600px;">TOTAL: ' . $precioTotalTodos . '€</span>';

    } else {
        echo '<span class="carrito-cantidad" style="margin-left: 600px;">TOTAL: 0€</span>';
    }

    // ...
    ?>
</nav>

