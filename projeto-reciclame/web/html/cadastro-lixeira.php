


<?php

   require_once 'empresa-verifica.php';
   $idEmpresa = $_SESSION['idEmpresa'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Cadstro Lixeira</title>
</head>
<body>
<main class=" container-fluid">
     <h4>Cadastro de Ponstos de coleta persolizado:</h4>
     <p>Aqui voce escolhe o local onde serao seus pontos de coleta, basta adicionar o endereço e selecionar as opções de tamanho que temos disponiveis(peso,volume e tipo).
     

     </p>   
     <p>OBS:No caso do endeço ser privado, sera necessario autorização do proprietario para que possa ser realizada a instalacao de um novo ponto de coleta:</p>

     <h5>Exemplo:</h5>
     <p>Desejo instalar meu ponto em certo supermercado, então serei responsalvel por consguir a autorização do estabelecimento para a coleta.</p>



    <form action="gravar-lixeira.php" method="POST">
        
  
    <input type="hidden" name="idEmpresa" value="<?php echo $idEmpresa; ?>">

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="tipo">Tipo material</label>
                <select name="tipo" class="form-control" required>
                    <option selected>Escolher...</option>
                    <option value="Plastico">Plastico</option>
                    <option value="Papel">Papel</option>
                    <option value="Vidro">Vidro</option>
                    <option value="Metal">Metal</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="localizacao">Localização</label>
                <input type="text" class="form-control" name="localizacao" placeholder=" Rua , Bairro , Cidade, País" required>
                
            </div>
          
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="peso">Capacidade de peso</label>
                <select name="peso" class="form-control" required>
                    <option selected>Escolher...</option>
                    <option value="50">50 Kilos</option>
                    <option value="60">60 Kilos</option>
                    <option value="80">80 Kilos</option>
                    <option value="100">100 Kilos</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="volume">Volume</label>
                <select name="volume" class="form-control" required>
                    <option selected>Escolher...</option>
                    <option value="50">50 Litros</option>
                    <option value="100">100 Litros</option>
                    <option value="200">200 Litros</option>
                    <option value="400">400 Litros</option>
                </select>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Gravar</button>
    </form>
</main>

</body>
</html>