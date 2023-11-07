<?php
require_once '../classes/Lixeira.php';
$lixeira = new Lixeira();
$pontos = $lixeira->obterPontosParaMapa();
$pontos_json = json_encode($pontos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Seus meta tags e links de estilo aqui -->

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('mapa'), {
                center: { lat: -22.4363, lng: -46.8222 },
                zoom: 12
            });

            // Recupera os pontos do PHP como um array JSON e adiciona marcadores no mapa
            var pontos = <?php echo $pontos_json; ?>;

            pontos.forEach(function(ponto) {
                var marker = new google.maps.Marker({
                    position: { lat: parseFloat(ponto.latitude), lng: parseFloat(ponto.longitude) },
                    map: map,
                    title: 'LixeiraReciclame '
                });
            });
        }
    </script>
    <!-- Carregue a API do Google Maps com um retorno de chamada -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnw1VEDXoPg6E4-Fk3SUkIPpOcIx5Y-nk&callback=initMap" async defer></script>

    <!-- Seus outros scripts e links de estilo aqui -->
</head>
<body>
    <div id="mapa" style="height: 400px; width: 100%;"></div>
</body>
</html>