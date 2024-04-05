<div class = "wrapper">
    <span class="icon-close" onclick=location.reload()>
        <ion-icon name="close-outline"></ion-icon>
    </span>
    <div class = "formulari login">
        <h1>Iniciar Sessió</h1>
        <form action="/index.php?accion=login" method="POST">
            <div class="dades">
                <input type="text" name="EMAIL" required>
                <label>Correu electronic</label>
            </div>
            <div class="dades">
                <input type="password" name="CONTRA" required>
                <label>Contraseña</label>
            </div>
            <div class="recordar">Has oblidat la teva contrasenya?</div>
            <button type="submit" class="btn"> Log In</button>
            <div class="login-register">
                <p> No tens compte? <a href="#" class="register-link"> Registrar-se </a></p>
            </div>
        </form>
    </div>
    <div class="formulari registre">
        <h1>Crea el teu perfil</h1>
        <form action="/index.php?accion=registre_usuari" method="post">
            <?php if (isset($error)) { ?>
                <div class="error-message" style="color: red;"><?php echo $error; ?></div>
            <?php } ?>

            <div class="dades">
                <input type="text" name="nom_complet" required pattern="[a-zA-Z\s]+$" title="Solo letras y espacios">
                <label>Nom complet</label>
            </div>
            <div class="dades">
                <input type="text" name="correu_electronic" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="formato: ejemplo@correo.algo">
                <label>Correu electrònic</label>
            </div>
            <div class="dades">
                <input type="password" name="password" required pattern="^[a-zA-Z0-9]+$" title="Solo letrasa y numeros">
                <label>Password</label>
            </div>
            <div class="dades">
                <input type="text" name="adreca" required maxlength="30">
                <label>Adreça</label>
            </div>
            <div class="dades">
                <input type="text" name="poblacio" required maxlength="30">
                <label>Població</label>
            </div>
            <div class="dades">
                <input type="text" name="codi_postal" maxlength="5" required pattern="\d{5}" title="Solo numeros">
                <label>Codi postal</label>
            </div>
            <button type="submit" class="btn"> Registrar-se </button>
            <div class="login-register">
                <p> Ja tens compte? <a href="#" class="login-link"> LogIn </a></p>
            </div>
        </form>
    </div>
</div>
