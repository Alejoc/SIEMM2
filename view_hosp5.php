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
				$sql="INSERT INTO val_psico_reh (id_adm_hosp, id_user, freg_valinipsico_reh, hreg_valinipsico_reh, leng_comprensivo, leng_expresivo, comportamiento1, comportamiento2, comportamiento3, aemocional1, aemocional2, reconoce1, reconoce2, reconoce3, reconoce4, reconoce5, reconoce6, reper_social, atencion1, atencion2, atencion3, atencion4, atencion5, carac_atencion, memoria1, memoria2, rela_medio1, rela_medio2, rela_medio3, rela_medio4, rel_familiar, pauta_crianza, escolaridad, e_mental, estado_valinipsico_reh) VALUES
				('".$_POST["idadmhosp"]."',
'".$_SESSION["AUT"]["id_user"]."',
'".$_POST["freg"]."',
'".$_POST["hreg"]."',
'".$_POST["leng_comprensivo"]."',
'".$_POST["leng_expresivo"]."',
'".$_POST["comportamiento1"]."',
'".$_POST["comportamiento2"]."',
'".$_POST["comportamiento3"]."',
'".$_POST["aemocional1"]."',
'".$_POST["aemocional2"]."',
'".$_POST["reconoce1"]."',
'".$_POST["reconoce2"]."',
'".$_POST["reconoce3"]."',
'".$_POST["reconoce4"]."',
'".$_POST["reconoce5"]."',
'".$_POST["reconoce6"]."',
'".$_POST["reper_social"]."',
'".$_POST["atencion1"]."',
'".$_POST["atencion2"]."',
'".$_POST["atencion3"]."',
'".$_POST["atencion4"]."',
'".$_POST["atencion5"]."',
'".$_POST["carac_atencion"]."',
'".$_POST["memoria1"]."',
'".$_POST["memoria2"]."',
'".$_POST["rela_medio1"]."',
'".$_POST["rela_medio2"]."',
'".$_POST["rela_medio3"]."',
'".$_POST["rela_medio4"]."',
'".$_POST["rel_familiar"]."',
'".$_POST["pauta_crianza"]."',
'".$_POST["escolaridad"]."',
'".$_POST["e_mental"]."',
'Realizada')";
				$subtitulo="Valoración inicial";
				$subtitulo1="Adicionado";
				$subtitulo2="Psicologia";
			break;
			case 'EVO':
				$sql="INSERT INTO evo_psico_reh ( id_adm_hosp, id_user, freg_evopsico_reh, hreg_evopsico_reh, evolucionpsico_reh, estado_evopsico_reh) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["evoto"]."','Realizada')";
				$subtitulo="EVolución";
				$subtitulo1="Adicionado";
				$subtitulo2="Psicologia";
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
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="El formato de $subtitulo en $subtitulo2 fue $subtitulo1 con exito!";
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logo"])){
				unlink($fila["logo"]);
			}
			}
		}else{
			$subtitulo="El formato de $subtitulo en $subtitulo2 NO fue $subtitulo1 !!! .";
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
			$boton="Agregar Valoración";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/valinipsico__reh.php';
			$subtitulo='Valoracion inicial Psicologia';
			break;
			case 'EVO':
      $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
      b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
      j.nom_eps
      from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                  left join eps j on (j.id_eps=b.id_eps)
      where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar Evolución";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/evo_psico_reh5.php';
			$subtitulo='Evolución Diaria Psicologia';
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
	echo '<div class="alert alert-success animated bounceInRight">';
	echo $subtitulo;
	echo '</div>';
// nivel 1?>
<div class="panel-default">
<div class="panel-body">

<table class="table table-bordered">
	<tr>
		<th id="th-estilo1">Nombre completo</th>
		<th id="th-estilo2">Identificacion</th>
		<th id="th-estilo3">Proccedimiento</th>
		<th id="th-estilo3">Acciones</th>

	</tr>

	<?php
	if (isset($_REQUEST["idpac"])){
	$idpac=$_REQUEST["idpac"];
	$sql="SELECT a.id_paciente,nom1,nom2,ape1,ape2,doc_pac,b.id_adm_hosp,c.id_ord_med_hosp,procedimiento FROM pacientes a inner join adm_hospitalario b on a.id_paciente=b.id_paciente inner join `ord_med_hosp` c on c.id_adm_hosp=b.id_adm_hosp WHERE a.id_paciente=".$idpac;

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {
			echo"<tr>\n";
		  echo'<td class="text-right">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
		  echo'<td class="text-left">'.$fila["doc_pac"].'</td>';
		  echo'<td class="text-left">'.$fila["procedimiento"].'</td>';
			echo'<td class="text-left hidden">'.$fila["id_ord_med_hosp"].'</td>';
		  $id=$fila['id_ord_med_hosp'];
		  $idadm=$fila['id_adm_hosp'];
		  echo'<th class="text-center" ><a href="rpt_ordenhosp.php?idadmhosp='.$idadm.'&idordhosp='.$id.'"><button type="button" class="btn btn-primary sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
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
