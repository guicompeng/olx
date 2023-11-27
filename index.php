<?php
include 'db_connect.php';

// utilizamos o left join aqui
$sql = "SELECT *, f.Url as primeira_foto FROM anuncio LEFT JOIN foto f ON anuncio.codigo = f.anuncio_codigo WHERE f.ordem = 1 OR f.ordem is NULL";
$result = $conn->query($sql);

$sqlTotalAnuncios = "SELECT sum(Codigo) as totalAnuncios FROM anuncio WHERE `Status` = 'Disponivel'";
$resultTotalAnuncios = $conn->query($sqlTotalAnuncios);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Anúncios</title>
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


<?php include 'navbar.php'; ?>

<div class="container">
    <?php
    $total = $resultTotalAnuncios->fetch_assoc()['totalAnuncios'];
    echo "<h5 class='mt-3'>Exibindo o total de $total anúncios</h5>";
    ?>
    <div class="row mt-4" >
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
                            </div>
                        </div>
                      </div>";
            }
        } else {
            echo "<p>Nenhum anúncio encontrado</p>";
        }
        ?>
    </div>
</div>

</body>
</html>