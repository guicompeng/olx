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
    <title>Meus Anúncios</title>
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


<nav class="navbar navbar-expand-lg bg-primary">
    <a class="navbar-brand text-dark" href="#">OLX Seminovos</a>

    <!-- Botão de menu (mostra ou oculta o menu em telas pequenas) -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Formulário de Pesquisa -->
    <div class="collapse navbar-collapse navbar-primary bg-primary" id="navbarNav">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="btn btn-secondary ml-2" href="index.php">Ver anuncios</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <?php
    // Verificar se há um parâmetro na URL indicando sucesso
    if (isset($_GET['cadastro_sucesso']) && $_GET['cadastro_sucesso'] == 'true') {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Anúncio cadastrado com sucesso!
                <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    }
    if (isset($_GET['exclusao_sucesso']) && $_GET['exclusao_sucesso'] == 'true') {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Anúncio excluído com sucesso!
                <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    }
    echo "<h5 class='mt-3'>Meus anúncios</h5>";

    ?>


    <div class="row mt-4">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $foto = $row['primeira_foto'] ? $row['primeira_foto'] : 'sem-foto.jpg';
                echo "<div class='col-md-4 mb-4'>
                        <div class='card bg-light'>
                            <img src='img/{$foto}' class='card-img-top' alt='Imagem do Carro'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$row['titulo']}</h5>
                                <p class='card-text'>
                                    <strong>Placa:</strong> {$row['placa']}<br>
                                    <strong>KM:</strong> {$row['km']}<br>
                                    <strong>Ano Fab.:</strong> {$row['ano_fab']}<br>
                                    <strong>Ano Mod.:</strong> {$row['ano_modelo']}
                                </p>
                                <a href='visualizar_anuncio.php?codigo={$row['codigo']}' class='btn btn-primary'>Visualizar</a>
                                <a href='cadastrar_anuncio.php?codigo={$row['codigo']}' class='btn btn-warning'>Editar</a>
                                <a href='excluir_anuncio.php?codigo={$row['codigo']}' class='btn btn-danger'>Excluir</a>
                            </div>
                        </div>
                      </div>";
            }
        } else {
            echo "<p>Nenhum anúncio encontrado para o usuário com CPF $cpfUsuario</p>";
        }
        ?>
    </div>
</div>

</body>
</html>