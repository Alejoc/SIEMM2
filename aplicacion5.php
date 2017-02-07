<?php
session_start();
require_once("config/config5.php");
if (isset($_GET["salir"])){
	if ($_GET["salir"] == $_SESSION["AUT"]["id_user"]){
	    session_unset();
		session_destroy();
		}
}
if (!isset($_SESSION["AUT"]["id_user"])){
	header("location:".LOGINI);
}
	$bd1=new subase();
	$error1="";
		if (!$bd1->obtener_conexion()){			//comparacion implicita
 			$error1="error en conexion a base de datos";
		}
?>
<!DOCTYPE html>
<html>
 <head>
 	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/social.css">
	<link rel="shortcut icon" href="images/favicon.png">
	<link rel="stylesheet" href="css/fuentes.css" media="screen" title="no title" charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Baloo+Tamma" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="http://csshake.surge.sh/csshake.min.css">
	<script src="js/jquery-3.1.1.min.js" charset="utf-8"></script>
	<script src="js/jquery-ui.min.js" charset="utf-8"></script>
  <script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/mapa.js"></script>
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
	     var consulta;
	     //hacemos focus al campo de bÃºsqueda
	     $("#busqueda").focus();
	     //comprobamos si se pulsa una tecla
	     $("#busqueda").keyup(function(e){
	           //obtenemos el texto introducido en el campo de bÃºsqueda
	           consulta = $("#busqueda").val();
	           //hace la bÃºsqueda
	           $.ajax({
	                 type: "POST",
	                 url: "bus_cie_descripcion.php",
	                 data: "b="+consulta,
	                 dataType: "html",
	                 beforeSend: function(){
	                 //imagen de carga
	                 $("#resultado").html("<p align='center'><input type='text' name='coddxp' value='' > </p>");
	                 },
	                 error: function(){
	                 alert("error peticion de diagnostico");
	                 },
	                 success: function(data){
	                 $("#resultado").empty();
	                 $("#resultado").append(data);
	                 }
	           });
	     });
	});
	$(document).ready(function(){
		cargar_paises();
		$("#pais").change(function(){dependencia_estado();});
		$("#estado").change(function(){dependencia_ciudad();});
		$("#estado").attr("disabled",true);
		$("#ciudad").attr("disabled",true);
	});
	$(document).ready(function(){
		cargar_ips();
		$("#ips").change(function(){dependencia_sedes();});
		$("#sedes").attr("disabled",true);
	});
	function cargar_ips()
	{
		$.get("cargar-ips.php", function(resultado){
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$('#ips').append(resultado);
			}
		});
	}
	function cargar_paises()
	{
		$.get("cargar-paises.php", function(resultado){
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$('#pais').append(resultado);
			}
		});
	}
	function dependencia_sedes()
	{
		var code = $("#ips").val();
		$.get("dependencia-sedes.php", { code: code },
			function(resultado)
			{
				if(resultado == false)
				{
					alert("Error");
				}
				else
				{
					$("#sedes").attr("disabled",false);
					document.getElementById("sedes").options.length=1;
					$('#sedes').append(resultado);
				}
			}
		);
	}
	function dependencia_estado()
	{
		var code = $("#pais").val();
		$.get("dependencia-estado.php", { code: code },
			function(resultado)
			{
				if(resultado == false)
				{
					alert("Error");
				}
				else
				{
					$("#estado").attr("disabled",false);
					document.getElementById("estado").options.length=1;
					$('#estado').append(resultado);
				}
			}
		);
	}
	function dependencia_ciudad()
	{
		var code = $("#estado").val();
		$.get("dependencia-ciudades.php", { code: code }, function(resultado){
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#ciudad").attr("disabled",false);
				document.getElementById("ciudad").options.length=1;
				$('#ciudad').append(resultado);
			}
		});
	}
	</script>

 	<title>EmmanuelIPS Software</title>

 	<script src = "js/sha3.js"></script>
		<script>
			function validar(){
				if (document.forms[0].nombre.value == ""){
					alert("Se requiere el nombre del usuario!");
					document.forms[0].nombre.focus();				// Ubicar el cursor
					return(false);
				}
				if (document.forms[0].cuenta.value == ""){
					alert("Se requiere la cuenta del usuario!");
					document.forms[0].cuenta.focus();				// Ubicar el cursor
					return(false);
				}
				if (document.forms[0].clave1.value == document.forms[0].clave2.value ){
					if (document.forms[0].clave1.value != ""){
						document.forms[0].clave1.value = CryptoJS.SHA3(document.forms[0].clave1.value);
						document.forms[0].clave2.value = document.forms[0].clave1.value;
					}
				}else{
					alert("Error en confirmacion de la clave!");
					document.forms[0].clave1.value = "";
					document.forms[0].clave2.value = "";
					document.forms[0].clave1.focus();				// Ubicar el cursor
					return(false);
				}
			}
		</script>
 </head>
 <body>
	 <canvas id="canvas" width="1000" height="40" ></canvas>
	 <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid " >
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo PROGRAMA ;?>"><img src="images/favicon.png" class="image_logo" alt="logoP"></a>
			</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav " id="barra">
						<li class="dropdown">
							<button class="btn btn-primary dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Parametrizacion <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><?php include("menu".VERSION.".php");?></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav" id="barra">
						<li class="dropdown">
							<button class="btn btn-primary dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Administracion <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><?php include("menuA".VERSION.".php");?></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav" id="barra">
						<li class="dropdown">
							<button class="btn btn-primary dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Hospitalario <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><?php include("menuAS".VERSION.".php");?></li>
							</ul>
						</li>
					</ul>

				 <ul class="nav navbar-nav" id="barra">
					 <li class="dropdown">
						 <button class="btn btn-primary dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Domiciliarios <span class="caret"></span></button>
						 <ul class="dropdown-menu">
							 <li><?php include("menuDOM".VERSION.".php");?></li>
						 </ul>
					 </li>
				 </ul>
				 <ul class="nav navbar-nav" id="barra">
					 <li class="dropdown">
						 <button class="btn btn-primary dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Consulta Externa <span class="caret"></span></button>
						 <ul class="dropdown-menu">
							 <li><?php include("menuCE".VERSION.".php");?></li>
						 </ul>
					 </li>
				 </ul>
				 <ul class="nav navbar-nav" id="barra">
						<li class="dropdown">
							<button class="btn btn-primary dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Reportes <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><?php include("menuR".VERSION.".php");?></li>
							</ul>
						</li>
					</ul>

		<button class="btn btn-default navbar-right dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><?php include("usuario".VERSION.".php");?></span></button>
			<ul class="dropdown-menu pull-right">
				<li><a href=""><span class="fa fa-exchange"></span> Cambio de Clave</a></li>
				<li><a href="#"><span class="fa fa-cog"></span>  Soporte</a></li>
				<li><a href="#"><span class="fa fa-info-circle"></span>  Capacitacion</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="<?php echo PROGRAMA."?salir=".$_SESSION["AUT"]["id_user"]; ?>" class="text-center"><span class="fa fa-power-off"> </span> Salir</a></li>
			</ul>
		</div>

		</div>
		</nav>
