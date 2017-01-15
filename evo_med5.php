
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
				$sql="";
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
				$sql="INSERT INTO evolucion_medica (id_adm_hosp,id_user,freg_evomed,hreg_evomed,objetivo,subjetivo,analisis_evomed,plan_tratamiento,remision_sintomas,conciencia_enfermedad,adherencia_terapeutica,dxp,ddxp,tdxp,dx1,ddx1,tdx1,dx2,ddx2,tdx2,resp_evomed,estado_evomed) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["objetivo"]."','".$_POST["subjetivo"]."','".$_POST["analisis"]."','".$_POST["plantratamiento"]."','".$_POST["remision_sintomas"]."','".$_POST["conciencia_enfermedad"]."','".$_POST["adherencia_terapeutica"]."','".$_POST["cdxp"]."','".$_POST["descridxp"]."','".$_POST["tdxp"]."','".$_POST["cdx1"]."','".$_POST["descridx1"]."','".$_POST["tdx1"]."','".$_POST["cdx2"]."','".$_POST["descridx2"]."','".$_POST["tdx2"]."','".$_SESSION["AUT"]["nombre"]."','Realizada')";
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
			b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,zona_residencia,nivel,tipo_servicio,resp_admhosp,
			c.descripestadoc,
			d.descriafiliado,
			e.descritusuario,
			f.descriocu,
			g.descripdep,
			h.descrimuni,
			i.descripuedad,
			j.nom_eps
			from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
						left join estado_civil c on (c.codestadoc = a.estadocivil)
						left join tusuario e on (e.codtusuario=b.tipo_usuario)
						left join tafiliado d on (d.codafiliado=b.tipo_afiliacion)
						left join ocupacion f on (f.codocu=b.ocupacion)
						left join departamento g on (g.coddep=b.dep_residencia)
						left join municipios h on (h.codmuni=b.mun_residencia)
						left join uedad i on (i.coduedad=a.uedad)
						left join eps j on (j.id_eps=b.id_eps)
			where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$color="yellow";
			$boton="Agregar Evolución";
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
				$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","edad"=>"","fnacimiento"=>"","dir_pac"=>"","tel_pac"=>"","rh"=>"","email_pac"=>"","genero"=>"","lateralidad"=>"","religion"=>"","fotopac"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","fegreso_hosp"=>"","hegreso_hosp"=>"","zona_residencia"=>"","nivel"=>"","tipo_servicio"=>"","resp_admhosp"=>"","descripestadoc"=>"","descriafiliado"=>"","descritusuario"=>"","descriocu"=>"", "descripdep"=>"", "descrimuni"=>"", "descripuedad"=>"", "nom_eps"=>"");
			}
		}else{
				$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","edad"=>"","fnacimiento"=>"","dir_pac"=>"","tel_pac"=>"","rh"=>"","email_pac"=>"","genero"=>"","lateralidad"=>"","religion"=>"","fotopac"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","fegreso_hosp"=>"","hegreso_hosp"=>"","zona_residencia"=>"","nivel"=>"","tipo_servicio"=>"","resp_admhosp"=>"","descripestadoc"=>"","descriafiliado"=>"","descritusuario"=>"","descriocu"=>"", "descripdep"=>"", "descrimuni"=>"", "descripuedad"=>"", "nom_eps"=>"");
			}

		?>
