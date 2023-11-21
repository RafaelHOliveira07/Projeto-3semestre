<h1>Notificações</h1>
    <ul id="lista-notificacoes"></ul>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Função para buscar notificações
            function buscarNotificacoes() {
                $.ajax({
                    url: 'buscar_notificacoes.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (notificacoes) {
                        exibirNotificacoes(notificacoes);
                    },
                    error: function () {
                        console.error('Erro ao buscar notificações.');
                    }
                });
            }

            // Função para exibir notificações na página
            function exibirNotificacoes(notificacoes) {
                var listaNotificacoes = $('#lista-notificacoes');
                listaNotificacoes.empty();

                if (notificacoes.length > 0) {
                    notificacoes.forEach(function (notificacao) {
                        var itemLista = $('<li></li>').text(notificacao.mensagem);
                        var linkMaps = $('<a></a>').attr('href', notificacao.link_maps).text('Abrir no Google Maps');
                        itemLista.append('<br>Localização: ' + notificacao.localizacao);
                        itemLista.append('<br>');
                        itemLista.append(linkMaps);
                        listaNotificacoes.append(itemLista);
                    });
                } else {
                    listaNotificacoes.append('<li>Nenhuma notificação disponível.</li>');
                }
            }

            // Atualizar notificações a cada 10 segundos (ajuste conforme necessário)
            setInterval(buscarNotificacoes, 10000);

            // Chamar a função pela primeira vez
            buscarNotificacoes();
        });
    </script>