<section class="modal fade" id="hcfalta" role="dialog">
	<section class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" >Notificaciones: Admisiones sin historia de ingreso</h4>
			</div>
			<div class="modal-body">
				<table class="table table-responsive lettermodal">
					<tr>
						<th id="th-estilo1">ID</th>
						<th id="th-estilo1">NOMBRE PACIENTE</th>
						<th id="th-estilo3">IDENTIFICACION</th>
						<th id="th-estilo1">FECHA INGRESO</th>
						<th id="th-estilo3">FECHA EGRESO</th>
						<th id="th-estilo3">TIPO SERVICIO</th>
					</tr>
					<?php
					$sql="select d.doc_pac ,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente ,c.Id_adm_hosp,c.tipo_servicio ,c.fingreso_hosp ,c.fegreso_hosp ,c.tipo_servicio from adm_hospitalario c,pacientes d where c.fingreso_hosp > '2016-09-01' and c.tipo_servicio = 'Hospitalario' and d.doc_pac not in ('222','11437483') and d.id_paciente = c.id_paciente and not exists (select 1 from hc_hospitalario b where b.id_adm_hosp = c.id_adm_hosp ) order by 2";
					if ($tabla=$bd1->sub_tuplas($sql)){
						//echo $sql;
						foreach ($tabla as $fila ) {
							echo"<tr >\n";
							echo'<td class="text-center danger">'.$fila["Id_adm_hosp"].'</td>';
							echo'<td class="text-center danger">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
							echo'<td class="text-center danger">'.$fila["doc_pac"].'</td>';
							echo'<td class="text-center danger">'.$fila["fingreso_hosp"].' '.$fila["hingreso_hosp"].'</td>';
							echo'<td class="text-center danger">'.$fila["fegreso_hosp"].'</td>';
							echo'<td class="text-center danger">'.$fila["tipo_servicio"].'</td>';
							echo "</tr>\n";
						}
					}
					?>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</section>
