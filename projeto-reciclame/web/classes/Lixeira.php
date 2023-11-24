<?php

class Lixeira
{
    public $idLixeira;
    public $idEmpresa;
    public $tipo;
    public $peso;
    public $volume;
    public $latitude;
    public $longitude;
    public $nome;
    public $volumeAtual = 50; // Definindo um valor padrão para evitar erros de variável indefinida
    public $volumeMaximo ='volume';
    

    public function __construct($idLixeira = false)
    {
        if ($idLixeira) {
            $this->idLixeira  = $idLixeira;
            $this->carregar();
        }
    }

    public function listar()
    {
        $sql = "SELECT tb_lixeiras.*, tb_empresas.nome AS nome_empresa 
                FROM tb_lixeiras 
                JOIN tb_empresas ON tb_lixeiras.idEmpresa = tb_empresas.idEmpresa";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');

        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }
  

    public function carregar()
    {
        $sql = "SELECT * FROM tb_lixeiras WHERE idLixeira=" . $this->idLixeira;
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');

        $resultado = $conexao->query($sql);
        $linha = $resultado->fetch();

        $this->tipo = $linha['tipo'];
        $this->peso = $linha['peso'];
        $this->volume = $linha['volume'];
        $this->latitude = $linha['latitude'];
        $this->longitude = $linha['longitude'];
        $this->nome = $linha['nome'];
        
    }

    public function obterPontosParaMapa()
    {
        $sql = "SELECT * FROM tb_lixeiras";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');
        $resultado = $conexao->query($sql);
        $pontos = [];

        foreach ($resultado as $linha) {
            $ponto = [
                'latitude' => $linha['latitude'],
                'longitude' => $linha['longitude'],
                'tipo' => $linha['tipo'],
                'peso' => $linha['peso'],
                'volume' => $linha['volume'],
                'nome' => $linha['nome']
            ];
            $pontos[] = $ponto;
        }

        // Adicione a cor associada a cada tipo de lixeira
        $coresPorTipo = [
            'Plastico' => 'vermelho',
            'Papel' => 'azul',
            'Vidro' => 'verde',
            'Metal' => 'amarelo',
            // Adicione mais tipos e cores conforme necessário
        ];

        $pontosLixeiraComCores = [];

        foreach ($pontos as $ponto) {
            $tipo = $ponto['tipo'];
            $cor = isset($coresPorTipo[$tipo]) ? $coresPorTipo[$tipo] : 'padrao';

            $pontosLixeiraComCores[] = [
                'latitude' => $ponto['latitude'],
                'longitude' => $ponto['longitude'],
                'tipo' => $ponto['tipo'],
                'peso' => $ponto['peso'],
                'volume' => $ponto['volume'],
                'nome' => $ponto['nome'],
                'cor' => $cor,
            ];
        }

        $pontosLixeira_json = json_encode($pontosLixeiraComCores);
        
        // Você pode retornar ou imprimir o JSON aqui, dependendo do seu uso
        return $pontosLixeira_json;
        return $pontos; 
    } 

    
 
    public function obterPontosLixeiraParaMapa()
    {
        if (isset($_SESSION['idEmpresa'])) {
            $idEmpresa = $_SESSION['idEmpresa'];
            $sql = "SELECT * FROM tb_lixeiras WHERE idEmpresa = $idEmpresa";
            $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');
            $resultado = $conexao->query($sql);
            $pontos = [];

            foreach ($resultado as $linha) {
                $ponto = [
                    'latitude' => $linha['latitude'],
                    'longitude' => $linha['longitude'],
                    'tipo' => $linha['tipo'],
                    'peso' => $linha['peso'],
                    'volume' => $linha['volume'],
                    'nome' => $linha['nome']
                ];
                $pontos[] = $ponto;
            }

            // Adicione a cor associada a cada tipo de lixeira
            $coresPorTipo = [
                'Plastico' => 'vermelho',
                'Papel' => 'azul',
                'Vidro' => 'verde',
                'Metal' => 'amarelo',
                // Adicione mais tipos e cores conforme necessário
            ];

            $pontosLixeiraComCores = [];

            foreach ($pontos as $ponto) {
                $tipo = $ponto['tipo'];
                $cor = isset($coresPorTipo[$tipo]) ? $coresPorTipo[$tipo] : 'padrao';

                $pontosLixeiraComCores[] = [
                    'latitude' => $ponto['latitude'],
                    'longitude' => $ponto['longitude'],
                    'tipo' => $ponto['tipo'],
                    'peso' => $ponto['peso'],
                    'volume' => $ponto['volume'],
                    'nome' => $ponto['nome'],
                    'cor' => $cor,
                ];
            }

            $pontosLixeira_json = json_encode($pontosLixeiraComCores);

            // Você pode retornar ou imprimir o JSON aqui, dependendo do seu uso
            return $pontosLixeira_json;
        } else {
            // Retorna null ou faz algo conforme necessário
            return null;
        }
    }

   // Função para verificar se a lixeira está cheia (substitua pela sua lógica)


   public function lixeiraCheia() {
    return $this->volumeAtual >= $this->volumeMaximo;
}

public function obterNotificacoes() {
    // Consulta SQL para obter os dados da lixeira (substitua pela sua consulta)
    $sql = "SELECT * FROM tb_lixeiras";
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');
    $resultado = $conexao->query($sql);

    // Verificar se há resultados
    if ($resultado->rowCount() > 0) {
        // Array para armazenar os objetos Lixeira
        $lixeiras = array();
        
        // Array para armazenar notificações
        $notificacoes = array();

        // Loop através dos resultados e criar objetos Lixeira
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $lixeira = new Lixeira(
                $row['idLixeira'],
                $row['idEmpresa'],
                $row['tipo'],
                $row['peso'],
                $row['volume'],
                $row['latitude'],
                $row['longitude'],
                $row['nome']
            );

            // Adicionar a lixeira ao array
            $lixeiras[] = $lixeira;

            // Verificar se o volume atual é igual ao volume gravado no banco
            if ($lixeira->volumeAtual == $lixeira->volumeMaximo) {
               
                $notificacao = "A lixeira {$lixeira->nome} está cheia!";
                echo  $notificacao;
                $notificacoes[] = $notificacao;
            }
        }

        // Se houver notificações, imprimir ou retornar o array de notificações em formato JSON
        if (!empty($notificacoes)) {
            $jsonDataNotificacoes = json_encode($notificacoes);
            echo $jsonDataNotificacoes;
        }

        // ... (seu código anterior)

        // Converter o array de lixeiras para JSON
        $jsonData = json_encode($lixeiras);

        // Configurar cabeçalhos para indicar que o conteúdo é JSON
        header('Content-Type: application/json');

        // Retornar o JSON
        echo $jsonData;
    }
}


  }
   ?>
   