<script src = "js/sha3.js"></script>
		<script>
			function validar(){
				if (document.forms[0].subjetivo.value == ""){
					alert("Doctor(a) olvido diligenciar el campo 'SUBJETIVO' ");
					document.forms[0].subjetivo.focus();				// Ubicar el cursor
					return(false);
				}
				if (document.forms[0].objetivo.value == ""){
					alert("Doctor(a) olvido diligenciar el campo 'OBJETIVO' ");
					document.forms[0].objetivo.focus();				// Ubicar el cursor
					return(false);
				}
				if (document.forms[0].analisis.value == ""){
					alert("Doctor(a) olvido diligenciar el campo 'ANALISIS' ");
					document.forms[0].analisis.focus();				// Ubicar el cursor
					return(false);
				}
				if (document.forms[0].Plan_tratamiento.value == ""){
					alert("Doctor(a) olvido diligenciar el campo 'PLAN DE TRATAMIENTO' ");
					document.forms[0].Plan_tratamiento.focus();				// Ubicar el cursor
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
	<article>
		<h4 id="th-estilot">Datos de Evolución Medica</h4>
		<?php include("consulta_rapida.php");?>
	<section class="panel-body"> <!--Anamnesis-->
		<section class="panel-body">
			<article class="col-xs-3">
				<label for="">Fecha de registro:</label>
				<input type="text" name="freg" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo1;?> >
			</article>
			<article class="col-xs-3">
				<label for="">Hora de registro</label>
				<input type="time" name="hreg" value="<?php echo $date1 ;?>" class="form-control" <?php echo $atributo1;?>>
			</article>
			<article class="col-xs-10">
				<label for="">Subjetivo: <span class="fa fa-info-circle" data-toggle="popover" title="Versión de la realidad proporcionada por el paciente" data-content=""></span></label>
				<textarea class="form-control" name="subjetivo" rows="5" id="comment" ></textarea>
			</article>
			<article class="col-xs-10">
				<label for="" >Objetivo: <span class="fa fa-info-circle" data-toggle="popover" title="Realidad encontrada por el medico con relación al paciente" data-content=""></span></label>
				<textarea class="form-control" name="objetivo" rows="5" id="comment" ></textarea>
			</article>
			<article class="col-xs-5">
				<label >Analisis: <span class="fa fa-info-circle" data-toggle="popover" title="Consolidado de la realidad del paciente" data-content=""></span></label>
				<textarea class="form-control" name="analisis" rows="6" id="comment" ></textarea>
			</article>
			<article class="col-xs-5">
				<label for="">Plan tratramiento: <span class="fa fa-info-circle" data-toggle="popover" title="Definición de conducta y procedimientos a realizar en relación a la realidad del paciente" data-content=""></span></label>
				<textarea class="form-control" name="plantratamiento" rows="6" id="comment" ></textarea>
			</article>
				<article class="col-xs-3">
					<label for="">Remisión de síntomas</label>
					<select class="form-control" name="remision_sintomas" required="">
						<option value=""></option>
						<option value="SI">SI</option>
						<option value="NO">NO</option>
						<option value="PARCIAL">PARCIAL</option>
					</select>
				</article>
				<article class="col-xs-3">
					<label for="">Conciencia de enfermedad</label>
					<select class="form-control" name="conciencia_enfermedad" required="">
						<option value=""></option>
						<option value="SI">SI</option>
						<option value="NO">NO</option>
						<option value="PARCIAL">PARCIAL</option>
					</select>
				</article>
				<article class="col-xs-3">
					<label for="">Adherencia Terapeutica</label>
					<select class="form-control" name="adherencia_terapeutica" required="">
						<option value=""></option>
						<option value="SI">SI</option>
						<option value="NO">NO</option>
						<option value="PARCIAL">PARCIAL</option>
					</select>
				</article>
				<article class="col-xs-12">
					<h4 id="th-estilot">Selección de Diagnostico</h4>
				</article>
				<article class="col-xs-12">
					<label for="" class="alert-success">Diagnostico Principal</label>
					<?php include("diagnosticos/dx.php");?>
				</article>
				<article class="col-xs-12">
					<label for="" class="alert-Info">Diagnostico Principal</label>
					<?php include("diagnosticos/dx1.php");?>
				</article>
				<article class="col-xs-12">
					<label for="" class="alert-Info">Diagnostico Principal</label>
					<?php include("diagnosticos/dx2.php");?>
				</article>
		</section>
</section>
	</section>
		</section>
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
<div class="panel panel-default">
<div class="panel-body">

<table class="table table-bordered">
	<tr>
		<th colspan="2" id="th-estilo4">Ayudas DX</th>
		<th id="th-estilo1">ID</th>
		<th id="th-estilo1">IDENTIFICACIÓN</th>
		<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
		<th id="th-estilo3">FOTO</th>
		<th id="th-estilo4">Evolución Medica</th>
	</tr>
	<?php
	if (isset($_REQUEST["idadmhosp"])){
	$codadm=$_REQUEST["idadmhosp"];
	$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,s.nom_sedes FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips  WHERE a.id_adm_hosp=".$codadm;

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {

			echo"<tr >\n";
			echo'<th class="text-left" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=X&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary" ><span class="fa fa-flask"></span></button></a></th>';
			echo'<th class="text-left" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=X&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary" ><span class="fa fa-tint"></span></button></a></th>';
			echo'<td class="text-center">'.$fila["id_paciente"].'</td>';
			echo'<td class="text-center">'.$fila["tdoc_pac"].': '.$fila["doc_pac"].'</td>';
			echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
			echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
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
