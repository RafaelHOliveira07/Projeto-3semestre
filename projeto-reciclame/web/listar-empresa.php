<?php
    require_once "classes/Empresa.php";
    $empresa = new Empresa();
    $lista = $empresa->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas Cadastradas</title>
</head>
<body>
    <h1>Empresas Cadastradas</h1>

    <h3>Listar Alunos</h3>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>cnpj</th>
            <th>email</th>
            <th>cidade</th>
            <th>estado</th>
            <th>endereco</th>
            <th>numero</th>
            <th>tel</th>
            <th>cep</th>
        </tr>
        <?php foreach ($lista as $linha):?>
        <tr>
            <td><?php echo $linha['idEmpresa']?></td>
            <td><?php echo $linha['nome']?></td>
            <td><?php echo $linha['cnpj']?></td>
            <td><?php echo $linha['email']?>
            <td><?php echo $linha['cidade']?></td>
            <td><?php echo $linha['estado']?></td>
            <td><?php echo $linha['endereco']?></td>
            <td><?php echo $linha['numero']?></td>
            <td><?php echo $linha['tel']?></td>
            <td><?php echo $linha['cep']?></td>
            <td>
                <a href="#">Atualizar</a>
                <a href="#">Excluir</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>


</body>
</html>
