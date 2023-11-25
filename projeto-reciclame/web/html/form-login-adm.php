
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Reciclame-login</title>

  <!-- Principal CSS do Bootstrap -->
  <link href="https://getbootstrap.com.br/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Estilos customizados para esse template -->
  <link href="https://getbootstrap.com.br/docs/4.1/examples/sign-in/signin.css" rel="stylesheet">


  <script type="text/javascript">
    function validaCampo() {
      if (document.login.usuario.value == "") {
        alert("O campo usuário é obrigatório!");
        return false;
      }
      if (document.login.senha.value == "") {
        alert("O campo senha é obrigatório!");
        return false;
      } else
        return true;
    }
  </script>
   <link rel="stylesheet" href="../style/style-form.css">
</head>

<body class="text-center flex-column">
  <h1 class="font-weight-bold text-dark"></h1>
  <form action="adm-login.php" method="post" class="form-signin" name="login" onsubmit="return validaCampo(); return false;">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>

    <label for="usuario" class="sr-only">Usuario</label>
    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário">
    <label for="senha" class="sr-only">Senha</label>
    <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
    <div class="checkbox mb-3">
  
    <button class="btn btn-lg  btn-block" type="submit">Login</button>
  
  </form>
</body>

</html>