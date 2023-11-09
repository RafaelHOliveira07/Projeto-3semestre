<?php
session_start();
if ('usuario_logado' == null) {
    // Usuário ou senha inválida
    echo "Erro ao fazer login. Credenciais inválidas.";
} else {

    if(!isset($_SESSION['usuario_logado'])){
      
        header('Location: usuario-nao-logado-.php');
    }
}
?>