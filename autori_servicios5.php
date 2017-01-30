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

			case 'A':
				$sql="INSERT INTO autorizacion_hosp (id_adm_hosp, finicial, ffinal, num_autorizacion, clase_usuario,zeps, codx_autorizacion, dx_autorizacion, estado_autorizacion) VALUES
				('".$_POST["idadmhosp"]."','".$_POST["finicial"]."','".$_POST["ffinal"]."','".$_POST["numautori"]."','".$_POST["cusuario"]."','".$_POST["zeps"]."','".$_POST["cdxp"]."','".$_POST["descridxp"]."','Realizada')";
				$subtitulo="Adicionado";
			break;
			case 'E':
				$sql="INSERT INTO hc_hospitalario (id_adm_hosp,freg_hchosp,hreg_hchosp,motivo_consulta,enfer_actual,his_personal,his_familiar,perso_premorbida,ant_personales,ant_patologico,ant_quirurgico,ant_toxicologico,ant_farmaco,ant_gineco,ant_psiquiatrico,ant_hospitalario,ant_traumatologico,ant_familiar,otros_ant,estado_general,ta,fr,fc,so,peso,talla,temperatura,imc,cabcuello,torax,ext_superiores,ext_inferiores,abdomen,neurologico,cardiopulmunar,genitourinario,examen_mental,analisis,finalidad,causa_externa,plantratamiento,Resp_hchosp,especialidad,estado_hchosp) VALUES
				('".$_POST["idadmhosp"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["motivoconsulta"]."','".$_POST["enferactual"]."','".$_POST["hpersonal"]."','".$_POST["hfamiliar"]."','".$_POST["ppremorbida"]."','".$_POST["antpersonal"]."','".$_POST["antpatologico"]."','".$_POST["antquirurgico"]."','".$_POST["anttoxicologicos"]."','".$_POST["antfarmacologico"]."','".$_POST["antgineco"]."','".$_POST["antpsiquiatrico"]."','".$_POST["anthospitalario"]."','".$_POST["anttrauma"]."','".$_POST["antfami"]."','".$_POST["antotros"]."','".$_POST["estadogen"]."','".$_POST["ta"]."','".$_POST["fr"]."','".$_POST["fc"]."','".$_POST["sao2"]."','".$_POST["peso"]."','".$_POST["talla"]."','".$_POST["temperatura"]."','".$_POST["imc"]."','".$_POST["cabezacuello"]."','".$_POST["torax"]."','".$_POST["extsup"]."','".$_POST["extinfe"]."','".$_POST["abdomen"]."','".$_POST["neurologico"]."','".$_POST["cardiopulmonar"]."','".$_POST["genitourinario"]."','".$_POST["exmental"]."','".$_POST["analisis"]."','".$_POST["finconsulta"]."','".$_POST["causaexterna"]."','".$_POST["plant"]."','".$_SESSION["AUT"]["nombre"]."','".$_SESSION["AUT"]["especialidad"]."','Realizada')";
				$subtitulo="Adicionado";
			break;
		}
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="El registro fue $subtitulo con exito!";
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logo"])){
				unlink($fila["logo"]);
			}
			}
		}else{
			$subtitulo="El registro NO fue $subtitulo !!! .";
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {
		case 'A':
			$sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
			b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
			j.nom_eps,
			k.descripdep,
			from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
									left join eps j on (j.id_eps=b.id_eps)
									left join departamento k on (k.coddep=b.dep_residencia)
			where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			echo $sql;
			$boton="Crear Autorización";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$form1='formularios/creaautori.php';
			$subtitulo='Creación de autorización externa';
			break;
			case 'E':
			$sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
      b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
      j.nom_eps,
			k.descripdep,
      from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                  left join eps j on (j.id_eps=b.id_eps)
									left join departamento k on (k.coddep=b.dep_residencia)
      where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Actualizar Autorizacion";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$form1='formularios/detalleautoriext_reh.php';
			$subtitulo='Generación detalles autorización Externa';
			break;
		}
//echo $sql;
		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){
				$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","edad"=>"","fnacimiento"=>"","dir_pac"=>"","tel_pac"=>"","rh"=>"","email_pac"=>"","genero"=>"","lateralidad"=>"","religion"=>"","fotopac"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","fegreso_hosp"=>"","hegreso_hosp"=>"", "nom_eps"=>"", "descripdep"=>"");
			}
		}else{
				$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","edad"=>"","fnacimiento"=>"","dir_pac"=>"","tel_pac"=>"","rh"=>"","email_pac"=>"","genero"=>"","lateralidad"=>"","religion"=>"","fotopac"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","fegreso_hosp"=>"","hegreso_hosp"=>"", "nom_eps"=>"", "descripdep"=>"");
			}

		?>
