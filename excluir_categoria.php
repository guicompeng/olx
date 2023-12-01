<?php
include 'db_connect.php';

if (isset($_GET['nome'])) {
    $categoria_nome = $_GET['nome'];

    // Execute a lógica de exclusão no banco de dados
    $sql = "DELETE FROM categoria WHERE nome = '$categoria_nome'";
    $conn->query($sql);

    // Redirecione para a página principal ou faça qualquer outra coisa necessária
    header("Location: admin.php");
    exit();
}
?>