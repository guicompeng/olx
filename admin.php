<?php
include 'db_connect.php';

// utilizamos o left join aqui
$sql = "SELECT * FROM usuario";
$result = $conn->query($sql);

$sql = "SELECT * FROM localizacao";
$localizacoes = $conn->query($sql);

$sql = "SELECT * FROM marca";
$marca = $conn->query($sql);

$sql = "SELECT * FROM marca";
$marca = $conn->query($sql);

$sql = "SELECT * FROM modelo";
$modelos = $conn->query($sql);

$sql = "SELECT * FROM categoria";
$categorias = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Lista de Usuários</title>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <div>
        <h2>Lista de Usuários</h2>
        
        <!-- Botão para cadastrar usuário -->
        <a href="cadastro_usuario.php" class="btn btn-primary mb-3">Cadastrar Usuário</a>

        <table class="table">
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Primeiro nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Data de cadastro</th>
                    <th>Data de nascimento</th>
                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Exibir os usuários na tabela
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['cpf']}</td>
                                <td>{$row['primeiro_nome']}</td>
                                <td>{$row['sobrenome']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['telefone']}</td>
                                <td>{$row['data_cadastro']}</td>
                                <td>{$row['data_nascimento']}</td>
                                <td class='text-right'>
                                    <a href='cadastro_usuario.php?cpf={$row['cpf']}' class='btn btn-info btn-sm'>Editar</a>
                                    <a href='remover.php?id={$row['id']}' class='btn btn-danger btn-sm'>Remover</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Nenhum usuário encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <h2>Lista de Localização</h2>
        
        <a href="cadastro_localizacao.php" class="btn btn-primary mb-3">Cadastrar Localizacao</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($localizacoes->num_rows > 0) {
                    while ($row = $localizacoes->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['estado']}</td>
                                <td>{$row['cidade']}</td>
                                <td class='text-right'>
                                    <a href='editar.php?id={$row['id']}' class='btn btn-info btn-sm'>Editar</a>
                                    <a href='remover.php?id={$row['id']}' class='btn btn-danger btn-sm'>Remover</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum usuário encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


  
    <div>
        <h2>Lista de Marcas</h2>
        
        <a href="cadastro_marca.php" class="btn btn-primary mb-3">Cadastrar Marca</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($marca->num_rows > 0) {
                    while ($row = $marca->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nome']}</td>
                                <td class='text-right'>
                                    <a href='editar.php?id={$row['id']}' class='btn btn-info btn-sm'>Editar</a>
                                    <a href='remover.php?id={$row['id']}' class='btn btn-danger btn-sm'>Remover</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhuma marca encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


      
    <div>
        <h2>Lista de Modelos</h2>
        
        <a href="cadastro_modelo.php" class="btn btn-primary mb-3">Cadastrar Modelo</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Codigo_fipe</th>
                    <th>Nome</th>
                    <th>Marca nome</th>
                    <th>Categoria</th>

                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($modelos->num_rows > 0) {
                    while ($row = $modelos->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['codigo_fipe']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$row['marca_nome']}</td>
                                <td>{$row['categoria_nome']}</td>

                                <td class='text-right'>
                                    <a href='editar.php?id={$row['id']}' class='btn btn-info btn-sm'>Editar</a>
                                    <a href='remover.php?id={$row['id']}' class='btn btn-danger btn-sm'>Remover</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhuma marca encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <h2>Lista de Categorias</h2>
        
        <a href="cadastro_categoria.php" class="btn btn-primary mb-3">Cadastrar Categorias</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>

                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($categorias->num_rows > 0) {
                    while ($row = $categorias->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nome']}</td>

                                <td class='text-right'>
                                    <a href='editar.php?id={$row['id']}' class='btn btn-info btn-sm'>Editar</a>
                                    <a href='remover.php?id={$row['id']}' class='btn btn-danger btn-sm'>Remover</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhuma marca encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>