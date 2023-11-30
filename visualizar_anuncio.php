<?php
include 'db_connect.php';


if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    $sql = "SELECT *, CONCAT(u.primeiro_nome, ' ', sobrenome) as primeiro_nome FROM anuncio a join usuario u ON a.usuario_cpf = u.cpf WHERE codigo = $codigo ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $anuncio = $result->fetch_assoc();

        // Obter fotos do anúncio
        $sql_fotos = "SELECT * FROM foto WHERE anuncio_codigo = $codigo";
        $result_fotos = $conn->query($sql_fotos);

        if ($result_fotos->num_rows > 0) {
            $fotos = $result_fotos->fetch_all(MYSQLI_ASSOC);
        }

        // Obter mensagens do banco de dados
        $sqlMensagens = "SELECT * FROM mensagem WHERE anuncio_codigo = $codigo AND usuario_cpf = 111";
        $resultMensagens = $conn->query($sqlMensagens);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Processar o formulário quando o usuário enviar uma mensagem
            if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
                $novaMensagem = $_POST['mensagem'];
    
                // Inserir a nova mensagem no banco de dados
                $dataAtual = date("Y-m-d H:i:s");
                $inserirMensagem = "INSERT INTO mensagem (data_hora, anuncio_codigo, usuario_cpf, enviado_pelo_vendedor, texto) VALUES ('$dataAtual', '$codigo', '111', 0, '$novaMensagem')";
                if ($conn->query($inserirMensagem) === TRUE) {
                    // Atualizar a lista de mensagens após a inserção
                    $resultMensagens = $conn->query($sqlMensagens);
                } else {
                    echo "Erro ao enviar mensagem: " . $conn->error;
                }
            }
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
    <h2 class='mt-3'>Detalhes do Anúncio</h2>

    <?php if (isset($fotos) && count($fotos) > 0) : ?>
        <div class="row">
            <div class="col-md-6">
                <div id="carouselExample" class="carousel slide" data-ride="carousel" style="max-width: 100%;">
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
            </div>
            <div class="col-md-6">
                <div style="height: 230px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;">
                    <?php
                    if ($resultMensagens->num_rows > 0) {
                        while ($mensagem = $resultMensagens->fetch_assoc()) {
                            echo '<p>';
                            echo ($mensagem['enviado_pelo_vendedor'] ? 'Vendedor: ' : 'Comprador: ');
                            echo $mensagem['texto'];
                            echo '</p>';
                        }
                    } else {
                        echo '<p>Nenhuma mensagem ainda.</p>';
                    }
                    ?>
                </div>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="mensagem">Nova Mensagem:</label>
                        <textarea class="form-control" id="mensagem" name="mensagem" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="enviar_mensagem">Enviar Mensagem</button>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <dl class="row mt-3">
        <dt class="col-sm-3">Preço:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['preco']; ?></dd>

        <dt class="col-sm-3">Nome do vendedor:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['primeiro_nome']; ?></dd>

        <dt class="col-sm-3">Título:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['titulo']; ?></dd>

        <dt class="col-sm-3">Código:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['codigo']; ?></dd>

        <dt class="col-sm-3">Título:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['titulo']; ?></dd>

        <dt class="col-sm-3">Placa:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['placa']; ?></dd>

        <dt class="col-sm-3">KM:</dt>
        <dd class="col-sm-9"><?php echo $anuncio['km']; ?></dd>

        <dt class="col-sm-3">Ano Fab.</dt>
        <dd class="col-sm-9"><?php echo $anuncio['ano_fab']; ?></dd>

        <dt class="col-sm-3">Ano Mod.</dt>
        <dd class="col-sm-9"><?php echo $anuncio['ano_modelo']; ?></dd>

    </dl>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>