<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $localizacao_estado = $_POST['localizacao_estado'];
    $localizacao_cidade = $_POST['localizacao_cidade'];
    $km = $_POST['km'];
    $titulo = $_POST['titulo'];
    $ano_fab = $_POST['ano_fab'];
    $ano_modelo = $_POST['ano_modelo'];
    $preco = $_POST['preco'];

    // Inserir no banco de dados
    $sql = "INSERT INTO anuncio (categoria, marca, modelo, placa, localizacao_estado, localizacao_cidade, km, titulo, ano_fab, ano_modelo, preco)
            VALUES ('$categoria', '$marca', '$modelo', '$placa', '$localizacao_estado', '$localizacao_cidade', '$km', '$titulo', '$ano_fab', '$ano_modelo', '$preco')";

    if ($conn->query($sql) === TRUE) {
        echo "Anúncio cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o anúncio: " . $conn->error;
    }
} else {
    echo "Método inválido para processar o formulário.";
}

$conn->close();
?>