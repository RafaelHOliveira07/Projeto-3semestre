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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style-listEmpre.css">
    <title>Empresas Cadastradas</title>
    
</head>
<body>
    <h1>Empresas Cadastradas</h1>

    <h3>Listar Alunos</h3>
    <section class="table-sec">
    <table class="table table-bordered " >
    <thead class="thead-dark">

            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">cnpj</th>
            <th scope="col">email</th>
            <th scope="col">cidade</th>
            <th scope="col">estado</th>
            <th scope="col">endereco</th>
            <th scope="col">numero</th>
            <th scope="col">tel</th>
            <th scope="col">cep</th>
            <th scope="col">açôes</th>
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
            <td class="act">
                <a href="#">Atualizar</a>
                <a href="#">Excluir</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</section>

</body>
</html>
