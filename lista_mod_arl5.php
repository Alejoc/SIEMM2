
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

			case 'FISIO':
				$sql="UPDATE evolucion_arl SET freg_evo_arl='".$_POST["freg"]."',hreg_evo_arl='".$_POST["hreg"]."',evolucion_arl='".$_POST["evolucion"]."' WHERE id_evoarl=".$_POST["idevolucion"];
				$subtitulo="Actualizado";
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

if (isset($_GET["mante"])){
	$idevo=$_REQUEST["idevo"];
	$idadm=$_REQUEST["idadmhosp"];
	$tterapia=$_REQUEST["tterapia"];				///nivel 2
	switch ($_GET["mante"]) {

				case 'FISIO':

					$sql="select
a.doc_pac,a.nom1,a.nom2,a.ape1,a.ape2 paciente, b.id_adm_hosp id_adm_hosp,
e.id_evoarl id, e.freg_evo_arl fecha_evo,e.hreg_evo_arl hora_evo,e.evolucion_arl evolucion,e.id_user id_user,
f.nombre nombre_usuario, f.firma firmat,
g.nom_eps eps,
h.nom_sedes sedes

from pacientes a right join adm_hospitalario b on (b.id_paciente = a.id_paciente)
right join evolucion_arl e on (e.id_adm_hosp = b.id_adm_hosp)
right join user f on (f.id_user = e.id_user)
right join eps g on (g.id_eps = b.id_eps)
right join sedes_ips h on (h.id_sedes_ips = b.id_sedes_ips)
where b.tipo_servicio = 'ARL' and e.id_evoarl='".$idevo."'";


			$color="yellow";
			$boton="Actualizar";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='disabled';
			$date=date('Y/m/d');
			$date1=date('H:i');
			$subtitulo='';
			$ident=$_GET["doc"];
			$f1=$_GET["f1"];
			$f2=$_GET["f2"];
			break;


		}
//echo $sql;
		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){
				$fila=array("doc_pac"=>"","nom1"=>"",' ',"nom2"=>"",' ',"ape1"=>"",' ',"ape2"=>"", "id_adm_hosp"=>"" ,"id"=>"" ,"fecha_evo"=>"" ,"hora_evo"=>"" ,"evolucion"=>"");

			}
		}else{
				$fila=array("doc_pac"=>"","nom1"=>"",' ',"nom2"=>"",' ',"ape1"=>"",' ',"ape2"=>"", "id_adm_hosp"=>"" ,"id"=>"" ,"fecha_evo"=>"" ,"hora_evo"=>"" ,"evolucion"=>"");
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


<form action="<?php echo PROGRAMA.'?&opcion=79&docu='.$ident.'&f1='.$f1.'&f2='.$f2;?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
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
					<label for="">Tipo Afiliacion:</label>
					<input type="text" name="fhingreso" class="form-control" value="<?php echo $fila["tipo_afiliacion"];?>"<?php echo $atributo2?>/>
				</article>
				<article class="col-xs-6">
					<label for="">Ocupacion:</label>
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
					<label for="">Identificacion:</label>
					<input type="text" name="identificacion" class="form-control text-center" value="<?php echo $fila["tdoc_pac"];?> <?php echo $fila["doc_pac"];?>"<?php echo $atributo3;?>/>
					<input type="hidden" name="ident" class="form-control text-center" value="<?php echo $fila["doc_pac"];?>"<?php echo $atributo3;?>/>
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
					<label for="">Religion:</label>
					<input type="text" name="nompac" class="form-control text-center" value=""<?php echo $atributo3;?>/>
				</article>
				<article class="col-xs-3">
					<label for="">Edad:</label>
					<input type="text" name="edad" class="form-control text-center" value="<?php echo $fila["edad"];?>"<?php echo $atributo3;?>/>
				</article>

				<figure class="col-xs-6">
					<img src="<?php echo $fila["fotopac"];?>" alt ="foto" class="image_logo_admision">
				</figure>
			</section>
		</section>

	<article>
		<h4 id="th-estilot">Datos de Evolucion</h4>
	</article>
	<section class="panel-body"> <!--Anamnesis-->
		<section class="panel-body">
			<article class="col-xs-3">
				<label for="">Fecha de registro:</label>
				<input type="text" name="freg" value="<?php echo $fila["fecha_evo"] ;?>" class="form-control" >
				<input type="hidden" name="idevolucion" value="<?php echo $fila["id"] ;?>" class="form-control" >

			</article>
			<article class="col-xs-3">
				<label for="">Hora de registro</label>
				<input type="text" name="hreg" value="<?php echo $fila["hora_evo"]  ;?>" class="form-control" >
			</article>
			<article class="col-xs-5">
				<label >Evolucion: <span class="fa fa-info-circle" data-toggle="popover" title="Consolidado de la realidad del paciente" data-content=""></span></label>
				<textarea class="form-control" name="evolucion" rows="6" id="comment" ><?php echo $fila["evolucion"];?></textarea>
			</article>
	<div class="row text-center">
	  	<input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>

<?php
}else{
	echo '<div class="alert alert-success animated bounceInRight">';
	echo $subtitulo;
	echo '</div>';
// nivel 1?>
<div class="panel-default">
<div class="panel-body">
	<section class="panel panel-default" class="col-xs-12" >
		<form>
			<section class="panel-body">
					<article class="col-xs-2">
						<label>Fecha inicial:</label>
						<input type="date" class="form-control" value="<?php echo $_GET["f1"];?>" name="fecha1">
					</article>
					<article class="col-xs-2">
						<label>Fecha Final:</label>
						<input type="date" class="form-control" value="<?php echo $_GET["f2"];?>" name="fecha2">
					</article>
					<article class="col-xs-2">
							<label for="">Seleccione mes:</label>
							<select class="form-control" name="mes">
								<option value="enero">enero</option>
								<option value="febrero">febrero</option>
								<option value="marzo">marzo</option>
								<option value="abril">abril</option>
								<option value="mayo">mayo</option>
								<option value="junio">junio</option>
								<option value="julio">julio</option>
								<option value="agosto">agosto</option>
								<option value="septiembre">septiembre</option>
								<option value="octubre">octubre</option>
								<option value="noviembre">noviembre</option>
								<option value="diciembre">diciembre</option>

							</select>
					</article>
					<article class="col-xs-3">
						<label for="">Numero de identificacion:</label>
							<input type="text" class="form-control" name="doc" value="<?php echo $_GET["docu"];?>" placeholder="Digite Identificacion">
					</article>
					<div class="col-xs-3">
						<input type="submit" name="buscar" class="btn btn-primary" value="Consultar">
						<input type="hidden" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
					</div>
			</section>
	  </form>




	<table class="table table-bordered">
	<tr>
		<th id="th-estilo1">IDENTIFICACION</th>
		<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
		<th id="th-estilo3">TIPO TERAPIA</th>
		<th id="th-estilo3">ID EVOLUCION</th>
		<th id="th-estilo4">FECHA EVOLUCION</th>
		<th id="th-estilo4">HORA EVOLUCION</th>
		<th id="th-estilo4">EVOLUCION</th>
		<th id="th-estilo4">PROFESIONAL</th>
	</tr>

	<?php
	if (isset($_REQUEST["doc"])){
	$doc=$_REQUEST["doc"];
	$f1=$_REQUEST["fecha1"];
	$f2=$_REQUEST["fecha2"];
	$mes=$_REQUEST["mes"];
	$sql="
	select
		a.doc_pac,a.nom1,a.nom2,a.ape1,a.ape2 paciente, b.id_adm_hosp id_adm_hosp,
		e.id_evoarl id, e.freg_evo_arl fecha_evo,e.hreg_evo_arl hora_evo,e.evolucion_arl evolucion,e.espec_evo_arl especialidad,e.id_user id_user,
		f.nombre nombre_usuario, f.firma firmat,
		g.nom_eps eps,
		h.nom_sedes sedes

		from pacientes a right join adm_hospitalario b on (b.id_paciente = a.id_paciente)
		right join evolucion_arl e on (e.id_adm_hosp = b.id_adm_hosp)
		right join user f on (f.id_user = e.id_user)
		right join eps g on (g.id_eps = b.id_eps)
		right join sedes_ips h on (h.id_sedes_ips = b.id_sedes_ips)
		where b.tipo_servicio = 'ARL' and a.doc_pac='".$doc."' and e.freg_evo_arl BETWEEN '".$f1."' and '".$f2."'

	";

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {

			echo"<tr >\n";
			echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
			echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center">'.$fila["especialidad"].'</td>';
			echo'<td class="text-center">'.$fila["id"].'</td>';
			echo'<td class="text-center">'.$fila["fecha_evo"].'</td>';
			echo'<td class="text-center">'.$fila["hora_evo"].'</td>';
			echo'<td class="text-justify">'.$fila["evolucion"].'</td>';
			echo'<td class="text-center">'.$fila["nombre_usuario"].'</td>';
			$edad=$fila["doc_pac"];
			$cie=$fila["descricie"];
			echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=FISIO&idadmhosp='.$fila["id_adm_hosp"].'&idevo='.$fila["id"].'&tterapia='.$fila["tipo_terapia"].'&doc='.$fila["doc_pac"].'&f1='.$f1.'&f2='.$f2.'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-edit"></span></button></a></th>';

			echo "</tr>\n";
		}
		$fechaactual=$_get["mes"];
		if ($fechaactual==enero) {
			$f1='2016-01-01';
			$f2='2016-01-31';
		}
		if ($fechaactual==febrero) {
			$f1='2016-02-01';
			$f2='2016-02-31';
		}
		if ($fechaactual==marzo) {
			$f1='2016-03-01';
			$f2='2016-03-31';
		}
		if ($fechaactual==abril) {
			$f1='2016-04-01';
			$f2='2016-04-31';
		}
		if ($fechaactual==mayo) {
			$f1='2016-05-01';
			$f2='2016-05-31';
		}
		if ($fechaactual==junio) {
			$f1='2016-06-01';
			$f2='2016-06-31';
		}
		if ($fechaactual==julio) {
			$f1='2016-07-01';
			$f2='2016-07-31';
		}
		if ($fechaactual==agosto) {
			$f1='2016-08-01';
			$f2='2016-08-31';
		}
		if ($fechaactual==septiembre) {
			$f1='2016-09-01';
			$f2='2016-09-31';
		}
		if ($fechaactual==octubre) {
			$f1='2016-10-01';
			$f2='2016-10-31';
		}
		if ($fechaactual==noviembre) {
			$f1='2016-11-01';
			$f2='2016-11-31';
		}
		if ($fechaactual==diciembre) {
			$f1='2016-12-01';
			$f2='2016-12-31';
		}
		$id=$fila["id_adm_hosp"];
		$sql1="select b.id_adm_hosp id_adm_hosp,e.espec_evo_arl, count(8) cuantas
		from pacientes a inner join adm_hospitalario b on (b.id_paciente = a.id_paciente)
										 inner join evolucion_arl e on (e.id_adm_hosp = b.id_adm_hosp)
		where b.id_adm_hosp='".$id."' and e.freg_evo_arl between '".$f1."' and '".$f2."'
		group by e.espec_evo_arl
		";

		if ($tabla=$bd1->sub_tuplas($sql1)){

			foreach ($tabla as $fila1 ) {

				echo"<tr> \n";
				echo'<td class="text-center alert-info">Evoluciones realizadas de: '.$fila1["espec_evo_arl"].'</td>';
				echo'<td class="text-center">'.$fila1["cuantas"].'</td>';
				echo "</tr>\n";

			}
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
