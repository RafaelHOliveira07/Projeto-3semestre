<?php




require_once '../classes/Lixeira.php';
$lixeira = new Lixeira();




$jsonPontosLixeira = $lixeira->obterPontosParaMapa();
require_once 'maps.php';
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
  <link rel="stylesheet" href="../style/style.css">
  <link href="../style/stylemap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


  <title>Projeto-reciclame</title>
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
        <a href="#home">Início</a>
    </li>
    <li>
    <a href="index.php#sec-01">Sobre</a>
    </li>

        <li>
            <a href="empresa-form.php">Entrar</a>
        </li>
        <li>
            <a href="cadastro-empresa.php">Cadastrar-se</a>
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
    <p class="fancy-p">Ao projeto Reciclame onde reciclar tem tudo haver com tecnologia</p>

  </div>
  <div id="carouselExampleControls" class="img-fundo carousel slide" data-ride="carousel">

    <div class="carousel-inner">

      <div class="carousel-item active">
        <img class="d-block w-100" src="../img/recycle-background-with-woman-holding-box.jpg" alt="Primeiro Slide">
      </div>
    </div>

  </div>



  <main class=" container-fluid">


<section class="sec-01 container-fluid" >


  <div class="text flex-column"data-aos="fade-down"
    data-aos-offset="100"
    data-aos-delay="50"
    data-aos-duration="500"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true"
>
    <h2 id="sec-01"  >Conheça nosso projeto</h2>


  </div>



    <div class="img-sec container-fluid" data-aos="fade-right"
    data-aos-offset="200"
    data-aos-delay="50"
    data-aos-duration="500"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true" >
      <label for="agi">
        <img class="img-fluid" src="../img/iteracao.png" alt="agilidade" id="agi"> <span>Mais agilidade na
          coleta</span></label>
          <div class="p">
      <p>Nosso projeto tem como objetivo, auxiliar a coleta seletiva de bairros e cidades, oferecendo dados que
        poderam ser utilizados para melhorar rotas e economizar o tempo de quem cuida do nosso lixo no dia a dia.
      </p></div>
    </div>

    <div class="img-sec container-fluid" data-aos="fade-right"
    data-aos-offset="200"
    data-aos-delay="50"
    data-aos-duration="500"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true">
      <label for="eco">
        <img class="img-fluid" src="../img/eco.png" alt="eco" id="eco"><span>Aliado da natureza</span></label>
        <div class="p">
      <p>Para isso foram desenvolvidas lixeiras inteligentes voltadas para lixo reciclavel, ou seja o intuito e
        gerar menos desperdicio e selecionar corretamente o que é reciclavel, ajudando tanto a cidade, as empresas,
        grupos de coleta e também o cidadão.</p>
      </div>
      
    </div>

    <div class="img-sec container-fluid" data-aos="fade-right"
    data-aos-offset="200"
    data-aos-delay="50"
    data-aos-duration="800"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true">
      <label for="tecb">
        <img class="img-fluid" src="../img/tecnologia.png" alt="tec" id="tec"><span>Portal Web com
          dashbord</span></label>
          <div class="p">
      <p >Nossas lixeiras serao equipadas com sensores que devolveram a nossa plataforma, imformações como,
        quantidade de lixo que foi armazenada e coletada nas lixeiras entre muitas outras.E o nosso principal
        atrativo é pode localizar as lixeiras maix proximas de você, utilizando a tecnologia do Google maps.</p>
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
  <h2 class="dysplay-4">Encontre a lixeira mais proxima de voce:</h2>

 
  <div class="img-maps">

    <div id="mapa"></div>
  
   
<div class="text-leg">
        

           <p>Basta clicar em permitir sua localização e pronto, nosso mapa ira te indicar as lixeiras mais
          proximas da sua localização atual</p>  
          <p>Também é possivel traçar rotas a partir da sua localização, basta clicar em qualquer icone das nossa lixeiras e pronto</p>
             
</div>

</section>



  <section class="sec-03 ">

    <h2>Cadastro para Empresas parceiras:</h2>

    <div class="work-sec" >

      <div class="parawork" >

        <p data-aos="fade-right"
data-aos-offset="200"
data-aos-delay="100"
data-aos-duration="1000"
data-aos-easing="ease-in-out"
data-aos-mirror="true"
data-aos-once="true">Esse cadastro é voltado para empreses que desejam utilizar dos dados gerados pelo
          projeto, como peso, rotas,
          localização e muito mais.</p>
          <p data-aos="fade-right"
data-aos-offset="200"
data-aos-delay="100"
data-aos-duration="1100"
data-aos-easing="ease-in-out"
data-aos-mirror="true"
data-aos-once="true">Para se cadastrar <a href="">Clique aqui</a> e preencha os dados
          necessarios</p>
          
       

      </div>
 
      <div id="work" data-aos="fade-left"
data-aos-offset="200"
data-aos-delay="1000"
data-aos-duration="20000"
data-aos-easing="ease-in-out"
data-aos-mirror="true"
data-aos-once="true">

        <img src="../img/artigo2.webp" alt="">
        
      </div>

    </div>

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