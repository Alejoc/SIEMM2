<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['codigo'];
$codigo = substr($cod,1,-1);

$resultado = mysql_query("SELECT * FROM detalle_asistencias WHERE cod_asistencia = '$codigo' ");

echo '<ul>';
while($mostrar = mysql_fetch_array($resultado)){
	echo '<li>'.$mostrar['estudiante'].'</li>';
}
echo '</ul>';
?>