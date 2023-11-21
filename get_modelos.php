<?php
include 'db_connect.php';

// Obtém a marca e a categoria do POST
$marca = $_POST['marca'];
$categoria = $_POST['categoria'];

// Consulta para obter modelos com base na marca e categoria
$modelos_query = "SELECT Nome, Codigo_fipe FROM modelo WHERE Marca_Nome = '$marca' AND CATEGORIA_Nome = '$categoria'";
$modelos_result = $conn->query($modelos_query);

// Retorna os modelos como JSON
$modelos = array();
while ($row = $modelos_result->fetch_assoc()) {
    $modelos[] = $row;
}

echo json_encode($modelos);
?>