</section>
<section class="modal fade" id="evomedfalta" role="dialog"> Modal para ver evoluciones medicas faltantes-
	<section class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" >Notificaciones: Admisiones sin Evolucion Medica</h4>
			</div>
			<div class="modal-body">
				<table class="table table-responsive lettermodal">
					<tr>
						<th id="th-estilo4">ID</th>
						<th id="th-estilo1">NOMBRE PACIENTE</th>
						<th id="th-estilo3">IDENTIFICACION</th>
						<th id="th-estilo1">FECHA INGRESO</th>
						<th id="th-estilo3">FECHA EGRESO</th>
						<th id="th-estilo3">FECHA EVOLUCION FALTANTE</th>
					</tr>
					<?php
					$sql="select d.doc_pac,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente,a.Id_adm_hosp,c.fingreso_hosp,c.fegreso_hosp,a.fecha,a.mes,c.tipo_servicio
from calendario a,adm_hospitalario c,pacientes d
where
            c.fingreso_hosp <> '0000-00-00'
and c.tipo_servicio = 'Hospitalario'
and a.mes in (9,10,11,12)
and d.doc_pac not in ('222','11437483')
and c.id_adm_hosp = a.id_adm_hosp
and a.fecha > c.fingreso_hosp and a.fecha <= if(c.fegreso_hosp='0000-00-00',(CURRENT_DATE-1),c.fegreso_hosp)
and d.id_paciente = c.id_paciente
and not exists (select 1 from evolucion_medica  b
                  where b.id_adm_hosp = a.id_adm_hosp and
                                    b.freg_evomed = a.fecha)
order by 2";
					if ($tabla=$bd1->sub_tuplas($sql)){
						//echo $sql;
						foreach ($tabla as $fila ) {
							echo"<tr >\n";
							echo'<td class="text-center warning">'.$fila["Id_adm_hosp"].' </td>';
							echo'<td class="text-center warning">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
							echo'<td class="text-center warning">'.$fila["doc_pac"].'</td>';
							echo'<td class="text-center warning">'.$fila["fingreso_hosp"].'</td>';
							echo'<td class="text-center warning">'.$fila["fegreso_hosp"].'</td>';
							echo'<td class="text-center warning">'.$fila["fecha"].'</td>';
							echo "</tr>\n";
						}
					}
					?>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</section>
</section>
<section class="modal fade" id="evomtofalta" role="dialog">
	<section class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" >Notificaciones: Admisiones sin Evolucion Terapia Ocupacional</h4>
			</div>
			<div class="modal-body">
				<table class="table table-responsive lettermodal">
					<tr>
						<th id="th-estilo4">ID</th>
						<th id="th-estilo1">NOMBRE PACIENTE</th>
						<th id="th-estilo3">IDENTIFICACION</th>
						<th id="th-estilo1">FECHA INGRESO</th>
						<th id="th-estilo3">FECHA EGRESO</th>
						<th id="th-estilo3">FECHA EVOLUCION FALTANTE</th>
					</tr>
					<?php
					$sql="select d.doc_pac
                        ,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente
                        ,a.Id_adm_hosp
                        ,c.fingreso_hosp
        ,c.fegreso_hosp
                        ,a.fecha
        ,a.mes
        ,c.tipo_servicio
from calendario a,adm_hospitalario c,pacientes d
where
            c.fingreso_hosp <> '0000-00-00'
