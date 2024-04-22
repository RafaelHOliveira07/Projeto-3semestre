<?php

require_once 'empresa-verifica.php';
$idEmpresa = $_SESSION['idEmpresa'];

require_once "../classes/Lixeira.php";
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


  <link
  rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
/>
<link
  href="https://fonts.googleapis.com/css?family=Montserrat"
  rel="stylesheet"
/>

<link
  rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../img/bin-verde.png" type="image/x-icon">
  <link href="../style/stylemap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="../style/style-log.css">
  <link rel="stylesheet" href="../style/painel-style.css">
  <link rel="stylesheet" href="../style/style-charts.css">


  <title>Projeto-Reciclame</title>
</head>

<body>
  <main class="main-dahs">
  <header>
    <div class="h1-logo">
      <img src="../img/Free_Sample_By_Wix__3_-removebg-preview.png" alt="">
    </div>

    <nav>

      <ul>
        <li>
          <a href="">Inico</a>
        </li>
        <li>
          <a href="">Meus Pontos de Coleta</a>
        </li>
        <li>
          <a href="">Novo Ponto de Coleta</a>
        </li>
     
      </ul>
   <a href="">Sair</a>
    </nav>



  </header>
  <section >
  <div class="h2"> <span></span>
        <h2 class="card-title">Meus Pontos de Coleta</h2>
      </div>


  
    
   </section>
   
    
   
     
 
   
   <section class="dash-area">
    
       <div id="wrapper">
        
         <div class="content-area">
           <div class="container-fluid">
           
             <div class="main">
              <select name="pontos de coleta" id="pontosc" aria-placeholder="" >
                <option value="0">Escolha um de seus pontos de coleta inteligente...</option>
                <option value="0">Churrasqueira 1</option>
                <option value="0">Churrasqueira 2</option>
                <option value="0">Churrasqueira 3</option>
                <option value="0">Academia</option>
                            </select>
               <div class="row mt-4">
                 <div class="col-md-5">

                   <div class="box columnbox mt-4" id="ponto-form">
                    <li>
                      <span>Tipo: Plastico</span>
                      <span>Local/Localização: Churrasqueira 2</span>
                      <span>Status:ON</span>

                    </li>
       
                      <div class="progress-container">
                        <div class="progress-wrapper">
                          <div class="progress2"></div>
                          <div class="progress"><div class="progress-fill" id="progressFill"></div></div>
                          <div id="percentage">0%</div> <!-- Número de porcentagem no meio do gráfico -->
                      </div>
                        </div>
                        <div id="pesoDisplay"></div> <!-- Campo para exibir o peso -->
                      </div>




                   </div>
                 </div>
                 <div class="col-md-7">
                   <div class="box  mt-4">
                     <div id="linechart"></div>
                   </div>
                 </div>
               </div>
   
               <div class="row">
                 <div class="col-md-5">
                   <div class="box radialbox mt-4">
                     <div id="circlechart"></div>
                   </div>
                 </div>
                 <div class="col-md-7">
                   <div class="box mt-4">
                     <div class="mt-4">
                       <div id="progress1"></div>
                     </div>
                     <div class="mt-4">
                       <div id="progress2"></div>
                     </div>
                     <div class="mt-4">
                       <div id="progress3"></div>
                     </div>
                   </div>
                 </div>
               </div>
   
               <div class="row">
                 <div class="float-right edit-on-codepen">
                   <a
                     target="_blank"
                     href="https://codepen.io/apexcharts/pen/pxZKqL"
                     ><img src="assets/edit-on-codepen.png" alt="Edit on Codepen"
                   /></a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       
      </main>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
       
       <script src="../javascript/test.js"></script>
   

  <script>
    var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");
  </script>
 

</body>

</html>