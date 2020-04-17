<script type="text/javascript">
$( document ).ready(function() {

    var now = new Date();

    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $("#f_f").val(today);
    $("#f_i").val(today);

});

function valid(){
  if($('#user').val()==""){
    alertify.alert("Debes agregar el usuario");
    return false;
  }else if($('#pass').val()==""){
    alertify.alert("Debes agregar la contraseña");
    return false;
  }
  cadena="form1=" + $('#user').val() +
        "&form2=" + $('#pass').val();
      $.ajax({
        type:"POST",
        url:"../controller/valid.php",
        data:cadena,
        success:function(r){
               if(r==1){
            window.location="../view/consulta.php";
          }	else{
            alertify.error("La contraseña o usuario estan mal escritos, revisa");
          }
        }
      });
}

  function send(){
    if($('#identificador').val()==""){var iden='null';}else{ iden = $('#identificador').val();} if($('#cedula').val()==""){var cedu='null';}else{ cedu = $('#cedula').val();}
 cadena="form1=" + $('#f_i').val() + "&form2=" + $('#h_i').val()+
        "&form3=" + $('#f_f').val()+ "&form4=" + $('#h_f').val()+
        "&form5=" + iden + "&form6=" + cedu +
        "&form7=" + $('#dispositivo').val()+ "&form8=" + $('#nombres').val()+
        "&form9=" + $('#estado').val();
    $.ajax({
      type:"POST",
      url:"../controller/listar.php",
      data:cadena,
      success:function(r){
        if(r==1){
          $('#table_general').show(500);
          alertify.success("Registros Encontrados");
          $('#table_excel').load("../view/temp_excel.php");
          $('#b1').show(500);
          $('#b2').show(500);
        }else if(r==0){
          alertify.error("No existen registros");
          $('#table_excel').load("../view/temp_excel.php");
          $('#b1').hide(500);
          $('#b2').hide(500);
        }else{
          alertify.error("Error en la busqueda, contacte a soporte");
        }
      }
    });
}

      function limpiar(){
        $.ajax({
          url:"../controller/limpiar_lista.php",
          success:function(r){
            if(r==1){
              $('#table_general').hide(500);
              $('#b1').hide(500);
              $('#b2').hide(500);
              $('#table_excel').load("../view/temp_excel.php");
            }else if(r==0){
              alertify.error("No se pudo limpiar");
            }else{
              alertify.error("Error en la limpieza");
            }
          }
        });
      }

      function salir(){
        $.ajax({
          url:"../controller/salir.php",
          success:function(r){
            if(r==1){
              window.location="../view/login.php";
            }else if(r==0){
              alertify.error("No se pudo salir");
            }else{
              alertify.error("Erroral salir");
            }
          }
        });
      }

      function excel(){
        $.ajax({
          url:"../view/excel.php",
          success:function(r){
            if(r==1){
              alertify.success("Excel generado");
            }else if(r==0){
              alertify.error("Excel no generado");
            }else{
              alertify.error("Error en el proceso");
            }
          }
        });
      }
</script>
