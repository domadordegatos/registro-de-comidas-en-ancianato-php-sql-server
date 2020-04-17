<?php
session_start();
require_once "../model/conexion.php";
require_once "../model/procesos_consulta.php";
$conexion=conexion();

    $obj= new consulta();

    $result=$obj->limpiar();
    echo $result;
 ?>
