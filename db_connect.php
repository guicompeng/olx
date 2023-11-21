<?php
$servername = "localhost";
$username = "store";
$password = "store";
$dbname = "olx";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>