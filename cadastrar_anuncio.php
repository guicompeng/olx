<?php
include 'db_connect.php';

// Consulta para obter categorias do banco de dados
$categorias_query = "SELECT Nome FROM categoria";
$categorias_result = $conn->query($categorias_query);

// Consulta para obter marcas do banco de dados
$marcas_query = "SELECT Nome FROM marca";
$marcas_result = $conn->query($marcas_query);

// Inicializa variáveis para os valores padrão
$anuncio_codigo = "";
$anuncio_categoria = "";
$anuncio_marca = "";
$anuncio_modelo = "";
$anuncio_placa = "";
$anuncio_estado = "";
$anuncio_cidade = "";
$anuncio_km = "";
$anuncio_titulo = "";
$anuncio_ano_fab = "";
$anuncio_ano_modelo = "";
$anuncio_preco = "";

// Verifica se o parâmetro 'codigo' está presente na URL
if (isset($_GET['codigo'])) {
    // Se sim, obtém o código do anúncio
    $anuncio_codigo = $_GET['codigo'];
    
    // Consulta para obter os dados do anúncio com base no código
    $consulta_anuncio = "SELECT *, c.nome as categoria, mar.nome as marca FROM anuncio a join modelo m on a.modelo_codigo_fipe = m.codigo_fipe join categoria c on m.categoria_nome = c.nome join marca mar on m.marca_nome = mar.nome WHERE a.codigo = $anuncio_codigo";
    $resultado_anuncio = $conn->query($consulta_anuncio);
    // Se o anúncio existe, preenche as variáveis com os valores do anúncio
    if ($resultado_anuncio->num_rows > 0) {
        $anuncio = $resultado_anuncio->fetch_assoc();

        $anuncio_categoria = $anuncio['categoria'];
        $anuncio_marca = $anuncio['marca'];
        $anuncio_modelo = $anuncio['modelo_codigo_fipe'];
        $anuncio_placa = $anuncio['placa'];
        $anuncio_estado = $anuncio['localizacao_estado'];
        $anuncio_cidade = $anuncio['localizacao_cidade'];
        $anuncio_km = $anuncio['km'];
        $anuncio_titulo = $anuncio['titulo'];
        $anuncio_ano_fab = $anuncio['ano_fab'];
        $anuncio_ano_modelo = $anuncio['ano_modelo'];
        $anuncio_preco = $anuncio['preco'];
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($_GET['codigo']) ? 'Editar Anúncio' : 'Cadastrar Anúncio'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
    <script>
        $(document).ready(function() {
            // Quando a marca ou a categoria são alteradas
            $("#marca, #categoria").change(function() {
                // Obtemos os valores selecionados
                var marca = $("#marca").val();
                var categoria = $("#categoria").val();

                // Se ambos estiverem definidos, fazemos a requisição AJAX
                if (marca && categoria) {
                    // Desabilita o campo enquanto a requisição está em andamento
                    $("#modelo").prop("disabled", true);

                    // Faz a requisição AJAX
                    $.ajax({
                        url: "get_modelos.php", // Substitua pelo caminho do arquivo PHP que obtém os modelos
                        type: "POST",
                        data: { marca: marca, categoria: categoria },
                        dataType: "json",
                        success: function(data) {
                            // Limpa o dropdown de modelos
                            $("#modelo").empty();

                            // Adiciona as opções obtidas da requisição
                            $("#modelo").append("<option value=''></option>");
                         
                            $.each(data, function(index, value) {
                                $("#modelo").append("<option value='" + value.Codigo_fipe + "'>" + value.Nome + "</option>");
                            });

                            // Habilita o campo após a atualização
                            $("#modelo").prop("disabled", false);
                        },
                        error: function() {
                            // Em caso de erro, habilita o campo
                            $("#modelo").prop("disabled", false);
                        }
                    });
                } else {
                    // Se algum valor não estiver definido, limpa o dropdown e desabilita o campo
                    $("#modelo").empty().prop("disabled", true);
                }
            });

            $("#localizacao_estado").change(function() {
                // Obtém o valor do estado selecionado
                var estado = $("#localizacao_estado").val();

                // Se o estado estiver definido, faz a requisição AJAX
                if (estado) {
                    // Desabilita o campo de cidade enquanto a requisição está em andamento
                    $("#localizacao_cidade").prop("disabled", true);

                    // Faz a requisição AJAX
                    $.ajax({
                        url: "get_cidades.php", // Substitua pelo caminho do arquivo PHP que obtém as cidades
                        type: "POST",
                        data: { estado: estado },
                        dataType: "json",
                        success: function(data) {
                            // Limpa o dropdown de cidades
                            $("#localizacao_cidade").empty();

                            // Adiciona as opções obtidas da requisição
                            $("#localizacao_cidade").append("<option value=''></option>");

                            $.each(data, function(index, value) {
                                $("#localizacao_cidade").append("<option value='" + value.Cidade + "'>" + value.Cidade + "</option>");
                            });

                            // Habilita o campo de cidade após a atualização
                            $("#localizacao_cidade").prop("disabled", false);
                        },
                        error: function() {
                            // Em caso de erro, habilita o campo de cidade
                            $("#localizacao_cidade").prop("disabled", false);
                        }
                    });
                } else {
                    // Se o estado não estiver definido, limpa o dropdown de cidade e desabilita o campo
                    $("#localizacao_cidade").empty().prop("disabled", true);
                }
            });
        });
    </script>

<body>


<?php

// Consulta para obter categorias do banco de dados
$categorias_query = "SELECT Nome FROM categoria";
$categorias_result = $conn->query($categorias_query);

// Consulta para obter marcas do banco de dados
$marcas_query = "SELECT Nome FROM marca";
$marcas_result = $conn->query($marcas_query);

?>

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
    <h2 class="pt-3"><?php echo isset($_GET['codigo']) ? 'Editar Anúncio' : 'Cadastrar Anúncio'; ?></h2>

    <form action="<?php echo isset($_GET['codigo']) ? 'processar_edicao.php' : 'processar_cadastro.php'; ?>" method="post">

        <div class="row">
            <!-- Categoria -->
            <div class="form-group col-md-6">
                <label for="categoria">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria">
                    <option value=''></option>
                    <?php
                    while ($categoria = $categorias_result->fetch_assoc()) {
                        $selected = ($categoria['Nome'] == $anuncio_categoria) ? 'selected' : '';
                        echo "<option value='{$categoria['Nome']}' $selected>{$categoria['Nome']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Marca -->
            <div class="form-group col-md-6">
                <label for="marca">Marca:</label>
                <select class="form-control" id="marca" name="marca">
                    <option value=''></option>
                    <?php
                    while ($marca = $marcas_result->fetch_assoc()) {
                        $selected = ($marca['Nome'] == $anuncio_marca) ? 'selected' : '';
                        echo "<option value='{$marca['Nome']}' $selected>{$marca['Nome']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Modelo -->
            <div class="form-group col-md-6">
                <label for="modelo">Modelo:</label>
                <select class="form-control" id="modelo" name="modelo">
                    <option value="" selected></option>
                    <?php
                    // Certifique-se de que $anuncio_modelo é o valor correto do modelo do anúncio
                    echo "<option value='{$anuncio_modelo}' selected>{$anuncio_modelo}</option>";
                    ?>
                </select>
            </div>

            <!-- Placa -->
            <div class="form-group col-md-6">
                <label for="placa">Placa:</label>
                <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $anuncio['placa']; ?>">
            </div>
        </div>

        <div class="row">
            <!-- Localização - Estado -->
            <div class="form-group col-md-6">
                <label for="localizacao_estado">Estado:</label>
                <select class="form-control" id="localizacao_estado" name="localizacao_estado">
                    <option value=''></option>
                    <?php
                    // Modificado para buscar os estados da tabela Localizacao
                    $estados_query = "SELECT DISTINCT Estado FROM localizacao";
                    $estados_result = $conn->query($estados_query);
                    while ($estado = $estados_result->fetch_assoc()) {
                        $selected = ($estado['Estado'] == $anuncio_estado) ? 'selected' : '';
                        echo "<option value='{$estado['Estado']}' $selected>{$estado['Estado']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Localização - Cidade -->
            <div class="form-group col-md-6">
                <label for="localizacao_cidade">Cidade:</label>
                <select class="form-control" id="localizacao_cidade" name="localizacao_cidade">
                    <option value="" selected>Selecione um estado primeiro</option>
                    <?php
                    // Certifique-se de que $anuncio_cidade é o valor correto da cidade do anúncio
                    echo "<option value='{$anuncio_cidade}' selected>{$anuncio_cidade}</option>";
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- KM -->
            <div class="form-group col-md-6">
                <label for="km">KM:</label>
                <input type="text" class="form-control" id="km" name="km" value="<?php echo $anuncio['km']; ?>">

            </div>

            <!-- Título -->
            <div class="form-group col-md-6">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $anuncio['titulo']; ?>">
            </div>
        </div>

        <div class="row">
            <!-- Ano de Fabricação -->
            <div class="form-group col-md-6">
                <label for="ano_fab">Ano de Fabricação:</label>
                <input type="text" class="form-control" id="ano_fab" name="ano_fab" value="<?php echo $anuncio['ano_fab']; ?>">
            </div>

            <!-- Ano do Modelo -->
            <div class="form-group col-md-6">
                <label for="ano_modelo">Ano do Modelo:</label>
                <input type="text" class="form-control" id="ano_modelo" name="ano_modelo" value="<?php echo $anuncio['ano_modelo']; ?>">
            </div>
        </div>

        <!-- Preço -->
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="text" class="form-control" id="preco" name="preco" value="<?php echo $anuncio['preco']; ?>">
        </div>

        <input type="hidden" name="codigo" value="<?php echo $anuncio_codigo; ?>">

        <button type="submit" class="btn btn-primary"><?php echo isset($_GET['codigo']) ? 'Atualizar' : 'Salvar'; ?></button>

    </form>
</div>

</body>
</html>