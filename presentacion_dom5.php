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
			case 'E':
				$nom_completo=$_POST['nom1'].' '.$_POST['nom2'].' '.$_POST['ape1'].' '.$_POST['ape2'];
				$sql="UPDATE pacientes SET tdoc_pac='".$_POST["tdocpac"]."',doc_pac='".$_POST["docpac"]."',nom1='".$_POST["nom1"]."',nom2='".$_POST["nom2"]."',ape1='".$_POST["ape1"]."',ape2='".$_POST["ape2"]."',fnacimiento='".$_POST["user_date"]."',edad='".$_POST["edad"]."',uedad='".$_POST["uedad"]."',dir_pac='".$_POST["dirpac"]."',tel_pac='".$_POST["telpac"]."',email_pac='".$_POST["emailpac"]."',estadocivil='".$_POST["estadocivil"]."',genero='".$_POST["genero"]."',rh='".$_POST["rh"]."',etnia='".$_POST["etnia"]."',lateralidad='".$_POST["lateralidad"]."',profesion='".$_POST["profesion"]."',religion='".$_POST["religion"]."',estado_pac='".$_POST["estado_pac"]."', nom_completo='$nom_completo' where id_paciente=".$_POST["idpaci"];
				$subtitulo="Actualizado";
			break;
			case 'X':
				$sql="SELECT logo from cliente where id=".$_POST["idcli"];
				if (!$fila=$bd1->sub_fila($sql)){
					$fila=array("logo"=> "");
				}
				$sql="DELETE FROM cliente WHERE id_cliente=".$_POST["idcli"];
				$subtitulo="Eliminado";
			break;
			case 'A':
				$nom_completo=$_POST['nom1'].' '.$_POST['nom2'].' '.$_POST['ape1'].' '.$_POST['ape2'];
				$sql="INSERT INTO pacientes (tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fnacimiento,edad,uedad,dir_pac,tel_pac,email_pac,estadocivil,genero,rh,etnia,lateralidad,profesion$fotoA1,religion,estado_pac,nom_completo) VALUES
				('".$_POST["tdocpac"]."','".$_POST["docpac"]."','".$_POST["nom1"]."','".$_POST["nom2"]."','".$_POST["ape1"]."','".$_POST["ape2"]."','".$_POST["user_date"]."','".$_POST["edad"]."','".$_POST["uedad"]."','".$_POST["dirpac"]."','".$_POST["telpac"]."','".$_POST["emailpac"]."','".$_POST["estadocivil"]."','".$_POST["genero"]."','".$_POST["rh"]."','".$_POST["etnia"]."','".$_POST["lateralidad"]."','".$_POST["profesion"]."','".$_POST["religion"]."'$fotoA2,'".$_POST["estado_pac"]."','$nom_completo')";
				$subtitulo="Adicionado";
			break;
		}
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="El registro del paciente fue $subtitulo con exito!";
			$check='si';
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logo"])){
				unlink($fila["logo"]);
			}
			}
		}else{
			$subtitulo="El registro del paciente NO fue $subtitulo !!! .";
			$check='no';
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {
		case 'E':
			$sql="SELECT id_paciente, tdoc_pac, doc_pac, nom1, nom2, ape1, ape2, fnacimiento, edad, uedad, dir_pac, tel_pac, email_pac, estadocivil, genero, rh, etnia, lateralidad, profesion, religion, fotopac, estado_pac, cie, descricie, zonapac, ipsordena FROM pacientes where id_paciente=".$_GET["idpac"];
			$color="green";
			$boton="Actualizar";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$subtitulo='Edicion o actualizacion de datos del paciente';
			break;
			case 'PAC':
			$sql="SELECT id_paciente, tdoc_pac, doc_pac, nom1, nom2, ape1, ape2, fnacimiento, edad, uedad, dir_pac, tel_pac, email_pac, estadocivil, genero, rh, etnia, lateralidad, profesion, religion, fotopac, estado_pac, cie, descricie, zonapac, ipsordena FROM pacientes where id_paciente=".$_GET["idpac"];
			$color="red";
			$boton="Eliminar";
			$atributo1=' readonly="readonly"';
			$atributo2=' readonly="readonly"';
			$atributo3=' disabled="disabled"';
			$subtitulo='Eliminacion de paciente';
			break;
			case 'PAC':
			$sql="";
			$boton="Crear";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='disabled';
			$date=date('Y-m-d');
			$return=138;
			$form1='formulariosDOM/add_paciente1.php'
			$subtitulo='Registro datos básicos pacientes';
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
					alert("Sin número de identificación NO es posible realizar el registro!");
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
<div class="panel panel-default">
	<section class="panel-heading">
		<h1>Presentacion del paciente en servicio domiciliario</h1>
	</section>
<div class="panel-body">
	<section class="panel panel-default" class="col-xs-7">
		<form class="navbar-form navbar-center" role="search">
        	<section class="form-group col-xs-3">
          		<input type="text" class="form-control" name="placa" placeholder="Digite Identificación">
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
	<tr>
		<th id="th-estilo4">ID</th>
		<th id="th-estilo3">IDENTIFICACION</th>
		<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
		<th id="th-estilo4">Acciones</th>
	</tr>
	<?php
	if (isset($_REQUEST["placa"])){
	$doc=$_REQUEST["placa"];
	$sql="SELECT id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac FROM pacientes WHERE doc_pac='".$doc."'";

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
</div>
</div>

	<?php
}
?>
