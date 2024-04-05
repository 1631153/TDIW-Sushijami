<?php
include_once __DIR__."/Model/gets.php";
$filesPublicPath = 'img/';
actualizar_valores();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUSHIJAMI</title>
    <link rel="stylesheet" href="css/perfil.css"/>
</head>
<body>
    <form action="/index.php?accion=actualizar_usuari" method="post" enctype="multipart/form-data">
    <div class="container estilo crecimiento contenedor">
        <h1 class="negrita py-3 mb-4">
            Perfil
        </h1>
        <div class="carrito desbordament">
            <div class="row sin-gutters bordeado borde-fila">
                <div class="col-md-9">
                    <div class="contenido">
                        <div class="panel ocultar active show" id="account-general">
                            <label for="image"></label>
                            <div class="cuerpo_carrito media alinear">
                                <?php if (!empty($_SESSION["img_path"])): ?>
                                    <img src="img/fitxers/<?php echo $_SESSION["img_path"]; ?>" width="100" title="<?php echo $_SESSION['img_path']; ?>">
                                <?php else: ?>
                                    <img src="https://cdn5.dibujos.net/dibujos/pintados/201336/chino-comiendo-arroz-culturas-china-pintado-por-kuskuruska-9844833.jpg" width="100">
                                <?php endif; ?>
                                <div class="media-body media-4">
                                    <div class="flexbox alinear">
                                        <label for="image" class="btn btn-primario">
                                            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
                                        </label>
                                        <button type="submit" name="submit" class="apujar">Apujar Foto</button>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="cuerpo_carrito" style="margin-right: 20px;">
                                <div class="grupo">
                                    <label class="etiqueta">Nom</label>
                                    <?php $nombreUsuario = $_SESSION['nombre'];?>
                                    <input type="text" name="nou-nom" class="controlar" value="<?php echo $nombreUsuario ?>">
                                </div>
                                <div class="grupo">
                                    <label class="etiqueta">Correu electronic</label>
                                    <?php $correo = $_SESSION['correo'];?>
                                    <input type="text" name="nou-correu" class="controlar mb-1" value="<?php echo $correo ?>">
                                </div>
                            </div>
                        </div>
                        <div class="panel ocultar" id="account-change-password">
                            <div class="cuerpo_carrito pb-2" style="margin-right: 20px;">
                                <div class="grupo">
                                    <label class="etiqueta">Contrasenya actual</label>
                                    <input type="password" name="contra-actual" class="controlar">
                                </div>
                                <div class="grupo">
                                    <label class="etiqueta">Nova contrasenya</label>
                                    <input type="password" name="nova-contra" class="controlar">
                                </div>
                                <div class="grupo">
                                    <label class="etiqueta">Repetir nova contrasenya</label>
                                    <input type="password" name="nova-contra2" class="controlar">
                                </div>
                            </div>
                        </div>
                        <div class="panel ocultar" id="account-info" style="margin-right: 20px;">
                            <div class="cuerpo_carrito pb-2">
                                <div class="grupo">
                                    <label class="etiqueta">Adreça</label>
                                    <?php $adreca = $_SESSION['adreca'];?>
                                    <input type="text" name="nova-adreca" class="controlar" value="<?php echo $adreca ?>">
                                </div>
                            </div>
                            <div class="cuerpo_carrito pb-2">
                                <div class="grupo">
                                    <label class="etiqueta">Codi_postal</label>
                                    <?php $codi_postal = $_SESSION['codi_postal'];?>
                                    <input type="text" name="nova-codi" class="controlar" value="<?php echo $codi_postal ?>">
                                </div>
                                <div class="grupo">
                                    <label class="etiqueta">Poblacio</label>
                                    <?php $poblacio = $_SESSION['poblacio'];?>
                                    <input type="text" name="nova-poblacio" class="controlar" value="<?php echo $poblacio ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" name="canvis" class="btn btn-primary">Guardar canvis</button>&nbsp;
            <button type="button" class="btn btn-default" onclick="window.location.href='index.php';">Cancelar</button>
        </div>
    </div>
    </form>
    <script src="js/jquery-3.7.1.min.js"></script>
</body>
</html>