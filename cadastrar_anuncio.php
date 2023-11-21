<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Anúncio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
    <h2 class="pt-3">Cadastrar Anúncio</h2>

    <form action="processar_cadastro.php" method="post">

        <div class="row">
            <!-- Categoria -->
            <div class="form-group col-md-6">
                <label for="categoria">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria">
                    <option value="hatch">Hatch</option>
                    <option value="sedan">Sedan</option>
                </select>
            </div>

            <!-- Marca -->
            <div class="form-group col-md-6">
                <label for="marca">Marca:</label>
                <select class="form-control" id="marca" name="marca">
                    <option value="fiat">Fiat</option>
                    <option value="ford">Ford</option>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Modelo -->
            <div class="form-group col-md-6">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo">
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