<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $estado = $_POST['estado'];

    // Consulta para obter as cidades do estado selecionado
    $cidades_query = "SELECT Cidade FROM localizacao WHERE Estado = '{$estado}'";
    $cidades_result = $conn->query($cidades_query);

    $cidades = array();

    while ($cidade = $cidades_result->fetch_assoc()) {
        $cidades[] = $cidade;
    }

    // Retorna as cidades como JSON
    header('Content-Type: application/json');
    echo json_encode($cidades);
} else {
    // Retorna um erro se a requisição não for POST
    http_response_code(400);
    echo json_encode(array('error' => 'Bad Request'));
}
?>