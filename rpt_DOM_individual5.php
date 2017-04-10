
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
				$tam1=$_POST["tad"] * 2;
				$tam2=$tam1 + $_POST["tds"];
				$tamt=$tam2/3;
				$sql="INSERT INTO hc_hospitalario (id_adm_hosp,id_user,freg_hchosp,hreg_hchosp,motivo_consulta,enfer_actual,his_personal,his_familiar,perso_premorbida,ant_alergicos,ant_patologico,ant_quirurgico,ant_toxicologico,ant_farmaco,ant_gineco,ant_psiquiatrico,ant_hospitalario,ant_traumatologico,ant_familiar,otros_ant,estado_general,tad,tas,tam,fr,fc,so,peso,talla,temperatura,imc,cabcuello,torax,ext,abdomen,neurologico,genitourinario,examen_mental,analisis,finalidad,causa_externa,plantratamiento,Resp_hchosp,especialidad,estado_hchosp) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["motivoconsulta"]."','".$_POST["enferactual"]."','".$_POST["hpersonal"]."','".$_POST["hfamiliar"]."','".$_POST["ppremorbida"]."','".$_POST["antalergico"]."','".$_POST["antpatologico"]."','".$_POST["antquirurgico"]."','".$_POST["anttoxicologicos"]."','".$_POST["antfarmacologico"]."','".$_POST["antgineco"]."','".$_POST["antpsiquiatrico"]."','".$_POST["anthospitalario"]."','".$_POST["anttrauma"]."','".$_POST["antfami"]."','".$_POST["antotros"]."','".$_POST["estadogen"]."','".$_POST["tad"]."','".$_POST["tas"]."','$tamt','".$_POST["fr"]."','".$_POST["fc"]."','".$_POST["sao2"]."','".$_POST["peso"]."','".$_POST["talla"]."','".$_POST["temperatura"]."','$imc2','".$_POST["cabezacuello"]."','".$_POST["torax"]."','".$_POST["extsup"]."','".$_POST["abdomen"]."','".$_POST["neurologico"]."','".$_POST["genitourinario"]."','".$_POST["exmental"]."','".$_POST["analisis"]."','".$_POST["finconsulta"]."','".$_POST["causaexterna"]."','".$_POST["plant"]."','".$_SESSION["AUT"]["nombre"]."','".$_SESSION["AUT"]["especialidad"]."','Realizada')";
				$subtitulo="Adicionado";

			break;
		}
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="El registro fue $subtitulo con exito!";
			$check='si';
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logo"])){
				unlink($fila["logo"]);
			}
			}
		}else{
			$subtitulo="El registro NO fue $subtitulo !!! .";
			$check='no';
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
			$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,estadocivil,edad,lateralidad,profesion,religion,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_usuario,tipo_afiliacion,ocupacion,dep_residencia,mun_residencia,zona_residencia,nivel,via_ingreso,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE a.id_adm_hosp=".$_GET["idadmhosp"];
			$color="yellow";
			$boton="Agregar HC";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='disabled';
			$date=date('Y/m/d');
			$date1=date('H:i');
			$subtitulo='';
			break;
		}
