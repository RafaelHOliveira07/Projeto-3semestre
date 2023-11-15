<!-- Seu HTML e outros scripts aqui -->

<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('mapa'), {
            center: { lat: -22.4363, lng: -46.8222 },
            zoom: 15
        });

        // Recupera os pontos do PHP como um array JSON e adiciona marcadores no mapa
        var pontos = <?php echo $pontos_json; ?>;

        pontos.forEach(function (ponto) {
            var marker = new google.maps.Marker({
                position: { lat: parseFloat(ponto.latitude), lng: parseFloat(ponto.longitude) },
                map: map,
                title: 'Localização: ' + ponto.nome +
                    ' Capacidade: (Volume: ' + ponto.volume + ' - Peso: ' + ponto.peso + ')' +
                    ' Tipo: ' + ponto.tipo,
                icon: {
                    url: '../img/bin.png',
                    scaledSize: new google.maps.Size(40, 40),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(20, 40)
                }
            });
        });

        // Adiciona marcador para a empresa
        var pontoEmpresa = <?php echo json_encode($empresa->obterPontoEmpresaParaMapa()); ?>;
        adicionarMarcadorEmpresa(map, pontoEmpresa);
    }

    function adicionarMarcadorEmpresa(map, pontoEmpresa) {
        // Verifica se há informações sobre a empresa
        if (pontoEmpresa.latitude && pontoEmpresa.longitude && pontoEmpresa.nome) {
            // Adiciona o marcador da empresa ao mapa
            var markerEmpresa = new google.maps.Marker({
                position: { lat: parseFloat(pontoEmpresa.latitude), lng: parseFloat(pontoEmpresa.longitude) },
                map: map,
                title: 'Localização da Empresa: ' + pontoEmpresa.nome,
                icon: {
                    url: '../img/construcao.png',
                    scaledSize: new google.maps.Size(40, 40),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(20, 40)
                }
            });

            // Adiciona um ouvinte de evento se desejar fazer algo ao clicar no marcador da empresa
            markerEmpresa.addListener('click', function () {
                // Seu código ao clicar no marcador da empresa...
            });
        }
    }
</script>
<!-- Inclua o script da API do Google Maps aqui -->

<!-- Outro HTML e scripts aqui -->
