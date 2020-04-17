<?php
	session_start();
	if(isset($_SESSION['user'])){
 ?>
<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="#">
    <img style="margin:0; padding:0;" src="./pictures/log3.png" width="30" height="32" class="d-inline-block align-top rounded-lg" alt="">
    Consulta y Descarga de Reportes - Centro de protección Hogar Día
  </a>
  <form class="form-inline" style="margin:0%;">
    <button style="padding:6% 6% 8% 7%;" class="btn btn-outline-light my-2 my-sm-0 btn-sm rounded-circle" onclick="salir();" type="submit"> <img src="./pictures/off.png" width="20" height="20"> </button>
  </form>
</nav>
<?php
} else {
	header("location:./login.php");
	}
 ?>
