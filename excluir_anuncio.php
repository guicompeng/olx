<?php
include 'db_connect.php';

// Verifique se o parâmetro 'codigo' está presente na URL
if (isset($_GET['codigo'])) {
    $codigoAnuncio = $_GET['codigo'];

    // Excluir o anúncio do banco de dados
    $sqlExcluirAnuncio = "DELETE FROM anuncio WHERE Codigo = '$codigoAnuncio'";
    $resultExcluirAnuncio = $conn->query($sqlExcluirAnuncio);

    // Verificar se a exclusão foi bem-sucedida
    if ($resultExcluirAnuncio) {
        // Redirecionar de volta para a página de listagem de anúncios com um parâmetro indicando sucesso
        header("Location: meus_anuncios.php?exclusao_sucesso=true");
        exit();
    } else {
        // Se houver um erro na exclusão, você pode lidar com isso da maneira desejada
        echo "Erro ao excluir o anúncio: " . $conn->error;
        exit();
    }
} else {
    // Se o parâmetro 'codigo' não estiver presente na URL, redirecione para a página de listagem de anúncios
    header("Location: meus_anuncios.php");
    exit();
}
?>