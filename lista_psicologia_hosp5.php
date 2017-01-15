
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
				$sql="UPDATE vehiculos SET id_rutas='".$_POST["idruta"]."',id_provexpreso='".$_POST["idprove"]."',tipo_vehiculo='".$_POST["doc_cliente"]."',placa='".$_POST["mail_cliente"]."',num_interno='".$_POST["tel_cliente"]."',modelo='".$_POST["dir_cliente"]."',capacidad='".$_POST["estado_cliente"]."',conductor='".$_POST["porciento_tiquetes"]."',contacto_conductor='".$_POST["porciento_expresos"]."',estado_vehiculo='".$_POST["porciento_alimentacion"]."' WHERE id_vehiculo=".$_POST["idveh"];
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
			$sql="INSERT INTO valini_psicologia (id_adm_hosp,id_user,freg_valini_psico,hreg_valini_hosp,motivo_hosp,conducta_personal,hipo_predisposicion,hipo_adquisicion,hipo_mantenimiento,estado_valini_psico,resp_valini_psico) VALUES
			('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg_valini_psico"]."','".$_POST["hreg_valini_hosp"]."','".$_POST["motivo_hosp"]."','".$_POST["conducta_personal"]."','".$_POST["hipo_predisposicion"]."','".$_POST["hipo_adquisicion"]."','".$_POST["hipo_mantenimiento"]."','Realizado','".$_SESSION["AUT"]["nombre"]."')";
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
		case 'E':
			$sql="SELECT s.".$_GET["idveh"];
			$color="green";
			$boton="Actualizar";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$subtitulo='Edición de datos del Vehículo';
			break;
			case 'X':
			$sql="";
			$color="red";
			$boton="Eliminar";
			$atributo1=' readonly="readonly"';
			$atributo2=' readonly="readonly"';
			$atributo3=' disabled="disabled"';
			$subtitulo='Confirmación para eliminar de datos del Vehículo';
			break;
			case 'A':
      $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
      b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
      j.nom_eps
      from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                  left join eps j on (j.id_eps=b.id_eps)
      where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$color="yellow";
			$boton="Crear";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='disabled';
			$date=date('d/m/Y');
			$date1=date('H:i');
			$subtitulo='';
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
				if (document.forms[0].nom_cliente.value == ""){
					alert("Se requiere el nombre del cliente!");
					document.forms[0].nom_cliente.focus();				// Ubicar el cursor
					return(false);
				}
			}
		</script>
		<script type="text/javascript" src="/js/jquery.js"></script>

<form action="<?php echo PROGRAMA;?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
<section class="panel-body">
	<?php
		include("consulta_paciente.php");
	?>
</section>
	<article>
		<h4 id="th-estilot">Datos de historia Clínica</h4>
	</article>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav " id="barra">
			<li class="dropdown">
				<button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Medicos <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a  data-toggle="modal" data-target="#hc" type="button" ><span class="fa fa-search"> HC</span></a></li>
					<li><a data-toggle="modal" data-target="#evoluciones" type="button" ><span class="fa fa-search">Evoluciones </span></a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav " id="barra">
			<li class="dropdown">
				<button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Enfermería <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a  data-toggle="modal" data-target="#busnotas" type="button" ><span class="fa fa-search"> Notas enfermería</span></a></li>
					<li><a  data-toggle="modal" data-target="#signos" type="button" ><span class="fa fa-search"> Signos Vitales</span></a></li>
					<li><a  data-toggle="modal" data-target="#liquidos" type="button" ><span class="fa fa-search"> Liquidos</span></a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav" id="barra">
			<li class="dropdown">
				<button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Psicológia <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a  data-toggle="modal" data-target="#vipsico" type="button" ><span class="fa fa-search"> Valoración inicial</span></a></li>
					<li><a  data-toggle="modal" data-target="#evopsico" type="button" ><span class="fa fa-search"> Evoluciones</span></a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav" id="barra">
			<li class="dropdown">
				<button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Terapia Ocupacional <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a  data-toggle="modal" data-target="#vinicialto" type="button" ><span class="fa fa-search"> Valoración inicial</span></a></li>
					<li><a  data-toggle="modal" data-target="#evoto" type="button" ><span class="fa fa-search"> Evoluciones</span></a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav" id="barra">
			<li class="dropdown">
				<button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Trabajo Social <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a  data-toggle="modal" data-target="#valinitr" type="button" ><span class="fa fa-search"> Valoración inicial</span></a></li>
					<li><a  data-toggle="modal" data-target="#evotr" type="button" ><span class="fa fa-search"> Evoluciones</span></a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav" id="barra">
			<li class="dropdown">
				<button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Nutrición <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a  data-toggle="modal" data-target="#valininutri" type="button" ><span class="fa fa-search"> Valoración inicial</span></a></li>
					<li><a  data-toggle="modal" data-target="#evonutri" type="button" ><span class="fa fa-search"> Evoluciones</span></a></li>
				</ul>
			</li>
		</ul>
	</div>
