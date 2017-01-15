<?php
$conexion = mysql_connect('localhost', 'root', 'Edma1988');
mysql_select_db('emmanuelips', $conexion);

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>
