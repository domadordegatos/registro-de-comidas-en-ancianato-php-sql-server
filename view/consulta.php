<?php
    require_once "../model/conexion.php";
    $conexion=conexion();?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consulta</title>
    <link rel="stylesheet" href="./style/bootstrap.css">
    <link rel="icon" type="image/png" href="./pictures/ico1.png" />
  </head>
  <nav>
    <?php require_once "./nav.php"; ?>
    <?php require_once "../model/cdn.php"; ?>
    <?php require_once "../model/consulta_js.php"; ?>
  </nav>
  <body style="background-color:#dddddd;">
    <div class="contenedor" style="width:100%;">
      <div class="contenido">
        <div class="elementos" style="margin:1% 0 1.5% 2.5%;width:95%; background-color:rgb(255, 255, 255); border-radius:1rem;">
            <form>
              <div class="form-row" style="padding-top:0.5rem;">
                <div class="col-sm-2" style="padding-right:0%; padding-left:3rem;">
                  <label for="fecha_inicial">Fecha - Hora Inicial</label>
                  <input type="date" class="form-control form-control-sm" name="f_i" id="f_i">
                </div>
                <div class="col-sm-2" style="padding-top:2rem; padding-left:0.5rem;">
                  <input type="time" class="form-control form-control-sm" name="h_i" id="h_i" value="00:00">
                </div>
                <div class="col-sm-2" style="padding-right:0%; padding-left:0.5rem;">
                  <label for="fecha_inicial">Fecha - Hora Final</label>
                  <input type="date" class="form-control form-control-sm" name="f_f" id="f_f">
                </div>
                <div class="col-sm-2" style="padding-top:2rem; padding-left:0.5rem;">
                  <input type="time" class="form-control form-control-sm" name="h_f" id="h_f" value="23:59">
                </div>
                <div class="col-sm-1" style="">
                  <label># ID</label>
                  <div class="" style="padding-left:1rem;">
                    <input style="width:5rem;" type="text" class="form-control form-control-sm" id="identificador" name="identificador" onclick="disable1();">
                  </div>
                </div>
                <div class="col-sm-2" style="padding-left:0.5rem;">
                  <label>C.C.</label>
                  <div class="" style="padding-left:1rem;">
                    <input type="text" class="form-control form-control-sm" placeholder="1.234.567.890" id="cedula" name="cedula" onclick="disable1();">
                  </div>
                </div>
              </div>
              <div class="form-inline" style="padding-top: 0.3rem; padding-bottom:0.5rem;">
                <div class="form-group" style="padding-left:1.6rem; flex-wrap: ;">
                  <label class="col-sm-5 col-form-label">Dispositivo</label>
                  <div class="col-sm-5">
                      <select id="dispositivo" name="dispositivo" class="form-control form-control-sm">
                        <option value="null" selected>Seleccioname</option>
                        <?php $sql="SELECT acc_monitor_log.device_name from acc_monitor_log group by acc_monitor_log.device_name"; $result=sqlsrv_query($conexion,$sql);
          				        while ($retorno=sqlsrv_fetch_array($result)):?>
          				      	<option value="<?php echo $retorno[0] ?> "><?php echo $retorno[0] ?></option>
          				      <?php endwhile; ?>
                      </select>
                  </div>
                </div>
                <div class="form-group" style=" flex-wrap: ;">
                  <label class="col-sm-4 col-form-label">Nombre</label>
                  <div class="col-sm-6">
                      <select id="nombres" name="nombres" class="form-control form-control-sm">
                        <option value="null" selected>Seleccioname</option>
                        <?php $sql="SELECT USERINFO.Badgenumber, USERINFO.Name, USERINFO.lastname from USERINFO ORDER BY USERINFO.Name ASC"; $result=sqlsrv_query($conexion,$sql);
          				        while ($retorno=sqlsrv_fetch_array($result)):?>
          				      	<option value="<?php echo $retorno[0] ?> "><?php echo $retorno[1]." ".$retorno[2] ?></option>
          				      <?php endwhile; ?>
                      </select>
                  </div>
                </div>
                <div class="form-group row" style=" flex-wrap: ; margin:0;">
                  <label class="col-sm-4 col-form-label">Estado</label>
                  <div class="col-sm-5">
                      <select id="estado" name="estado" class="form-control form-control-sm">
                        <option value="null" selected>Seleccioname</option>
                        <option value="10">Entrada</option>
                        <option value="11">Salida</option>
                        <option value="14">Salia T.E</option>
                        <option value="15">Entrada T.E</option>
                      </select>
                  </div>
                </div>
                <div class="form-inline" style="margin-left:1rem; display:flex;">
                  <button style="margin:0.2rem; "  type="button" class="form-control btn btn-sm btn-info" name="button" onclick="send();"><strong>Solicitar Datos</strong></button>
                  <a href="excel.php" style="display:none;" id="b1" class="btn btn-warning btn-sm form-control"> <img src="./pictures/imp.png"  width="30" height="30"></a>
                  <button style="margin:0.2rem; display:none;" id="b2" onclick="limpiar();" class="btn btn-sm btn-danger form-control" type="button" name="button"> <strong style="font-size:1rem;">X</strong> </button>
                </div>
              </div>
            </form>
        </div>
        <div id="table_general" class="tabla" style="display:none; text-align:center; align-items: center; width:95%; margin:1% 0 1.5% 2.5%;width:95%; background-color:rgb(255, 255, 255); border-radius:1rem;">
          <table class="table table-sm" style="padding:0.3% 0 0.3% 0; margin:0.5% 0 0.5% 0.5%; border-collapse:separate; width:99%;">
            <thead class="table-primary">
              <th style="border-top-left-radius:1rem;">Fecha</th>
              <th>Comida</th>
              <th>ID</th>
              <th>Genero</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Documento</th>
              <th>Dispositivo</th>
              <th>Punto-Evento</th>
              <th style="border-top-right-radius:1rem;">Tpo. Verificación</th>
              <!-- <th style="border-top-right-radius:1rem;">Tpo. Movimiento</th> -->
            </thead>
            <tbody id="table_excel" class="table">

            </tbody>
          </table>
        </div>
      </div>

    </div>
  </body>
</html>
