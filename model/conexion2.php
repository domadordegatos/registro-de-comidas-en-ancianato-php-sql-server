<?php
		$serverName='DESKTOP-7JUF6L9\SQLEXPRESS';
		$conectionInfo = array("Database"=>"SKD","UID"=>"sa","PWD"=>"123","CharacterSet"=>"UTF-8");
		$conexion = sqlsrv_connect($serverName, $conectionInfo);
		 if($conexion){
		 	echo "conexion exitosa";
		 }else{
		 	echo "sin conexion";
		 	die(print_r(sqlsrv_errors(), true));
		 }
 ?>
