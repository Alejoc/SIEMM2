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
			case 'HC':
			$tallat=$_POST["talla"] * $_POST["talla"];
			$imc=$_POST["peso"] / $tallat;
			$tam1=$_POST["tad"] * 2;
			$tam2=$tam1 + $_POST["tds"];
			$tamt=$tam2/3;
			$sql="INSERT INTO hc_hospitalario (id_adm_hosp,id_user,freg_hchosp,hreg_hchosp,motivo_consulta,enfer_actual,his_personal,his_familiar,perso_premorbida,ant_alergicos,ant_patologico,ant_quirurgico,ant_toxicologico,ant_farmaco,ant_gineco,ant_psiquiatrico,ant_hospitalario,ant_traumatologico,ant_familiar,otros_ant,estado_general,tad,tas,tam,fr,fc,so,peso,talla,temperatura,imc,cabcuello,torax,ext,abdomen,neurologico,genitourinario,examen_mental,analisis,finalidad,causa_externa,clasificacion_dx,dxp,ddxp,tdxp,dx1,ddx1,tdx1,dx2,ddx2,tdx2,dx3,ddx3,tdx3,plantratamiento,tipo_atencion,especialidad,estado_hchosp) VALUES
			('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["motivoconsulta"]."','".$_POST["enferactual"]."','".$_POST["hpersonal"]."','".$_POST["hfamiliar"]."','".$_POST["ppremorbida"]."','".$_POST["antalergico"]."','".$_POST["antpatologico"]."','".$_POST["antquirurgico"]."','".$_POST["anttoxicologicos"]."','".$_POST["antfarmacologico"]."','".$_POST["antgineco"]."','".$_POST["antpsiquiatrico"]."','".$_POST["anthospitalario"]."','".$_POST["anttrauma"]."','".$_POST["antfami"]."','".$_POST["antotros"]."','".$_POST["estadogen"]."','".$_POST["tad"]."','".$_POST["tas"]."','$tamt','".$_POST["fr"]."','".$_POST["fc"]."','".$_POST["sao2"]."','".$_POST["peso"]."','".$_POST["talla"]."','".$_POST["temperatura"]."','$imc','".$_POST["cabezacuello"]."','".$_POST["torax"]."','".$_POST["extsup"]."','".$_POST["abdomen"]."','".$_POST["neurologico"]."','".$_POST["genitourinario"]."','".$_POST["exmental"]."','".$_POST["analisis"]."','".$_POST["finconsulta"]."','".$_POST["causaexterna"]."','".$_POST["clasificacion_dx"]."','".$_POST["cdxp"]."','".$_POST["descridxp"]."','".$_POST["tdxp"]."','".$_POST["cdx1"]."','".$_POST["descridx1"]."','".$_POST["tdx1"]."','".$_POST["cdx2"]."','".$_POST["descridx2"]."','".$_POST["tdx2"]."','".$_POST["cdx3"]."','".$_POST["descridx3"]."','".$_POST["tdx3"]."','".$_POST["plant"]."','Hospitalario','".$_SESSION["AUT"]["especialidad"]."','Realizada')";
				$subtitulo="Historia Clinica de ingreso";
				$subtitulo1="Adicionado";

			break;
			case 'EVO':
				$sql="INSERT INTO evolucion_medica (id_adm_hosp,id_user,freg_evomed,hreg_evomed,objetivo,subjetivo,analisis_evomed,plan_tratamiento,remision_sintomas,conciencia_enfermedad,adherencia_terapeutica,dxp,ddxp,tdxp,dx1,ddx1,tdx1,dx2,ddx2,tdx2,resp_evomed,estado_evomed) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["objetivo"]."','".$_POST["subjetivo"]."','".$_POST["analisis"]."','".$_POST["plantratamiento"]."','".$_POST["remision_sintomas"]."','".$_POST["conciencia_enfermedad"]."','".$_POST["adherencia_terapeutica"]."','".$_POST["cdxp"]."','".$_POST["descridxp"]."','".$_POST["tdxp"]."','".$_POST["cdx1"]."','".$_POST["descridx1"]."','".$_POST["tdx1"]."','".$_POST["cdx2"]."','".$_POST["descridx2"]."','".$_POST["tdx2"]."','".$_SESSION["AUT"]["nombre"]."','Realizada')";
				$subtitulo="Evolución Medica";
				$subtitulo1="Adicionado";
			break;
			case 'ADX':
				$sql="INSERT INTO ord_med_hosp (id_adm_hosp, id_user, freg_ord_med_hosp, hreg_ord_med_hosp, ts_ord_med_hosp, procedimiento, obs_proc, procedimiento1, obs_proc1, procedimiento2, obs_proc2, procedimiento3, obs_proc3, procedimiento4, obs_proc4, procedimiento5, obs_proc5, procedimiento6, obs_proc6, procedimiento7, obs_proc7, estado_ord_med_hosp) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["tiposervicio"]."','".$_POST["cups"]."','".$_POST["obs_proc"]."','".$_POST["cups1"]."','".$_POST["obs_proc1"]."','".$_POST["cups2"]."','".$_POST["obs_proc2"]."','".$_POST["cups3"]."','".$_POST["obs_proc3"]."','".$_POST["cups4"]."','".$_POST["obs_proc4"]."','".$_POST["cups5"]."','".$_POST["obs_proc5"]."','".$_POST["cups6"]."','".$_POST["obs_proc6"]."','".$_POST["cups7"]."','".$_POST["obs_proc7"]."','Realizada')";
				$subtitulo="Ordenes Medicas";
				$subtitulo1="Adicionado";
			break;
			case 'ORDVER':
				$sql="INSERT INTO orden_verbal( id_adm_hosp, id_user, freg_ord_verbal, hreg_ord_verbal, orden_verbal, estado_orden_verbal) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["ordverb"]."','Realizada')";
				$subtitulo="Orden Verbal";
				$subtitulo1="Adicionada";
			break;
		}
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="El formato de $subtitulo fue $subtitulo1 con exito!";
		$check='si';
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logo"])){
				unlink($fila["logo"]);
			}
			}
		}else{
			$subtitulo="El formato de $subtitulo en $subtitulo2 NO fue $subtitulo1 !!! .";
		$check='no';
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {
		case 'HC':
    $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
    b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
    j.nom_eps
    from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                left join eps j on (j.id_eps=b.id_eps)
    where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar HC ingreso";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/hc_hospitalaria.php';
			$subtitulo='Historia Clinica de ingreso';
			break;
			case 'EVO':
      $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
      b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
      j.nom_eps
      from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                  left join eps j on (j.id_eps=b.id_eps)
      where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar Evolución Medica";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/evo_medhosp.php';
			$subtitulo='Evolución Medica';
			break;
			case 'ADX':
      $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
      b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
      j.nom_eps
      from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                  left join eps j on (j.id_eps=b.id_eps)
      where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar Ayuda Diagnostica";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/ord_med_hosp.php';
			$subtitulo='Solicitud de Ordenes Medicas Hospitalarias (Procedimientos y laboratorios)';
			break;
			case 'MED':
      $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
      b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
      j.nom_eps
      from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                  left join eps j on (j.id_eps=b.id_eps)
      where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar Plan tratamiento";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/planto_reh.php';
			$subtitulo='Solicitud de Medicamentos y/o insumos';
			break;
			case 'RES':
      $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
      b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
      j.nom_eps
      from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                  left join eps j on (j.id_eps=b.id_eps)
      where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar Plan tratamiento";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/planto_reh.php';
			$subtitulo='Plan Trimestral Terapia Ocupacional';
			break;
			case 'EPI':
      $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
      b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
      j.nom_eps
      from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                  left join eps j on (j.id_eps=b.id_eps)
      where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar Epicrisis";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/epicrisis.php';
			$subtitulo='Plan Trimestral Terapia Ocupacional';
			break;
			case 'ORDVER':
			$sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
			b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
			j.nom_eps
			from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
									left join eps j on (j.id_eps=b.id_eps)
			where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar Orden Verbal";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/ordenverbal.php';
			$subtitulo='Orden verbal';
			break;

		}
//echo $sql;
		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){
				$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","edad"=>"","fnacimiento"=>"","dir_pac"=>"","tel_pac"=>"","rh"=>"","email_pac"=>"","genero"=>"","lateralidad"=>"","religion"=>"","fotopac"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","fegreso_hosp"=>"","hegreso_hosp"=>"", "nom_eps"=>"");
			}
		}else{
				$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","edad"=>"","fnacimiento"=>"","dir_pac"=>"","tel_pac"=>"","rh"=>"","email_pac"=>"","genero"=>"","lateralidad"=>"","religion"=>"","fotopac"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","fegreso_hosp"=>"","hegreso_hosp"=>"", "nom_eps"=>"");
			}

		?>
