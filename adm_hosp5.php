<h1 class="fuente_titulo text-center">Ingreso del Paciente</h1>
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
				$nom_completo=$_POST['nom1'].' '.$_POST['nom2'].' '.$_POST['ape1'].' '.$_POST['ape2'];
				$sql="UPDATE pacientes SET tdoc_pac='".$_POST["tdocpac"]."',doc_pac='".$_POST["docpac"]."',nom1='".$_POST["nom1"]."',nom2='".$_POST["nom2"]."',ape1='".$_POST["ape1"]."',ape2='".$_POST["ape2"]."',fnacimiento='".$_POST["user_date"]."',edad='".$_POST["edad"]."',uedad='".$_POST["uedad"]."',dir_pac='".$_POST["dirpac"]."',tel_pac='".$_POST["telpac"]."',email_pac='".$_POST["emailpac"]."',estadocivil='".$_POST["estadocivil"]."',genero='".$_POST["genero"]."',rh='".$_POST["rh"]."',etnia='".$_POST["etnia"]."',lateralidad='".$_POST["lateralidad"]."',profesion='".$_POST["profesion"]."',religion='".$_POST["religion"]."',estado_pac='".$_POST["estado_pac"]."', nom_completo='$nom_completo' where id_paciente=".$_POST["idpaci"];
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
				$nom_completo=$_POST['nom1'].' '.$_POST['nom2'].' '.$_POST['ape1'].' '.$_POST['ape2'];
				$sql="INSERT INTO pacientes (tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fnacimiento,edad,uedad,dir_pac,tel_pac,email_pac,estadocivil,genero,rh,etnia,lateralidad,profesion$fotoA1,religion,estado_pac,nom_completo) VALUES
				('".$_POST["tdocpac"]."','".$_POST["docpac"]."','".$_POST["nom1"]."','".$_POST["nom2"]."','".$_POST["ape1"]."','".$_POST["ape2"]."','".$_POST["user_date"]."','".$_POST["edad"]."','".$_POST["uedad"]."','".$_POST["dirpac"]."','".$_POST["telpac"]."','".$_POST["emailpac"]."','".$_POST["estadocivil"]."','".$_POST["genero"]."','".$_POST["rh"]."','".$_POST["etnia"]."','".$_POST["lateralidad"]."','".$_POST["profesion"]."','".$_POST["religion"]."'$fotoA2,'".$_POST["estado_pac"]."','$nom_completo')";
				$subtitulo="Adicionado";
			break;
		}
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="El registro del paciente fue $subtitulo con exito!";
			$check='si';
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logo"])){
				unlink($fila["logo"]);
			}
			}
		}else{
			$subtitulo="El registro del paciente NO fue $subtitulo !!! .";
			$check='no';
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {
		case 'E':
			$sql="SELECT id_paciente, tdoc_pac, doc_pac, nom1, nom2, ape1, ape2, fnacimiento, edad, uedad, dir_pac, tel_pac, email_pac, estadocivil, genero, rh, etnia, lateralidad, profesion, religion, fotopac, estado_pac, cie, descricie, zonapac, ipsordena FROM pacientes where id_paciente=".$_GET["idpac"];
			$color="green";
			$boton="Actualizar";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$subtitulo='Edicion o actualizacion de datos del paciente';
			break;
			case 'X':
			$sql="SELECT id_paciente, tdoc_pac, doc_pac, nom1, nom2, ape1, ape2, fnacimiento, edad, uedad, dir_pac, tel_pac, email_pac, estadocivil, genero, rh, etnia, lateralidad, profesion, religion, fotopac, estado_pac, cie, descricie, zonapac, ipsordena FROM pacientes where id_paciente=".$_GET["idpac"];
			$color="red";
			$boton="Eliminar";
			$atributo1=' readonly="readonly"';
			$atributo2=' readonly="readonly"';
			$atributo3=' disabled="disabled"';
			$subtitulo='Eliminacion de paciente';
			break;
			case 'A':
			$sql="";
			$color="yellow";
			$boton="Crear";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='disabled';
			$date=date('Y-m-d');
			$subtitulo='Creación del Paciente';
			break;
		}

		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){
				$fila=array("id_paciente"=>"", "tdoc_pac"=>"", "doc_pac"=>"", "nom1"=>"", "nom2"=>"", "ape1"=>"", "ape2"=>"", "fnacimiento"=>"", "edad"=>"", "uedad"=>"", "dir_pac"=>"", "tel_pac"=>"", "email_pac"=>"", "estadocivil"=>"", "genero"=>"", "rh"=>"", "etnia"=>"", "lateralidad"=>"", "profesion"=>"", "religion"=>"", "fotopac"=>"", "estado_pac"=>"", "cie"=>"", "descricie"=>"", "zonapac"=>"", "ipsordena"=>"");

			}
		}else{
				$fila=array("id_paciente"=>"", "tdoc_pac"=>"", "doc_pac"=>"", "nom1"=>"", "nom2"=>"", "ape1"=>"", "ape2"=>"", "fnacimiento"=>"", "edad"=>"", "uedad"=>"", "dir_pac"=>"", "tel_pac"=>"", "email_pac"=>"", "estadocivil"=>"", "genero"=>"", "rh"=>"", "etnia"=>"", "lateralidad"=>"", "profesion"=>"", "religion"=>"", "fotopac"=>"", "estado_pac"=>"", "cie"=>"", "descricie"=>"", "zonapac"=>"", "ipsordena"=>"");
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
<form action="<?php echo PROGRAMA.'?&opcion=17';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
  	<article>
			<marquee class="unomarquee">
				<h4><?php echo $subtitulo;?></h4>
			</marquee>
	</article>
  <section class="panel panel-default">
	<section class="panel panel-body">

	  <article class="col-xs-1">
	  	<label for="">ID:</label>
	  	<input type="text"  name="idpaci" class="form-control" value="<?php echo $fila["id_paciente"];?>"<?php echo $atributo2;?>/>
	  </article>
	  <article class="col-xs-3">
	  	<label for="">Tipo documento:</label>
	  	<select name="tdocpac" class="form-control" <?php echo atributo3; ?>>
				<?php
				$sql="SELECT tipo,descri_tipo from tdocumentos ORDER BY tipo DESC";
				if($tabla=$bd1->sub_tuplas($sql)){
					foreach ($tabla as $fila2) {
						if ($fila["tipo"]==$fila2["tipo"]){
							$sw=' selected="selected"';
						}else{
							$sw="";
						}
					echo '<option value="'.$fila2["tipo"].'"'.$sw.'>'.$fila2["descri_tipo"].'</option>';
					}
				}
				?>
		</select>
	  </article>
		<article class="col-xs-4">
	  	<label for="">Identificación Paciente:<span class="fa fa-info-circle" data-toggle="popover" title="Digite el número de identificación sin puntos" data-content=""></span></label>
	  	<input type="text" name="docpac" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" value="<?php echo $fila["doc_pac"];?>"<?php echo $atributo2;?>/>
	  </article>
	</section>
	<section class="panel panel-body">
		<article class="col-xs-3">
	  	<label for="">Primer Nombre:</label>
	  	<input type="text" value="<?php echo $fila["nom1"];?>" name="nom1" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php echo $fila["num_interno"];?>"<?php echo $atributo2;?>/>
	  </article>
	  <article class="col-xs-3">
	  	<label for="">Segundo Nombre:</label>
	  	<input type="text" value="<?php echo $fila["nom2"];?>" name="nom2"  class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $fila["modelo"];?>"<?php echo $atributo2;?>/>
	  </article>
	  <article class="col-xs-3">
	  	<label for="">Primer Apellido:</label>
	  	<input type="text" value="<?php echo $fila["ape1"];?>" name="ape1"  class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $fila["capacidad_pasajeros"];?>"<?php echo $atributo2;?>/>
	  </article>
	  <article class="col-xs-3">
	  	<label for="">Segundo Apellido:</label>
	  	<input type="text" value="<?php echo $fila["ape2"];?>" name="ape2" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php echo $fila["num_interno"];?>"<?php echo $atributo2;?>/>
	  </article>
	</section>
	<section class="panel panel-body">


		<article class="col-xs-2">
			<label for="">Fecha Nacimiento:</label>
			<input type="date" class="form-control" name="user_date" id="user_date" value="<?php echo $fila["fnacimiento"];?>" />
		</article>
		<article class="col-xs-1">
	  	<label for="">Edad:</label>
    	<input type="text" class="form-control" value="<?php echo $fila["edad"];?>" name="edad" id="result"></div>
		</article>
		<article class="col-xs-2">
			<label for="">Unidad edad: </label>
			<select name="uedad" value="<?php echo $fila["uedad"];?>" class="form-control" <?php echo atributo3; ?>>
				<?php
				$sql="SELECT coduedad,descripuedad from uedad ORDER BY coduedad ASC";
				if($tabla=$bd1->sub_tuplas($sql)){
					foreach ($tabla as $fila2) {
						if ($fila["coduedad"]==$fila2["coduedad"]){
							$sw=' selected="selected"';
						}else{
							$sw="";
						}
					echo '<option value="'.$fila2["coduedad"].'"'.$sw.'>'.$fila2["descripuedad"].'</option>';
					}
				}
				?>
			</select>
		</article>
		<article class="col-xs-3">
	  	<label for="">Dirección Paciente:</label>
	  	<input type="text" name="dirpac"  class="form-control" value="<?php echo $fila["dir_pac"];?>"<?php echo $atributo2;?>/>
	  </article>
		<article class="col-xs-3">
	  	<label for="">Teléfono Paciente:</label>
	  	<input type="number" name="telpac"  class="form-control" value="<?php echo $fila["tel_pac"];?>"<?php echo $atributo2;?>/>
	  </article>
		</section>
		<section class="panel panel-body">


		<article class="col-xs-4">
	  	<label for="">Email Paciente:</label>
	  	<input type="email" name="emailpac"  class="form-control" value="<?php echo $fila["email_pac"];?>"<?php echo $atributo2;?>/>
	  </article>
		<article class="col-xs-2">
			<label for="">Estado Civil: </label>
			<select name="estadocivil" value="<?php echo $fila["estadoci"];?>" class="form-control" <?php echo atributo3; ?>>
				<?php
				$sql="SELECT codestadoc,descriPestadoc from estado_civil ORDER BY codestadoc ASC";
				if($tabla=$bd1->sub_tuplas($sql)){
					foreach ($tabla as $fila2) {
						if ($fila["descriPestadoc"]==$fila2["descriPestadoc"]){
							$sw=' selected="selected"';
						}else{
							$sw="";
						}
					echo '<option value="'.$fila2["descriPestadoc"].'"'.$sw.'>'.$fila2["descriPestadoc"].'</option>';
					}
				}
				?>
			</select>
		</article>
		<article class="col-xs-2">
			<label for="">Genero:</label>
			<select name="genero" value="<?php echo $fila["genero"];?>" class="form-control" <?php echo atributo3; ?>>
				<?php
				$sql="SELECT codsexo,descrisexo from sexo ORDER BY descrisexo ASC";
				if($tabla=$bd1->sub_tuplas($sql)){
					foreach ($tabla as $fila2) {
						if ($fila["descrisexo"]==$fila2["descrisexo"]){
							$sw=' selected="selected"';
						}else{
							$sw="";
						}
					echo '<option value="'.$fila2["descrisexo"].'"'.$sw.'>'.$fila2["descrisexo"].'</option>';
					}
				}
				?>
			</select>
		</article>
		<article class="col-xs-2">
			<label for="">RH:</label>
			<select class="form-control" name="rh">
				<option value="O-">O-</option>
				<option value="O+">O+</option>
				<option value="B-">B-</option>
				<option value="B+">B+</option>
				<option value="A-">A-</option>
				<option value="A+">A+</option>
				<option value="AB-">AB-</option>
				<option value="AB+">AB+</option>
			</select>
		</article>
		<article class="col-xs-2">
			<label for="">Etnia</label>
			<select name="etnia" class="form-control" <?php echo atributo3; ?>>
				<?php
				$sql="SELECT codetnia,descripetnia from etnia ORDER BY codetnia ASC";
				if($tabla=$bd1->sub_tuplas($sql)){
					foreach ($tabla as $fila2) {
						if ($fila["descripetnia"]==$fila2["descripetnia"]){
							$sw=' selected="selected"';
						}else{
							$sw="";
						}
					echo '<option value="'.$fila2["descripetnia"].'"'.$sw.'>'.$fila2["descripetnia"].'</option>';
					}
				}
				?>
			</select>
		</article>
		<article class="col-xs-2">
			<label for="">Lateralidad:</label>
			<select class="form-control" name="lateralidad">
				<option value="DIESTRO">DIESTRO</option>
				<option value="SINIESTRO">SINIESTRO</option>
				<option value="AMBIDIESTRO">AMBIDIESTRO</option>
			</select>
		</article>
		<article class="col-xs-2">
			<label for="">Profesión:</label>
			<select name="profesion" class="form-control" <?php echo atributo3; ?>>
				<?php
				$sql="SELECT descripprof from profesiones ORDER BY descripprof ASC";
				if($tabla=$bd1->sub_tuplas($sql)){
					foreach ($tabla as $fila2) {
						if ($fila["descripprof"]==$fila2["descripprof"]){
							$sw=' selected="selected"';
						}else{
							$sw="";
						}
					echo '<option value="'.$fila2["descripprof"].'"'.$sw.'>'.$fila2["descripprof"].'</option>';
					}
				}
				?>
			</select>
		</article>
		<article class="col-xs-2">
			<label for="">Religión:</label>
			<select class="form-control" name="religion">
				<option value="HINDUISMO">HINDUISMO</option>
				<option value="CRISTIANISMO">CRISTIANISMO</option>
				<option value="BUDISMO">BUDISMO</option>
				<option value="JAINISMO">JAINISMO</option>
				<option value="JUDAISMO">JUDAISMO</option>
				<option value="ISLAMISMO">ISLAMISMO</option>
				<option value="TAOISMO">TAOISMO</option>
				<option value="BRAHAMISMO">BRAHAMISMO</option>
				<option value="ATEO">ATEO</option>
				<option value="OTRA">OTRA</option>
			</select>
		</article>
		<article class="col-xs-4">
	  	<label for="">Foto Paciente:</label>
	  	<?php echo $fila["fotopac"];?><br/>
			<input type="file" class="form-control" name="fotopac" <?php echo $atributo2; ?>/><br>
	  </article>
	  <article class="col-xs-3">
	  	<label for="">Estado:</label>
	  	<select name="estado_pac" class="form-control" <?php echo atributo3;?>>
			<option value="Activo" selected="selected">Activo</option>
			<option value="Inactivo" >Inactivo</option>
		</select>
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
<div class="panel panel-default">
<div class="panel-body">
	<section class="panel-body">
		<?php
			include("consulta_rapida1.php");
		?>
	</section>
	<section class="panel panel-default" class="col-xs-7">
		<form class="navbar-form navbar-center" role="search">
        	<section class="form-group col-xs-3">
          		<input type="text" class="form-control" name="placa" placeholder="Digite Identificación">
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
		<th id="th-estilo4">Formulas</th>
		<th colspan="3" id="th-estilo1">Edición Paciente</th>
		<th id="th-estilo2">Cierre Admisión</th>
		<th id="th-estilo4">ID</th>
		<th id="th-estilo3">IDENTIFICACION</th>
		<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
		<th id="th-estilo3">FOTO</th>
		<th id="th-estilo4">Constancia</th>
		<th id="th-estilo4">Familiares</th>
		<th id="th-estilo4">Acudiente</th>
		<th id="th-estilo4">Documentación</th>
		<th id="th-estilo4">Admisión</th>

	</tr>

	<?php
	if (isset($_REQUEST["placa"])){
	$fecha=$_REQUEST["placa"];
	$sql="SELECT id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac FROM pacientes WHERE doc_pac='".$fecha."'";

	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {

			echo"<tr >\n";
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=98&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-flask"></span></button></a></th>';
			echo'<th class="text-left" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-pencil"></span></button></a></th>';
			echo'<th class="text-left" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=X&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-trash"></span></button></a></th>';
			echo'<th class="text-center" ><button class="btn btn-success" data-toggle="modal"  data-target="#datospac" type="button"><span class="fa fa-eye"></span></button></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=38&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-danger" ><span class="fa fa-ban"></span></button></a></th>';
			echo'<td class="text-center">'.$fila["id_paciente"].'</td>';
			echo'<td class="text-center"><strong>'.$fila["tdoc_pac"].':</strong> '.$fila["doc_pac"].'</td>';
			echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
			echo'<th class="text-center" ><a href="rpt_constacia.php?idadmhosp='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=25&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-users"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=26&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-danger sombra_movil " ><span class="fa fa-user"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=27&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-text"></span></button></a></th>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=18&idpac='.$fila["id_paciente"].'&nompac='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&foto='.$fila["fotopac"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-stethoscope"></span></button></a></th>';

			echo "</tr>\n";
		}
	}
}
if (isset($_REQUEST["nom"])){
$fecha=$_REQUEST["nom"];
$sql="SELECT id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac FROM pacientes WHERE nom_completo LIKE '%".$fecha."%'";

if ($tabla=$bd1->sub_tuplas($sql)){
	//echo $sql;
	foreach ($tabla as $fila ) {

		echo"<tr >\n";
		echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=98&idpac='.$fila["id_paciente"].'&nompac='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&foto='.$fila["fotopac"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-flask"></span></button></a></th>';
		echo'<th class="text-left" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=X&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-pencil"></span></button></a></th>';
		echo'<th class="text-left" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=X&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-trash"></span></button></a></th>';
		echo'<th class="text-left" ><button class="btn btn-success" data-toggle="modal"  data-target="#datospac1" type="button"><span class="fa fa-eye"></span></button></th>';
		echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=38&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-danger" ><span class="fa fa-ban"></span></button></a></th>';
		echo'<td class="text-center">'.$fila["id_paciente"].'</td>';
		echo'<td class="text-center"><strong>'.$fila["tdoc_pac"].':</strong> '.$fila["doc_pac"].'</td>';
		echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
		echo'<td class="text-center"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
		echo'<th class="text-center" ><a href="rpt_constacia.php?idadmhosp='.$fila["id_adm_hosp"].'&f1='.$f1.'&f2='.$f2.'&nom='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&edad='.$edad.'&cie='.$cie.'&eps='.$eps.'"><button type="button" class="btn btn-primary sombra_movil " ><span class="fa fa-file-pdf-o"></span></button></a></th>';
		echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=25&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-success sombra_movil " ><span class="fa fa-users"></span></button></a></th>';
		echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=26&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-danger sombra_movil " ><span class="fa fa-user"></span></button></a></th>';
		echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=27&idpac='.$fila["id_paciente"].'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-file-text"></span></button></a></th>';
		echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion=18&idpac='.$fila["id_paciente"].'&nompac='.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'&foto='.$fila["fotopac"].'"><button type="button" class="btn btn-info sombra_movil " ><span class="fa fa-stethoscope"></span></button></a></th>';
		echo "</tr>\n";
	}
}
}
	?>

	<tr>
		<th colspan="14" class="text-center"><a href="<?php echo PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A';?>"><button type="button" class="btn btn-primary" >Nuevo Paciente</button>
		</a></th>
	</tr>
</table>
</div>
</div>
<section>
<article >
  <section class="modal fade" id="datospac" role="dialog">
    <section class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Datos del Paciente</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>

            </tr>
            <?php
            if (isset($_REQUEST["placa"])){

            $id=$_REQUEST["placa"];

            $sql="
						SELECT a.tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,email_pac,genero,fotopac,
b.id_adm_hosp,fingreso_hosp,hingreso_hosp,zona_residencia,nivel,tipo_servicio,resp_admhosp,
c.descripestadoc,
d.descriafiliado,
e.descritusuario,
f.descriocu,
g.descripdep,
h.descrimuni,
i.descripuedad
from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                left join estado_civil c on (c.codestadoc = a.estadocivil)
                left join tusuario e on (e.codtusuario=b.tipo_usuario)
                left join tafiliado d on (d.codafiliado=b.tipo_afiliacion)
                left join ocupacion f on (f.codocu=b.ocupacion)
                left join departamento g on (g.coddep=b.dep_residencia)
                left join municipios h on (h.codmuni=b.mun_residencia)
                left join uedad i on (i.coduedad=a.uedad)
						 where doc_pac='".$id."' limit 1";
            if ($tabla=$bd1->sub_tuplas($sql)){

              foreach ($tabla as $fila ) {
                echo"<tr >\n";
                  echo'<td class="text-center danger"><strong> Nombre completo:</strong></td>';
                  echo'<td colspan="3" class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].' </td>';
									echo'<td class="text-center danger"><strong> Fecha ingreso:</strong></td>';
                  echo'<td class="text-center">'.$fila["fingreso_hosp"].'</td>';
                echo '</tr>';
								echo"<tr >\n";
                  echo'<td class="text-center danger"><strong><span class="fa fa-vcard">  </span> Documento identidad:</strong></td>';
                  echo'<td class="text-center"> '.$fila["tdoc_pac"].' : '.$fila["doc_pac"].' </td>';
									echo'<td class="text-center danger"><strong> Edad::</strong></td>';
                  echo'<td class="text-center"> '.$fila["edad"].' '.$fila["descriupedad"].'</td>';
									echo'<td class="text-center danger"><strong> Fecha Nacimiento:</strong></td>';
                  echo'<td class="text-center"> '.$fila["fnacimiento"].' </td>';
                echo '</tr>';
								echo"<tr >\n";
                  echo'<td class="text-center danger"><strong> Direccion:</strong></td>';
                  echo'<td class="text-center"> '.$fila["dir_pac"].' </td>';
									echo'<td class="text-center danger"><strong><span class="fa fa-vcard-o">  </span> Telefono::</strong></td>';
                  echo'<td class="text-center"> '.$fila["tel_pac"].' </td>';
									echo'<td class="text-center danger"><strong> Email:</strong></td>';
                  echo'<td class="text-center"> '.$fila["email_pac"].' </td>';
                echo '</tr>';
								echo"<tr >\n";
                  echo'<td class="text-center danger"><strong> Estado civil:</strong></td>';
                  echo'<td class="text-center"> '.$fila["descripestadoc"].' </td>';
									echo'<td class="text-center danger"><strong> Genero::</strong></td>';
                  echo'<td class="text-center"> '.$fila["genero"].' </td>';
									echo'<td class="text-center danger"><strong> Foto:</strong></td>';
                  echo'<td class="text-center"> <img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
                echo '</tr>';
								echo"<tr >\n";
                  echo'<td class="text-center danger"><strong> Tipo de usuario:</strong></td>';
                  echo'<td class="text-center"> '.$fila["descritusuario"].' </td>';
									echo'<td class="text-center danger"><strong> Tipo de Afiliacion::</strong></td>';
                  echo'<td class="text-center"> '.$fila["descriafiliado"].' </td>';
									echo'<td class="text-center danger"><strong> Ocupacion:</strong></td>';
                  echo'<td class="text-center"> '.$fila["descriocu"].' </td>';
                echo '</tr>';
								echo"<tr >\n";
                  echo'<td class="text-center danger"><strong> Departamento de residencia:</strong></td>';
                  echo'<td class="text-center"> '.$fila["descripdep"].' </td>';
									echo'<td class="text-center danger"><strong> Municipio de residencia::</strong></td>';
                  echo'<td class="text-center"> '.$fila["descrimuni"].' </td>';
									echo'<td class="text-center danger"><strong> Zona de residencia:</strong></td>';
                  echo'<td class="text-center"> '.$fila["zona_residencia"].' </td>';
                echo '</tr>';
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
<article >
  <section class="modal fade" id="datospac1" role="dialog">
    <section class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Datos del Paciente</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>

            </tr>
            <?php
            if (isset($_REQUEST["nom"])){

            $id=$_REQUEST["nom"];
						$ced=$fila["doc_pac"];
            $sql="SELECT a.tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,email_pac,genero,fotopac,
b.id_adm_hosp,fingreso_hosp,hingreso_hosp,zona_residencia,nivel,tipo_servicio,resp_admhosp,
c.descripestadoc,
d.descriafiliado,
e.descritusuario,
f.descriocu,
g.descripdep,
h.descrimuni,
i.descripuedad
from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                left join estado_civil c on (c.codestadoc = a.estadocivil)
                left join tusuario e on (e.codtusuario=b.tipo_usuario)
                left join tafiliado d on (d.codafiliado=b.tipo_afiliacion)
                left join ocupacion f on (f.codocu=b.ocupacion)
                left join departamento g on (g.coddep=b.dep_residencia)
                left join municipios h on (h.codmuni=b.mun_residencia)
                left join uedad i on (i.coduedad=a.uedad)
						 where doc_pac='".$ced."' limit 1";
						 echo $sql;
            if ($tabla=$bd1->sub_tuplas($sql)){

              foreach ($tabla as $fila ) {
                echo"<tr >\n";
                  echo'<td class="text-center danger"><strong> Nombre completo:</strong></td>';
                  echo'<td colspan="3" class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].' </td>';
									echo'<td class="text-center danger"><strong> Fecha ingreso:</strong></td>';
                  echo'<td colspan="3" class="text-center">'.$fila["fingreso_hosp"].'</td>';
                echo '</tr>';
								echo"<tr >\n";
                  echo'<td class="text-center danger"><strong><span class="fa fa-vcard">  </span> Documento identidad:</strong></td>';
                  echo'<td class="text-center"> '.$fila["tdoc_pac"].' : '.$fila["doc_pac"].' </td>';
									echo'<td class="text-center danger"><strong> Edad::</strong></td>';
                  echo'<td class="text-center"> '.$fila["edad"].' '.$fila["descriupedad"].'</td>';
									echo'<td class="text-center danger"><strong> Fecha Nacimiento:</strong></td>';
                  echo'<td class="text-center"> '.$fila["fnacimiento"].' </td>';
                echo '</tr>';
								echo"<tr >\n";
                  echo'<td class="text-center danger"><strong> Direccion:</strong></td>';
                  echo'<td class="text-center"> '.$fila["dir_pac"].' </td>';
									echo'<td class="text-center danger"><strong><span class="fa fa-vcard-o">  </span> Telefono::</strong></td>';
                  echo'<td class="text-center"> '.$fila["tel_pac"].' </td>';
									echo'<td class="text-center danger"><strong> Email:</strong></td>';
                  echo'<td class="text-center"> '.$fila["email_pac"].' </td>';
                echo '</tr>';
								echo"<tr >\n";
                  echo'<td class="text-center danger"><strong> Estado civil:</strong></td>';
                  echo'<td class="text-center"> '.$fila["descripestadoc"].' </td>';
									echo'<td class="text-center danger"><strong> Genero::</strong></td>';
                  echo'<td class="text-center"> '.$fila["genero"].' </td>';
									echo'<td class="text-center danger"><strong> Foto:</strong></td>';
                  echo'<td class="text-center"> <img src="'.$fila["fotopac"].'"alt ="foto" class="image_login cursor1" data-toggle="modal" data-target="#modalpac"> </td>';
                echo '</tr>';
								echo"<tr >\n";
                  echo'<td class="text-center danger"><strong> Tipo de usuario:</strong></td>';
                  echo'<td class="text-center"> '.$fila["descritusuario"].' </td>';
									echo'<td class="text-center danger"><strong> Tipo de Afiliacion::</strong></td>';
                  echo'<td class="text-center"> '.$fila["descriafiliado"].' </td>';
									echo'<td class="text-center danger"><strong> Ocupacion:</strong></td>';
                  echo'<td class="text-center"> '.$fila["descriocu"].' </td>';
                echo '</tr>';
								echo"<tr >\n";
                  echo'<td class="text-center danger"><strong> Departamento de residencia:</strong></td>';
                  echo'<td class="text-center"> '.$fila["descripdep"].' </td>';
									echo'<td class="text-center danger"><strong> Municipio de residencia::</strong></td>';
                  echo'<td class="text-center"> '.$fila["descrimuni"].' </td>';
									echo'<td class="text-center danger"><strong> Zona de residencia:</strong></td>';
                  echo'<td class="text-center"> '.$fila["zona_residencia"].' </td>';
                echo '</tr>';
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
	<?php
}
?>
