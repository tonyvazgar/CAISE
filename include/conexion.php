<?php

$host = "localhost";
$user = "root";
$passwor = "";
$db = "CAISE";
$con = mysqli_connect($host, $user, $passwor);
mysqli_set_charset($con, 'utf8');
mysqli_select_db($con, $db) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
if (!$con) {
    echo "No se pudo establecer conexión con la BDD";
}
?>