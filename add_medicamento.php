<?php
	//Recibimos datos
	$idmformula=$_POST['idmformula'];
	$med = $_POST['med'];
	$via = $_POST['via'];
	$frec = $_POST['frec'];
	$dosis1 =$_POST['dosis1'];
	$dosis2 = $_POST['dosis2'];
	$dosis3 = $_POST['dosis3'];
	$dosis4 = $_POST['dosis4'];
	$cant_dosis=$dosis1 + $dosis2 + $dosis3 + $dosis4;
	$obs_formula=$_POST['obs_formula'];

	include("config/conexion_new.php");

	if(isset($idmformula)){



		$sql_insertar="INSERT INTO detalle_formula_hosp(id_mformula_hosp, med, via, frec, dosis1, dosis2, dosis3, dosis4, cant_dosis, obs_formula)
		VALUES ('$idmformula', '$med', '$via', '$frec', '$dosis1', '$dosis2', '$dosis3', '$dosis4', '$cant_dosis', '$obs_formula')";
		echo $sql_insertar;
		$conex->query($sql_insertar);
		if($conex->errno) die($conex->error);

		mysqli_close($conex);


?>
		<script language = javascript>
		alert("Medicamento Guardado correctamente")
		self.location = "lista_medicamentos.php?idmformula=<?php echo $idmformula; ?>"
		</script>

<?php } else { ?>

		<script language = javascript>
		self.location = "lista_medicamentos.php?idmformula=<?php echo $idmformula; ?>"
		</script>

<?php } ?>
