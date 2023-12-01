<?php

require_once 'empresa-verifica.php';
$idEmpresa = $_SESSION['idEmpresa'];


require_once '../classes/lixeira.php';
$lixeira = new Lixeira();
$lista = $lixeira->listarlogado($idEmpresa);

$listaJson = json_encode($lista);
require_once '../javascript/web.php'
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

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../style/style.css">
  <link href="../style/stylemap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="../style/cadastro.css">
  <title>Pontos de Coleta</title>
</head>

<body>
  <header>
    <div class="h1-logo">
      <img src="../img/Free_Sample_By_Wix__3_-removebg-preview.png" alt="">
    </div>

    <nav class="navbar navbar-expand-lg main-nav px-0">




      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu"
        aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="burg" id="d1"></span>
        <span class="burg" id="d2"></span>
        <span class="burg" id="d3"></span>

      </button>
      <div class="collapse navbar-collapse" id="mainMenu">

        <ul class="navbar-nav ml-auto text-uppercase f1">
          <li>
            <a href="index-logado.php">Início</a>
          </li>
       
          <li>
            <a href="painel.php">Painel</a>
          </li>  
           <li>
            <a href="cadastro-lixeira.php">Novo ponta de Coleta</a>
        </li>
          <li>
            <a href="empresa-logout.php">Sair</a>
          </li>

        </ul>

      </div>

  </header>
  <main class=" container-fluid">

    <section class="info-cadas">
      <h4>Pontos de coleta persolizado:</h4>
      <p>Aqui voce escolhe o local onde serao seus pontos de coleta, basta adicionar o endereço e selecionar as opções
        de tamanho que temos disponiveis(peso,volume e tipo).


      </p>
      <p>OBS:No caso do endeço ser privado, sera necessario autorização do proprietario para que possa ser realizada a
        instalacao de um novo ponto de coleta:</p>

      <h5>Exemplo:</h5>
      <p>Desejo instalar meu ponto em certo supermercado, então serei responsalvel por consguir a autorização do
        estabelecimento para a coleta.</p>
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
            <input type="text" class="form-control" name="localizacao" placeholder=" Rua , Bairro , Cidade, País"
              required>

          </div>

        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="peso">Peso.Max</label>
            <select name="peso" class="form-control" required>
              <option selected>Escolher...</option>
              <option value="50">50 Kilos</option>
              <option value="60">60 Kilos</option>
              <option value="80">80 Kilos</option>
              <option value="100">100 Kilos</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="volume">Volume.Max</label>
            <select name="volume" class="form-control" required>
              <option selected>Escolher...</option>
              <option value="50">50 Litros</option>
              <option value="100">100 Litros</option>
              <option value="200">200 Litros</option>
              <option value="400">400 Litros</option>
            </select>
          </div>
        </div>

        <button type="submit">Gravar</button>
      </form>
    </section>


  </main>
  <footer>
    <h3>Redes Sociais</h3>
    <div class="redes">
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-youtube"></a>

    </div>

  </footer>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
    <script>
    var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>


</body>

</html>