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
			case 'VI':
				$sql="INSERT INTO val_nutricion (id_adm_hosp, id_user, freg_nutri, hreg_nutri, motivo_nutri, val_nutricional, dx_nutricional, plan_nutricional, estado_nutri) VALUES
				('".$_POST["idadmhosp"]."',
'".$_SESSION["AUT"]["id_user"]."',
'".$_POST["freg_nutri"]."'	,
'".$_POST["hreg_nutri"]."'	,
'".$_POST["motivonutri"]."',
'".$_POST["val_nutri"]."',
'".$_POST["dxnutri"]."',
'".$_POST["plan_nutri"]."','Realizada'
)";
				$subtitulo="Valoración inicial";
				$subtitulo1="Adicionado";
				$subtitulo2="Nutrición";
			break;
			case 'EVO':
				$sql="INSERT INTO evo_nutrism (id_adm_hosp, id_user, freg_nutrice_sm, hreg_nutrice_sm, evolucion_nutri, estado_evonutri) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["evoto"]."','Realizada')";
				$subtitulo="Evolución";
				$subtitulo1="Adicionado";
				$subtitulo2="Nutrición y Dietética";
			break;

		}
	//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="El formato de $subtitulo en $subtitulo2 fue $subtitulo1 con exito!";
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logo"])){
				unlink($fila["logo"]);
			}
			}
		}else{
			$subtitulo="El formato de $subtitulo en $subtitulo2 NO fue $subtitulo1 !!! .";
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {

			case 'DESP':
      $sql="" ;
			$boton="Dispensar";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/listar_med.php';
			$subtitulo='Dispensacion de Medicamentos';
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
				if (document.forms[0].hreg.value > document.forms[0].fecha.value){
					alert("Enfermero (a) <?php echo $_SESSION["AUT"]["nombre"]?>, NO puede adelantar el tiempo.");
					document.forms[0].hreg.focus();				// Ubicar el cursor
					return(false);
				}
			}
		</script>
		<script type="text/javascript" src="/js/jquery.js"></script>
		<div class="alert alert-info animated bounceInRight">
			<?php echo $subtitulo;?>
		</div>
		<?php include($form1);?>

<?php
}else{
	echo '<div class="alert alert-success animated bounceInRight">';
	echo $subtitulo;
	echo '</div>';
// nivel 1?>
<div class="panel-default">
<div class="panel-body">
	<section >
		<?php
			include("consulta_rapida1.php");
		?>
	</section>
	<section class="panel panel-default" class="col-xs-7">
    <section class="panel-body">
      <form class="navbar-form navbar-center" role="search" >
            <article class="form-group col-xs-3">
              <label for="">Seleccione Sede:</label>
              <select name="sede" class="form-control" id="sede" onchange="mostrarbod()" <?php echo $atributo2;?>>
                <option value="0"></option>
                <?php
                  $sql_pais = "SELECT * FROM sedes_ips";
                  $resultado = $conex->query($sql_pais);
                  if($conex->errno) die($conex->error);

                  while ($fila = $resultado ->fetch_assoc()){
                ?>
                  <option value="<?php echo $fila['id_sedes_ips'] ?>"><?php echo $fila['nom_sedes']; ?></option>
                <?php
                  }
                ?>
              </select>
            </article>
            <article class="col-xs-6 col-md-4 form-group">
      				<label for="">Seleccione Bodega:</label>
      				<select name="bodega" class="form-control" id="bodeguita" <?php echo $atributo1;?>>

      				</select>
      			</article>
            <article class="form-group col-md-4 col-xs-4 ">
              <label for="">Tipo de formula:</label>
              <select class="form-control" name="tformula" required="">
                <option value=""></option>
                <option value="Todas">Todas</option>Todas
                <option value="Inmediata">Inmediata</option>
                <option value="Programada">Programada</option>
              </select>
            </article>
            <input type="submit" name="buscar" class="btn btn-primary" value="Consultar">
            <input type="hidden" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
      </form>
    </section>
	</section>
<table class="table table-bordered">
	<tr>
		<th id="th-estilo1">ADMISION</th>
		<th id="th-estilo1">IDENTIFICACION</th>
		<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
		<th id="th-estilo3">FECHA INGRESO</th>
		<th id="th-estilo4">Dispensar</th>
	</tr>

	<?php
	if (isset($_REQUEST["tformula"])){
	$tformula=$_REQUEST["tformula"];
  $sede=$_REQUEST["sede"];
  $bodega=$_REQUEST["bodega"];
  if ($tformula=='Todas') {
    $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,fotopac,
                 b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,zona_residencia,nivel,tipo_servicio,resp_admhosp,
                 j.nom_eps,
                 k.id_formula_hosp,id_bodega, id_user, fcreacion, tipo_formula, finicial, ffinal, med, via, frec, dosis1, dosis2, dosis3, dosis4, obs_formula, med1, via1, frec1, dosis11, dosis21, dosis31, dosis41, obs_formula1, med2, via2, frec2, dosis12, dosis22, dosis32, dosis42, obs_formula2, med3, via3, frec3, dosis13, dosis23, dosis33, dosis43, obs_formula3, med4, via4, frec4, dosis14, dosis24, dosis34, dosis44, obs_formula4, estado_formula_hosp
          from pacientes a inner join adm_hospitalario b on a.id_paciente=b.id_paciente
                           inner join eps j on (j.id_eps=b.id_eps)
                           inner join formula_hospitalaria k on (k.id_adm_hosp=b.id_adm_hosp)
          where k.id_bodega='$bodega' and b.estado_adm_hosp='Activo' order by a.edad ASC";
  }else {
    $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,fotopac,
                 b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,zona_residencia,nivel,tipo_servicio,resp_admhosp,
                 j.nom_eps,
                 k.id_formula_hosp,id_bodega, id_user, fcreacion, tipo_formula, finicial, ffinal, med, via, frec, dosis1, dosis2, dosis3, dosis4, obs_formula, med1, via1, frec1, dosis11, dosis21, dosis31, dosis41, obs_formula1, med2, via2, frec2, dosis12, dosis22, dosis32, dosis42, obs_formula2, med3, via3, frec3, dosis13, dosis23, dosis33, dosis43, obs_formula3, med4, via4, frec4, dosis14, dosis24, dosis34, dosis44, obs_formula4, estado_formula_hosp
          from pacientes a inner join adm_hospitalario b on a.id_paciente=b.id_paciente
                           inner join eps j on (j.id_eps=b.id_eps)
                           inner join formula_hospitalaria k on (k.id_adm_hosp=b.id_adm_hosp)
          where k.id_bodega='$bodega' and b.estado_adm_hosp='Activo' and k.tipo_formula='$tformula' order by a.edad ASC";
  }

	if ($tabla=$bd1->sub_tuplas($sql)){

		foreach ($tabla as $fila ) {
      if ($fila['tipo_formula']=='Inmediata') {
        echo"<tr >\n";
  			echo'<td class="text-center alert alert-danger">'.$fila["id_adm_hosp"].'</td>';
  			echo'<td class="text-center alert alert-danger">'.$fila["doc_pac"].'</td>';
  			echo'<td class="text-center alert alert-danger">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
  			echo'<td class="text-center alert alert-danger">'.$fila["fingreso_hosp"].' | '.$fila["hingreso_hosp"].'</td>';

        echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=DESP&idformula='.$fila["id_formula_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
  			echo "</tr>\n";
      }else {
        echo"<tr >\n";
  			echo'<td class="text-center alert-info">'.$fila["id_adm_hosp"].'</td>';
  			echo'<td class="text-center alert-info">'.$fila["doc_pac"].'</td>';
  			echo'<td class="text-center alert-info">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
  			echo'<td class="text-center alert-info">'.$fila["fingreso_hosp"].' | '.$fila["hingreso_hosp"].'</td>';

        echo'<th class="text-center "><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=DESP&idformula='.$fila["id_formula_hosp"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
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
