<div class="fuente_titulo text-center animated jello"><h2>Ordenes Medicas Ambulatorias</h2></div>
<?php
$subtitulo="";
	if(isset($_POST["operacion"])){	//nivel3
		if($_POST["aceptar"]!="Descartar"){
			//print_r($_FILES);

			switch ($_POST["operacion"]) {
      case 'E':
			$sql="INSERT INTO ord_med_ambu (id_adm_hosp, id_user, freg_ord_med_ambu, hreg_ord_med_ambu, ts_ord_med_ambu, procedimiento, estado_ord_med_ambu, obs_proc ) VALUES
			('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["tiposervicio"]."','".$_POST["cups"]."','Realizada','".$_POST["obs_proc"]."')";
			$subtitulo="Generada";
			break;
			case 'A':


			break;
		}
		//echo $sql;
    if ($bd1->consulta($sql)){
			$subtitulo="La Orden Medica del paciente fue $subtitulo con EXITO!";
			$check='si';
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logoips"])){
				unlink($fila["logoips"]);
			}
			}
		}else{
			$subtitulo="La Orden Medica del paciente NO fue $subtitulo !!! .";
			$check='no';
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {
    case 'E':
        $sql="SELECT p.tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,a.id_adm_hosp,fingreso_hosp,hingreso_hosp FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente WHERE a.id_adm_hosp=".$_GET["idadmhosp"];
        $color="green";
        $boton="Generar ordenens medicas";
        $atributo1=' readonly="readonly"';
        $atributo2='';
        $atributo3=' disabled="disabled"';
        $subtitulo='Generación de Ordenes medicas';
        $date=date('Y-m-d');
        $date1=date('H:i');
    break;

			case 'A':
			$sql="";
			$color="yellow";
			$boton="Crear";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$subtitulo='Adicionar lista';
			$date=date('Y/m/d');
			$date1=date('H:i');
			$valor='visible';
			$valor1='hidden';
			$freg1='hidden';
			$freg='text';
			$ext='date';
			$id=$_GET["idadmhosp"];
			break;
		}
		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){
					$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"");
			}
		}else{
					$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"");
			}
		?>
    <form action="<?php echo PROGRAMA.'?opcion=83&idadmhosp='.$id;?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
    	<section>
    		<marquee class="fuente1 banermarquee">
    			<?php echo $subtitulo;?>
    		</marquee>
    	</section>
			<section>
				<?php
					include("consulta_ultimaEpi.php");
				?>
			</section>
    	<section class="panel panel-default">
    	<section class="panel-body">
    		<article class="col-xs-3">
    			<label for="">Fecha Registro:</label>
    			<input type="text" name="freg" class="form-control" value="<?php echo date('Y-m-d');?>" <?php echo $atributo1; ?>>
    			<input type="hidden" name="idadmhosp" class="form-control" value="<?php echo $_GET["idadmhosp"];?>" <?php echo $atributo1;?>/>
    		</article>
    		<article class="col-xs-3">
    			<label for="">Hora Registro:</label>
    			<input type="text" name="hreg" class="form-control" value="<?php echo date('H:m');?>" <?php echo $atributo1; ?>>
    		</article>
    		<article class="col-xs-3">
    			<label for="">Tipo de servicio:</label>
    			<input type="text" name="tiposervicio" class="form-control" value="Ambulatoria" <?php echo $atributo1; ?>>
    		</article>
    	</section>
    	<section class='panel-body'>
    		<article class="col-xs-12">
    			<?php include("cupsbusqueda.php");?>
    		</article>
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
	<div class="col-xs-7">
			<a class="btn btn-primary" href="<?php echo PROGRAMA.'?opcion=83';?>"><span class="glyphicon glyphicon-triangle-left">Regresar a Epicrisis</span></a>
	</div>
	<br>
<div class="panel panel-body">

<table class="table table-responsive">
	<tr>

		<th id="th-estilo1">ID ADM</th>
		<th id="th-estilo1">NOMBRE Y APELLIDOS</th>
		<th id="th-estilo2">HC  </th>
		<th id="th-estilo1">FECHA Y HORA INGRESO</th>
		<th id="th-estilo2">FOTO</th>
		<th id="th-estilo4">Generar orden medica</th>
	</tr>
	<?php
	if (isset($_REQUEST["idadmhosp"])){
	$idpaciente=$_GET["idadmhosp"];
	$sql="SELECT p.nom1,nom2,ape1,ape2,fotopac,a.id_adm_hosp,fingreso_hosp,hingreso_hosp,h.id_hchosp FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN hc_hospitalario h on a.id_adm_hosp=h.id_adm_hosp WHERE a.id_adm_hosp='".$idpaciente."' ";
	if ($tabla=$bd1->sub_tuplas($sql)){
		//echo $sql;
		foreach ($tabla as $fila ) {
			echo"<tr >\n";

			echo'<td class="text-center info">'.$fila["id_adm_hosp"].'</td>';
			echo'<td class="text-center info">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
			echo'<td class="text-center info">'.$fila["id_hchosp"].'</td>';
			echo'<td class="text-center info">'.$fila["fingreso_hosp"].' '.$fila["hingreso_hosp"].'</td>';
			echo'<td class="text-left info"><img src="'.$fila["fotopac"].'"alt ="foto" class="image_login"> </td>';
			echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&idhc='.$fila["id_hchosp"].'&idadmhosp='.$fila["id_adm_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-square-o"></span></button></a></th>';
			echo "</tr>\n";
		}
	}
}
	?>
	</table>
	<br>
</div>
</div>
	<?php
}
?>
