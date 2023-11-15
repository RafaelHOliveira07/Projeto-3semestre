<?php

class Empresa{

    public $idEmpresa;
    public $nome;
    public $cnpj;
    public $email;
    public $senha;
    public $cidade;
    public $estado;
    public $endereco;
    public $numero;
    public $tel;
    public $cep;
    public $cep;



public function __construct($idEmpresa = false)
{
    if($idEmpresa){
        $this->idEmpresa = $idEmpresa;
        $this->carregar();
    }
}

public function listar(){
    $sql = "SELECT * FROM tb_empresas";
    include_once "conexao.php";
    $resultado = $conexao->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
}
public function carregar(){

            // Query SQL para buscar uma turma no banco de dados pelo id
            $sql = "SELECT * FROM tb_empresas WHERE idEmpresa=" . $this->idEmpresa;
            $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');

            // Execução da query e armazenamento do resultado em uma variável
            $resultado = $conexao->query($sql);
            // Recuperação da primeira linha do resultado como um array associativo
            $linha = $resultado->fetch();

            // Atribuição dos valores dos campos da turma recuperados do banco às propriedades do objeto
            $this->nome = $linha['nome'];
            $this->cnpj = $linha ['cnpj'];
            $this->email = $linha ['email'];
            $this->senha = $linha ['senha'];
            $this->cidade = $linha ['cidade'];
            $this->estado = $linha ['estado'];
            $this->endereco = $linha ['endereco'];
            $this->cnpj = $linha ['cnpj'];
            $this->numero = $linha ['numero'];
            $this->tel = $linha ['tel'];
            $this->cep = $linha ['cep'];

        }
        public function obterPontosParaMapa(){
            $sql = "SELECT * FROM tb_empresas";
            $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');
            $resultado = $conexao->query($sql);
            $pontos = [];
        
            foreach ($resultado as $linha) {
                $ponto = [
                    'latitude' => $linha['latitude'],
                    'longitude' => $linha['longitude'],
                    'nome' => $linha['nome'],
           
                
                   
                ];
                $pontos[] = $ponto;
            }
        
            return $pontos;
        }
}




