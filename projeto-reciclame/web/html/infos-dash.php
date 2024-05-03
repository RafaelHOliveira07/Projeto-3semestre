<?php
// Verifique se o JSON foi enviado via POST
if(isset($_POST['jsonData']) && isset($_POST['idPontoColeta'])) {
    $jsonData = $_POST['jsonData'];
    $idPontoColeta = $_POST['idPontoColeta'];


    // Converta o JSON em um array associativo
    $listaDeLixeiras = json_decode($jsonData, true);

    // Verifique se o ID do ponto de coleta foi enviado via POST
    if(isset($_POST['idPontoColeta'])) {
        // Obtenha o ID do ponto de coleta enviado via POST
        $idPontoColeta = $_POST['idPontoColeta'];

        // Procurar as informações do ponto de coleta com base no ID
        $informacoesPontoColeta = null;
        foreach ($listaDeLixeiras as $lixeira) {
            if ($lixeira['idLixeira'] == $idPontoColeta) {
                $informacoesPontoColeta = $lixeira;
                break;
            }
        }

        // Exiba as informações em formato de lista
        if(!empty($informacoesPontoColeta)) {
            echo '<ul>';
            echo '<li><h4>Informações</h4></li>';
            echo '<li><span>Tipo: ' . $informacoesPontoColeta['tipo'] . '</span></li>';
            echo '<li><span>Local/Localização: ' . $informacoesPontoColeta['nome'] . '</span></li>';
            echo '<li><span>Vol MAX: ' . $informacoesPontoColeta['volume'] . '</span></li>';
            echo '<li><span>Pes MAX: ' . $informacoesPontoColeta['peso'] . '</span></li>';
            echo '</ul>';
        } else {
            echo 'Nenhuma informação encontrada para este ponto de coleta.';
        }
    } else {
        echo 'ID do ponto de coleta não enviado.';
    }
} else {
    echo 'JSON de lixeiras não recebido.';
}
?>
