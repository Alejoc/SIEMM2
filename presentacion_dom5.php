<?php
$subtitulo="";
	if(isset($_POST["operacion"])){	//nivel3
		if($_POST["aceptar"]!="Descartar"){
			//print_r($_FILES);
			$fotoE="";$fotoA1="";$fotoA2="";
			if (isset($_FILES["fotopac"])){
				if (is_uploaded_file($_FILES["fotopac"]["tmp_name"])){

					$cfoto=explode(".",$_FILES["fotopac"]["name"]);
					$archivo=$_POST["docpac"].".".$cfoto[count($cfoto)-1];

					if(move_uploaded_file($_FILES["fotopac"]["tmp_name"],LOG.PACIENTES.$archivo)){
						$fotoE=",fotopac='".PACIENTES.$archivo."'";
						$fotoA1=",fotopac";
						$fotoA2=",'".PACIENTES.$archivo."'";
						}
				}
			}
			switch ($_POST["operacion"]) {

			case 'PRES':
				$sql="INSERT INTO presentacion_dom (id_paciente,fpresentacion, tipo_paciente, ips_ordena, medico_ordena, dx_presentacion, estado_presentacion) VALUES
				('".$_POST["idpaci"]."','".$_POST["fpresentacion"]."','".$_POST["tipo_paciente"]."','".$_POST["ips_ordena"]."','".$_POST["medico_ordena"]."','".$_POST["dx"]."','Presentado')";
				$subtitulo="El formato de presentación al servicio domiciliario";
				$subtitulo1="Agregado";
			break;
			case 'PAC':
				$nom_completo=$_POST['nom1'].' '.$_POST['nom2'].' '.$_POST['ape1'].' '.$_POST['ape2'];
				$sql="INSERT INTO pacientes (tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,dir_pac,zonificacion,tel_pac,estado_pac,nom_completo) VALUES
				('".$_POST["tdocpac"]."','".$_POST["docpac"]."','".$_POST["nom1"]."','".$_POST["nom2"]."','".$_POST["ape1"]."','".$_POST["ape2"]."','".$_POST["dirpac"]."','".$_POST["zonificacion"]."','".$_POST["telpac"]."','Activo','$nom_completo')";
				$subtitulo="El paciente";
				$subtitulo1="Agregado";
			break;
		}
		echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="$subtitulo fue $subtitulo1 con exito!";
			$check='si';
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logo"])){
				unlink($fila["logo"]);
			}
			}
		}else{
			$subtitulo="$subtitulo NO fue $subtitulo1 con exito! !!! .";
			$check='no';
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {

			case 'PRES':
			$sql="SELECT id_paciente, tdoc_pac, doc_pac, nom1, nom2, ape1, ape2, fnacimiento, edad, uedad, dir_pac, tel_pac, email_pac, estadocivil, genero, rh, etnia, lateralidad, profesion, religion, fotopac, estado_pac, cie, descricie, zonapac, ipsordena FROM pacientes where id_paciente=".$_GET["idpac"];
			$boton="Agregar Presentacion";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='disabled';
			$date=date('Y-m-d');
			$return=138;
			$form1='formulariosDOM/add_presentacion.php';
			$form2='consulta_paciente.php';
			$subtitulo='Registro presentacion del paciente a servicio domiciliario ';
			break;
			case 'PAC':
			$sql="";
			$boton="Agregar Paciente";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='disabled';
			$date=date('Y-m-d');
			$return=138;
			$form1='formulariosDOM/add_paciente_dom.php';
			$form2='';
			$subtitulo='Registro datos básicos paciente ';
			break;
		}

		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){
				$fila=array("id_paciente"=>"", "tdoc_pac"=>"", "doc_pac"=>"", "nom1"=>"", "nom2"=>"", "ape1"=>"", "ape2"=>"", "fnacimiento"=>"", "edad"=>"", "uedad"=>"", "dir_pac"=>"", "tel_pac"=>"", "email_pac"=>"", "estadocivil"=>"", "genero"=>"", "rh"=>"", "etnia"=>"", "lateralidad"=>"", "profesion"=>"", "religion"=>"", "fotopac"=>"", "estado_pac"=>"", "cie"=>"", "descricie"=>"", "zonapac"=>"", "ipsordena"=>"");

			}
		}else{
				$fila=array("id_paciente"=>"", "tdoc_pac"=>"", "doc_pac"=>"", "nom1"=>"", "nom2"=>"", "ape1"=>"", "ape2"=>"", "fnacimiento"=>"", "edad"=>"", "uedad"=>"", "dir_pac"=>"", "tel_pac"=>"", "email_pac"=>"", "estadocivil"=>"", "genero"=>"", "rh"=>"", "etnia"=>"", "lateralidad"=>"", "profesion"=>"", "religion"=>"", "fotopac"=>"", "estado_pac"=>"", "cie"=>"", "descricie"=>"", "zonapac"=>"", "ipsordena"=>"");
			}

		?>
