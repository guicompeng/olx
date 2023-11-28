<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['cpf'];
    $primeiro_nome = $_POST['primeiro_nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = $_POST['data_nascimento'];
    
    // Atualizar no banco de dados
    $sql = "UPDATE usuario 
            SET cpf = '$cpf', 
            primeiro_nome = '$primeiro_nome', 
            email = '$email', 
            telefone = '$telefone', 
            sobrenome = '$sobrenome', 
            data_nascimento = '$data_nascimento'
            WHERE cpf = '$cpf'";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php?edicao_sucesso=true");
        exit();
    } else {
        echo "Erro ao editar o usuario: " . $conn->error;
    }
} else {
    echo "Método inválido para processar o formulário.";
}

$conn->close();
?>