<?php
$servername = "localhost";
$username = "store";
$password = "store";
$dbname = "olx";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o MySQL: " . $conn->connect_error);
}

// Consulta SQL para obter dados da tabela "carro"
$sql = "SELECT * FROM anuncio";
$result = $conn->query($sql);

echo "<h2>Dados da tabela Carro:</h2>";
echo "<ul>";

if ($result->num_rows > 0) {
    // Exibir os dados da tabela
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["campo1"] . " - " . $row["campo2"] . " - " . $row["campo3"] . "</li>";
    }
} else {
    echo "Nenhum resultado encontrado na tabela Carro";
}

echo "</ul>";

// Fechar a conexão
$conn->close();
?>