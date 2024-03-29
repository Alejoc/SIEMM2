<?php
session_start();
require_once("config/config5.php");
include('conexion.php');
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
	<link rel="stylesheet" href="css/jqueryui.css">
	<link rel="shortcut icon" href="images/favicon.png">
	<link rel="stylesheet" href="css/fuentes.css" media="screen" title="no title" charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Baloo+Tamma" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="http://csshake.surge.sh/csshake.min.css">
	<script src="js/jquery-3.1.1.min.js" charset="utf-8"></script>
	<script src="js/jquery-ui.min.js" charset="utf-8"></script>
	<script src="js2/jquery.js" charset="utf-8"></script>
	<script src="js2/jqueryui.js" charset="utf-8"></script>
	<script src="js2/tool.js" charset="utf-8"></script>
  <script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/mapa.js"></script>
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script>
	  $( function() {
	    $( "#tabs" ).tabs();
	  } );
	</script>
	<script>
	  $( function() {
	    $( "#accordion" ).accordion();
	  } );
	</script>
	<script>
			function mostrarprov(){
				var bodega = $("#bodega").val();
				$.ajax({
					url: "proveedores.php",
					data: {idpais:bodega},
					type: "POST",
					success: function(resultado){
	        			$("#proveedores").html(resultado);
	    			}
	    		});
	    	}

	</script>
	<script>
			function mostrarbod(){
				var bodega = $("#sede").val();
				$.ajax({
					url: "bodegasel.php",
					data: {idpais:bodega},
					type: "POST",
					success: function(resultado){
	        			$("#bodeguita").html(resultado);
	    			}
	    		});
	    	}

	</script>
	<script type="text/javascript">
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
							<button class="btn btn-primary dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Salud Mental <span class="caret"></span></button>
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
 							<button class="btn btn-primary dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Demencias <span class="caret"></span></button>
 							<ul class="dropdown-menu">
 								<li><?php include("menuDEM".VERSION.".php");?></li>
 							</ul>
 						</li>
 					</ul>
					<ul class="nav navbar-nav" id="barra">
 						<li class="dropdown">
 							<button class="btn btn-primary dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">AVD <span class="caret"></span></button>
 							<ul class="dropdown-menu">
 								<li><?php include("menuAVD".VERSION.".php");?></li>
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
