<?php
include 'db_connect.php';

if (isset($_GET['nome'])) {
    $marca_nome = $_GET['nome'];

    // Execute a lógica de exclusão no banco de dados
    $sql = "DELETE FROM marca WHERE nome = '$marca_nome'";
    $conn->query($sql);

    // Redirecione para a página principal ou faça qualquer outra coisa necessária
    header("Location: admin.php");
    exit();
}
?>