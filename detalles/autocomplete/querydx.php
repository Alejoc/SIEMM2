<?php
if (isset($_GET['term'])){
	# conectare la base de datos
    $con=@mysqli_connect("localhost", "root", "Edma1988", "emmanuelips");

$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con)
{
	$fetch = mysqli_query($con,"SELECT * FROM cie where coddx like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,10");

	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_producto=$row['coddx'];
		$precio=number_format($row['precio_venta'],2,".","");
		$row_array['value'] = $row['coddx']." | ".$row['descripdx'];
		$row_array['id_producto']=$row['coddx'];
		$row_array['codigo']=$row['coddx'];
		$row_array['descripcion']=$row['descripdx'];
		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>
