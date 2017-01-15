<?php
session_start();
class sistema{
		public function conexion(){
			$host        = 'localhost';
			$usuario    = 'root';
			$password = 'root';
			$dataBase  = 'colegio';
			
			$conexion = mysql_connect($host, $usuario, $password);
			$seleccion = mysql_select_db($dataBase, $conexion);
		
		}
		function mostrarAsistencias(){
			$sql = mysql_query("SELECT * FROM asistencias");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					$estudiantes = mysql_num_rows(mysql_query("SELECT * FROM detalle_asistencias WHERE cod_asistencia = '".$mostrar['cod_asistencia']."' "));
					$item = $item+1;
					echo '<tr>
								<td>'.$item.'</td>
								<td>'.$mostrar['cod_asistencia'].'</td>
								<td>'.$mostrar['fecha_asistencia'].'</td>
								<td>'.$estudiantes.'</td>
								<td><input type="button" value="Detalle" class="btn btn-success" onClick="verDetalle(/'.$mostrar['cod_asistencia'].'/)"></td>
							</tr>';
				}
			}else{
				echo '<tr><td colspan="5">No se encontraron registros...</td></tr>';
			}
		}
}