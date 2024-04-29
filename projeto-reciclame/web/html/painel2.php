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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnw1VEDXoPg6E4-Fk3SUkIPpOcIx5Y-nk&callback=initMap"
    async defer></script>

</script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
  
  <main>
  <header>
     <div class="h1-logo">
        <img src="../img/Free_Sample_By_Wix__3_-removebg-preview.png" alt="">
      </div>

    <nav>
     
      <ul>
    
        <li>
          <a href=""><span class="material-symbols-outlined">
            home
            </span>Inicio</a>
        </li>
        <li>
          <a href=""><span class="material-symbols-outlined">
            delete
            </span> Meus Pontos de Coleta</a>
        </li>
        <li>
          <a href="">
            <span class="material-symbols-outlined">
              library_add
              </span>
          </span>Novo Ponto de Coleta</a>
        </li>
  
      </ul>

    </nav>
  
    <div class="exit-link">
    <a href="" class="">Sair<span class="material-symbols-outlined">
      logout
      </span></a>
</div>
  </header>
 
    <section class="meio">
    <div class="car-text-login">
   
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
?> <h1 class="fancy">Meus Pontos de Coleta</h1>
</div> <div class="msg-box">
<span class="material-symbols-outlined">

  notifications
  </span>

    
  
</div>

 
 
  <div class="h2"> <span></span>
    <h2 class="card-title"></h2>
  </div>
    
       <div id="wrapper">
        
     
           
            <div class="charts-flex">
            
              <select name="pontos de coleta" id="pontosc" aria-placeholder="" >
                <option value="0">Escolha um de seus pontos de coleta inteligente...</option>
                <option value="0">Churrasqueira 1</option>
                <option value="0">Churrasqueira 2</option>
                <option value="0">Churrasqueira 3</option>
                <option value="0">Academia</option>
                            </select>
               
                 <div class="ponto-chart ">

                  <div class="ponto-real" id="ponto-form">
                    
       
                      <div class="progress-container">
                        <div class="progress-wrapper">
                          <div class="progress2"></div>
                          <div class="progress"><div class="progress-fill" id="progressFill"></div></div>
                          <div id="percentage">0%</div> <!-- Número de porcentagem no meio do gráfico -->
                      </div>
                        </div>
                        <div id="pesoDisplay"></div> <li>
                          <ul>
                      <li><span>Tipo: Plastico</span></li>
                      <li><span>Local/Localização: Churrasqueira 2</span></li>
                     <li> <span>Status:ON</span>     </li>

               </ul>
                  </div>

                      <div class="img-maps">

                        <div id="mapa"></div>

                        </div>
                      
                 
                 </div>
              </div>
           
        
       
    </section>
   
               
   
   
              
 
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