<?php
$servername = "localhost";
$username = "root";
$password = "";
$basename = "baza";

$dbc = mysqli_connect($servername, $username, $password, $basename) or die('Greška prilikom povezivanja na MySQL server.'.mysqli_error($dbc));
mysqli_set_charset($dbc, "utf8");


?>