<script src = "js/sha3.js"></script>
		<script>
			function validar(){
				if (document.forms[0].docpac.value == ""){
					alert("Sin numero de identificacion NO es posible realizar el registro!");
					document.forms[0].docpac.focus();				// Ubicar el cursor
					return(false);
				}
				if (document.forms[0].nom1.value == ""){
					alert("El primer nombre del paciente es obligatorio!");
					document.forms[0].nom1.focus();				// Ubicar el cursor
					return(false);
				}
				if (document.forms[0].ape1.value == ""){
					alert("El primer apellido del paciente es obligatorio!");
					document.forms[0].ape1.focus();				// Ubicar el cursor
					return(false);
				}
			}
		</script>
		<section class="panel panel-default">
			<section class="panel-heading"><h4><?php echo $subtitulo;?></h4></section>
			<section>
				<?php include($form2);?>
			</section>
			<?php include($form1);?>
		</section>

<?php
}else{
	if ($check=='si') {
		echo '<div class="alert alert-success animated bounceInRight">';
		echo $subtitulo;
		echo '</div>';
	}else {
		echo '<div class="alert alert-danger animated bounceInRight">';
		echo $subtitulo;
		echo '</div>';
	}

// nivel 1?>
<section class="panel panel-default">
	<section class="panel-heading">
		<h3>Presentacion del paciente en servicio domiciliario</h3>
	</section>
<section class="panel-body">
<section class="panel panel-default" class="col-xs-7">
	<form class="navbar-form navbar-center" role="search">
    <section class="form-group col-xs-3">
      <input type="text" class="form-control" name="placa" placeholder="Digite Identificacion">
    </section>
    <input type="submit" name="buscar" class="btn btn-primary" value="Consultar">
    <input type="hidden" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
  </form>
	<form class="navbar-form navbar-center" role="search">
		<section class="form-group col-xs-3">
			<input type="text" class="form-control" name="nom" placeholder="Digite Nombre paciente">
		</section>
		<input type="submit" name="buscar" class="btn btn-primary" value="Consultar">
		<input type="hidden" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
	</form>
	</section>
<table class="table table-bordered">
	<caption>Creación de pacientes y presentación</caption>
	<thead class="thead-inverse ">
		<tr>
			<th class="text-center info">ID</th>
			<th class="text-center info">IDENTIFICACION</th>
			<th class="text-center info">NOMBRES Y APELLIDOS</th>
			<th class="text-center info">ACCION</th>
		</tr>
	</thead>
	<?php
	if (isset($_REQUEST["placa"])){
	$doc=$_REQUEST["placa"];
	$sql="SELECT id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac FROM pacientes WHERE doc_pac='".$doc."'";

	if ($tabla=$bd1->sub_tuplas($sql)){
		foreach ($tabla as $fila ) {
					echo"<tr >\n";
					echo'<td class="text-center">'.$fila["id_paciente"].'</td>';
					echo'<td class="text-center"><strong>'.$fila["tdoc_pac"].':</strong> '.$fila["doc_pac"].'</td>';
					echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
					echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=PRES&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-success sombra_movil" ><span class="fa fa-plus-circle"></span> Adicionar Presentacion</button></a></th>';
					echo "</tr>\n";
				}
			}
		}
if (isset($_REQUEST["nom"])){
$fecha=$_REQUEST["nom"];
$sql="SELECT id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac FROM pacientes WHERE nom_completo LIKE '%".$fecha."%'";

if ($tabla=$bd1->sub_tuplas($sql)){
	//echo $sql;
	foreach ($tabla as $fila ) {
		echo"<tr >\n";
		echo'<td class="text-center">'.$fila["id_paciente"].'</td>';
		echo'<td class="text-center"><strong>'.$fila["tdoc_pac"].':</strong> '.$fila["doc_pac"].'</td>';
		echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
		echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=PRES&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
		echo "</tr>\n";
	}
}
}
	?>

	<tr>
		<th colspan="14" class="text-center"><a href="<?php echo PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=PAC';?>"><button type="button" class="btn btn-primary" >Nuevo Paciente</button>
		</a></th>
	</tr>

</table>
</section>
<section class="panel-body">
	<table class="table table-bordered">
		<caption>Registro de procedimientos y profesionales -- Presentación de pacientes servicio domiciliarios</caption>
		<thead>
			<tr>
				<th class="text-center danger">ID</th>
				<th class="text-center danger">IDENTIFICACION</th>
				<th class="text-center danger">NOMBRE PACIENTE</th>
				<th class="text-center danger">UBICACION</th>
				<th class="text-center danger"><span class="fa fa-heartbeat"></span> Procedimientos</th>
				<th class="text-center danger"><span class="fa fa-user"></span> Profesionales</th>
				<th class="text-center danger"><span class="fa fa-check"></span> Aceptación</th>
			</tr>
		</thead>

		<?php

		$doc=$_REQUEST["placa"];
		$sql="SELECT a.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,dir_pac,barrio,localidad,ciudad,b.estado_presentacion FROM pacientes a INNER JOIN presentacion_dom b on a.id_paciente=b.id_paciente ";

		if ($tabla=$bd1->sub_tuplas($sql)){
			//echo $sql;
			foreach ($tabla as $fila ) {
				if ($fila['estado_presentacion']=='Presentado') {
					echo"<tr >\n";
					echo'<td class="text-center">'.$fila["id_paciente"].'</td>';
					echo'<td class="text-center"><strong>'.$fila["tdoc_pac"].':</strong> '.$fila["doc_pac"].'</td>';
					echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
					echo'<td class="text-center">'.$fila["dir_pac"].', '.$fila["barrio"].','.$fila["localidad"].', '.$fila["ciudad"].'</td>';
					echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=PROC&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
					echo'<th class="text-center"><span class="fa fa-ban"></span></th>';
					echo'<th class="text-center"><span class="fa fa-ban"></span></th>';
					echo "</tr>\n";
				}
				if ($fila['estado_presentacion']=='procedimientos') {
					echo"<tr >\n";
					echo'<td class="text-center">'.$fila["id_paciente"].'</td>';
					echo'<td class="text-center"><strong>'.$fila["tdoc_pac"].':</strong> '.$fila["doc_pac"].'</td>';
					echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
					echo'<td class="text-center">'.$fila["dir_pac"].', '.$fila["barrio"].','.$fila["localidad"].', '.$fila["ciudad"].'</td>';
					echo'<th class="text-center"><span class="fa fa-ban"></span></th>';
					echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=PROF&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
					echo'<th class="text-center"><span class="fa fa-ban"></span></th>';
					echo "</tr>\n";
				}
				if ($fila['estado_presentacion']=='profesional') {
					echo"<tr >\n";
					echo'<td class="text-center">'.$fila["id_paciente"].'</td>';
					echo'<td class="text-center"><strong>'.$fila["tdoc_pac"].':</strong> '.$fila["doc_pac"].'</td>';
					echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
					echo'<td class="text-center">'.$fila["dir_pac"].', '.$fila["barrio"].','.$fila["localidad"].', '.$fila["ciudad"].'</td>';
					echo'<th class="text-center"><span class="fa fa-ban"></span></th>';
					echo'<th class="text-center"><span class="fa fa-ban"></span></th>';
					echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=ACEP&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
					echo "</tr>\n";
				}
			}
		}

	?>
	</table>
</section>
</section>

	<?php
}
?>
