<?php
include_once __DIR__ . "/../Model/gets.php";

$categorias = getCategories();

include __DIR__ . "/../View/llistat_categories.php";
?>

