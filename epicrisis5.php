<?php
$subtitulo="";
	if(isset($_POST["operacion"])){	//nivel3
		if($_POST["aceptar"]!="Descartar"){
			//print_r($_FILES);

			switch ($_POST["operacion"]) {
			case 'E':
			$sql="INSERT INTO epicrisis (id_hchosp,id_user,freg_epicrisis,hreg_epicrisis,cdxp_epi,ddxp_epi,tdxp_epi,subjetivo_epicrisis,objetivo_epicrisis, analisis_epicrisis,plant_epicrisis) VALUES
			('".$_POST["idhc"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["fregepi"]."','".$_POST["hregepi"]."','".$_POST["dx"]."','".$_POST["dx"]."','".$_POST["tdxp"]."','".$_POST["subjetivoepi"]."','".$_POST["objetivoepi"]."','".$_POST["analisisepi"]."','".$_POST["plantratamientoepi"]."')";
			$subtitulo="Adicionada";
			break;
			case 'A':


			break;
		}
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="Epicrisis $subtitulo con exito!";
		}else{
			$subtitulo="Epicrisis NO fue $subtitulo !!! .";
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {
		case 'E':
			$sql="SELECT id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fnacimiento,edad,uedad,dir_pac,tel_pac,email_pac,estadocivil,etnia,lateralidad,profesion,religion,fotopac FROM pacientes where id_paciente=".$_GET["id_pac"];

			$color="green";
			$boton="Agregar Epicrisis";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$subtitulo='';
			$date=date('Y/m/d');
			$date1=date('H:i');
			$freg='hidden';
			$freg1='text';
			$valor='hidden';
			$valor1='text';
			$ext='text';

			break;

			case 'A':
			$sql="";
			$color="yellow";
			$boton="Crear";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$subtitulo='Adicionar lista';
			$date=date('Y/m/d');
			$date1=date('H:i');
			$valor='visible';
			$valor1='hidden';
			$freg1='hidden';
			$freg='text';
			$ext='date';
			break;
		}
		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){
				$fila=array("id_paciente"=>"","tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","fnacimiento"=>"","edad"=>"","uedad"=>"","dir_pac"=>"","tel_pac"=>"","email_pac="=>"","estadocivil="=>"","fotopac"=>"");
			}
		}else{
				$fila=array("id_paciente"=>"","tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","fnacimiento"=>"","edad"=>"","uedad"=>"","dir_pac"=>"","tel_pac"=>"","email_pac="=>"","estadocivil="=>"","fotopac"=>"");
			}
		?>
		<script src = "js/sha3.js"></script>
				<script>
					function validar(){
						if (document.forms[0].subjetivoepi.value == ""){
							alert("Doctor(a) olvido diligenciar el campo 'SUBJETIVO' ");
							document.forms[0].subjetivoepi.focus();				// Ubicar el cursor
							return(false);
						}
						if (document.forms[0].objetivoepi.value == ""){
							alert("Doctor(a) olvido diligenciar el campo 'OBJETIVO' ");
							document.forms[0].objetivoepi.focus();				// Ubicar el cursor
							return(false);
						}
						if (document.forms[0].analisisepi.value == ""){
							alert("Doctor(a) olvido diligenciar el campo 'ANALISIS' ");
							document.forms[0].analisisepi.focus();				// Ubicar el cursor
							return(false);
						}
						if (document.forms[0].plantratamientoepi.value == ""){
							alert("Doctor(a) olvido diligenciar el campo 'PLAN DE TRATAMIENTO' ");
							document.forms[0].plantratamientoepi.focus();				// Ubicar el cursor
							return(false);
						}
					}
				</script>