<script src = "js/sha3.js"></script>
		<script>
			function validar(){
				if (document.forms[0].nom_cliente.value == ""){
					alert("Se requiere el nombre del cliente!");
					document.forms[0].nom_cliente.focus();				// Ubicar el cursor
					return(false);
				}
			}
		</script>
		<script type="text/javascript" src="/js/jquery.js"></script>
		<?php include($form1);?>

<?php
}else{
	echo $subtitulo;
// nivel 1?>
<div class="panel panel-default">
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
<table class="table table-responsive">
	<tr>
		<th id="th-estilo4">Edicion Autorización</th>
		<th id="th-estilo2">ID</th>
		<th id="th-estilo2">ADMISIÓN</th>
		<th id="th-estilo3">TIPO DOCUMENTO</th>
		<th id="th-estilo1">IDENTIFICACIÓN</th>
		<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
		<th id="th-estilo2">TIPO SERVICIO</th>
		<th id="th-estilo3">EPS</th>
		<th id="th-estilo4">Generar Autorización</th>

	</tr>

	<?php
	if (isset($_REQUEST["placa"])){
	$doc=$_REQUEST["placa"];
	$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,
	a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_servicio,
	s.nom_sedes,
	e.nom_eps
	FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente
									 LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips
									 LEFT JOIN eps e on a.id_eps=e.id_eps
	WHERE p.doc_pac='".$doc."' and a.estado_adm_hosp='Activo'";

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {
			if ($fila["tipo_servicio"]=="Hospitalario"){
				echo"<tr >\n";
				echo'<th class="text-center alert-success" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&idpac='.$fila["id_paciente"].'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning" ><span class="fa fa-edit"></span></button></a></th>';
				echo'<td class="text-center alert-success">'.$fila["id_paciente"].'</td>';
				echo'<td class="text-center alert-success">'.$fila["id_adm_hosp"].'</td>';
				echo'<td class="text-center alert-success">'.$fila["tdoc_pac"].'</td>';
				echo'<td class="text-center alert-success">'.$fila["doc_pac"].'</td>';
				echo'<td class="text-center alert-success">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
				echo'<td class="text-center alert-success">'.$fila["tipo_servicio"].'</td>';
				echo'<td class="text-center alert-success">'.$fila["nom_eps"].'</td>';
				echo'<th class="text-center alert-success" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idpac='.$fila["id_paciente"].'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary" ><span class="fa fa-tags"></span></button></a></th>';
				echo "</tr>\n";
		}

	if ($fila["tipo_servicio"]=="Rehabilitacion"){
		echo"<tr >\n";
		echo'<th class="text-center alert-danger" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&idpac='.$fila["id_paciente"].'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning" ><span class="fa fa-edit"></span></button></a></th>';
		echo'<td class="text-center alert-danger">'.$fila["id_paciente"].'</td>';
		echo'<td class="text-center alert-danger">'.$fila["id_adm_hosp"].'</td>';
		echo'<td class="text-center alert-danger">'.$fila["tdoc_pac"].'</td>';
		echo'<td class="text-center alert-danger">'.$fila["doc_pac"].'</td>';
		echo'<td class="text-center alert-danger">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
		echo'<td class="text-center alert-danger">'.$fila["tipo_servicio"].'</td>';
		echo'<td class="text-center alert-danger">'.$fila["nom_eps"].'</td>';
		echo'<th class="text-center alert-danger" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idpac='.$fila["id_paciente"].'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary" ><span class="fa fa-tags"></span></button></a></th>';
		echo "</tr>\n";
	}
	if ($fila["tipo_servicio"]=="Domiciliarios"){
		echo"<tr >\n";
		echo'<th class="text-center alert-info" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&idpac='.$fila["id_paciente"].'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning" ><span class="fa fa-edit"></span></button></a></th>';
		echo'<td class="text-center alert-info">'.$fila["id_paciente"].'</td>';
		echo'<td class="text-center alert-info">'.$fila["id_adm_hosp"].'</td>';
		echo'<td class="text-center alert-info">'.$fila["tdoc_pac"].'</td>';
		echo'<td class="text-center alert-info">'.$fila["doc_pac"].'</td>';
		echo'<td class="text-center alert-info">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
		echo'<td class="text-center alert-info">'.$fila["tipo_servicio"].'</td>';
		echo'<td class="text-center alert-info">'.$fila["nom_eps"].'</td>';
		echo'<th class="text-center alert-info" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idpac='.$fila["id_paciente"].'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary" ><span class="fa fa-tags"></span></button></a></th>';
		echo "</tr>\n";
	}
		}
	}
}
if (isset($_REQUEST["nom"])){
$nom=$_REQUEST["nom"];
$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_servicio,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE p.nom1 LIKE '%".$nom."%' and a.estado_adm_hosp='Activo'";

if ($tabla=$bd1->sub_tuplas($sql)){
	//echo $sql;
	foreach ($tabla as $fila ) {
		if ($fila["tipo_servicio"]=="Hospitalario"){
			echo"<tr >\n";
			echo'<th class="text-center alert-success" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idpac='.$fila["id_paciente"].'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning" ><span class="fa fa-edit"></span></button></a></th>';
			echo'<td class="text-center alert-success">'.$fila["id_paciente"].'</td>';
			echo'<td class="text-center alert-success">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center alert-success">'.$fila["tdoc_pac"].'</td>';
			echo'<td class="text-center alert-success">'.$fila["doc_pac"].'</td>';
			echo'<td class="text-center alert-success">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center alert-success">'.$fila["tipo_servicio"].'</td>';
			echo'<td class="text-center alert-success"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
			echo'<th class="text-center alert-success"  ><a href="'.PROGRAMA.'?opcion=56&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-tags"></span></button></a></th>';
			echo "</tr>\n";
	}
	if ($fila["tipo_servicio"]=="Consulta Externa SM"){
		echo"<tr >\n";
		echo'<th class="text-center alert-info" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idpac='.$fila["id_paciente"].'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning" ><span class="fa fa-edit"></span></button></a></th>';
		echo'<td class="text-center alert-info">'.$fila["id_paciente"].'</td>';
		echo'<td class="text-center alert-info">'.$fila["id_adm_hosp"].'</td>';
		echo'<td class="text-center alert-info">'.$fila["tdoc_pac"].'</td>';
		echo'<td class="text-center alert-info">'.$fila["doc_pac"].'</td>';
		echo'<td class="text-center alert-info">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
		echo'<td class="text-center alert-info">'.$fila["tipo_servicio"].'</td>';
		echo'<td class="text-center alert-info"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
		echo'<th class="text-center alert-info"  ><a href="'.PROGRAMA.'?opcion=56&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-tags"></span></button></a></th>';
		echo "</tr>\n";
}
if ($fila["tipo_servicio"]=="Rehabilitacion"){
	echo"<tr >\n";
	echo'<th class="text-center alert-warning" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idpac='.$fila["id_paciente"].'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning" ><span class="fa fa-edit"></span></button></a></th>';
	echo'<td class="text-center alert-warning">'.$fila["id_paciente"].'</td>';
	echo'<td class="text-center alert-warning">'.$fila["id_adm_hosp"].'</td>';
	echo'<td class="text-center alert-warning">'.$fila["tdoc_pac"].'</td>';
	echo'<td class="text-center alert-warning">'.$fila["doc_pac"].'</td>';
	echo'<td class="text-center alert-warning">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
	echo'<td class="text-center alert-warning">'.$fila["tipo_servicio"].'</td>';
	echo'<td class="text-center alert-warning"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
	echo'<th class="text-center alert-warning"  ><a href="'.PROGRAMA.'?opcion=56&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-tags"></span></button></a></th>';
	echo "</tr>\n";
}
if ($fila["tipo_servicio"]=="Domiciliarios"){
	echo"<tr >\n";
	echo'<th class="text-center alert-danger" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idpac='.$fila["id_paciente"].'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning" ><span class="fa fa-edit"></span></button></a></th>';
	echo'<td class="text-center alert-danger">'.$fila["id_paciente"].'</td>';
	echo'<td class="text-center alert-danger">'.$fila["id_adm_hosp"].'</td>';
	echo'<td class="text-center alert-danger">'.$fila["tdoc_pac"].'</td>';
	echo'<td class="text-center alert-danger">'.$fila["doc_pac"].'</td>';
	echo'<td class="text-center alert-danger">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
	echo'<td class="text-center alert-danger">'.$fila["tipo_servicio"].'</td>';
	echo'<td class="text-center alert-danger"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
	echo'<th class="text-center alert-danger"  ><a href="'.PROGRAMA.'?opcion=56&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-tags"></span></button></a></th>';
	echo "</tr>\n";
}

	}
}
}
	?>

</table>
</div>
</div>
	<?php
}
?>
