<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['cpf'];
    $primeiro_nome = $_POST['primeiro_nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = $_POST['data_nascimento'];
    
    // Inserir no banco de dados
    $sql = "INSERT INTO usuario (cpf, primeiro_nome, email, telefone, sobrenome, data_nascimento, senha, data_cadastro)
            VALUES ('$cpf', '$primeiro_nome', '$email', '$telefone', '$sobrenome', '$data_nascimento', '123456', NOW())";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php?cadastro_sucesso=true");
        exit();
    } else {
        echo "Erro ao cadastrar o anúncio: " . $conn->error;
    }
} else {
    echo "Método inválido para processar o formulário.";
}

$conn->close();
?>