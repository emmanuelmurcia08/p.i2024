<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aeropuerto";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
