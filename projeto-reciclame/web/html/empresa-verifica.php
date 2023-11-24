
<?php
session_start();

// Verifique se $_SESSION['idEmpresa'] está definida
if (isset($_SESSION['idEmpresa'])) {
    $idEmpresa = $_SESSION['idEmpresa'];

    // Restante do seu código...
} else {
    // Lide com a situação em que idEmpresa não está definido na sessão
    echo "ID da empresa não está definido na sessão.";
}
