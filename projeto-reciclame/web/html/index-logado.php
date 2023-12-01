

<?php
require_once 'empresa-verifica.php';
$idEmpresa = $_SESSION['idEmpresa'];
include_once '../classes/empresa.php';
$empresa = new Empresa();


$pontos_empresa = $empresa->obterPontoEmpresaParaMapa();
$pontos_json_empresa = json_encode($pontos_empresa);


require_once '../classes/lixeira.php';
$lixeira = new Lixeira();
$jsonPontosLixeira = $lixeira->obterPontosLixeiraParaMapa();
require_once 'maps-empresa.php';

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
  
 
    <!-- Carregue a API do Google Maps com um retorno de chamada -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnw1VEDXoPg6E4-Fk3SUkIPpOcIx5Y-nk&callback=initMap" async defer></script>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../img/bin-verde.png" type="image/x-icon">
  <link href="../style/stylemap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="../style/style.css">

  <title>Projeto-Reciclame</title>
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
  <div class="dark-fade"></div>
  <div class="car-text" data-aos="fade-up"
  data-aos-offset="200"
  data-aos-delay="50"
  data-aos-duration="1000"
  data-aos-easing="ease-in-out"
  data-aos-mirror="true"
  data-aos-once="false"
  data-aos-anchor-placement="top-center">
    <h1 class="fancy">Seja-bem vindo</h1>
    <?php
    if (!empty($lista)) {
    // Obtém o nome da empresa da primeira linha (assumindo que o nome é o mesmo para todas as lixeiras)
    $nomeDaEmpresa = $lista[0]['nome_empresa'];

    // Loop foreach para exibir as lixeiras
 
    $nomeDaEmpresaExibido = false;
    
    foreach ($lista as $linha) {
        if (!$nomeDaEmpresaExibido) {
            echo "<h3 class='fancy-p'>$nomeDaEmpresa</h3>";
            $nomeDaEmpresaExibido = true;
        }
    
        // Aqui você também pode exibir outras informações da lixeira, se necessário
    }
    
} else {
    echo "NOME NÃO DISPONÍVEL!";
}
?>
  </div>
  <div id="carouselExampleControls" class="img-fundo carousel slide" data-ride="carousel">

    <div class="carousel-inner">

     
      <div class="carousel-item active">
        <img class="d-block w-100" src="../img/post-id-dia-internacional-da-reciclagem-secretaria-municip.jpg" alt="Primeiro Slide">
      </div>
    </div>

  </div>






  <main class=" container-fluid">


    <section class="sec-03 ">

      <h2>Pontos de Coleta personalizado:</h2>

      <div class="work-sec" >

        <div class="parawork" data-aos="fade-right"
  data-aos-offset="200"
  data-aos-delay="100"
  data-aos-duration="1000"
  data-aos-easing="ease-in-out"
  data-aos-mirror="true"
  data-aos-once="true" >

          <p >Para empresas já cadastradas, oferecemos o serviço de pontos de coleta personalizados, podendo escolher o ponto, material e volume de acordo com seu negócio</p>

      </div>
 
         

  
   
        <div id="work" data-aos="fade-left"
  data-aos-offset="200"
  data-aos-delay="1000"
  data-aos-duration="20000"
  data-aos-easing="ease-in-out"
  data-aos-mirror="true"
  data-aos-once="true">

          <img src="../img/conceituando-ilustracao-de-design-isometrico-de-reciclagem-de-residuos_780482-37.avif" alt="">
          
        </div>
      <div class="parawork" data-aos="fade-left"
  data-aos-offset="200"
  data-aos-delay="100"
  data-aos-duration="1000"
  data-aos-easing="ease-in-out"
  data-aos-mirror="true"
  data-aos-once="true" >

  <p >Para saber como funciona e quais as opções disponíveis acesse a página de cadastro de Pontos de Coleta Personalizados <a href="cadastro-lixeira.php">clicando aqui</a></p>
      
          </div>


 </div>

    </section>
  
    <section class="sec-02 container-fluid" data-aos="fade-down"
    data-aos-offset="100"
    data-aos-delay="50"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true" >
      <h2 class="dysplay-4">Meus pontos de coleta no Mapa:</h2>

     
      <div class="img-maps">

        <div id="mapa"></div>
      
       
 <div class="text-leg">
            
  <h3 style="font-variant: small-caps;">Legenda</h3>
  <p>Cada cor representa um tipo de lixo em nossos ícones siga a legenda a baixo se necessário</p>

               <div class="leg"> 
                <label for="">Vidro
                <span class="cube" id="green"></span></label>
                <label for="">Papel
                <span class="cube" id="blue"></span></label>
                <label for="">Metal
                <span class="cube" id="yellow"></span></label>
                <label for="">Plastico
                <span class="cube" id="red"></span></label>
              </div>
    
</div>

 </section>



  </main>

  <footer>
    <h3>Redes-Sociais</h3>
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