<script>
var listaDeLixeiras = <?php echo $listaJson; ?>;
console.log("Lista de Lixeiras:", listaDeLixeiras);

var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");

socket.onmessage = function (event) {
    var dadosRecebidos = JSON.parse(event.data);

    if (dadosRecebidos.idLixeira) {
        console.log("Id da Lixeira recebido:", dadosRecebidos.idLixeira);

        // Encontre a lixeira correspondente na listaDeLixeiras
        var lixeiraEncontrada = listaDeLixeiras.find(function (lixeira) {
            return lixeira.idLixeira == dadosRecebidos.idLixeira;
        });

        if (lixeiraEncontrada) {
            console.log("Informações da Lixeira encontrada:", lixeiraEncontrada);

            // Verifica se o navegador suporta a API de Notificações
            if ('Notification' in window) {
                // Solicita permissão para exibir notificações
                Notification.requestPermission().then(function (permission) {
                    if (permission === 'granted') {
                        // Cria uma nova notificação com as informações da lixeira
                        var notificacao = new Notification('Ponto de coleta 01:', {
                            body: 'volume máximo atingido, realize a coleta'+ '\n' +
                                    'ID: ' + lixeiraEncontrada.idLixeira + '\n' +
                                  'Tipo: ' + lixeiraEncontrada.tipo + '\n' +
                                  'localizaçâo: ' + lixeiraEncontrada.nome + '\n' ,
                        });
                    }
                });
            } else {
                console.log('Este navegador não suporta a API de Notificações.');
            }
        }
    }
};

    </script>