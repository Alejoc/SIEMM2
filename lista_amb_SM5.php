
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
				$docpac=$_POST['doc_pac'];
				$tallat=$_POST["talla"] * $_POST["talla"];
				$imc=$_POST["peso"] / $tallat;
				$tam1=$_POST["tad"] * 2;
				$tam2=$tam1 + $_POST["tds"];
				$tamt=$tam2/3;
				$sql="INSERT INTO hc_sm_pv (id_adm_hosp, id_user, freg_hcsm_pv, hreg_hcsm_pv, motivo_consulta, enfer_actual, his_personal, his_familiar, perso_premorbida, ant_alergicos, ant_patologico, ant_quirurgico, ant_toxicologico, ant_farmaco, ant_gineco, ant_psiquiatrico, ant_hospitalario, ant_traumatologico, ant_familiar, otros_ant, estado_general, tad, tas, tam, fr, fc, so, peso, talla, temperatura, imc, cabcuello, torax, ext, abdomen, neurologico, genitourinario, examen_mental, analisis, finalidad, causa_externa, dxp, ddxp, tdxp, dx1, ddx1, tdx1, dx2, ddx2, tdx2, dx3, ddx3, tdx3, plantratamiento, tipo_atencion, estado_hcsm_pv) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["motivoconsulta"]."','".$_POST["enferactual"]."','".$_POST["hpersonal"]."','".$_POST["hfamiliar"]."','".$_POST["ppremorbida"]."','".$_POST["antalergico"]."','".$_POST["antpatologico"]."','".$_POST["antquirurgico"]."','".$_POST["anttoxicologicos"]."','".$_POST["antfarmacologico"]."','".$_POST["antgineco"]."','".$_POST["antpsiquiatrico"]."','".$_POST["anthospitalario"]."','".$_POST["anttrauma"]."','".$_POST["antfami"]."','".$_POST["antotros"]."','".$_POST["estadogen"]."','".$_POST["tad"]."','".$_POST["tas"]."','$tamt','".$_POST["fr"]."','".$_POST["fc"]."','".$_POST["sao2"]."','".$_POST["peso"]."','".$_POST["talla"]."','".$_POST["temperatura"]."','$imc','".$_POST["cabezacuello"]."','".$_POST["torax"]."','".$_POST["extsup"]."','".$_POST["abdomen"]."','".$_POST["neurologico"]."','".$_POST["genitourinario"]."','".$_POST["exmental"]."','".$_POST["analisis"]."','".$_POST["finconsulta"]."','".$_POST["causaexterna"]."','".$_POST["dx"]."','".$_POST["dx"]."','".$_POST["tdx"]."','".$_POST["dx1"]."','".$_POST["dx1"]."','".$_POST["tdx1"]."','".$_POST["dx2"]."','".$_POST["dx2"]."','".$_POST["tdx2"]."','".$_POST["dx3"]."','".$_POST["dx3"]."','".$_POST["tdx3"]."','".$_POST["plant"]."','".$_POST["tipo_atencion"]."','Realizada')";
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
			case 'EVO':
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
			b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,zona_residencia,nivel,tipo_servicio,resp_admhosp,

			j.nom_eps
			from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente

			      left join eps j on (j.id_eps=b.id_eps)
			where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$color="yellow";
			$boton="Agregar HC Consulta externa";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='disabled';
			$date=date('Y/m/d');
			$date1=date('H:i');
			$subtitulo='';
			$doc=$fila['doc_pac'];
			break;
		}
//echo $sql;
		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){
				$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","edad"=>"","fnacimiento"=>"","dir_pac"=>"","tel_pac"=>"","rh"=>"","email_pac"=>"","genero"=>"","lateralidad"=>"","religion"=>"","fotopac"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","fegreso_hosp"=>"","hegreso_hosp"=>"","zona_residencia"=>"","nivel"=>"","tipo_servicio"=>"","resp_admhosp"=>"", "nom_eps"=>"");
			}
		}else{
				$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","edad"=>"","fnacimiento"=>"","dir_pac"=>"","tel_pac"=>"","rh"=>"","email_pac"=>"","genero"=>"","lateralidad"=>"","religion"=>"","fotopac"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","fegreso_hosp"=>"","hegreso_hosp"=>"","zona_residencia"=>"","nivel"=>"","tipo_servicio"=>"","resp_admhosp"=>"", "nom_eps"=>"");
			}

		?>