<script src = "js/sha3.js"></script>
		<script>
			function validar(){
				if (document.forms[0].hreg.value > document.forms[0].fecha.value){
					alert("Enfermero (a) <?php echo $_SESSION["AUT"]["nombre"]?>, NO puede adelantar el tiempo.");
					document.forms[0].hreg.focus();				// Ubicar el cursor
					return(false);
				}
			}
		</script>
		<script type="text/javascript" src="/js/jquery.js"></script>
		<div class="alert alert-info animated bounceInRight">
			<?php echo $subtitulo;?>
		</div>
		<?php include($form1);?>

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
<div class="panel-default">
<div class="panel-body">
	<section class="panel panel-default" class="col-xs-7">
		<form class="navbar-form navbar-center" role="search" >
        	<section class="form-group col-xs-3">
          		<input type="text" class="form-control" name="doc" placeholder="Digite Identificacion">
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
			<th id="th-estilo4">Herramientas</th>
			<th id="th-estilo1">ADMISIÓN</th>
			<th id="th-estilo1">IDENTIFICACIÓN</th>
			<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
			<th id="th-estilo3">FECHA INGRESO</th>
			<th id="th-estilo3">HORA INGRESO</th>
			<th id="th-estilo3">SERVICIO</th>
			<th id="th-estilo3">FOTO</th>
			<th id="th-estilo4">HC Ingreso</th>
			<th id="th-estilo4">Evolución</th>
			<th id="th-estilo4">Ayudas DX</th>
			<th id="th-estilo4">Formulacion</th>
			<th id="th-estilo4">Resumen HC</th>
			<th id="th-estilo4">Epicrisis</th>
		</tr>

		<?php
		if (isset($_REQUEST["doc"])){
		$doc=$_REQUEST["doc"];
		$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_servicio,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE p.doc_pac='".$doc."' and a.estado_adm_hosp='Activo' and tipo_servicio='Hospitalario'";

		if ($tabla=$bd1->sub_tuplas($sql)){
			//echo $sql;
			foreach ($tabla as $fila ) {
				echo"<tr >	\n";
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=ORDVER&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-inverse sombra_movil" ><span class="fa fa-bullhorn"></span></button></a></th>';
				echo'<td class="text-center">'.$fila["id_adm_hosp"].'</td>';
				echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
				echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
				echo'<td class="text-center">'.$fila["fingreso_hosp"].'</td>';
				echo'<td class="text-center">'.$fila["hingreso_hosp"].'</td>';
				echo'<td class="text-center">'.$fila["tipo_servicio"].'</td>';
				echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=HC&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=EVO&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-stethoscope"></span></button></a></th>';
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=ADX&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-success sombra_movil" ><span class="fa fa-flask"></span></button></a></th>';
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=MED&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-success sombra_movil" ><span class="fa fa-toggle-on"></span></button></a></th>';
				echo'<th class="text-center" ><a href="rpt_hcingreso.php?idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-danger sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
				echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=37&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-share"></span></button></a></th>';
				echo "</tr>\n";
			}
		}
	}
	if (isset($_REQUEST["nom"])){
		$doc=$_REQUEST["nom"];
		$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_servicio,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE p.nom1 LIKE '%".$doc."%' and a.estado_adm_hosp='Activo' and tipo_servicio='Hospitalario'";

		if ($tabla=$bd1->sub_tuplas($sql)){
			//echo $sql;
			foreach ($tabla as $fila ) {

				echo"<tr >	\n";
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=ORDVER&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-inverse sombra_movil" ><span class="fa fa-bullhorn"></span></button></a></th>';
				echo'<td class="text-center">'.$fila["id_adm_hosp"].'</td>';
				echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
				echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
				echo'<td class="text-center">'.$fila["fingreso_hosp"].'</td>';
				echo'<td class="text-center">'.$fila["hingreso_hosp"].'</td>';
				echo'<td class="text-center">'.$fila["tipo_servicio"].'</td>';
				echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=HC&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=EVO&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-stethoscope"></span></button></a></th>';
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=ADX&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-success sombra_movil" ><span class="fa fa-flask"></span></button></a></th>';
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=MED&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-success sombra_movil" ><span class="fa fa-toggle-on"></span></button></a></th>';
				echo'<th class="text-center" ><a href="rpt_hcingreso.php?idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-danger sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
				echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=37&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-share"></span></button></a></th>';
				echo "</tr>\n";
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
