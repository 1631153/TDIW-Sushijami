<?php
function connectaBD() {
$host = "127.0.0.1";
$dbname = "tdiw-m7";
$user = "tdiw-m7";
$password = "asnfd1nM";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if(!$conn) {
die("Error en la conexión a la base de datos: " . pg_last_error());
}

return $conn;
}
?>