<form action="<?php echo PROGRAMA.'?opcion=66';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
		<section class="panel-body">
			<?php
				include("consulta_paciente.php");
			?>
		</section>
			<div id="tabs">
		  <ul>
		    <li><a href="#tabs-1">Anamnesis</a></li>
		    <li><a href="#tabs-2">Antecedentes Personales</a></li>
		    <li><a href="#tabs-3">Examen fisico, Exploracion General y Regional</a></li>
				<li><a href="#tabs-5">Analisis</a></li>
				<li><a href="#tabs-6">Impresion Diagnostica</a></li>
				<li><a href="#tabs-7">Plan tratamiento</a></li>
		  </ul>
		  <div id="tabs-1">
				<article class="col-xs-3">
					<label for="">Fecha de registro:</label>
					<input type="text" name="freg" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo1?> >
				</article>
				<article class="col-xs-3">
					<label for="">Hora de registro</label>
					<input type="text" name="hreg" value="<?php echo $date1 ;?>" class="form-control" <?php echo $atributo1?>>
				</article>
				<article class="col-xs-5">
					<label for="">Tipo de atencion:</label>
					<select name="tipo_atencion" class="form-control"  required="" <?php echo atributo3; ?>>
						<option value=""></option>
						<option value="890202">CONSULTA DE PRIMERA VEZ POR MEDICINA ESPECIALIZADA</option>
						<option value="890302">CONSULTA DE CONTROL O DE SEGUIMIENTO POR MEDICINA ESPECIALIZADA </option>
					</select>
				</article>
				<article class="col-xs-10">
					<label for="">Motivo de consulta:</label>
					<textarea class="form-control" name="motivoconsulta" rows="5" id="comment" required=""></textarea>
				</article>
				<article class="col-xs-10">
					<label for="" >Enfermedad Actual: <span class="fa fa-info-circle" data-toggle="popover" title="Circunstancias especiales del paciente en relación con su enfermedad" data-content=""></span></label>
					<textarea class="form-control" name="enferactual" rows="5" id="comment" required=""></textarea>
				</article>
				<article class="col-xs-5">
					<label >Historia Personal: <span class="fa fa-info-circle" data-toggle="popover" title="Embarazo, parto, lactancia y desarrollo psicomotor, niñez, adolecencia,adultez, senectud, personalidad previa, antecedentes legales" data-content=""></span></label>
					<textarea class="form-control" name="hpersonal" rows="6" id="comment" required=""></textarea>
				</article>
				<article class="col-xs-5">
					<label for="">Historia Familiar:</label>
					<textarea class="form-control" name="hfamiliar" rows="6" id="comment" required=""></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">Personalidad Premorbida:</label>
					<textarea class="form-control" name="ppremorbida" rows="3" id="comment" required=""></textarea>
				</article>
		  </div>
		  <div id="tabs-2">
				<article class="col-xs-3">
					<label for="">Alergicos:</label>
					<button type="button" class="btn-danger"  onclick="verTexto1()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="antalergico" rows="4" id="respuesta1" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Psiquiatricos:</label>
					<button type="button" class="btn-danger"  onclick="verTexto2()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="antpsiquiatrico" rows="4" id="respuesta2" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Patologicos:</label>
					<button type="button" class="btn-danger"  onclick="verTexto3()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="antpatologico" rows="4" id="respuesta3" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Quirurgicos:</label>
					<button type="button" class="btn-danger"  onclick="verTexto4()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="antquirurgico" rows="4" id="respuesta4" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Toxicológicos:</label>
					<button type="button" class="btn-danger"  onclick="verTexto5()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="anttoxicologicos" rows="4" id="respuesta5" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Farmacológicos:</label>
					<button type="button" class="btn-danger"  onclick="verTexto6()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="antfarmacologico" rows="4" id="respuesta6" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Hospitalarios:</label>
					<button type="button" class="btn-danger"  onclick="verTexto7()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="anthospitalario" rows="4" id="respuesta7" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Gineco-obstetricos:</label>
					<textarea class="form-control" name="antgineco" rows="4" id="respuesta" ></textarea>
				</article>
				<article class="col-xs-4">
					<label for="">Traumatologicos:</label>
					<button type="button" class="btn-danger"  onclick="verTexto8()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="anttrauma" rows="4" id="respuesta8" required=""></textarea>
				</article>
				<article class="col-xs-4">
					<label for="">Familiares:</label>
					<button type="button" class="btn-danger"  onclick="verTexto9()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="antfami" rows="4" id="respuesta9" required=""></textarea>
				</article>
				<article class="col-xs-4">
					<label for="">Otros Antecedentes:</label>
					<button type="button" class="btn-danger"  onclick="verTexto10()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control"  name="antotros" rows="4" id="respuesta10" required=""></textarea>
				</article>
		  </div>
		  <div id="tabs-3">
				<article class="col-xs-2">
					<label for="">TAS(mm/hg):</label>
					<input type="text" name="tas" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">TAD(mm/hg):</label>
					<input type="text" name="tad" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">FC(x min):</label>
					<input type="text" name="fc" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">FR(x min):</label>
					<input type="text" name="fr" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">SAO2:</label>
					<input type="text" name="sao2" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">Peso(Kg):</label>
					<input type="text" name="peso" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">Talla(mts): <span class="fa fa-pulse fa-comment-o" data-toggle="popover" title="El valor correspondiente a la talla del paciente debe ser diligenciado en metros Ej: 1.95" data-content=""></span></label>
					<input type="text" name="talla" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">Temp(°C):</label>
					<input type="text" name="temperatura" value="" class="form-control">
				</article>
				<article class="col-xs-6 animated tada fuente_alerta_fijo">
					<label class="fuente_alerta_fijo" for="">Doctor(a) los datos que debe ingresar en estos campos deben ser numericos, en el campo de talla digite en metros Ejemplo: 1.95</label>
				</article>
				<article class="col-xs-12">
					<label for="">Estado General:</label>
					<button type="button" class="btn-danger"  onclick="verTexto11()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="estadogen" rows="3" id="respuesta11" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Cabeza y Cuello:</label>
					<button type="button" class="btn-danger"  onclick="verTexto12()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="cabezacuello" rows="5" id="respuesta12" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Torax:</label>
					<button type="button" class="btn-danger"  onclick="verTexto13()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="torax" rows="5" id="respuesta13" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Abdomen:</label>
					<button type="button" class="btn-danger"  onclick="verTexto16()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="abdomen" rows="5" id="respuesta16" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Genitourinario:</label>
					<button type="button" class="btn-danger"  onclick="verTexto17()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="genitourinario" rows="5" id="respuesta17" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Extremidades:</label>
					<button type="button" class="btn-danger"  onclick="verTexto14()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="extsup" rows="5" id="respuesta14" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Neurologico:</label>
					<button type="button" class="btn-danger"  onclick="verTexto15()" ><span class="ui-icon ui-icon-plus"></span></button>
					<textarea class="form-control" name="neurologico" rows="5" id="respuesta15" required=""></textarea>
				</article>
		  </div>
			<div id="tabs-5">
				<article class="col-xs-10">
					<label for="">Examen Mental:</label>
					<textarea class="form-control" name="exmental" rows="5" id="comment" required=""></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">Analisis:</label>
					<textarea class="form-control" name="analisis" rows="5" id="comment" required=""></textarea>
				</article>
				<article class="col-xs-5">
					<label for="">Finalidad de la consulta: </label>
					<select name="finconsulta" class="form-control"  required="" <?php echo atributo3; ?>>
						<option value=""></option>
						<?php
						$sql="SELECT id_fconsulta,descripfconsulta from finalidad_consulta ORDER BY id_fconsulta ASC";
						if($tabla=$bd1->sub_tuplas($sql)){
							foreach ($tabla as $fila2) {
								if ($fila["descripfconsulta"]==$fila2["descripfconsulta"]){
									$sw=' selected="selected"';
								}else{
									$sw="";
								}
							echo '<option value="'.$fila2["descripfconsulta"].'"'.$sw.'>'.$fila2["descripfconsulta"].'</option>';
							}
						}
						?>
					</select>
				</article>
				<article class="col-xs-5">
					<label for="">Causa externa: </label>
					<select name="causaexterna" class="form-control"  required=""  <?php echo atributo3; ?>>
						<option value=""></option>
						<?php
						$sql="SELECT id_cexterna,descricexterna from causa_externa ORDER BY id_cexterna ASC";
						if($tabla=$bd1->sub_tuplas($sql)){
							foreach ($tabla as $fila2) {
								if ($fila["descricexterna"]==$fila2["descricexterna"]){
									$sw=' selected="selected"';
								}else{
									$sw="";
								}
							echo '<option value="'.$fila2["descricexterna"].'"'.$sw.'>'.$fila2["descricexterna"].'</option>';
							}
						}
						?>
					</select>
				</article>

			</div>
			<div id="tabs-6">
				<article class="col-xs-12">
					<?php include("dxbusqueda.php");?>
				</article>
			</div>
			<div id="tabs-7">
				<article class="col-xs-12">
					<label for="">Plan de tratamiento:</label>
					<textarea class="form-control" name="plant" rows="8" id="comment" required=""></textarea>
				</article>
				<section class="text-center">
				  <input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
					<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
					<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
				</section>
			</div>
		</div>
		</form>

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
	<section class="panel panel-default" class="col-xs-7" >
		<section >
			<form class="navbar-form navbar-center"  >
	        	<section class="form-group col-xs-3">
	          		<input type="text" class="form-control" name="doc" placeholder="Digite Identificacion">
	        	</section>

						<input type="submit" name="buscar" class="btn btn-primary" value="Consultar">
						<input type="hidden" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>

	    		</form>
			<form class="navbar-form navbar-center" >
						<section class="form-group col-xs-3">
								<input type="text" class="form-control" name="nom" placeholder="Digite Nombre paciente">
						</section>

						<input type="submit" name="buscar" class="btn btn-primary" value="Consultar">
						<input type="hidden" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>

			</form>
		</section>

