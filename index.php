<?php
include 'db_connect.php';

$sql = "SELECT * FROM anuncio";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Anúncios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Listagem de Anúncios</h2>

    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4 mb-4'>
                        <div class='card'>
                            <img src='imagem_do_carro.jpg' class='card-img-top' alt='Imagem do Carro'>
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
