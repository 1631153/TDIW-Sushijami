<?php
session_start();
include_once __DIR__."/../Model/gets.php";
include_once __DIR__."/../Model/connectaDB.php";

if (isset($_POST['EMAIL']) && isset($_POST['CONTRA'])) {
    function Validar($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $email = Validar($_POST['EMAIL']);
    $password = Validar($_POST['CONTRA']);
    login($email, $password);
}
?>
