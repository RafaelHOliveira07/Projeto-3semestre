<?php
// Verifica se a solicitação é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conecte-se ao seu banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reciclame";

    // Crie uma conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Recupere os dados do formulário e limpe-os
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $localizacao = mysqli_real_escape_string($conn, $_POST['localizacao']);
    $peso = floatval($_POST['peso']);
    $volume = floatval($_POST['volume']);

    // Consulta SQL para inserir os dados na tabela usando declaração preparada
    $sql = "INSERT INTO tb_lixeiras (tipo, localizacao, peso, volume) VALUES (?, ?, ?, ?)";

    // Preparar a declaração SQL
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Vincular os parâmetros e executar a consulta
    $stmt->bind_param("ssdd", $tipo, $localizacao, $peso, $volume);

    if ($stmt->execute() === true) {
        echo "<h4>Dados inseridos com sucesso!</h4>";
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    // Feche a declaração e a conexão
    $stmt->close();
    $conn->close();
} else {
    echo "Método de solicitação inválido. Use o método POST para enviar o formulário.";
}
?>
