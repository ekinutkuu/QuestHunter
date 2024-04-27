<?php

$servername = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "questhunter_test";

$connection = new mysqli($servername, $dbuser, $dbpass, $dbname);

if ($connection->connect_error){
    die("Connection Error: " . $connection->connect_error);
}

?>