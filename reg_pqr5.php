<?php
$subtitulo="";
	if(isset($_POST["operacion"])){	//nivel3
		if($_POST["aceptar"]!="Descartar"){
			//print_r($_FILES);
			$fotoE="";$fotoA1="";$fotoA2="";
			if (isset($_FILES["soporte_pqr"])){
				if (is_uploaded_file($_FILES["soporte_pqr"]["tmp_name"])){

					$cfoto=explode(".",$_FILES["soporte_pqr"]["name"]);
					$archivo=$_POST["idpac"].'_soporte_'.$_POST["fradicado"].".".$cfoto[count($cfoto)-1];

					if(move_uploaded_file($_FILES["soporte_pqr"]["tmp_name"],PQ.PQRS.$archivo)){
						$fotoE=",soporte_pqr='".PQRS.$archivo."'";
						$fotoA1=",soporte_pqr";
						$fotoA2=",'".PQRS.$archivo."'";
						}
				}
			}
			switch ($_POST["operacion"]) {
			case 'REG':
			$f=date('Y-m-d');
			$sql="INSERT INTO pqr (id_paciente,id_sedes_ips, id_eps, id_user, fcreacion, num_radicado_eps, linea_negocio, tipo_solicitud, categoria, medio_registro, tipo_cliente, fradicado, descripcion_pqr, resp_respuesta, estado_pqr$fotoA1) VALUES
			('".$_POST["idpac"]."','".$_POST["sede"]."','".$_POST["eps"]."','".$_SESSION["AUT"]["id_user"]."','$f','".$_POST["num_radocado_eps"]."','".$_POST["linea_negocio"]."','".$_POST["tipo_solicitud"]."','".$_POST["categoria"]."','".$_POST["medio_registro"]."','".$_POST["tipo_cliente"]."','".$_POST["fradicado"]."','".$_POST["descripcion_pqr"]."','".$_POST["resp_respuesta"]."','En tramite'$fotoA2)";
				$subtitulo="PQRS";
				$subtitulo1="Adicionada";

			break;
			case 'UPT':
				$sql="UPDATE pqr SET(id_paciente,id_sedes_ips, id_eps, id_user, fcreacion, num_radicado_eps, linea_negocio, tipo_solicitud, categoria, medio_registro, tipo_cliente, fradicado, descripcion_pqr, resp_respuesta, estado_pqr$fotoA1) VALUES
				('".$_POST["idpac"]."','".$_POST["sede"]."','".$_POST["eps"]."','".$_SESSION["AUT"]["id_user"]."','$f','".$_POST["num_radocado_eps"]."','".$_POST["linea_negocio"]."','".$_POST["tipo_solicitud"]."','".$_POST["categoria"]."','".$_POST["medio_registro"]."','".$_POST["tipo_cliente"]."','".$_POST["fradicado"]."','".$_POST["descripcion_pqr"]."','".$_POST["resp_respuesta"]."','En tramite'$fotoA2)";
				$subtitulo="Evolución Medica";
				$subtitulo1="Adicionado";
			break;
			case 'ADX':
				$sql="INSERT INTO ord_med_hosp (id_adm_hosp, id_user, freg_ord_med_hosp, hreg_ord_med_hosp, ts_ord_med_hosp,dx,tdx, procedimiento, obs_proc, estado_ord_med_hosp) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["tiposervicio"]."','".$_POST["dx"]."','".$_POST["tdx"]."','".$_POST["cups"]."','".$_POST["obs_proc"]."','Realizada')";
				$subtitulo="Ordenes Medicas";
				$subtitulo1="Adicionado";
			break;
			case 'MED':
				$d1='';
				$f=date('Y-m-d');
				$sql="";
				$subtitulo="Formula medica hospitalaria";
				$subtitulo1="Adicionado";
			break;
			case 'ORDVER':
				$sql="INSERT INTO orden_verbal( id_adm_hosp, id_user, freg_ord_verbal, hreg_ord_verbal, orden_verbal, estado_orden_verbal) VALUES
				('".$_POST["idadmhosp"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["freg"]."','".$_POST["hreg"]."','".$_POST["ordverb"]."','Realizada')";
				$subtitulo="Orden Verbal";
				$subtitulo1="Adicionada";
			break;
		}
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="La Solicitud $subtitulo fue $subtitulo1 con exito!";
		$check='si';
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logo"])){
				unlink($fila["logo"]);
			}
			}
		}else{
			$subtitulo="La Solicitud $subtitulo  NO fue $subtitulo1 !!! .";
		$check='no';
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {
		case 'REG':
    $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
		b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
		j.nom_eps
		from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
								left join eps j on (j.id_eps=b.id_eps)

		where a.id_paciente ='".$_GET["idpaciente"]."' GROUP BY id_pqr" ;
    	$boton="Agregar PQRS";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/add_pqr.php';
			$subtitulo='Registro PQRS ';
			break;
			case 'UPT':
      $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
			c.id_pqr,id_sedes_ips,id_eps,id_user,fcreacion,num_radicado_eps, linea_negocio, tipo_solicitud, categoria, medio_registro, tipo_cliente, fradicado, descripcion_pqr, resp_respuesta, frespuesta, respuesta, tiempo_respuesta, nivel_satisfaccion, evidencias, plan_accion, fplan_accion, estado_pqr, soporte_pqr
	    from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
	                 		 left join pqr c on c.id_paciente=a.id_paciente
	    where a.id_paciente ='".$_GET["idpaciente"]."' GROUP BY id_pqr" ;
			$boton="Actualizacion Registro PQR";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/add_pqr.php';
			$subtitulo='Edicion de PQRS';
			break;
			case 'ADX':
      $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
      b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
      j.nom_eps
      from pacientes a left join adm_hospitalario b on a.id_paciente=b.id_paciente
                  left join eps j on (j.id_eps=b.id_eps)
      where b.id_adm_hosp ='".$_GET["idadmhosp"]."'" ;
			$boton="Agregar Ayuda Diagnostica";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/ord_med_hosp.php';
			$subtitulo='Solicitud de Ordenes Medicas Hospitalarias (Procedimientos y laboratorios)';
			break;



		}
//echo $sql;
		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){
				$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","edad"=>"","fnacimiento"=>"","dir_pac"=>"","tel_pac"=>"","rh"=>"","email_pac"=>"","genero"=>"","lateralidad"=>"","religion"=>"","fotopac"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","fegreso_hosp"=>"","hegreso_hosp"=>"","id_eps"=>"", "nom_eps"=>"","id_sedes_ips"=>"","id_eps"=>"","num_radicado_eps"=>"","id_pqr"=>"" ,"linea_negocio"=>"", "servicio"=>"", "tipo_solicitud"=>"", "categoria"=>"", "medio_registro"=>"", "tipo_cliente"=>"", "fradicado"=>"", "descripcion_pqr"=>"", "resp_respuesta"=>"", "frespuesta"=>"", "respuesta"=>"", "tiempo_respuesta"=>"", "nivel_satisfaccion"=>"", "evidencias"=>"", "plan_accion"=>"", "fplan_accion"=>"", "estado_pqr"=>"","soporte_pqr"=>"");
			}
		}else{
				$fila=array("tdoc_pac"=>"","doc_pac"=>"","nom1"=>"","nom2"=>"","ape1"=>"","ape2"=>"","edad"=>"","fnacimiento"=>"","dir_pac"=>"","tel_pac"=>"","rh"=>"","email_pac"=>"","genero"=>"","lateralidad"=>"","religion"=>"","fotopac"=>"","id_adm_hosp"=>"","fingreso_hosp"=>"","hingreso_hosp"=>"","fegreso_hosp"=>"","hegreso_hosp"=>"","id_eps"=>"", "nom_eps"=>"","id_sedes_ips"=>"","id_eps"=>"","num_radicado_eps"=>"","id_pqr"=>"" ,"linea_negocio"=>"", "servicio"=>"", "tipo_solicitud"=>"", "categoria"=>"", "medio_registro"=>"", "tipo_cliente"=>"", "fradicado"=>"", "descripcion_pqr"=>"", "resp_respuesta"=>"", "frespuesta"=>"", "respuesta"=>"", "tiempo_respuesta"=>"", "nivel_satisfaccion"=>"", "evidencias"=>"", "plan_accion"=>"", "fplan_accion"=>"", "estado_pqr"=>"","soporte_pqr"=>"");
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

		</div>

		<?php include($form1);?>

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
<div class="panel-default">
<div class="panel-body">
	<div>
		<a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=REG&idpaciente='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-search"></span> Consultar respuestas de PQRS</button></a>
	</div>
	<section class="panel panel-default" class="col-xs-7">
		<form class="navbar-form navbar-center" role="search" >
        	<section class="form-group col-xs-3">
          		<input type="text" class="form-control" name="doc" placeholder="Digite Identificacion">
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
	<table class="table table-responsive">
		<tr>
			<th id="th-estilo4">Historial</th>
			<th id="th-estilo1">ID</th>
			<th id="th-estilo1">IDENTIFICACIÓN</th>
			<th id="th-estilo2">NOMBRES Y APELLIDOS</th>
			<th id="th-estilo3">FECHA INGRESO</th>
      <th id="th-estilo3">SEDE</th>
			<th id="th-estilo3">EPS</th>
			<th colspan='2' id="th-estilo4">Accion</th>

		</tr>

		<?php
		if (isset($_REQUEST["doc"])){
		$doc=$_REQUEST["doc"];
		$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,
								 a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_servicio,
								 s.id_sedes_ips,nom_sedes,
								 e.nom_eps
				  FROM pacientes p INNER JOIN adm_hospitalario a on p.id_paciente=a.id_paciente
													 LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips
													 INNER JOIN eps e on e.id_eps=a.id_eps
					WHERE p.doc_pac='".$doc."' and a.estado_adm_hosp='Activo' GROUP by id_paciente";

		if ($tabla=$bd1->sub_tuplas($sql)){
			//echo $sql;
			foreach ($tabla as $fila ) {
				echo"<tr >	\n";
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=SEL&idpaciente='.$fila["id_paciente"].'"><button type="button" class="btn btn-success sombra_movil" ><span class="fa fa-binoculars"></span></button></a></th>';
				echo'<td class="text-center">'.$fila["id_paciente"].'</td>';
				echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
				echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
				echo'<td class="text-center">'.$fila["fingreso_hosp"].' | '.$fila["hingreso_hosp"].'</td>';
				echo'<td class="text-center">'.$fila["nom_sedes"].'</td>';
				echo'<td class="text-center">'.$fila["nom_eps"].'</td>';
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=REG&idpaciente='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=UPT&idpaciente='.$fila["id_paciente"].'"><button type="button" class="btn btn-warning sombra_movil" ><span class="fa fa-edit"></span></button></a></th>';
				echo "</tr>\n";
			}
		}
	}
	if (isset($_REQUEST["nom"])){
		$doc=$_REQUEST["nom"];
		$sql="SELECT p.id_paciente,tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fotopac,
								 a.id_adm_hosp,fingreso_hosp,hingreso_hosp,tipo_servicio,
								 s.nom_sedes,
								 e.nom_eps
				  FROM pacientes p INNER JOIN adm_hospitalario a on p.id_paciente=a.id_paciente
													 LEFT JOIN sedes_ips s on a.id_sedes_ips=s.id_sedes_ips
													 INNER JOIN eps e on e.id_eps=a.id_eps
					WHERE p.nom1 LIKE '%".$doc."%' and a.estado_adm_hosp='Activo'  GROUP by id_paciente";

		if ($tabla=$bd1->sub_tuplas($sql)){
			//echo $sql;
			foreach ($tabla as $fila ) {

				echo"<tr >	\n";
			  echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=SEL&idpaciente='.$fila["id_paciente"].'"><button type="button" class="btn btn-inverse sombra_movil" ><span class="fa fa-bullhorn"></span></button></a></th>';
				echo'<td class="text-center">'.$fila["id_paciente"].'</td>';
				echo'<td class="text-center">'.$fila["doc_pac"].'</td>';
				echo'<td class="text-center">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
				echo'<td class="text-center">'.$fila["fingreso_hosp"].' | '.$fila["hingreso_hosp"].'</td>';
				echo'<td class="text-center">'.$fila["tipo_servicio"].'</td>';
				echo'<td class="text-center">'.$fila["nom_sedes"].'</td>';
				echo'<td class="text-center">'.$fila["nom_eps"].'</td>';
        echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=REG&idpaciente='.$fila["id_paciente"].'"><button type="button" class="btn btn-primary sombra_movil" ><span class="fa fa-plus-circle"></span></button></a></th>';
				echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=UPT&idpaciente='.$fila["id_paciente"].'"><button type="button" class="btn btn-warning sombra_movil" ><span class="fa fa-edit"></span></button></a></th>';

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
