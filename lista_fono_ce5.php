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
			case 'VI':
				$sql="INSERT INTO fonoaudiologia_ce (id_adm_hosp, id_user, freg_fisio_ce, hreg_fisio_ce, motivo_consulta, ant_patologico, ant_traumaticos, ant_toxicologico, ant_quirurgico, ant_farmacologico, ant_ocupacional, ant_familiar, apoyo_dx, dolor, pf, sencibilidad, fosteomuscular, postura, marcha, dx_fisioterapeutico, pron_fisioterapeutico, plan_intervencion, obj_terapeutico, estado_fisio_ce) VALUES
				('".$_POST["id_adm_hosp"]."',
'".$_SESSION["AUT"]["id_user"]."',
'".$_POST["freg"]."',
'".$_POST["hreg"]."',
'".$_POST["tmuscular_i"]."',
'".$_POST["sencibilidad_i"]."',
'".$_POST["sfacial_i"]."',
'".$_POST["labios_i"]."',
'".$_POST["maxilar_i"]."',
'".$_POST["paladar_i"]."',
'".$_POST["sialorrea_i"]."',
'".$_POST["resp_i"]."',
'".$_POST["toclusion_i"]."',
'".$_POST["praxia1"]."',
'".$_POST["praxia2"]."',
'".$_POST["praxia3"]."',
'".$_POST["praxia4"]."',
'".$_POST["praxia5"]."',
'".$_POST["praxia6"]."',
'".$_POST["praxia7"]."',
'".$_POST["praxia8"]."',
'".$_POST["praxia9"]."',
'".$_POST["praxia10"]."',
'".$_POST["praxia11"]."',
'".$_POST["desa_lingue"]."',
'".$_POST["test_arti"]."',
'".$_POST["f_alimenticias"]."',
'".$_POST["nseman1"]."',
'".$_POST["nseman2"]."',
'".$_POST["nseman3"]."',
'".$_POST["nseman4"]."',
'".$_POST["nseman5"]."',
'".$_POST["nseman6"]."',
'".$_POST["nsintac1"]."',
'".$_POST["nsintac2"]."',
'".$_POST["nsintac3"]."',
'".$_POST["nsintac4"]."',
'".$_POST["nsintac5"]."',
'".$_POST["nsintac6"]."',
'".$_POST["nprag1"]."',
'".$_POST["nprag2"]."',
'".$_POST["nprag3"]."',
'".$_POST["nprag4"]."',
'".$_POST["nprag5"]."',
'".$_POST["nprag6"]."',
'".$_POST["nprag7"]."',
'".$_POST["nprag8"]."',
'".$_POST["senso1"]."',
'".$_POST["senso2"]."',
'".$_POST["senso3"]."',
'".$_POST["senso4"]."',
'".$_POST["senso5"]."',
'".$_POST["senso6"]."',
'".$_POST["senso7"]."',
'".$_POST["senso8"]."',
'".$_POST["codlectoescrito"]."',
'".$_POST["dxcomunicativo"]."','Realizada')";

			$subtitulo="Valoracion inicial";
				$subtitulo1="Adicionado";
				$subtitulo2="Fonoaudiologia";
			break;
			case 'EVO':
				$sql="INSERT INTO evo_fono_ce (id_adm_hosp, id_user, freg_evofono_ce, hreg_evofono_ce, evolucionfono_ce, estado_evofono_ce) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["evoto"]."','Realizada')";
				$subtitulo="EVolucion";
				$subtitulo1="Adicionado";
				$subtitulo2="Fonoaudiologia";
			break;
			case 'IM':
				$sql="INSERT INTO im_psico_reh (id_adm_hosp, id_user, freg_impsico_reh, hreg_impsico_reh, objetivo_impsico_reh, actrealizada_impsico_reh, logros_impsico_reh, plant_impsico_reh, estado_impsico_reh) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["fregimto"]."','".$_POST["hregimto"]."','".$_POST["obj"]."','".$_POST["act"]."','".$_POST["logro"]."','".$_POST["plant"]."','Realizada')";
				$subtitulo="Informe Mensual";
				$subtitulo1="Adicionado";
				$subtitulo2="Psicologia";
			break;
			case 'PT':
				$sql="INSERT INTO plantrimestral_psico_reh(id_adm_hosp, id_user, freg_ptpsico_reh, hreg_ptpsico_reh, obgen_psico_reh, obespec1_psico_reh, obespec2_psico_reh, obespec3_psico_reh, estado_ptpsico_reh) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["fregptto"]."','".$_POST["hregptto"]."','".$_POST["obgen_reh"]."','".$_POST["obespec1_reh"]."','".$_POST["obespec2_reh"]."','".$_POST["obespec3_reh"]."','Realizada')";
				$subtitulo="Plan Trimestral";
				$subtitulo1="Adicionado";
				$subtitulo2="Psicologia";
			break;
		}
		echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="El formato de $subtitulo en $subtitulo2 fue $subtitulo1 con exito!";
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
		case 'VI':
    $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
    b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
    j.nom_eps
    from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                left join eps j on (j.id_eps=b.id_eps)
    where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar Valoracion";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/valinifono_ce.php';
			$subtitulo='Valoracion inicial Fonoaudiologia';
			break;
			case 'EVO':
      $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
      b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
      j.nom_eps
      from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                  left join eps j on (j.id_eps=b.id_eps)
      where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar Evolucion";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/evo_fono_ce5.php';
			$subtitulo='Evolucion Diaria Fonoaudiologia';
			break;
			case 'IM':
      $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
      b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
      j.nom_eps
      from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                  left join eps j on (j.id_eps=b.id_eps)
      where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar Informe Mensual";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/impsico_reh5.php';
			$subtitulo='Informe Mensual Psicologia';
			break;
			case 'PT':
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
			$form1='formularios/planfono_reh.php';
			$subtitulo='Plan Trimestral Psicologia ';
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
<table class="table table-bordered">
	<tr>
		<th id="th-estilo1">ADMISIOoN</th>
		<th id="th-estilo1">IDENTIFICACION</th>
		<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
		<th id="th-estilo3">FECHA INGRESO</th>
		<th id="th-estilo3">FOTO</th>
		<th id="th-estilo4">Valoracion inicial</th>
		<th id="th-estilo4">Evolucion</th>

	</tr>

	<?php
	if (isset($_REQUEST["doc"])){
	$doc=$_REQUEST["doc"];
	$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE p.doc_pac='".$doc."' and a.estado_adm_hosp='Activo' and tipo_servicio='Consulta externa REH'";

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {

			echo"<tr >\n";
			echo'<td class="text-center">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
			echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center">'.$fila["fingreso_hosp"].' | '.$fila["hingreso_hosp"].'</td>';
			echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
			echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=VI&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
			echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=EVO&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';

			echo "</tr>\n";
		}
	}
}	if (isset($_REQUEST["nom"])){
	$doc=$_REQUEST["nom"];
	$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE p.nom1 LIKE '%".$doc."%' and a.estado_adm_hosp='Activo'  and tipo_servicio='Consulta externa REH'";

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {

			echo"<tr >\n";
			echo'<td class="text-center">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
			echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center">'.$fila["fingreso_hosp"].' | '.$fila["hingreso_hosp"].'</td>';
			echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
			echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=VI&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
			echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=EVO&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';

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
