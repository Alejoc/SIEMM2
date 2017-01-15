<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$codigo = $_POST['codigo'];
$fecha = date('Y-m-d');

$comprobar = mysql_num_rows(mysql_query("SELECT * FROM asistencias WHERE cod_asistencia = '$codigo'"));

if($comprobar == 0){
	
	mysql_query("INSERT INTO asistencias (cod_asistencia, fecha_asistencia)VALUES('$codigo','$fecha') ");
	$_SESSION['cod_asistencia'] = $codigo;

}else{
	
 	echo 'existe';
 
}
?>