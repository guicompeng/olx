<?php
include 'db_connect.php';

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    $sql = "SELECT * FROM anuncio WHERE codigo = $codigo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $anuncio = $result->fetch_assoc();

        // Obter fotos do anúncio
        $sql_fotos = "SELECT * FROM foto WHERE anuncio_codigo = $codigo";
        $result_fotos = $conn->query($sql_fotos);

        if ($result_fotos->num_rows > 0) {
            $fotos = $result_fotos->fetch_all(MYSQLI_ASSOC);
        }
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

<?php include 'navbar.php'; ?>

<div class="container">
    <h2>Detalhes do Anúncio</h2>

    <?php if (isset($fotos) && count($fotos) > 0) : ?>
        <div id="carouselExample" class="carousel slide" data-ride="carousel" style="max-width: 50%;">
            <div class="carousel-inner">
                <?php foreach ($fotos as $index => $foto) : ?>
                    <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                        <img src="img/<?php echo $foto['url']; ?>" class="d-block w-100" style="height: auto;" alt="Foto <?php echo $index + 1; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    <?php endif; ?>

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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>