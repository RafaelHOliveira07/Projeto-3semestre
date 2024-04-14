<?php

require_once 'empresa-verifica.php';
$idEmpresa = $_SESSION['idEmpresa'];

require_once "../classes/Lixeira.php";
$lixeira = new Lixeira();
$lista = $lixeira->listarlogado($idEmpresa);

$listaJson = json_encode($lista);
require_once '../javascript/web.php'


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Progress Bar</title>
<style>
    .progress-container {
        margin-bottom: 20px;
    }

    .progress-wrapper {
        width: 160px;
        height: 180px; /* Ajuste conforme necessário */
        position: relative;
        
    }

    .progress {
        width: 100%;
        height: 100%;
        background-color: #dddddda8;
        text-shadow: 2px 2px 2px black;
        position: absolute;
        top: 0;
        left: 0;
        clip-path: polygon(0% 0%, 100% 0%, 80% 100%, 20% 100%);
        z-index: 1;
        
    }

    .progress-fill {
        width: 100%;
        height: var(--progress-value, 0%);
        background-color: #4CAF50;
        position: absolute;
        bottom: 0;
        left: 0;
        z-index:0;
        margin-top: -180px; /* Ajuste conforme necessário */
        
    }
    .percentage {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        color: white;
    }

    input[type="number"] {
        width: 100px;
        font-size: 16px;
        padding: 5px;
        margin-top: 10px;
    }
</style>
</head>


<body>

<div class="progress-container">
    <div class="progress-wrapper">
        <div class="progress">
            <div class="progress-fill" id="progressFill"></div>
        </div>
        <div class="percentage" id="percentage">0%</div>
    </div>
</div>

<script>
    // Função para atualizar o preenchimento da barra de progresso e a porcentagem
    function updateProgress(volume, limiteMaximoVolume) {
        var progressFill = document.getElementById("progressFill");
        var percentage = (volume / limiteMaximoVolume) * 100;
        progressFill.style.height = percentage + "%";
        document.getElementById("percentage").textContent = Math.round(percentage) + "%";
    }

    // Iniciar o WebSocket e receber dados
    // Este trecho de código pode ser colocado em um arquivo JavaScript separado e incluído aqui usando a tag <script>
    var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");

    socket.onmessage = function (event) {
        var dadosRecebidos = JSON.parse(event.data);
        
        // Verifica se os dados recebidos são um array
        if (Array.isArray(dadosRecebidos) && dadosRecebidos.length > 0) {
            // Extrai os dados do primeiro elemento do array
            var primeiroElemento = dadosRecebidos[0];
            var data = primeiroElemento.data;
            
            // Verifica se há dados válidos
            if (Array.isArray(data) && data.length > 0) {
                // Assumindo que o primeiro elemento do array "data" contém o volume e o limite
                var volumeAtual = data[0][0]; // Primeiro elemento do primeiro array em data
                var limiteMaximoVolume = data[0][2]; // Terceiro elemento do primeiro array em data
                updateProgress(volumeAtual, limiteMaximoVolume);
            } else {
                console.log("Dados recebidos inválidos: array de dados vazio.");
            }
        } else {
            console.log("Dados recebidos inválidos: array de dados vazio ou não encontrado.");
        }
    };
</script>


</body>
</html>