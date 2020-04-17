<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Log-In</title>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"><link rel="stylesheet" href="./style/style_login.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/alertify.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/default.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/semantic.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/bootstrap.min.css"/>
  <?php require_once "../model/consulta_js.php" ?>
  <link rel="icon" type="image/png" href="./pictures/ico1.png" />
</head>
<body>
<!-- partial:index.partial.html -->
<div class="login" style="top: 50%;left: 50%; display:flex;">
  <form class="login">
    <h1>Bienvenido - Centro de protección Hogar Día</h1>
    <input type="text" placeholder="Usuario" id="user">
    <input type="password" placeholder="Contraseña" id="pass">
    <button type="button" onclick="valid();">Iniciar</button>
  </form>
  <img style="position:absolute; padding-top:1rem; margin-left:28rem;" src="./pictures/log3.png" width="188" height="208" class="d-inline-block align-top rounded-lg" alt="">
</div>


</body>
</html>
