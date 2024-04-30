<><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script>
// Quando o documento estiver pronto
    $(document).ready(function() {
        // Quando o valor do select mudar
        $('#pontos_de_coleta').change(function () {
            // Obtém o valor selecionado
            var idPontoColeta = $(this).val();

            // Se o valor selecionado não for 0 (ou seja, não é a opção padrão)
            if (idPontoColeta !== '0') {
                // Envia uma solicitação AJAX para obter as informações do ponto de coleta
                $.ajax({
                    url: '../html/infos.php', // Substitua pelo caminho do seu arquivo PHP
                    type: 'POST',
                    data: { idPontoColeta: idPontoColeta },
                    success: function (response) {
                        // Atualiza o conteúdo da div com as informações recebidas
                        $('#informacoes_ponto').html(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                // Se a opção padrão for selecionada, limpa as informações
                $('#informacoes_ponto').html('');
            }
        })};
    );
</script></>