
  
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
        } 
    };
