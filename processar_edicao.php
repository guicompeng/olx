<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
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
    
    // Atualizar no banco de dados
    $sql = "UPDATE anuncio 
            SET MODELO_Codigo_fipe = '$modelo', 
                placa = '$placa', 
                localizacao_estado = '$localizacao_estado', 
                localizacao_cidade = '$localizacao_cidade', 
                km = '$km', 
                titulo = '$titulo', 
                ano_fab = '$ano_fab', 
                ano_modelo = '$ano_modelo', 
                preco = '$preco' 
            WHERE codigo = '$codigo'";

    if ($conn->query($sql) === TRUE) {
        header("Location: meus_anuncios.php?edicao_sucesso=true");
        exit();
    } else {
        echo "Erro ao editar o anúncio: " . $conn->error;
    }
} else {
    echo "Método inválido para processar o formulário.";
}

$conn->close();
?>