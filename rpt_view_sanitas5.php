
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
		<script type="text/javascript" src="/js/jquery.js"></script>
		<style>
		b{color:blue;}
		#resultado{width:600px;border:solid 1px #dadada;text-align:justify;padding:5px;}
		</style>
		<script src="ajax.js"></script>


<?php
}else{
	echo $subtitulo;
// nivel 1?>
<div class="panel-default">
<section class="panel-heading"><h4>Informe de auditoria semanal Sanitas EPS</h4></section>
<div class="panel-body">
	<section class="panel panel-default" class="col-xs-10" >
		<section class="panel-body">
			<form  >
	        	<section class="col-xs-12">
								<article class="col-xs-2">
									<label>Fecha inicial:</label>
									<input type="date" class="form-control" name="fecha1">
								</article>
								<article class="col-xs-2">
									<label>Fecha Final:</label>
									<input type="date" class="form-control" name="fecha2">
								</article>

								<input type="submit" name="buscar" class="btn btn-primary" value="Consultar">
								<input type="hidden" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
	        	</section>
	    		</form>
			</section>
			<section>

		</section>


	<table class="table table-responsive">
	<tr>
		<th id="th-estilo1">FECHA INGRESO</th>
		<th id="th-estilo2">FECHA ACTUAL</th>
		<th id="th-estilo3">DIAS</th>
		<th id="th-estilo3">IDENTIFICACION</th>
		<th id="th-estilo3">1 APELLIDO</th>
    <th id="th-estilo3">2 APELLIDO</th>
    <th id="th-estilo3">1 NOMBRE</th>
    <th id="th-estilo3">2 NOMBRE</th>
		<th id="th-estilo4">FECHA NACIMIENTO</th>
		<th id="th-estilo4">SEXO</th>
    <th id="th-estilo4">ESPECILIDAD</th>
    <th id="th-estilo4">dx ingreso</th>
    <th id="th-estilo4">dx 2</th>
    <th id="th-estilo4">dx 3</th>
    <th id="th-estilo4">dx 4</th>
    <th id="th-estilo4">fecha egreso</th>
    <th id="th-estilo4">estado clinico egreso</th>
    <th id="th-estilo4">dx egreso</th>
    <th id="th-estilo4">manejo egreso</th>
    <th id="th-estilo4">conducta</th>
	</tr>

	<?php
	if (isset($_REQUEST["fecha1"])){

	$f1=$_REQUEST["fecha1"];
	$f2=$_REQUEST["fecha2"];
	$sql="SELECT p.tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fnacimiento,genero,a.id_adm_hosp,estado_adm_hosp,fegreso_hosp,IFNULL(a.fegreso_hosp,'".$f2."') fecha_fin, fingreso_hosp,IF(fingreso_hosp <= '".$f1."',
	IF(IFNULL(a.fegreso_hosp,0)=0, (CAST(IFNULL(a.fegreso_hosp,'".$f2."') AS DATE)- CAST(IF(fingreso_hosp <= '".$f1."',
	                    '".$f1."',a.fingreso_hosp) AS DATE))+1, (CAST(IFNULL(a.fegreso_hosp,'".$f2."') AS DATE)- CAST(IF(a.fingreso_hosp <= '".$f1."',
	                    '".$f1."',a.fingreso_hosp) AS DATE))), (CAST(IFNULL(a.fegreso_hosp,'".$f2."') AS DATE)- CAST(IF(a.fingreso_hosp <= '".$f1."',
	                    '".$f1."',a.fingreso_hosp) AS DATE))) difer1,
	                    IF(fingreso_hosp <= '".$f1."', '".$f1."',fingreso_hosp) fecha_inicio,(CAST(IFNULL(fegreso_hosp,'".$f2."') AS DATE)- CAST(IF(fingreso_hosp <= '".$f1."', '".$f1."',fingreso_hosp) AS DATE)) dias,
	                    e.nom_eps,i.nom_sedes,h.ddxp,h.ddx1 dx1,h.ddx2 dx2,h.ddx3 dx3,max(objetivo),max(subjetivo),max(analisis_evomed),max(plan_tratamiento),d.ddxp_epi,analisis_epicrisis,plant_epicrisis

	FROM pacientes p INNER JOIN adm_hospitalario a on p.id_paciente=a.id_paciente INNER JOIN eps e on e.id_eps=a.id_eps INNER JOIN sedes_ips i on i.id_sedes_ips=a.id_sedes_ips
                   LEFT JOIN hc_hospitalario h on h.id_adm_hosp=a.id_adm_hosp LEFT JOIN evolucion_medica c on c.id_adm_hosp=a.id_adm_hosp LEFT JOIN epicrisis d on d.id_hchosp=h.id_hchosp
	WHERE a.tipo_servicio = 'Hospitalario' and ((fingreso_hosp <'".$f2."' and fegreso_hosp is null ) or (fegreso_hosp between '".$f1."' and '".$f2."'))
	and a.id_sedes_ips in (2,8) and a.id_eps=13 group by a.id_adm_hosp
	";

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {

				echo"<tr >\n";
				echo'<td class="text-center alert-info">'.$fila["fingreso_hosp"].'</td>';
        echo'<td class="text-center alert-info">'.date ('Y-m-d').'</td>';
        echo'<td class="text-center alert-info">'.$fila["difer1"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["doc_pac"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["ape1"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["ape2"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["nom1"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["nom2"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["fnacimiento"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["genero"].'</td>';
        echo'<td class="text-center alert-info">Psiquiatria</td>';
        echo'<td class="text-center alert-info">'.$fila["dx1"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["dx2"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["dx3"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["fegreso_hosp"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["analisis_epicrisis"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["ddxp_epi"].'</td>';
        echo'<td class="text-center alert-info">'.$fila["plant_epicrisis"].'</td>';
				echo'<td class="text-center alert-info">'.$fila["plant_epicrisis"].'</td>';
				$edad=$fila["doc_pac"];
				$idpaciente=$fila["id_paciente"];
				$cie=$fila["edad"];
				$eps=$fila["nom_eps"];
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
