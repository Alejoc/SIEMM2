<?php
if (isset($_GET['term'])){
	# conectare la base de datos
    $con=@mysqli_connect("localhost", "root", "515t3m45", "emmanuelips");

$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con)
{
	$fetch = mysqli_query($con,"SELECT * FROM cups where descupsmin like '%".mysqli_real_escape_string($con,($_GET['term'])) ."%' LIMIT 50");

	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {

		$row_array['value'] =$row['descupsmin'];
		$row_array['id_producto']=$row['codcupsmin'];
		$row_array['codigo']=$row['codcupsmin'];
		$row_array['descripcion']=$row['descupsmin'];
		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>
