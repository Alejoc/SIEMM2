<div class="fuente_titulo text-center animated jello"><h2>Detalle de Autorización de Servicios</h2></div>
<?php
$subtitulo="";
	if(isset($_POST["operacion"])){	//nivel3
		if($_POST["aceptar"]!="Descartar"){
			//print_r($_FILES);

			switch ($_POST["operacion"]) {
			case 'E':
			$sql="INSERT INTO detalle_autorizacion (id_autori_hosp, cups_autori,descrip_cups, cantidad_autori, frecuencia_autori, descripcion_autori, cancela_copago, valor_copago) VALUES
			('".$_POST["idautori"]."','".$_POST["codcups"]."','".$_POST["descripcups"]."','".$_POST["cantidad_autori"]."','".$_POST["frecuencia_autori"]."','".$_POST["descripcion_autori"]."','".$_POST["cancela_copago"]."','".$_POST["valor_copago"]."')";
			$subtitulo="Adicionado";

			break;
			case 'A':


			break;
		}
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="Detalle de autorizacion $subtitulo con exito!";
		}else{
			$subtitulo="Detalle de autorizacion  NO fue $subtitulo !!! .";
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
			$atributo2='readonly="readonly"';
			$atributo3='';
			$subtitulo='';
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
			$date=date('Y-m-d');
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
				if (document.forms[0].nom_cliente.value == ""){
					alert("Se requiere el nombre del cliente!");
					document.forms[0].nom_cliente.focus();				// Ubicar el cursor
					return(false);
				}
			}
		</script>
	<button type="button" class="btn btn-link animated bounceInRight" ><a href="<?php echo PROGRAMA.'?opcion=31';?>"><span class="glyphicon glyphicon-triangle-left"></span></a></button>
<form action="<?php echo PROGRAMA.'?opcion=25';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
	<section class="panel panel-default">
		<section class="panel panel-body">
			<article class="col-xs-12">
				<?php include("cups/cups.php");?>
			</article>
			<article class="col-xs-3">
				<label for="">Cantidad de sesiones:</label>
				<input type="number" class="form-control" name="cantidad_autori" value="">
				<input type="hidden" name="idadmhosp" value="<?php echo $_GET["idadmhosp"];?>">
				<input type="hidden" name="idautori" value="<?php echo $_GET["idautori"];?>">
			</article>
			<article class="col-xs-3">
				<label for="">Fecuencia de sesiones:</label>
				<select class="form-control" name="frecuencia_autori">
					<option value="3">3 HORAS </option>
					<option value="6">6 HORAS </option>
					<option value="8">8 HORAS </option>
					<option value="12">12 HORAS </option>
					<option value="24">24 HORAS </option>
					<option value="40">40 minutos </option>
					<option value="60">1 hora </option>
				</select>
			</article>
			<article class="col-xs-12">
				<label for="">Observaciones:</label>
				<textarea name="descripcion_autori" class="form-control" rows="5" cols="40"></textarea>
			</article>
			<article class="col-xs-2">
				<label for="">Cancela Copago?:</label>
			</article>
			<article class="col-xs-3">
				<label for="">NO</label>
				<input type="radio" class="radio" name="cancela_copago"
					<?php if (isset($tmuscular1) && $tmuscular1=="0") echo "checked";?>
					value="NO">
			</article>
			<article class="col-xs-3">
				<label for="">SI</label>
				<input type="radio" class="radio" name="cancela_copago"
					<?php if (isset($tmuscular1) && $tmuscular1=="1") echo "checked";?>
					value="SI">
			</article>
			<article class="col-xs-5">
				<label for="">Valor del copago:</label>
				<input type="text" class="form-control" name="valor_copago" value="0">
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
			<a class="btn btn-primary" href="<?php echo PROGRAMA.'?opcion=31';?>"><span class="glyphicon glyphicon-triangle-left">Regresar a Creación de autorizaciones</span></a>
	</div>
	<br>
<div class="panel panel-body">

<table class="table table-responsive">
	<tr>
		<th id="th-estilo2">ID ADM</th>
		<th id="th-estilo1">IDENTIFICACIÓN</th>
		<th id="th-estilo2">NOMBRE COMPLETO</th>
		<th id="th-estilo2">TIPO DE SERVICIO</th>
		<th id="th-estilo2">FECHA AUTORIZACION</th>
		<th id="th-estilo2">CLASE USUARIO</th>
		<th id="th-estilo2">ZONA EPS</th>
		<th id="th-estilo2"># AUTORIZACION</th>
		<th ></th>
	</tr>
	<?php
	if (isset($_REQUEST["idadmhosp"])){
	$idpaciente=$_GET["idadmhosp"];
	$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_servicio, u.id_autori_hosp,finicial,ffinal,clase_usuario,zeps,num_autorizacion FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN autorizacion_hosp u on a.id_adm_hosp=u.id_adm_hosp where a.id_adm_hosp='".$idpaciente."' and a.estado_adm_hosp='Activo'";
	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {
			echo"<tr >\n";
			echo'<td class="text-center alert-info">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center alert-info">'.$fila["tdoc_pac"].': '.$fila["doc_pac"].'</td>';
			echo'<td class="text-center alert-info">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center alert-info">'.$fila["tipo_servicio"].'</td>';
			echo'<td class="text-center alert-info">'.$fila["finicial"].' | '.$fila["ffinal"].'</td>';
			echo'<td class="text-center alert-info">'.$fila["clase_usuario"].'</td>';
			echo'<td class="text-center alert-info">'.$fila["zeps"].'</td>';
			echo'<td class="text-center alert-info">'.$fila["num_autorizacion"].'</td>';
			$idautori=$fila["id_autori_hosp"];

			echo'<th class="text-center alert-info" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&idautori='.$idautori.'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="glyphicon glyphicon-plus"></span></button></a></th>';
			echo "</tr>\n";
		}
	}
}
	?>
	</table>
	<br>
	<button data-toggle="collapse" class="btn btn-primary" data-target="#demo">Ver Servicios Autorizados <span class="glyphicon glyphicon-arrow-down"></span> </button>
  <section id="demo" class="collapse">
  	<table class="table table-bordered">
	<tr>
		<th id="th-estilo1">ID</th>
		<th id="th-estilo2">FECHA REGISTRO</th>
		<th id="th-estilo1">OBSERVACIONES</th>
		<th id="th-estilo2"></th>
	</tr>

	<?php
	if (isset($_REQUEST["idpac"])){
	$idcli=$_GET["idpac"];
	$sql="";

if ($tabla=$bd1->sub_tuplas($sql)){
	foreach ($tabla as $fila ) {
		echo"<tr>\n";
		echo'<td class="text-right">'.$fila["id_paciente"].'</td>';
		echo'<td class="text-left">'.$fila["parentesco"].'</td>';
		echo'<td class="text-left">'.$fila["nombre"].'</td>';
		echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&idveh='.$fila["id_vehiculo"].'&idp='.$fila["id_pesvtecnico"].'"><button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-eye-open"></span></button></a></th>';
		echo "</tr>\n";
	}
}
}
	?>

</table>
  </section>
</div>
</div>
	<?php
}
?>
