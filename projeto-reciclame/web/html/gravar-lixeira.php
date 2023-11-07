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
        // Receber os dados do formulário
        $tipo = $_POST['tipo'];
        $localizacao = $_POST['localizacao'];
        $peso = $_POST['peso'];
        $volume = $_POST['volume'];
    
        // Sua chave de API do Google Maps
        $chaveAPI = 'AIzaSyCnw1VEDXoPg6E4-Fk3SUkIPpOcIx5Y-nk';
    
        // Prepara o endereço para a URL
        $enderecoFormatado = urlencode($localizacao);
    
        // Faz a requisição para a API de geocodificação do Google Maps
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$enderecoFormatado}&key={$chaveAPI}";
        $resposta = file_get_contents($url);
    
        // Decodifica a resposta JSON
        $dados = json_decode($resposta);
    
        // Verifica se a resposta da API é bem-sucedida
        if ($dados->status === 'OK') {
            // Obtém as coordenadas de latitude e longitude
            $latitude = $dados->results[0]->geometry->location->lat;
            $longitude = $dados->results[0]->geometry->location->lng;
    
            // Agora você pode usar $latitude e $longitude para gravar no banco de dados ou fazer o que precisar
            // Por exemplo, você pode usar uma conexão com banco de dados para inserir os dados
            $conn = new mysqli($servername, $username, $password, $dbname);

             $query = "INSERT INTO tb_lixeiras (tipo, latitude, longitude, peso, volume) VALUES ('$tipo', '$latitude', '$longitude', '$peso', '$volume')";
             $conn->query($query);
    
            // A mensagem abaixo é apenas para demonstração
            echo "Latitude: {$latitude}, Longitude: {$longitude} - Dados gravados com sucesso!";
        } else {
            echo "Não foi possível encontrar as coordenadas para o endereço fornecido.";
        }
    }
    ?>