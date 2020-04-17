<?php
    function conexion(){
		$serverName='DESKTOP-7JUF6L9\SQLEXPRESS';
		$conectionInfo = array("Database"=>"SKD","UID"=>"sa","PWD"=>"123","CharacterSet"=>"UTF-8");
		return $conexion = sqlsrv_connect($serverName, $conectionInfo);
	}
		// if($conexion){
		// 	echo "conexion exitosa";
		// 	$sql="SELECT Name from USERINFO";
		// 	$result=sqlsrv_query($conexion,$sql);
		// 	while ($ver=sqlsrv_fetch_array($result)){
		// 	echo $ver[0];
		// }
		// }else{
		// 	echo "sin conexion";
		// 	die(print_r(sqlsrv_errors(), true));
		// }
 ?>