<section >
		<section>
			<section class="modal fade" id="hc" role="dialog">
				<section class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" >Historia Clínica Ingreso</h4>
						</div>
						<div class="modal-body">
							<table class="table table-responsive">
								<tr>

								</tr>
								<?php
								if (isset($_REQUEST["idadmhosp"])){
								$id=$_REQUEST["idadmhosp"];
								$sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_hchosp,hreg_hchosp,motivo_consulta,enfer_actual,his_personal,his_familiar,perso_premorbida,ant_alergicos,ant_patologico,ant_quirurgico,ant_toxicologico,ant_farmaco,ant_gineco,ant_psiquiatrico,ant_hospitalario,ant_traumatologico,ant_familiar,otros_ant,estado_general,tad,tas,tam,fr,fc,so,peso,talla,temperatura,imc,cabcuello,torax,ext,abdomen,neurologico,genitourinario,examen_mental,analisis,finalidad,causa_externa,plantratamiento FROM adm_hospitalario a LEFT JOIN hc_hospitalario n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."'";

								if ($tabla=$bd1->sub_tuplas($sql)){
									//echo $sql;
									foreach ($tabla as $fila ) {


										echo"<tr >\n";
										echo'<td class="text-center danger"><span class="fa fa-calendar"></span> '.$fila["freg_hchosp"].'  '.$fila["hreg_hchosp"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td colspan="10" class="text-center danger">ANAMNESIS</td>';
										echo '</tr>';
										echo '<tr>';
										echo'<td colspan="5" class="text-center info">Motivo de Consulta</td>';
										echo'<td colspan="5" class="text-center info" >Enfermedad Actual</td>';
										echo"</tr>";
										echo "<tr>";
										echo'<td colspan="5" class="text-center">'.$fila["motivo_consulta"].'</td>';
										echo'<td colspan="5" class="text-left">'.$fila["enfer_actual"].'</td>';
										echo "</tr>\n";
										echo '<tr>';
										echo'<td colspan="5" class="text-center info">Historia Personal</td>';
										echo'<td colspan="5" class="text-center info" >Historia Familiar</td>';
										echo"</tr>";
										echo "<tr>";
										echo'<td colspan="5" class="text-center">'.$fila["his_personal"].'</td>';
										echo'<td colspan="5" class="text-left">'.$fila["his_familiar"].'</td>';
										echo "</tr>\n";
										echo '<tr>';
										echo'<td colspan="10" class="text-center info">Personalidad Premorbida</td>';
										echo"</tr>";
										echo "<tr>";
										echo'<td colspan="10" class="text-center">'.$fila["perso_premorbida"].'</td>';
										echo "</tr>\n";
										echo"<tr >\n";
										echo'<td colspan="10" class="text-center danger">ANTECEDENTES PERSONALES</td>';
										echo '</tr>';
										echo '<tr>';
										echo'<td class="text-center info">Alergicos</td>';
										echo'<td colspan="9" class="text-center">'.$fila["ant_alergicos"].'</td>';
										echo"</tr>";
										echo "<tr>";
										echo'<td class="text-center info" >Psiquiatricos</td>';
										echo'<td colspan="9" class="text-center">'.$fila["ant_psiquiatrico"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Patológicos</td>';
										echo'<td colspan="9" class="text-center">'.$fila["ant_patologico"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Quirurgicos</td>';
										echo'<td colspan="9" class="text-center">'.$fila["ant_quirurgico"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Toxicológicos</td>';
										echo'<td colspan="9" class="text-center">'.$fila["ant_toxicologico"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Farmacológicos</td>';
										echo'<td colspan="9" class="text-center">'.$fila["ant_farmaco"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Hospitalarios</td>';
										echo'<td colspan="9" class="text-center">'.$fila["ant_hospitalario"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Gineco-Obstetricos</td>';
										echo'<td colspan="9" class="text-center">'.$fila["ant_gineco"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Traumatológicos</td>';
										echo'<td colspan="9" class="text-center">'.$fila["ant_traumatologico"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Familiares</td>';
										echo'<td colspan="9" class="text-center">'.$fila["ant_familiar"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Otros Antecedentes</td>';
											echo'<td colspan="9" class="text-center">'.$fila["otros_ant"].'</td>';
										echo "</tr>\n";
										echo"<tr >\n";
										echo'<td colspan="10" class="text-center danger">EXAMEN FÍSICO</td>';
										echo '</tr>';
										echo '<tr>';
										echo'<td class="text-center info">TAS</td>';
										echo'<td class="text-center info" >TAD</td>';
										echo'<td class="text-center info" >TAM</td>';
										echo'<td class="text-center info" >FC</td>';
										echo'<td class="text-center info" >FR</td>';
										echo'<td class="text-center info" >SAO2</td>';
										echo'<td class="text-center info" >PESO</td>';
										echo'<td class="text-center info" >TALLA</td>';
										echo'<td class="text-center info" >TEMP</td>';
										echo'<td class="text-center info" >IMC</td>';
										echo"</tr>";
										echo "<tr>";
										echo'<td class="text-center info">'.$fila["tas"].'</td>';
										echo'<td class="text-center info" >'.$fila["tad"].'</td>';
										echo'<td class="text-center info" >'.$fila["tam"].'</td>';
										echo'<td class="text-center info" >'.$fila["fc"].'</td>';
										echo'<td class="text-center info" >'.$fila["fr"].'</td>';
										echo'<td class="text-center info" >'.$fila["so"].'</td>';
										echo'<td class="text-center info" >'.$fila["peso"].'</td>';
										echo'<td class="text-center info" >'.$fila["talla"].'</td>';
										echo'<td class="text-center info" >'.$fila["temperatura"].'</td>';
										echo'<td class="text-center info" >'.$fila["imc"].'</td>';
										echo "</tr>\n";
										echo"<tr >\n";
										echo'<td colspan="10" class="text-center danger">EXPLORACIÓN GENERAL Y REGIONAL</td>';
										echo '</tr>';
										echo "<tr>";
										echo'<td class="text-center info" >Estado General</td>';
										echo'<td colspan="9" class="text-center">'.$fila["estado_general"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Cabeza y Cuello</td>';
										echo'<td colspan="9" class="text-center">'.$fila["cabcuello"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Torax</td>';
										echo'<td colspan="9" class="text-center">'.$fila["torax"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Abdomen</td>';
										echo'<td colspan="9" class="text-center">'.$fila["abdomen"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Genitourinario</td>';
										echo'<td colspan="9" class="text-center">'.$fila["genitourinario"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Extremidades</td>';
										echo'<td colspan="9" class="text-center">'.$fila["ext"].'</td>';
										echo "</tr>\n";
										echo "<tr>";
										echo'<td class="text-center info" >Neurologico</td>';
										echo'<td colspan="9" class="text-center">'.$fila["neurologico"].'</td>';
										echo "</tr>\n";
										echo"<tr >\n";
										echo'<td colspan="10" class="text-center danger">Examen Mental y Analisis</td>';
										echo '</tr>';
										echo '<tr>';
										echo'<td colspan="5" class="text-center info">Examen Mental</td>';
										echo'<td colspan="5" class="text-center info" >Analisis</td>';
										echo"</tr>";
										echo "<tr>";
										echo'<td colspan="5" class="text-center">'.$fila["examen_mental"].'</td>';
										echo'<td colspan="5" class="text-left">'.$fila["analisis"].'</td>';
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
		</section>
</section>
<section>
	<article >
		<section class="modal fade" id="signos" role="dialog">
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
							$sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_sv,hreg_sv,ta,fr,fc,temp,spo,resp_sv FROM adm_hospitalario a LEFT JOIN signos_vitales n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_sv and n.hreg_sv DESC LIMIT 15";

							if ($tabla=$bd1->sub_tuplas($sql)){
								//echo $sql;
								foreach ($tabla as $fila ) {

									echo"<tr >\n";
									echo'<td class="text-center danger"><span class="fa fa-calendar"></span> '.$fila["freg_sv"].'</td>';
									echo'<td class="text-center info">TA</td>';
									echo'<td class="text-center info" >FR</td>';
									echo'<td class="text-center info">FC</td>';
									echo'<td class="text-center info" >TEMP</td>';
									echo'<td class="text-center info" >SpO</td>';
									echo'<td class="text-center success"><span class="fa fa-user"></span> Responsable</td>';
									echo"</tr>";
									echo "<tr>";
									echo'<td class="text-center">'.$fila["hreg_sv"].'</td>';
									echo'<td class="text-center">'.$fila["ta"].'</td>';
									echo'<td class="text-center">'.$fila["fr"].'</td>';
									echo'<td class="text-center">'.$fila["fc"].'</td>';
									echo'<td class="text-center">'.$fila["temp"].'</td>';
									echo'<td class="text-center">'.$fila["spo"].'</td>';
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
</section>
<section>
		<section>
			<section class="modal fade" id="evoluciones" role="dialog">
				<section class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" >Historico de Evoluciones medicas</h4>
						</div>
						<div class="modal-body">
							<table class="table table-bordered">
								<tr>

								</tr>
								<?php
								if (isset($_REQUEST["idadmhosp"])){
								$id=$_REQUEST["idadmhosp"];
								$sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_evomed,hreg_evomed,objetivo,subjetivo,analisis,plan_tratamiento,resp_evomed FROM adm_hospitalario a LEFT JOIN evolucion_medica n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_evomed and n.hreg_evomed DESC LIMIT 10";

								if ($tabla=$bd1->sub_tuplas($sql)){
									//echo $sql;
									foreach ($tabla as $fila ) {

										echo"<tr >\n";
										echo'<td class="text-center danger"><span class="fa fa-calendar"></span> '.$fila["freg_evomed"].'</td>';
										echo'<td class="text-center info">SUBJETIVO</td>';
										echo'<td class="text-center info" >OBJETIVO</td>';
										echo'<td class="text-center info">ANALISIS</td>';
										echo'<td class="text-center info" >PLAN TRATAMIENTO</td>';
										echo'<td class="text-center success"><span class="fa fa-user"></span> Responsable</td>';
										echo"</tr>";
										echo "<tr>";
										echo'<td class="text-center">'.$fila["hreg_evomed"].'</td>';
										echo'<td class="text-left">'.$fila["subjetivo"].'</td>';
										echo'<td class="text-left">'.$fila["objetivo"].'</td>';
										echo'<td class="text-left">'.$fila["analisis"].'</td>';
										echo'<td class="text-left">'.$fila["plan_tratamiento"].'</td>';
										echo'<td class="text-center">'.$fila["resp_evomed"].'</td>';
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
		</section>
</section>
<section >
		<section>
			<section class="modal fade" id="evopsico" role="dialog">
				<section class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" >Historico de Evoluciones Psicologia</h4>
						</div>
						<div class="modal-body">
							<table class="table table-bordered">
								<tr>

								</tr>
								<?php
								if (isset($_REQUEST["idadmhosp"])){
								$id=$_REQUEST["idadmhosp"];
								$sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_evo_psico,hreg_evo_psico,obj_sesion,actividades,resultado,obs_evo_psico,resp_evo_psico FROM adm_hospitalario a LEFT JOIN evo_psicologia n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_evo_psico and n.hreg_evo_psico DESC LIMIT 15";

								if ($tabla=$bd1->sub_tuplas($sql)){
									//echo $sql;
									foreach ($tabla as $fila ) {

										echo"<tr >\n";
										echo'<td class="text-center danger"><span class="fa fa-calendar"></span> '.$fila["freg_evo_psico"].' '.$fila["hreg_evo_psico"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center info">TIPO SESIÓN</td>';
										echo'<td class="text-left">'.$fila["tipo_sesion"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center info" >OBJETIVO SESIÓN</td>';
										echo'<td class="text-left">'.$fila["obj_sesion"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center info">ACTIVIDADES</td>';
										echo'<td class="text-left">'.$fila["actividades"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center info" >RESULTADOS</td>';
										echo'<td class="text-left">'.$fila["resultado"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center info" >OBSERVACIONES</td>';
										echo'<td class="text-left">'.$fila["obs_evo_psico"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center success"><span class="fa fa-user"></span> Responsable</td>';
										echo'<td class="text-center">'.$fila["resp_evo_psico"].'</td>';
										echo"</tr>";
										echo "<tr>";
										echo'<td class="text-center"></td>';
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
		</section>
</section>
<section >
		<section>
			<section class="modal fade" id="vipsico" role="dialog">
				<section class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" >Valoración inicial Psicologia</h4>
						</div>
						<div class="modal-body">
							<table class="table table-bordered">
								<tr>

								</tr>
								<?php
								if (isset($_REQUEST["idadmhosp"])){
								$id=$_REQUEST["idadmhosp"];
								$sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_evo_psico,hreg_evo_psico,obj_sesion,actividades,resultado,obs_evo_psico,resp_evo_psico FROM adm_hospitalario a LEFT JOIN evo_psicologia n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_evo_psico and n.hreg_evo_psico DESC LIMIT 15";

								if ($tabla=$bd1->sub_tuplas($sql)){
									//echo $sql;
									foreach ($tabla as $fila ) {

										echo"<tr >\n";
										echo'<td class="text-center danger"><span class="fa fa-calendar"></span> '.$fila["freg_evo_psico"].' '.$fila["hreg_evo_psico"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center info">TIPO SESIÓN</td>';
										echo'<td class="text-left">'.$fila["tipo_sesion"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center info" >OBJETIVO SESIÓN</td>';
										echo'<td class="text-left">'.$fila["obj_sesion"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center info">ACTIVIDADES</td>';
										echo'<td class="text-left">'.$fila["actividades"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center info" >RESULTADOS</td>';
										echo'<td class="text-left">'.$fila["resultado"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center info" >OBSERVACIONES</td>';
										echo'<td class="text-left">'.$fila["obs_evo_psico"].'</td>';
										echo '</tr>';
										echo"<tr >\n";
										echo'<td class="text-center success"><span class="fa fa-user"></span> Responsable</td>';
										echo'<td class="text-center">'.$fila["resp_evo_psico"].'</td>';
										echo"</tr>";
										echo "<tr>";
										echo'<td class="text-center"></td>';
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
		</section>
</section>
<section>
	<section class="modal fade" id="evoto" role="dialog">
		<section class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" >Historico Evoluciones Terapia Ocupacional</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<?php
						if (isset($_REQUEST["idadmhosp"])){
						$id=$_REQUEST["idadmhosp"];
						$sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_evoto,hreg_evoto,evolucion_to,resp_evoto FROM adm_hospitalario a LEFT JOIN evo_to n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_nota DESC LIMIT 15";

						if ($tabla=$bd1->sub_tuplas($sql)){
							//echo $sql;
							foreach ($tabla as $fila ) {

								echo"<tr >\n";
								echo'<td class="text-center">'.$fila["freg_nota"].' '.$fila["hreg_nota"].'</td>';
								echo'<td class="text-center">'.$fila["descripnota"].'</td>';
								echo'<td class="text-center">'.$fila["resp_nota"].'</td>';
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
</section>
<section>
	<section class="modal fade" id="busnotas" role="dialog">
		<section class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" >Historico de Notas de Enfermería</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<tr>

						</tr>
						<?php
						if (isset($_REQUEST["idadmhosp"])){
						$id=$_REQUEST["idadmhosp"];
						$sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_nota,hreg_nota,descripnota,resp_nota FROM adm_hospitalario a LEFT JOIN nota_enfermeria n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_nota DESC LIMIT 15";

						if ($tabla=$bd1->sub_tuplas($sql)){
							//echo $sql;
							foreach ($tabla as $fila ) {

								echo"<tr >\n";
								echo'<td class="text-center">'.$fila["freg_nota"].' '.$fila["hreg_nota"].'</td>';
								echo'<td class="text-center">'.$fila["descripnota"].'</td>';
								echo'<td class="text-center">'.$fila["resp_nota"].'</td>';
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
</section>
	<section class="panel-body"> <!--Anamnesis-->
		<div class="botonhc">
				<a data-toggle="collapse" class="ac" data-target="#valpsicologia" >Valoración Inicial Psicología</a>
				<span class="glyphicon glyphicon-arrow-down"></span>
				<span class="badge">OK</span>
		</div>
		<section class="collapse" id="valpsicologia">
			<article class="col-xs-3">
				<label for="">Fecha de registro:</label>
				<input type="text" name="freg_valini_psico" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo3?> >
			</article>
			<article class="col-xs-3">
				<label for="">Hora de registro</label>
				<input type="text" name="hreg_valini_hosp" value="<?php echo $date1 ;?>" class="form-control" <?php echo $atributo3?>>
			</article>
			<article class="col-xs-10">
				<label for="">Motivo de hospitalización:</label>
				<textarea class="form-control" name="motivo_hosp" rows="5" id="comment" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
			</article>
		</section>
</section>
<section class="panel-body">
			<div class="botonhc">
				<a data-toggle="collapse" class="ac" data-target="#gradoafec" >Grado de afectación de la problemática<span class="glyphicon glyphicon-arrow-down"></span> </a>
				<span class="badge">OK</span>
			</div>
			<section id="gradoafec" class="collapse">
				<article class="col-xs-10">
					<label for="">Conducta Problema:</label>
					<textarea class="form-control" name="conducta_personal" rows="5" id="comment" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
				</article>
			</section>
</section>
<section class="panel-body">
			<div class="botonhc">
				<a data-toggle="collapse" class="ac" data-target="#forhipo" >Formulación de hipótesis<span class="glyphicon glyphicon-arrow-down"></span> </a>
				<span class="badge">OK</span>
			</div>
			<section id="forhipo" class="collapse">
				<article class="col-xs-10">
					<label for="">Hipótesis de predisposición:</label>
					<textarea class="form-control" name="hipo_predisposicion" rows="5" id="comment" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">Hipótesis de adquisición:</label>
					<textarea class="form-control" name="hipo_adquisicion" rows="5" id="comment" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">Hipótesis de mantenimiento:</label>
					<textarea class="form-control" name="hipo_mantenimiento" rows="5" id="comment" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
				</article>
			</section>
</section>
	<div class="row text-center">
	  	<input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="reset" class="btn btn-primary" Value="Reestablecer"/>
		<input type="submit" class="btn btn-primary" name="aceptar" Value="Descartar"/>
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>

<?php
}else{
	echo $subtitulo;
// nivel 1?>
<div class="panel-default">
<div class="panel-body">
	<section class="panel panel-default" class="col-xs-7">
		<form class="navbar-form navbar-center" role="search" >
        	<section class="form-group col-xs-3">
          		<input type="text" class="form-control" name="doc" placeholder="Digite Identificación">
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
		<th id="th-estilo1">ADMISIÓN</th>
		<th id="th-estilo1">IDENTIFICACIÓN</th>
		<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
		<th id="th-estilo3">FECHA INGRESO</th>
		<th id="th-estilo3">HORA INGRESO</th>
		<th id="th-estilo3">FOTO</th>
		<th id="th-estilo4">Valoración inicial</th>
		<th id="th-estilo4">Evolución</th>
		<th id="th-estilo4">Ordenes Procedimientos</th>
	</tr>

	<?php
	if (isset($_REQUEST["doc"])){
	$doc=$_REQUEST["doc"];
		$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_servicio,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE p.doc_pac='".$doc."' and a.estado_adm_hosp='Activo' and tipo_servicio='Hospitalario'";

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {

			echo"<tr >\n";
			echo'<td class="text-center">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
			echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center">'.$fila["fingreso_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["hingreso_hosp"].'</td>';
			echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
			echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=24&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-stethoscope"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=20&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-danger sombra_movil " ><span class="fa fa-flask"></span></button></a></th>';
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

			echo"<tr >\n";
			echo'<td class="text-center">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
			echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center">'.$fila["fingreso_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["hingreso_hosp"].'</td>';
			echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
			echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=24&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-stethoscope"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=20&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-danger sombra_movil " ><span class="fa fa-flask"></span></button></a></th>';
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
