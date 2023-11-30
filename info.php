<?php
include 'db_connect.php';

// Altere o CPF para o valor desejado
$cpfUsuario = '111';

// Utilizamos o left join aqui
$sql = "SELECT *, f.Url as primeira_foto FROM anuncio LEFT JOIN foto f ON anuncio.codigo = f.anuncio_codigo WHERE (f.ordem = 1 OR f.ordem IS NULL) AND anuncio.USUARIO_Cpf = '$cpfUsuario'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Informações</title>
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

    <!-- Botão de menu (mostra ou oculta o menu em telas pequenas) -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Formulário de Pesquisa -->
    <div class="collapse navbar-collapse navbar-dark bg-dark" id="navbarNav">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="btn btn-secondary ml-2" href="index.php">Ver anuncios</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container">

    <h5 class='mt-3'>Informações</h5>
    <!-- TODO: faça os cards de informações aqui -->
</div>

</body>
</html>