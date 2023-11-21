<?php
// Lógica para verificar se a lixeira atingiu o volume máximo (substitua por sua lógica real)
$volumeMaximoAtingido = true;

if ($volumeMaximoAtingido) {
    // Se o volume máximo foi atingido, envie uma notificação
    $notificacao = [
        'mensagem' => 'A lixeira está pronta para coleta!',
        'localizacao' => 'Coordenadas da lixeira',
        'link_maps' => 'Link para o Google Maps com coordenadas',
    ];

    // Salve a notificação em um arquivo JSON (ou no banco de dados)
    $notificacoes = json_decode(file_get_contents('notificacoes.json'), true) ?? [];
    $notificacoes[] = $notificacao;
    file_put_contents('notificacoes.json', json_encode($notificacoes));

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'empty']);
}
?>
