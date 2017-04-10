<?php
	//Recibimos datos
	$idsede=$_POST['idsede'];
	$id_adm_hosp = $_POST['idadmhosp'];
	$id_bodega = $_POST['idbodega'];
	$id_user = $_POST['id_user'];
	$fcreacion = date('Y-m-d');
	$fejecucion = $_POST['fejecucion'];
	$tipo_formula = $_POST['tipo_formula'];
	$estado_mformula_hosp = 'Formulada';

	include("config/conexion_new.php");

	if(isset($id_adm_hosp)){



		$sql_insertar="INSERT INTO maestro_formula_hosp(id_adm_hosp, id_bodega, id_user, fcreacion, fejecucion, tipo_formula, estado_mformula_hosp)
		VALUES ('$id_adm_hosp','$id_bodega','$id_user','$fcreacion','$fejecucion','$tipo_formula','$estado_mformula_hosp')";
		echo $sql_insertar;
		$conex->query($sql_insertar);
		if($conex->errno) die($conex->error);

		mysqli_close($conex);


?>
		<script language = javascript>
		alert("Formula Guardada correctamente")
		self.location = "lista_formulas.php?idadmhosp=<?php echo $id_adm_hosp; ?>&idsede=<?php echo $idsede; ?>&user=<?php echo $id_user; ?>"
		</script>

<?php } else { ?>

		<script language = javascript>
		self.location = "lista_formulas.php?idadmhosp=<?php echo $id_adm_hosp; ?>&idsede=<?php echo $idsede; ?>&user=<?php echo $id_user; ?>"
		</script>

<?php } ?>
