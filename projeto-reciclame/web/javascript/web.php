<script>
    var listaDeLixeiras = <?php echo $listaJson; ?>;
    console.log("Lista de Lixeiras:", listaDeLixeiras);

    var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");

    socket.onmessage = function (event) {
        var dadosRecebidos = JSON.parse(event.data);
        console.log("Dados Recebidos:", dadosRecebidos);

        // Verifica se o ID da lixeira recebida está na lista de lixeiras
        var idLixeiraRecebido = dadosRecebidos.idLixeira.toString(); // Convertendo para string
        var lixeiraEncontrada = listaDeLixeiras.find(function (lixeira) {
            return lixeira.idLixeira.toString() === idLixeiraRecebido;
        });

        if (lixeiraEncontrada) {
            console.log("Lixeira encontrada na lista:", lixeiraEncontrada);

            // Verifica se o navegador suporta a API de Notificações
            if ('Notification' in window) {
                // Solicita permissão para exibir notificações
                Notification.requestPermission().then(function (permission) {
                    if (permission === 'granted') {
                        // Cria uma nova notificação com as informações da lixeira
                        var notificacao = new Notification('Lixeira encontrada:', {
                            body: 'ID: ' + lixeiraEncontrada.idLixeira + '\n' +
                                'Tipo: ' + lixeiraEncontrada.tipo + '\n' +
                                'Volume: ' + lixeiraEncontrada.volume + ' L\n' +
                                'Peso: ' + lixeiraEncontrada.peso + ' Kg\n' +
                                'Localização: ' + lixeiraEncontrada.nome,
                        });
                    } else {
                        console.log('Permissão para exibir notificações não concedida.');
                    }
                }).catch(function (error) {
                    console.log('Erro ao solicitar permissão para exibir notificações:', error);
                });
            } else {
                console.log('Este navegador não suporta a API de Notificações.');
            }
        } else {
            console.log("Lixeira com ID " + idLixeiraRecebido + " não encontrada na lista.");
        }
    };
    
</script>
