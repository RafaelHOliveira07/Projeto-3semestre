<?php

class Lixeira{

    public $idLixeira;
    public $idEmpresa;
    public $tipo;
    public $peso;
    public $volume;
    public $latitude;
    public $longitude;
    public $nome;



public function __construct($idLixeira = false)
{
    if($idLixeira ){
        $this->idLixeira  = $idLixeira ;
        $this->carregar();
    }
}

public function listar(){
    $sql = "SELECT tb_lixeiras.*, tb_empresas.nome AS nome_empresa 
            FROM tb_lixeiras 
            JOIN tb_empresas ON tb_lixeiras.idEmpresa = tb_empresas.idEmpresa";
    
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');

    // Execução da query e armazenamento do resultado em uma variável
    $resultado = $conexao->query($sql);
    // Recuperação da primeira linha do resultado como um array associativo
 
    $lista = $resultado->fetchAll();
    return $lista;
}
public function carregar(){

    // Query SQL para buscar uma turma no banco de dados pelo id
    $sql = "SELECT * FROM tb_lixeiras WHERE idLixeira=" . $this->idLixeira;
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');

    // Execução da query e armazenamento do resultado em uma variável
    $resultado = $conexao->query($sql);
    // Recuperação da primeira linha do resultado como um array associativo
    $linha = $resultado->fetch();

    // Atribuição dos valores dos campos da turma recuperados do banco às propriedades do objeto
    $this->tipo = $linha['tipo'];
    $this->peso = $linha['peso'];
    $this->volume = $linha['volume'];
    $this->latitude = $linha['latitude'];
    $this->longitude = $linha['longitude'];
    $this->nome = $linha['nome'];
    
    
}

public function obterPontosParaMapa(){
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

    return $pontos;
}
public function obterPontosLixeiraParaMapa() {
    // Verifique se o ID da empresa está definido na sessão
    if (isset($_SESSION['idEmpresa'])) {
        // Obtém o ID da empresa da sessão
        $idEmpresa = $_SESSION['idEmpresa'];

        // Consulta SQL ajustada para obter os pontos apenas para a empresa específica
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

            // Adicione cada ponto ao array de pontos
            $pontos[] = $ponto;
        }

        return $pontos;
    } else {
        // Se o ID da empresa não estiver definido na sessão, retorne algo adequado (você decide)
        return null;
    }
}

}
?>