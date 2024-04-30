<?php
// Inclua o arquivo da classe Lixeira
require_once '../classes/lixeira.php';

// Verifique se o ID do ponto de coleta foi enviado via POST
if(isset($_POST['idPontoColeta'])) {
    // Instancie a classe Lixeira
    $lixeira = new Lixeira();

    // Obtenha as informações do ponto de coleta com base no ID
    $informacoesPontoColeta = $lixeira->obterInformacoesPontoColeta($_POST['idPontoColeta']);

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
}
?>