and c.tipo_servicio = 'Hospitalario'
and a.fecha not in ('2016-09-03','2016-09-04','2016-09-10','2016-09-11','2016-09-17','2016-09-18',
                    '2016-09-24','2016-09-25','2016-10-01','2016-10-02','2016-10-08','2016-10-09',
                    '2016-10-15','2016-10-16','2016-10-27','2016-10-22','2016-10-23','2016-10-29',
                    '2016-10-30','2016-11-05','2016-11-06','2016-11-07','2016-11-12','2016-11-13',
                    '2016-11-14','2016-11-19','2016-11-20','2016-11-26','2016-11-27','2016-12-03',
                    '2016-12-04','2016-12-08','2016-12-10','2016-12-11','2016-12-17','2016-12-18',
                    '2016-12-24','2016-12-25','2016-12-31')
and a.mes in (9,10,11,12)
and d.doc_pac not in ('222','11437483')
and c.id_adm_hosp = a.id_adm_hosp
and a.fecha > c.fingreso_hosp and a.fecha <= if(c.fegreso_hosp='0000-00-00',(CURRENT_DATE-1),c.fegreso_hosp)
and d.id_paciente = c.id_paciente
and not exists (select 1 from evo_to  b
                  where b.id_adm_hosp = a.id_adm_hosp and
                                    b.freg_evoto = a.fecha)
order by 2";
					if ($tabla=$bd1->sub_tuplas($sql)){
						//echo $sql;
						foreach ($tabla as $fila ) {
							echo"<tr >\n";
							echo'<td class="text-center warning">'.$fila["id_adm_hosp"].' </td>';
							echo'<td class="text-center warning">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
							echo'<td class="text-center warning">'.$fila["doc_pac"].'</td>';
							echo'<td class="text-center warning">'.$fila["fingreso_hosp"].'</td>';
							echo'<td class="text-center warning">'.$fila["fegreso_hosp"].'</td>';
							echo'<td class="text-center warning">'.$fila["fecha"].'</td>';
							echo "</tr>\n";
						}
					}
					?>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</section>
</section>
<section class="modal fade" id="evopsicofalta" role="dialog">
	<section class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" >Notificaciones: Admisiones sin Evolucion Psicologia</h4>
			</div>
			<div class="modal-body">
				<table class="table table-responsive lettermodal">
					<tr>
						<th id="th-estilo4">ID</th>
						<th id="th-estilo1">NOMBRE PACIENTE</th>
						<th id="th-estilo3">IDENTIFICACION</th>
						<th id="th-estilo1">FECHA INGRESO</th>
						<th id="th-estilo3">FECHA EGRESO</th>
						<th id="th-estilo3">FECHA EVOLUCION FALTANTE</th>
					</tr>
					<?php
					$sql="select    d.doc_pac
                                ,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente
                                ,a.Id_adm_hosp
                                ,c.fingreso_hosp
        ,c.fegreso_hosp
                                ,a.fecha
        ,a.mes
        ,c.tipo_servicio
from calendario a,adm_hospitalario c,pacientes d
where
                c.fingreso_hosp <> '0000-00-00'
and c.tipo_servicio = 'Hospitalario'
and a.fecha not in ('2016-09-03','2016-09-04','2016-09-10','2016-09-11','2016-09-17','2016-09-18',
                    '2016-09-24','2016-09-25','2016-10-01','2016-10-02','2016-10-08','2016-10-09',
                    '2016-10-15','2016-10-16','2016-10-27','2016-10-22','2016-10-23','2016-10-29',
                    '2016-10-30','2016-11-05','2016-11-06','2016-11-07','2016-11-12','2016-11-13',
                    '2016-11-14','2016-11-19','2016-11-20','2016-11-26','2016-11-27','2016-12-03',
                    '2016-12-04','2016-12-08','2016-12-10','2016-12-11','2016-12-17','2016-12-18',
                    '2016-12-24','2016-12-25','2016-12-31')
