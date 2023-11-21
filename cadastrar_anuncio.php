<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Anúncio</title>
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
        });
    </script>

<body>


<?php
include 'db_connect.php';

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
    <h2 class="pt-3">Cadastrar Anúncio</h2>

    <form action="processar_cadastro.php" method="post">

        <div class="row">
            <!-- Categoria -->
            <div class="form-group col-md-6">
                <label for="categoria">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria">
                    <option value=''></option>
                    <?php
                    while ($categoria = $categorias_result->fetch_assoc()) {
                        echo "<option value='{$categoria['Nome']}'>{$categoria['Nome']}</option>";
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
                        echo "<option value='{$marca['Nome']}'>{$marca['Nome']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Modelo -->
            <div class="form-group col-md-6">
                <label for="modelo">Modelo:</label>
                <select class="form-control" id="modelo" name="modelo" disabled>
                    <option value="" selected>Selecione um modelo</option>
                </select>
            </div>

            <!-- Placa -->
            <div class="form-group col-md-6">
                <label for="placa">Placa:</label>
                <input type="text" class="form-control" id="placa" name="placa">
            </div>
        </div>

        <div class="row">
            <!-- Localização - Estado -->
            <div class="form-group col-md-6">
                <label for="localizacao_estado">Estado:</label>
                <input type="text" class="form-control" id="localizacao_estado" name="localizacao_estado">
            </div>

            <!-- Localização - Cidade -->
            <div class="form-group col-md-6">
                <label for="localizacao_cidade">Cidade:</label>
                <input type="text" class="form-control" id="localizacao_cidade" name="localizacao_cidade">
            </div>
        </div>

        <div class="row">
            <!-- KM -->
            <div class="form-group col-md-6">
                <label for="km">KM:</label>
                <input type="text" class="form-control" id="km" name="km">
            </div>

            <!-- Título -->
            <div class="form-group col-md-6">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
        </div>

        <div class="row">
            <!-- Ano de Fabricação -->
            <div class="form-group col-md-6">
                <label for="ano_fab">Ano de Fabricação:</label>
                <input type="text" class="form-control" id="ano_fab" name="ano_fab">
            </div>

            <!-- Ano do Modelo -->
            <div class="form-group col-md-6">
                <label for="ano_modelo">Ano do Modelo:</label>
                <input type="text" class="form-control" id="ano_modelo" name="ano_modelo">
            </div>
        </div>

        <!-- Preço -->
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="text" class="form-control" id="preco" name="preco">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

</body>
</html>