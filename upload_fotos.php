<?php
include 'db_connect.php';

// Altere o CPF para o valor desejado
$cpfUsuario = '111';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o upload da foto
    $anuncioCodigo = $_POST['anuncio_codigo'];

    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['foto']['name']);

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
        // Insira no banco de dados
        $sql = "INSERT INTO foto (anuncio_codigo, url, ordem) VALUES ('$anuncioCodigo', '$uploadFile', 1)";
        $conn->query($sql);
    } else {
        echo "Erro ao fazer o upload do arquivo.";
    }
}

// Consulta novamente para obter as fotos atualizadas
$sql = "SELECT *, f.Url as primeira_foto FROM anuncio LEFT JOIN foto f ON anuncio.codigo = f.anuncio_codigo WHERE (f.ordem = 1 OR f.ordem IS NULL) AND anuncio.USUARIO_Cpf = '$cpfUsuario'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Upload de fotos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <style>
        /* Adicionando estilo de contraste aos cards */
        .card {
            background-color: #fff; /* Cor de fundo branca */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.); /* Adiciona uma sombra leve */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark">
    <a class="navbar-brand text-white" href="#">OLX Seminovos</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbar-dark bg-dark" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-secondary ml-2" href="index.php">Ver anuncios</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary ml-2" href="meus_anuncios.php">Meus anúncios</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h5 class='mt-3'>Upload de fotos</h5>

    <!-- Formulário de Upload de Fotos -->
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="anuncio_codigo" value="<?php echo $anuncioCodigo; ?>">
        <input type="file" name="foto" class="form-control-file mt-2" required>
        <button type="submit" class="btn btn-success mt-2">Enviar Foto</button>
    </form>

    <!-- Fotos existentes -->
    <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="card mt-3" style="width: 18rem;">
            <img src="<?php echo $row['primeira_foto']; ?>" class="card-img-top" alt="Foto do Anúncio">
            <div class="card-body">
                <p class="card-text">Descrição do anúncio: <?php echo $row['descricao']; ?></p>
            </div>
        </div>
    <?php endwhile; ?>
    
    <!-- Botão para Finalizar -->
    <a href="meus_anuncios.php" class="btn btn-primary mt-3">Finalizar</a>
</div>

</body>
</html>
