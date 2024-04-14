<script>
var listaDeLixeiras = <?php echo $listaJson; ?>;
console.log("Lista de Lixeiras:", listaDeLixeiras);

var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");

socket.onmessage = function (event) {
    var dadosRecebidos = JSON.parse(event.data);
    console.log("Dados Recebidos:", dadosRecebidos);

    // Verifica se os dados recebidos contêm informações válidas
    if (dadosRecebidos.idLixeira && dadosRecebidos.data && dadosRecebidos.data.length > 0) {
        var idLixeira = dadosRecebidos.idLixeira;
        var dadosLixeira = dadosRecebidos.data[0];
        var volumeAtual = dadosLixeira[0];
        var pesoAtual = dadosLixeira[1];

        console.log("ID da Lixeira:", idLixeira);
        console.log("Volume Atual:", volumeAtual);
        console.log("Peso Atual:", pesoAtual);

        // Encontre a lixeira correspondente na listaDeLixeiras
        var lixeiraEncontrada = listaDeLixeiras.find(function (lixeira) {
            return lixeira.idLixeira == idLixeira;
        });

        if (lixeiraEncontrada) {
            console.log("Informações da Lixeira encontrada:", lixeiraEncontrada);

            // Verifica se o navegador suporta a API de Notificações
            if ('Notification' in window) {
                // Solicita permissão para exibir notificações
                Notification.requestPermission().then(function (permission) {
                    if (permission === 'granted') {
                        // Cria uma nova notificação com as informações da lixeira e os dados recebidos
                        var notificacao = new Notification('Lixeira cheia:', {
                            body: 'Volume atual: ' + volumeAtual + ' Lts\n' +
                                  'Peso atual: ' + pesoAtual + ' Kgs\n' +
                                  'ID: ' + lixeiraEncontrada.idLixeira + '\n' +
                                  'Tipo: ' + lixeiraEncontrada.tipo + '\n' +
                                  'Localização: ' + lixeiraEncontrada.nome,
                        });
                    }
                });
            } else {
                console.log('Este navegador não suporta a API de Notificações.');
            }
        } else {
            console.log("Lixeira com ID " + idLixeira + " não encontrada na lista.");
        }
    } else {
        console.log("Dados recebidos inválidos.");
    }
};
</script>