<table class="table table-responsive">
	<tr>
		<th id="th-estilo1">ADMISIÓN</th>
		<th id="th-estilo1">IDENTIFICACIÓN</th>
		<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
		<th id="th-estilo3">FECHA INGRESO</th>
		<th id="th-estilo3">HORA INGRESO</th>
		<th id="th-estilo3">SERVICIO</th>
		<th id="th-estilo3">FOTO</th>
		<th id="th-estilo4">HC Ingreso</th>
		<th id="th-estilo4">Evolución</th>
		<th id="th-estilo4">Incapacidad</th>
		<th id="th-estilo4">Ayudas DX</th>
		<th id="th-estilo4">Formula medica</th>
	</tr>

	<?php
	if (isset($_REQUEST["doc"])){
	$doc=$_REQUEST["doc"];
	$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_servicio,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE p.doc_pac='".$doc."' and a.estado_adm_hosp='Activo' and tipo_servicio='Consulta Externa SM'";

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {
			echo"<tr >	\n";
			echo'<td class="text-center">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
			echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center">'.$fila["fingreso_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["hingreso_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["tipo_servicio"].'</td>';
			echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
			echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=21&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-stethoscope"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=42&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=83&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-flask"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-toggle-on"></span></button></a></th>';



			echo "</tr>\n";
		}
	}
}
if (isset($_REQUEST["nom"])){
	$doc=$_REQUEST["nom"];
	$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_servicio,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE p.nom1 LIKE '%".$doc."%' and a.estado_adm_hosp='Activo' and tipo_servicio='Consulta Externa SM'";

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {

			echo"<tr >	\n";
			echo'<td class="text-center">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
			echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center">'.$fila["fingreso_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["hingreso_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["tipo_servicio"].'</td>';
			echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
			echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=21&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-stethoscope"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=42&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=83&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-flask"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-toggle-on"></span></button></a></th>';
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
