<?php
include 'db_connect.php';

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    $sql = "SELECT * FROM anuncio WHERE codigo = $codigo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $anuncio = $result->fetch_assoc();
    } else {
        echo "Anúncio não encontrado";
        exit();
    }
} else {
    echo "Código do anúncio não fornecido";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Anúncio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Detalhes do Anúncio</h2>

    <dl class="row">
        <dt class="col-sm-3">Código:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['codigo']; ?></dd>

        <dt class="col-sm-3">Título:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['titulo']; ?></dd>

        <dt class="col-sm-3">Placa:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['placa']; ?></dd>

        <dt class="col-sm-3">KM:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['km']; ?></dd>

        <dt class="col-sm-3">Ano Fab.:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['ano_fab']; ?></dd>

        <dt class="col-sm-3">Ano Mod.:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['ano_modelo']; ?></dd>
    </dl>
</div>

</body>
</html>