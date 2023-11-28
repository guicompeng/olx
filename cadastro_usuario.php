<?php
include 'db_connect.php';

// Inicializa variáveis para os valores padrão
$cpf = "";
$primeiro_nome = "";
$email = "";
$telefone = "";
$sobrenome = "";
$data_nascimento = "";

// Verifica se o parâmetro 'codigo' está presente na URL
if (isset($_GET['cpf'])) {
    $query_cpf = $_GET['cpf'];
    
    $consulta_usuario = "SELECT * FROM usuario WHERE cpf = $query_cpf";
    $resultado = $conn->query($consulta_usuario);
    if ($resultado->num_rows > 0) {
        $user = $resultado->fetch_assoc();
        $cpf = $user['cpf'];
        $primeiro_nome = $user['primeiro_nome'];
        $email = $user['email'];
        $telefone = $user['telefone'];
        $sobrenome = $user['sobrenome'];
        $data_nascimento = $user['data_nascimento'];
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($_GET['cpf']) ? 'Editar' : 'Cadastrar'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
    <h2 class="pt-3"><?php echo isset($_GET['cpf']) ? 'Editar Usuário' : 'Cadastrar Usuário'; ?></h2>

    <form action="<?php echo isset($_GET['cpf']) ? 'processar_edicao_usuario.php' : 'processar_cadastro_usuario.php'; ?>" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $user['cpf']; ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="primeiro_nome">Nome</label>
                <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome" value="<?php echo $user['primeiro_nome']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?php echo $user['sobrenome']; ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $user['telefone']; ?>">
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de nascimento</label>
            <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo $user['data_nascimento']; ?>">
        </div>

        <input type="hidden" name="codigo" value="<?php echo $query_cpf; ?>">

        <button type="submit" class="btn btn-primary"><?php echo isset($_GET['cpf']) ? 'Atualizar' : 'Salvar'; ?></button>

    </form>
</div>

</body>
</html>