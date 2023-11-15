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
        public function obterPontoEmpresaParaMapa() {
            // Verifique se o ID da empresa está definido na sessão
            if (isset($_SESSION['idEmpresa'])) {
                // Obtém o ID da empresa da sessão
                $idEmpresa = $_SESSION['idEmpresa'];
        
                // Consulta SQL ajustada para obter os pontos apenas para a empresa específica
                $sql = "SELECT latitude, longitude, nome FROM tb_empresas WHERE idEmpresa = $idEmpresa";
        
                $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');
                $resultado = $conexao->query($sql);
        
                $ponto = [];
        
                foreach ($resultado as $linha) {
                    $ponto = [
                        'latitude' => $linha['latitude'],
                        'longitude' => $linha['longitude'],
                        'nome' => $linha['nome'],
                    ];
                }
        
                return $ponto;
            } else {
                // Se o ID da empresa não estiver definido na sessão, retorne algo adequado (você decide)
                return null;
            }
        }
        
        
        
        
        
}




