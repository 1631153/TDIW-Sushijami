<?php

$accio = $_GET['accion'] ?? NULL;

switch ($accio) {
    case 'registre_usuari':
        include __DIR__ . '/Controller/registre_usuari.php';
        break;
    case 'actualizar_usuari':
        include __DIR__ . '/Controller/actualizar_usuari.php';
        break;
    case 'llistar_categories':
        include __DIR__ . '/Controller/categories.php';
        break;
    case 'login':
        include __DIR__ . '/Controller/login_usuari.php';
        break;
    case 'fin_compra':
        include __DIR__ . '/Controller/compra_finalizada.php';
        break;
    default:
        include __DIR__ . '/main.php';
        break;
}
?>