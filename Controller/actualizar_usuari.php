<?php
session_start();
include_once __DIR__ . "/../Model/registre_usuari.php";
if (isset($_POST["submit"]) && !empty($_FILES['image'])) {
    $fileName = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if(!in_array($imageExtension, $validImageExtension)){
        header('Location: /../cuenta.php');
    }else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        $filesAbsolutePath = '/home/TDIW/tdiw-m7/public_html/img/fitxers/';

        move_uploaded_file($tmpName, $filesAbsolutePath . $newImageName);
        $id = $_SESSION['ID'];
        $conn = connectaBD();
        $query = "UPDATE users SET img_path = $1 WHERE id=$2";
        $result = pg_query_params($conn, $query, array($newImageName, $id));
        header('Location: /../cuenta.php');
    }
}elseif(isset($_POST["canvis"])){
    actualizar_usuario($_SESSION['ID'],$_SESSION['contraseña']);
}
?>