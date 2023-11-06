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


    // Recupere e limpe os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha');
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT);
    $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);

    $senha = hash('sha256', $senha);

    // Consulta SQL para inserir os dados na tabela usando declaração preparada
    $sql = "INSERT INTO tb_empresas (nome, cnpj, email, senha, cidade, estado, endereco, numero, tel, cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar a declaração SQL
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Vincular os parâmetros e executar a consulta
    $stmt->bind_param("sssssssiss", $nome, $cnpj, $email, $senha, $cidade, $estado, $endereco, $numero, $tel, $cep);

    if ($stmt->execute() === true) {
        echo "<h4>cadastro realizado com sucesso inseridos com sucesso!</h4>";
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
