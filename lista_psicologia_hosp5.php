
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
	<section class="panel-body">
		<?php
			include("consulta_rapida.php");
		?>
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
<section class="panel-body">
	<?php
		include("consulta_rapida1.php");
	?>
</section>
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
