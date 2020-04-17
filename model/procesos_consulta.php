<?php
    class consulta{
      public function validar(){
        require_once "conexion.php"; $conexion=conexion();
          $v1=$_POST['form1']; $v2=$_POST['form2'];
          $sql="SELECT * from auth_user where auth_user.username = '$v1' and auth_user.Remark = '$v2'";
          $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
          $row_count = sqlsrv_num_rows($result);
          if($row_count<=0){
            echo 0;
          }else{
            $_SESSION['user']=$v1;
            echo 1;
          }
      }

      public function limpiar(){
        unset($_SESSION['listar_excel']);
        echo 1;
      }
      public function salir(){
        unset($_SESSION['user']);
        echo 1;
      }

      public function listar(){
        require_once "conexion.php"; $conexion=conexion();
        $v1=$_POST['form1'];  $v2=$_POST['form2'];  $v3=$_POST['form3'];  $v4=$_POST['form4'];
        $v5=$_POST['form5'];  $v6=$_POST['form6'];  $v7=$_POST['form7'];  $v8=$_POST['form8'];
        $v9=$_POST['form9'];

        $v11= str_replace("-","",$v1); $v33= str_replace("-","",$v3);
        unset($_SESSION['listar_excel']);
        unset($_SESSION['datos_estadisticas']);
        $columnas="SELECT acc_monitor_log.time,
        acc_monitor_log.pin,
         USERINFO.Name,
          USERINFO.lastname,
           USERINFO.CardNo,
            acc_monitor_log.device_name,
             acc_monitor_log.event_point_name,
              acc_monitor_log.verified,
               acc_monitor_log.state,
                USERINFO.Gender
               from acc_monitor_log
               INNER JOIN USERINFO AS USERINFO ON USERINFO.Badgenumber = acc_monitor_log.pin
               where acc_monitor_log.time between '$v11 $v2' and '$v33 $v4' ";
          $order="ORDER BY acc_monitor_log.time DESC, USERINFO.Name DESC";
          $val_v5="and acc_monitor_log.pin = '$v5'";
          $val_v6="and USERINFO.CardNo = '$v6'";
          $val_v7="and acc_monitor_log.device_name = '$v7'";
          $val_v8="and acc_monitor_log.pin = '$v8'";
          $val_v9="and acc_monitor_log.state = '$v9'";

         if($v6=="null" && $v5!="null" && $v7=="null" && $v8=="null" && $v9=="null"){ //id
          $sql="$columnas $val_v5 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6=="null" && $v5!="null" && $v7!="null" && $v8=="null" && $v9=="null"){ //id y dispositivo
          $sql="$columnas $val_v5 $val_v7 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6=="null" && $v5!="null" && $v7=="null" && $v8=="null" && $v9!="null"){ //id y movimiento
          $sql="$columnas $val_v5 $val_v9 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6=="null" && $v5!="null" && $v7!="null" && $v8=="null" && $v9!="null"){ //id dispositivo movimiento
          $sql="$columnas $val_v5 $val_v7 $val_v9 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6!="null" && $v7=="null" && $v8=="null" && $v9=="null"){ //cedula
          $sql="$columnas $val_v6 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6!="null" && $v7!="null" && $v8=="null" && $v9=="null"){ //cedula y dispositivo
          $sql="$columnas $val_v6 $val_v7 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6!="null" && $v7=="null" && $v8=="null" && $v9!="null"){ //cedula y movimiento
          $sql="$columnas $val_v6 $val_v9 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6!="null" && $v7!="null" && $v8=="null" && $v9!="null"){ //cedula y movimiento dispositivo
          $sql="$columnas $val_v6 $val_v7 $val_v9 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6=="null" && $v7=="null" && $v8=="null" && $v9=="null"){ //solo por fecha
          $sql="$columnas $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6=="null" && $v7=="null" && $v8!="null" && $v9=="null"){ //nombre
          $sql="$columnas $val_v8 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6=="null" && $v7!="null" && $v8!="null" && $v9=="null"){ //nombre dispositivo
          $sql="$columnas $val_v8 $val_v7 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6=="null" && $v7!="null" && $v8!="null" && $v9!="null"){ //nombre verificacion
          $sql="$columnas $val_v8 $val_v7 $val_v9 $order"; $result=sqlsrv_query($conexion,$sql);
   }else if($v6=="null" && $v7!="null" && $v8=="null" && $v9=="null"){ //dispositivo
          $sql="$columnas $val_v7 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6=="null" && $v7!="null" && $v8=="null" && $v9!="null"){ //dispositivo verificacion
          $sql="$columnas $val_v7 $val_v9 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }else if($v6=="null" && $v7=="null" && $v8=="null" && $v9!="null"){ //dispositivo verificacion
          $sql="$columnas $val_v9 $order"; $result=sqlsrv_query($conexion,$sql, array(), array( "Scrollable" => 'static' ));
   }
        // self::separar($result);
        self::proceso_listar($result);
        }

      public function proceso_listar($result){
        $row_count = sqlsrv_num_rows($result);
        if($row_count<=0){
          echo 0;
          unset($_SESSION['listar_excel']);
        }else{
          $des_i='0600';$des_f='0750';// cambiar por las horas normales
          $alm_i='1130';$alm_f='1240';
          $cen_i='1800';$cen_f='2000';
          $mer_1_i='0830';$mer_1_f='0940';
          $mer_2_i='1800';$mer_2_f='2000';
          while ($ver1=sqlsrv_fetch_array($result)){
             $string=$ver1[0]->format('Ymd H:i:s');
             $h=substr($string,9,2); $m=substr($string,12,2);
             $mensaje="";
             $hora=$h.$m;
               if($hora>$des_i && $hora<$des_f){$mensaje="Desayuno";} else if($hora>$alm_i && $hora<$alm_f){$mensaje="Almuerzo";} else if($hora>$cen_i && $hora<$cen_f){$mensaje="Cena";}
          else if($hora>$mer_1_i && $hora<$mer_1_f || $hora>$mer_2_i && $hora<$mer_2_f){$mensaje="Merienda";} else{$mensaje="Diferente";}

          $tabla=$string."||".
                 $mensaje."||".
                 $ver1[1]."||".
                 $ver1[2]."||".
                 $ver1[3]."||".
                 $ver1[4]."||".
                 $ver1[5]."||".
                 $ver1[6]."||".
                 $ver1[7]."||".
                 $ver1[8]."||".
                 $ver1[9]."||";
             $_SESSION['listar_excel'][]=$tabla;
           }
           echo 1;
      }
      }
    }
 ?>
