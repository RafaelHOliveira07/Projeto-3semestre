<?php

require_once 'empresa-verifica.php';
$idEmpresa = $_SESSION['idEmpresa'];

require_once "../classes/Lixeira.php";
$lixeira = new Lixeira();
$lista = $lixeira->listarlogado($idEmpresa);

$resposta = json_encode(['dados' => $lista]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="../style/stylemap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="../style/style-painel.css">

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
            <a href="index-logado.php#sec-01">Sobre</a>
          </li>

          <li>
            <a href="painel.php">Painel</a>
          </li>

          <li>
            <a href="empresa-logout.php">Sair</a>
          </li>

        </ul>

      </div>

  </header>
  <script>
    var resposta = {resposta};

var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");

socket.onopen = function (event) {
  console.log("Conexão WebSocket aberta.");

};

socket.onmessage = function (event) {
  // Receba os dados do WebSocket, se necessário
  var dadosRecebidos = JSON.parse(event.data);

  // Faça qualquer processamento necessário com os dados recebidos do Node-RED
  console.log(dadosRecebidos);
};

socket.onclose = function (event) {
  // Lide com o fechamento da conexão, se necessário
  console.log("Conexão WebSocket fechada.");
};

socket.onerror = function (error) {
  console.error("Erro na conexão WebSocket:", error);
};


  </script>

  <iframe src="http://127.0.0.1:1880/ui/#!/0?socketid=TzzAfH__q_OlG8zZAAAJ"> </iframe>
  <main>
    <section class="table-sec">
      <div class="h2"> <span></span>
        <h2>Seus Pontos de Coleta</h2>
      </div>

      <table class="table table-bordered ">
        <thead class="thead-dark">

          <th scope="col">Código</th>
          <th scope="col">propietario</th>
          <th scope="col">Material</th>
          <th scope="col">peso.Max</th>
          <th scope="col">vol.Max</th>
          <th scope="col">localizacao</th>

          </tr>
          <?php foreach ($lista as $linha): ?>
            <tr class="table-light">

              <td>
                <?php echo $linha['idLixeira'] ?>
              </td>
              <td>
                <?php echo $linha['nome_empresa'] ?>
              </td>
              <td>
                <?php echo $linha['tipo'] ?>
              </td>
              <td>
                <?php echo $linha['peso'] ?>
              </td>
              <td>
                <?php echo $linha['volume'] ?>

              <td>
                <?php echo $linha['nome'] ?>
              </td>




            </tr>
          <?php endforeach ?>
      </table>
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