<div class="fuente_titulo text-center animated jello"><h2>Información Familiar del paciente</h2></div>
<?php
$subtitulo="";
	if(isset($_POST["operacion"])){	//nivel3
		if($_POST["aceptar"]!="Descartar"){
			//print_r($_FILES);

			switch ($_POST["operacion"]) {
			case 'E':
			$sql="INSERT INTO info_familiares (id_paciente,parentesco,nombre,identificacion,direccion,telefono,email,responsable) VALUES
			('".$_POST["idpac"]."','".$_POST["parentesco"]."','".$_POST["nombre"]."','".$_POST["identificacion"]."','".$_POST["direccion"]."','".$_POST["telefono"]."','".$_POST["email"]."','".$_POST["responsable"]."')";
			$subtitulo="Adicionado";

			break;
			case 'A':


			break;
		}
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="Familiar $subtitulo con exito!";
		}else{
			$subtitulo="Familiar NO fue $subtitulo !!! .";
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
	<button type="button" class="btn btn-link animated bounceInRight" ><a href="<?php echo PROGRAMA.'?opcion=25';?>"><span class="glyphicon glyphicon-triangle-left"></span></a></button>
<form action="<?php echo PROGRAMA.'?opcion=25';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
	<section class="panel panel-default">
		<section class="panel panel-body">
			<article class="col-xs-2">
				<input type="hidden" name="idpac" value="<?php echo $_GET["id_pac"];?>">
				<label for="">Parentesco:</label>
				<select name="parentesco" class="form-control" <?php echo atributo3; ?>>
					<?php
					$sql="SELECT id_parentesco,parentescos from parentesco ORDER BY id_parentesco ASC";
					if($tabla=$bd1->sub_tuplas($sql)){
						foreach ($tabla as $fila2) {
							if ($fila["parentescos"]==$fila2["parentescos"]){
								$sw=' selected="selected"';
							}else{
								$sw="";
							}
						echo '<option value="'.$fila2["parentescos"].'"'.$sw.'>'.$fila2["parentescos"].'</option>';
						}
					}
					?>
				</select>
			</article>
			<article class="col-xs-4">
				<label for="">Nombre completo:</label>
				<input type="text" name="nombre" value="" class="form-control">
			</article>
			<article class="col-xs-3">
				<label for="">Identificación:</label>
				<input type="text" name="identificacion" value="" class="form-control">
			</article>
			<article class="col-xs-6">
				<label for="">Dirección:</label>
				<input type="text" name="direccion" value="" class="form-control">
			</article>
			<article class="col-xs-2">
				<label for="">Teléfono:</label>
				<input type="tel" name="telefono" value="" class="form-control">
			</article>
			<article class="col-xs-4">
				<label for="">Email:</label>
				<input type="email" name="email" value="" class="form-control">
			</article>
			<article class="col-xs-4">
				<input type="hidden" name="responsable" value="<?php echo $_SESSION["AUT"]["nombre"]; ?>" class="form-control">
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
			<a class="btn btn-primary" href="<?php echo PROGRAMA.'?opcion=17';?>"><span class="glyphicon glyphicon-triangle-left">Regresar a Zona de Pacientes</span></a>
	</div>
	<br>
<div class="panel panel-body">

<table class="table table-responsive">
	<tr>
		<th id="th-estilo2">ID</th>
		<th id="th-estilo1">IDENTIFICACIÓN</th>
		<th id="th-estilo2">NOMBRE COMPLETO</th>
		<th id="th-estilo1">FOTO</th>
		<th ></th>
	</tr>
	<?php
	if (isset($_REQUEST["idpac"])){
	$idpaciente=$_GET["idpac"];
	$sql="SELECT id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fnacimiento,edad,uedad,dir_pac,tel_pac,email_pac,estadocivil,etnia,lateralidad,profesion,religion,fotopac FROM pacientes where id_paciente='".$idpaciente."'";
	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {
			echo"<tr >\n";
			echo'<td class="text-center info">'.$fila["id_paciente"].'</td>';
			echo'<td class="text-center info">'.$fila["tdoc_pac"].': '.$fila["doc_pac"].'</td>';
			echo'<td class="text-center info">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-left info"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login"> </td>';
			echo'<th class="text-center " ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&id_pac='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="glyphicon glyphicon-plus"></span></button></a></th>';
			echo "</tr>\n";
		}
	}
}
	?>
	</table>
	<br>
	<button data-toggle="collapse" class="btn btn-primary" data-target="#demo">Ver Registros <span class="glyphicon glyphicon-arrow-down"></span> </button>
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
	$sql="SELECT id_paciente,parentesco,nombre FROM info_familiares where id_paciente=".$idcli."";

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
