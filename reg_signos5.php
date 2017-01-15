<div class="fuente_titulo text-center animated jello"><h2>Registro de Signos vitales</h2></div>
<?php
$subtitulo="";
	if(isset($_POST["operacion"])){	//nivel3
		if($_POST["aceptar"]!="Descartar"){
			//print_r($_FILES);

			switch ($_POST["operacion"]) {
			case 'E':
			$tam1=$_POST["tad"] * 2;
			$tam2=$tam1 + $_POST["tas"];
			$tamt=$tam2/3;
			$sql="INSERT INTO signos_vitales (id_adm_hosp,id_user,freg_sv,hreg_sv,tas_s,tad_s,tm_s,fc_s,fr_s,temp_s,spo_s,resp_sv) VALUES
			('".$_POST["idpac"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["tas"]."','".$_POST["tad"]."','$tamt','".$_POST["fc"]."','".$_POST["fr"]."','".$_POST["temp"]."','".$_POST["sat"]."','".$_SESSION["AUT"]["nombre"]."')";
			$subtitulo="Adicionado";

			break;
			case 'A':


			break;
		}
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="Registro de signos $subtitulo con exito!";
		}else{
			$subtitulo="Registro de signos NO fue $subtitulo !!! .";
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {
		case 'E':
			$sql="SELECT id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fnacimiento,edad,uedad,dir_pac,tel_pac,email_pac,estadocivil,etnia,lateralidad,profesion,religion,fotopac FROM pacientes where id_paciente=".$_GET["id_pac"];

			$color="green";
			$boton="Agregar";
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
				if (document.forms[0].hreg.value > document.forms[0].fecha.value){
					alert("UPSSSS, no puedes adelantar el tiempo en este registro ;)");
					document.forms[0].hreg.focus();				// Ubicar el cursor
					return(false);
				}
			}
		</script>
	<button type="button" class="btn btn-link animated bounceInRight" ><a href="<?php echo PROGRAMA.'?opcion=25';?>"><span class="glyphicon glyphicon-triangle-left"></span></a></button>
<form action="<?php echo PROGRAMA.'?opcion=25';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
	<section class="panel panel-default">
		<section class="panel-body">
			<article class="col-xs-1">
				<input type="hidden" name="idpac" value="<?php echo $_GET["id_adm_hosp"];?>">
				<article>
					<button class="btn btn-primary" data-toggle="modal" data-target="#busnotas" type="button" ><span class="fa fa-search"> Consulte registros anteriores</span>
				</article>
			<article class="">
				<section class="modal fade" id="busnotas" role="dialog">
					<section class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title" >Historico de Signos Vitales</h4>
							</div>
							<div class="modal-body">
								<table class="table table-bordered">
									<tr>

									</tr>
									<?php
									if (isset($_REQUEST["id_adm_hosp"])){
									$id=$_REQUEST["id_adm_hosp"];
									$sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_sv,hreg_sv,tas_s,tad_s,tm_s,fr_s,fc_s,temp_s,spo_s,resp_sv FROM adm_hospitalario a LEFT JOIN signos_vitales n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_sv and n.hreg_sv DESC LIMIT 15";

									if ($tabla=$bd1->sub_tuplas($sql)){
										//echo $sql;
										foreach ($tabla as $fila ) {

											echo"<tr >\n";
											echo'<td class="text-center danger"><span class="fa fa-calendar"></span> '.$fila["freg_sv"].'</td>';
											echo'<td class="text-center info">TA Sistólica</td>';
											echo'<td class="text-center info">TA diastólica</td>';
											echo'<td class="text-center info">TA Media</td>';
											echo'<td class="text-center info" >FR</td>';
											echo'<td class="text-center info">FC</td>';
											echo'<td class="text-center info" >TEMP</td>';
											echo'<td class="text-center info" >SpO</td>';
											echo'<td class="text-center success"><span class="fa fa-user"></span> Responsable</td>';
											echo"</tr>";
											echo "<tr>";
											echo'<td class="text-center">'.$fila["hreg_sv"].'</td>';
											echo'<td class="text-center">'.$fila["tas_s"].'</td>';
											echo'<td class="text-center">'.$fila["tad_s"].'</td>';
											echo'<td class="text-center">'.$fila["tm_s"].'</td>';
											echo'<td class="text-center">'.$fila["fr_s"].'</td>';
											echo'<td class="text-center">'.$fila["fc_s"].'</td>';
											echo'<td class="text-center">'.$fila["temp_s"].'</td>';
											echo'<td class="text-center">'.$fila["spo_s"].'</td>';
											echo'<td class="text-center">'.$fila["resp_sv"].'</td>';
											echo "</tr>\n";
										}
									}
								}
									?>
								</table>
							</div>

						</div>
					</section>
				</section>
			</article>
			</article>
		</section>
		<section class="panel panel-body">

			<article class="col-xs-2">
				<label for="">Fecha registro:</label>
				<input type="text" class="form-control" name="freg" value="<?php echo $date;?>" <?php echo $atributo1;?>>
				<input type="hidden" name="fecha" value="<?php echo $date1;?>">
			</article>
			<article class="col-xs-2">
				<label for="">Hora registro:</label>
				<input type="time" class="form-control" name="hreg" value="<?php echo $date1;?>">
			</article>

			<article class="col-xs-1">
				<label for="">TA Sistólica:</label>
				<input type="text" name="tas" class="form-control" value="">
			</article>
			<article class="col-xs-1">
				<label for="">TA Diastólica:</label>
				<input type="text" name="tad" class="form-control" value="">
			</article>
			<article class="col-xs-1">
				<label for="">FC:</label>
				<input type="text" name="fc" class="form-control" value="">
			</article>
			<article class="col-xs-1">
				<label for="">FR:</label>
				<input type="text" name="fr" class="form-control" value="">
			</article>
			<article class="col-xs-1">
				<label for="">Temp:</label>
				<input type="text" name="temp" class="form-control" value="">
			</article>
			<article class="col-xs-1">
				<label for="">SpO2:</label>
				<input type="text" name="sat" class="form-control" value="">
			</article>
		</section>

		<div class="panel panel-body text-center">
		  	<input type="submit" class="btn btn-primary sombra_movil" name="aceptar" Value="<?php echo $boton; ?>" />
			<input type="reset" class="btn btn-primary sombra_movil" Value="Reestablecer"/>
			<input type="submit" class="btn btn-primary sombra_movil" name="aceptar" Value="Descartar"/>
			<input type="hidden" class="btn btn-primary sombra_movil" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
			<input type="hidden" class="btn btn-primary sombra_movil" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
		</div>
	</section>

</form>

<?php
}else{
	echo '<div class="animated bounceInRight">';
	echo $subtitulo;
	echo'</div>';
// nivel 1?>

<div class="panel panel-default">
	<div class="col-xs-7">
			<a class="btn btn-primary" href="<?php echo PROGRAMA.'?opcion=17';?>"><span class="glyphicon glyphicon-triangle-left">Regresar a Modulo Enfermería</span></a>
	</div>
	<br>
<div class="panel panel-body">

<table class="table table-responsive">
	<tr>
		<th id="th-estilo2">ID</th>
		<th id="th-estilo1">IDENTIFICACIÓN</th>
		<th id="th-estilo2">NOMBRE COMPLETO</th>
		<th id="th-estilo3"># ADMISIÓN</th>
		<th id="th-estilo2">FECHA Y HORA INGRESO</th>
		<th id="th-estilo1">FOTO</th>
		<th ></th>
	</tr>
	<?php
	if (isset($_REQUEST["idadmhosp"])){
	$idpaciente=$_GET["idadmhosp"];
	$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente where a.id_adm_hosp='".$idpaciente."' and a.estado_adm_hosp='Activo'";
	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {
			echo"<tr >\n";
			echo'<td class="text-center info">'.$fila["id_paciente"].'</td>';
			echo'<td class="text-center info">'.$fila["tdoc_pac"].': '.$fila["doc_pac"].'</td>';
			echo'<td class="text-center info">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center info">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center info">'.$fila["fingreso_hosp"].' '.$fila["hingreso_hosp"].'</td>';
			echo'<td class="text-left info"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login"> </td>';
			echo'<th class="text-center " ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&id_pac='.$fila["id_paciente"].'&id_adm_hosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="glyphicon glyphicon-plus"></span></button></a></th>';
			echo "</tr>\n";
		}
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
