
<?php
$email = $_POST["email"];
$senhaLimpa = $_POST["senha"];
$senha = hash("sha256", $senhaLimpa);

$sql = "SELECT * FROM tb_empresas WHERE
        email = :user and senha = :passwd";
        
/* SLQ modificado apra evitar logim com a ( 'or'a'='a ) garantindo mais segurança, tratando como parametros e não valores */

$conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');
$resultado = $conexao->prepare($sql);
$resultado ->bindParam(':user', $email);
$resultado ->bindParam(':passwd', $senha);
$resultado ->execute();



$linha = $resultado->fetch();
$empresa_logado = $linha['email'];

if ($empresa_logado == null) {
	// Usuário ou senha inválida
	echo "erro ao fazer login";
} 
else {
	session_start();
	$_SESSION['empresa_logado'] = $empresa_logado;
	header('Location: index.php');
}
?>