//echo $sql;
		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){
				$fila=array("id_paciente"=>"","tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","fotopac"=>"","estadocivil"=>"","edad"=>"","lateralidad"=>"","profesion"=>"","religion"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","tipo_usuario"=>"","tipo_afiliacion"=>"","ocupacion"=>"","dep_residencia"=>"","mun_residencia"=>"","zona_residencia"=>"","nivel"=>"","via_ingreso"=>"");
			}
		}else{
				$fila=array("id_paciente"=>"","tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","fotopac"=>"","estadocivil"=>"","edad"=>"","lateralidad"=>"","profesion"=>"","religion"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","tipo_usuario"=>"","tipo_afiliacion"=>"","ocupacion"=>"","dep_residencia"=>"","mun_residencia"=>"","zona_residencia"=>"","nivel"=>"","via_ingreso"=>"");
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
		<script src="ajax.js"></script>


<?php
}else{
	echo $subtitulo;
// nivel 1?>

<section class="panel panel-default">
	<section class="panel-heading"><h4>Reporteador Servicios Domiciliarios</h4></section>
	<section class="panel-body">
		<form>
			<section class="col-xs-12">
				<article class="col-xs-2">
					<label>Fecha inicial:</label>
					<input type="date" class="form-control" name="fecha1">
				</article>
				<article class="col-xs-2">
					<label>Fecha Final:</label>
					<input type="date" class="form-control" name="fecha2">
				</article>
				<article class="col-xs-3">
					<label>Filtro por identificacion:</label>
					<input type="text" class="form-control" name="doc" placeholder="Digite Identificacion">
				</article>
				<div>
					<input type="submit" name="buscar" class="btn btn-primary" value="Consultar">
					<input type="hidden" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
				</div>
			</section>
		</form>
		<form>
			<section class="col-xs-12">
				<article class="col-xs-2">
					<label>Fecha inicial:</label>
					<input type="date" class="form-control" name="fecha1">
				</article>
				<article class="col-xs-2">
					<label>Fecha Final:</label>
					<input type="date" class="form-control" name="fecha2">
				</article>
				<article class="col-xs-3">
					<label>Filtro por identificacion:</label>
					<input type="text" class="form-control" name="doc" placeholder="Digite Identificacion">
				</article>
				<div>
					<input type="submit" name="buscar" class="btn btn-primary" value="Consultar">
					<input type="hidden" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
				</div>
			</section>
		</form>
	</section>
	<section class="panel-body">
		<section>
			<table class="table table-bordered animated jello">
				<th class="text-center" ><a href=""><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a>Corresponde a Valoracion inicial</th>
				<th class="text-center" ><a href=""><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span> </button></a>Corresponde a Evoluciones</th>
			</table>
		</section>
		<table class="table table-bordered table-responsive">
			<tr>
				<th id="th-estilo1">IDENTIFICACION</th>
				<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
				<th id="th-estilo3">FECHA INGRESO</th>
				<th id="th-estilo3">SEDE - EPS</th>
				<th colspan="2" id="th-estilo4">FISIOTERAPIA</th>
				<th colspan="2" id="th-estilo4">T. OCUPACIONAL</th>
				<th colspan="2" id="th-estilo4">FONOAUDIOLOGIA</th>
				<th colspan="2" id="th-estilo4">PSICOLOGIA</th>
				<th colspan="2" id="th-estilo4">T. RESPIRATORIA</th>
				<th colspan="2" id="th-estilo4">NUTRICION</th>
				<th colspan="2" id="th-estilo4">HC Domiciliarios</th>
			</tr>

			<?php
			if (isset($_REQUEST["doc"])){
			$doc=$_REQUEST["doc"];
			$f1=$_REQUEST["fecha1"];
			$f2=$_REQUEST["fecha2"];
			$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,edad,descricie,fotopac,
			a.id_adm_hosp,fingreso_hosp,hingreso_hosp,
			s.nom_sedes,
			e.nom_eps
			FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente
			                 LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips
			                 LEFT JOIN eps e on a.id_eps=e.id_eps
			WHERE p.doc_pac='".$doc."'  and tipo_servicio='Domiciliarios' ";

			if ($tabla=$bd1->sub_tuplas($sql)){
			  //echo $sql;
			  foreach ($tabla as $fila ) {

			    echo"<tr >\n";

			    echo'<td class="text-center"><strong>'.$fila["tdoc_pac"].': '.$fila["doc_pac"].' -- AMD:'.$fila["id_adm_hosp"].'</strong></td>';
			    echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			    echo'<td class="text-center">'.$fila["fingreso_hosp"].' | '.$fila["hingreso_hosp"].'</td>';
			    $eps=$fila["nom_eps"];
			    $doc=$fila["doc_pac"];
			    $cie=$fila["descricie"];
			    echo'<td class="text-center">'.$fila["nom_sedes"].' // '.$fila["nom_eps"].'</td>';
			    echo'<th class="text-center" ><a href="rpt_valinifisio_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_fisiodom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span> </button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_valinito_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_todom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_valinifono_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_fonodom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_valinipsico_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_psicodom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_valinitr_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_trdom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
					echo'<th class="text-center" ><a href="rpt_valininutri_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_nutri_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_hcmed_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo "</tr>\n";
			  }
			}
			}
			if (isset($_REQUEST["nom"])){
			$doc=$_REQUEST["nom"];
			$f1=$_REQUEST["fecha1"];
			$f2=$_REQUEST["fecha2"];
			$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,edad,descricie,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE p.nom1  LIKE '%".$doc."%'  and tipo_servicio='Domiciliarios'";

			if ($tabla=$bd1->sub_tuplas($sql)){
			  //echo $sql;
			  foreach ($tabla as $fila ) {

			    echo"<tr >	\n";
			    echo'<td class="text-center">'.$fila["id_adm_hosp"].'</td>';
			    echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
			    echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			    echo'<td class="text-center">'.$fila["fingreso_hosp"].' | '.$fila["hingreso_hosp"].'</td>';
			    $eps=$fila["nom_eps"];
			    $doc=$fila["doc_pac"];
			    $cie=$fila["descricie"];
			    echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1 text-center" data-toggle="modal" data-target="#modalpac"> </td>';
					echo'<th class="text-center" ><a href="rpt_valinifisio_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_fisiodom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span> </button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_valinito_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_todom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_valinifono_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_fonodom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_valinipsico_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_psicodom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_valinitr_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_trdom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
					echo'<th class="text-center" ><a href="rpt_valininutri_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_nutri_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo'<th class="text-center" ><a href="rpt_hcmed_dom.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&cie='.$cie.'&eps='.$eps.'&doc='.$doc.'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			    echo "</tr>\n";
			  }
			}
			}
			?>
		<table>
	</section>
</section>
	<?php
}
?>