and a.mes in (9,10,11,12)
and d.doc_pac not in ('222','11437483')
and c.id_adm_hosp = a.id_adm_hosp
and a.fecha > c.fingreso_hosp and a.fecha <= if(c.fegreso_hosp='0000-00-00',(CURRENT_DATE-1),c.fegreso_hosp)
and d.id_paciente = c.id_paciente
and not exists    (              select 1 from evo_psicologia  b
                                                where b.id_adm_hosp = a.id_adm_hosp and
                                                b.freg_evo_psico = a.fecha)
order by 2";
					if ($tabla=$bd1->sub_tuplas($sql)){
						//echo $sql;
						foreach ($tabla as $fila ) {
							echo"<tr >\n";
							echo'<td class="text-center warning">'.$fila["id_adm_hosp"].' </td>';
							echo'<td class="text-center warning">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
							echo'<td class="text-center warning">'.$fila["doc_pac"].'</td>';
							echo'<td class="text-center warning">'.$fila["fingreso_hosp"].'</td>';
							echo'<td class="text-center warning">'.$fila["fegreso_hosp"].'</td>';
							echo'<td class="text-center warning">'.$fila["fecha"].'</td>';
							echo "</tr>\n";
						}
					}
					?>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</section>
</section>
<section class="modal fade" id="evoenffalta" role="dialog">
	<section class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" >Notificaciones: Admisiones sin Notas de enfermeroa</h4>
			</div>
			<div class="modal-body">
				<table class="table table-responsive lettermodal">
					<tr>
						<th id="th-estilo4">ID</th>
						<th id="th-estilo1">NOMBRE PACIENTE</th>
						<th id="th-estilo3">IDENTIFICACION</th>
						<th id="th-estilo1">FECHA INGRESO</th>
						<th id="th-estilo3">FECHA EGRESO</th>
						<th id="th-estilo3">FECHA EVOLUCION FALTANTE</th>
					</tr>
					<?php
					$sql="select    d.doc_pac
                                ,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente
                                ,a.Id_adm_hosp
                                ,c.fingreso_hosp
        ,c.fegreso_hosp
                                ,a.fecha
        ,a.mes
        ,c.tipo_servicio
from calendario a,adm_hospitalario c,pacientes d
where
                c.fingreso_hosp <> '0000-00-00'
and c.tipo_servicio = 'Hospitalario'
and a.mes in (9,10,11,12)
and d.doc_pac not in ('222','11437483')
and c.id_adm_hosp = a.id_adm_hosp
and a.fecha > c.fingreso_hosp and a.fecha <= if(c.fegreso_hosp='0000-00-00',(CURRENT_DATE-1),c.fegreso_hosp)
and d.id_paciente = c.id_paciente
and not exists (select 1 from nota_enfermeria  b
                  where b.id_adm_hosp = a.id_adm_hosp and
                                                b.freg_nota = a.fecha)
order by 2";
					if ($tabla=$bd1->sub_tuplas($sql)){
						//echo $sql;
						foreach ($tabla as $fila ) {
							echo"<tr >\n";
							echo'<td class="text-center warning">'.$fila["id_adm_hosp"].' </td>';
							echo'<td class="text-center warning">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
							echo'<td class="text-center warning">'.$fila["doc_pac"].'</td>';
							echo'<td class="text-center warning">'.$fila["fingreso_hosp"].'</td>';
							echo'<td class="text-center warning">'.$fila["fegreso_hosp"].'</td>';
							echo'<td class="text-center warning">'.$fila["fecha"].'</td>';
							echo "</tr>\n";
						}
					}
					?>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</section>
</section>
  <section class="panel panel-default">
    <article id="contenidoP" class="panel panel-body">
      <?php include("contenido".VERSION.".php");?>
    </article>
  </section>
  <footer class="text-center" id="footerP">
    <?php include("pie".VERSION.".php");?>
  </footer>
</body>
</html>
<script>
$(document).ready( function(){
 $.fn.snow({
 minSize: 10, //TamaÃ±o mÃ­nimo del copo de nieve, 10 por defecto
 maxSize: 20, //TamaÃ±o mÃ¡ximo del copo de nieve, 10 por defecto
 newOn: 1250, //Frecuencia (en milisegundos) con la que aparecen los copos de nieve, 500 por defecto
 flakeColor: '#B0E0E6' //Color del copo de nieve, #FFFFFF por defecto
 });
});
</script>
