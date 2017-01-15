
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
			$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,estadocivil,lateralidad,profesion,religion,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_usuario,tipo_afiliacion,ocupacion,dep_residencia,mun_residencia,zona_residencia,nivel,via_ingreso,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE a.id_adm_hosp=".$_GET["idadmhosp"];
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
				$fila=array("id_paciente"=>"","tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","fotopac"=>"","estadocivil"=>"","lateralidad"=>"","profesion"=>"","religion"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","tipo_usuario"=>"","tipo_afiliacion"=>"","ocupacion"=>"","dep_residencia"=>"","mun_residencia"=>"","zona_residencia"=>"","nivel"=>"","via_ingreso"=>"");
			}
		}else{
				$fila=array("id_paciente"=>"","tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","fotopac"=>"","estadocivil"=>"","lateralidad"=>"","profesion"=>"","religion"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","tipo_usuario"=>"","tipo_afiliacion"=>"","ocupacion"=>"","dep_residencia"=>"","mun_residencia"=>"","zona_residencia"=>"","nivel"=>"","via_ingreso"=>"");
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
	<div class="botonhc"id="th-estilo1">
			<a data-toggle="collapse" class="ac" data-target="#datpac" >Datos del Paciente</a> <span class="glyphicon glyphicon-arrow-down"></span>
	</div>

		<section class="collapse" id="datpac">
			<section class="panel-body" id="secteps"><!--section de eps-->
				<article class="col-xs-3">
					<label  for="">ID:</label>
					<input type="text"  name="idadmhosp" class="form-control" value="<?php echo $fila["id_adm_hosp"];?>"<?php echo $atributo2;?>/>
				</article>
				<article class="col-xs-5">
					<label for="">Fecha y Hora Ingreso:</label>
					<input type="text" name="fhingreso" class="form-control" value="<?php echo $fila["fingreso_hosp"];?> <?php echo $fila["hingreso_hosp"];?>"<?php echo $atributo2?>/>
				</article>
				<article class="col-xs-3">
					<label for="">Tipo Usuario:</label>
					<input type="text" name="fhingreso" class="form-control" value="<?php echo $fila["tipo_usuario"];?>"<?php echo $atributo2?>/>
				</article>
				<article class="col-xs-4">
					<label for="">Tipo Afiliación:</label>
					<input type="text" name="fhingreso" class="form-control" value="<?php echo $fila["tipo_afiliacion"];?>"<?php echo $atributo2?>/>
				</article>
				<article class="col-xs-6">
					<label for="">Ocupación:</label>
					<input type="text" name="fhingreso" class="form-control" value="<?php echo $fila["ocupacion"];?>"<?php echo $atributo2?>/>
				</article>
				<article class="col-xs-6">
					<label for="">Residencia:</label>
					<input type="text" name="fhingreso" class="form-control" value="<?php echo $fila["dep_residencia"];?> <?php echo $fila["mun_residencia"];?> <?php echo $fila["zona_residencia"];?>"<?php echo $atributo2?>/>
				</article>
			</section>
			<section class="panel-body" id="sectpac"> <!--section de paciente-->
				<article class="col-xs-1">
					<label  for="">ID:</label>
					<input type="text"  name="idpaci" class="form-control" value="<?php echo $fila["id_paciente"];?>"<?php echo $atributo2;?>/>
				</article>
				<article class="col-xs-5">
					<label for="">Nombre Completo:</label>
					<input type="text" name="nompac" class="form-control text-center" value="<?php echo $fila["nom1"];?> <?php echo $fila["nom2"];?> <?php echo $fila["ape1"];?> <?php echo $fila["ape2"];?>"<?php echo $atributo3;?>/>
				</article>
				<article class="col-xs-3">
					<label for="">Identificación:</label>
					<input type="text" name="identificacion" class="form-control text-center" value="<?php echo $fila["tdoc_pac"];?> <?php echo $fila["doc_pac"];?>"<?php echo $atributo3;?>/>
				</article>
				<article class="col-xs-3">
					<label for="">Estado Civil:</label>
					<input type="text" name="nompac" class="form-control text-center" value=""<?php echo $atributo3;?>/>
				</article>
				<article class="col-xs-3">
					<label for="">Lateralidad:</label>
					<input type="text" name="nompac" class="form-control text-center" value=""<?php echo $atributo3;?>/>
				</article>
				<article class="col-xs-3">
					<label for="">Religión:</label>
					<input type="text" name="nompac" class="form-control text-center" value=""<?php echo $atributo3;?>/>
				</article>
				<figure class="col-xs-6">
					<img src="<?php echo $fila["fotopac"];?>" alt ="foto" class="image_logo_admision">
				</figure>
			</section>
		</section>
		<article>
			<h4 id="th-estilot">Creación de Autorización</h4>
		</article>
<section class="panel panel-body">
	<article class="col-xs-2">
		<label for="">Fecha inicial de Autorización</label>
		<input type="date" class="form-control" name="finicial" value="">
	</article>
	<article class="col-xs-2">
		<label for="">Fecha final de Autorización</label>
		<input type="date" class="form-control" name="finicial" value="">
	</article>
	<section class="panel-body">
		<article class="col-xs-5">
			<label for="">Numero de autorización:</label>
			<input type="text" class="form-control" name="numautori" value="">
		</article>
		<article class="col-xs-5">
			<label for="">Tipo de servicio:</label>
			<select class="form-control" name="tservicio">
				<option value=""></option>
			</select>
		</article>
		<article class="col-xs-5">
			<label for="">Dx autorización:</label>
			<input type="text" name="dxautori" class="form-control" value="">
		</article>
	</section>
</section>
<section class="panel panel-footer">
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
	</section>
<table class="table table-responsive">
	<tr>
		<th id="th-estilo1">ADMISIÓN</th>
		<th id="th-estilo1">IDENTIFICACIÓN</th>
		<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
		<th id="th-estilo3">FECHA INGRESO</th>
		<th id="th-estilo3">HORA INGRESO</th>
		<th id="th-estilo3">FOTO</th>
		<th id="th-estilo4">Autorización</th>

	</tr>

	<?php
	if (isset($_REQUEST["doc"])){
	$doc=$_REQUEST["doc"];
	$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE p.doc_pac='".$doc."' and a.estado_adm_hosp='Activo'";

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {

			echo"<tr >\n";
			echo'<td class="text-center">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
			echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center">'.$fila["fingreso_hosp"].'</td>';
			echo'<td class="text-center">'.$fila["hingreso_hosp"].'</td>';
			echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1 text-center" data-toggle="modal" data-target="#modalpac"> </td>';
			echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-tag"></span></button></a></th>';

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
