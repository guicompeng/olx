<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria = $_POST['categoria'];
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
    $sql = "INSERT INTO anuncio (usuario_cpf, MODELO_Codigo_fipe, placa, localizacao_estado, localizacao_cidade, km, titulo, ano_fab, ano_modelo, preco, status)
            VALUES ('111', '$modelo', '$placa', '$localizacao_estado', '$localizacao_cidade', '$km', '$titulo', '$ano_fab', '$ano_modelo', '$preco', 'Disponivel')";

    if ($conn->query($sql) === TRUE) {
        header("Location: meus_anuncios.php?cadastro_sucesso=true");
        exit();
    } else {
        echo "Erro ao cadastrar o anúncio: " . $conn->error;
    }
} else {
    echo "Método inválido para processar o formulário.";
}

$conn->close();
?>