<form action="<?php echo PROGRAMA;?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
	<section class="panel-body">
		<?php
			include("consulta_paciente.php");
		?>
	</section>
	<?php include("consulta_rapida.php");?>
	<div id="accordion">
		<h3>Impresion Diagnostica</h3>
		<div>
			<article class="col-xs-3">
				<label for="">Fecha de registro:</label>
				<input type="text" name="fregepi" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo1;?> >
				<input type="hidden" name="idhc" value="<?php echo $_GET["idhc"] ;?>" class="form-control" <?php echo $atributo1;?> >
			</article>
			<article class="col-xs-3">
				<label for="">Hora de registro</label>
				<input type="time" name="hregepi" value="<?php echo $date1 ;?>" class="form-control" <?php echo $atributo1;?>>
			</article>
			<article class="col-xs-12">
				<?php include("dxbusqueda.php");?>
			</article>
  	</div>
  	<h3>Registro de epicrisis</h3>
  	<div>
		<article class="col-xs-10">
			<label for="">Subjetivo: <span class="fa fa-info-circle" data-toggle="popover" title="Versión de la realidad proporcionada por el paciente" data-content=""></span></label>
			<textarea class="form-control" name="subjetivoepi" rows="5" id="comment" ></textarea>
		</article>
		<article class="col-xs-10">
			<label for="" >Objetivo: <span class="fa fa-info-circle" data-toggle="popover" title="Realidad encontrada por el medico con relación al paciente" data-content=""></span></label>
			<textarea class="form-control" name="objetivoepi" rows="5" id="comment" ></textarea>
		</article>
		<article class="col-xs-5">
			<label >Analisis: <span class="fa fa-info-circle" data-toggle="popover" title="Consolidado de la realidad del paciente" data-content=""></span></label>
			<textarea class="form-control" name="analisisepi" rows="6" id="comment" ></textarea>
		</article>
		<article class="col-xs-5">
			<label for="">Plan tratramiento: <span class="fa fa-info-circle" data-toggle="popover" title="Definición de conducta y procedimientos a realizar en relación a la realidad del paciente" data-content=""></span></label>
			<textarea class="form-control" name="plantratamientoepi" rows="6" id="comment" ></textarea>
		</article>
		<div class="text-center">
			<input type="submit" class="btn btn-primary sombra_movil" name="aceptar" Value="<?php echo $boton; ?>" />
			<input type="hidden" class="btn btn-primary sombra_movil" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
			<input type="hidden" class="btn btn-primary sombra_movil" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
		</div>
  	</div>
	</div>
</form>

<?php
}else{
	echo '<div class="animated bounceInRight alert alert-success">';
	echo $subtitulo;
	echo '</div>';
	echo'<a href="aplicacion5.php?opcion=39&idadmhosp='.$_REQUEST["idadmhosp"].'" class="botontool">  Formula Ambulatoria </a>';
	echo'<a href="aplicacion5.php?opcion=42&idadmhosp='.$_REQUEST["idadmhosp"].'" class="botontool">  Incapacidad </a>';
	echo'<a href="aplicacion5.php?opcion=83&idadmhosp='.$_REQUEST["idadmhosp"].'" class="botontool">  Ordenes Medicas Ambulatorias </a>';

// nivel 1?>

<div class="panel panel-default">
	<div class="col-xs-7">
			<a class="btn btn-primary" href="<?php echo PROGRAMA.'?opcion=19';?>"><span class="glyphicon glyphicon-triangle-left">Regresar a Menu de Medico</span></a>
	</div>
	<br>
<div class="panel panel-body">

<table class="table table-responsive">
	<tr>
		<th id="th-estilo4">Reporte Epicrisis</th>
		<th id="th-estilo1">ID ADM</th>
		<th id="th-estilo1">NOMBRE Y APELLIDOS</th>
		<th id="th-estilo2">HC  </th>
		<th id="th-estilo1">FECHA Y HORA INGRESO</th>
		<th id="th-estilo2">FOTO</th>
		<th id="th-estilo2">TIPO SERVICIO</th>
		<th id="th-estilo4">Crear Epicrisis</th>
	</tr>
	<?php
	if (isset($_REQUEST["idadmhosp"])){
	$idpaciente=$_GET["idadmhosp"];
	$sql="SELECT p.nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_servicio,h.id_hchosp FROM pacientes p inner JOIN adm_hospitalario a on p.id_paciente=a.id_paciente inner JOIN hc_hospitalario h on a.id_adm_hosp=h.id_adm_hosp WHERE a.id_adm_hosp='".$idpaciente."' and a.tipo_servicio='Hospitalario'";
	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {
			echo"<tr >\n";
			echo'<th class="text-center" ><a href="rptepicrisis.php?idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning sombra_movil" ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			echo'<td class="text-center info">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center info">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center info">'.$fila["id_hchosp"].'</td>';
			echo'<td class="text-center info">'.$fila["fingreso_hosp"].' '.$fila["hingreso_hosp"].'</td>';
			echo'<td class="text-center info">'.$fila["tipo_servicio"].' </td>';
			echo'<td class="text-left info"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login"> </td>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&idhc='.$fila["id_hchosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-square-o"></span></button></a></th>';
			echo "</tr>\n";
		}
	}else {
		echo '<div class="animated bounceInRight">';
		echo '<h3 class="alert-danger">Paciente no tiene registro de HISTORIA CLINICA DE INGRESO. Por lo tanto no puede registrar Epicrisis</h3></div>';
	}
}
	?>
	</table>
	<br>

  </section>
</div>
</div>
	<?php
}
?>
