<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>

	<script>
	$(document).ready(function(){
	
		// generamos un evento cada vez que se pulse una tecla
		$("#id").keyup(function(){
		
			// enviamos una petición al servidor mediante AJAX enviando el id
			// introducido por el usuario mediante POST
			$.post("miarchivo.php", {"id":$("#id").val()}, function(data){
			
				// Si devuelve un nombre lo mostramos, si no, vaciamos la casilla
				if(data.nombre)
					$("#nombre").val(data.nombre);
				else
					$("#nombre").val("");
					
				// Si devuelve un apellido lo mostramos, si no, vaciamos la casilla
				if(data.apellidos)
					$("#apellidos").val(data.apellidos);
				else
					$("#apellidos").val("");

			},"json");
		});
	});
	</script>
	
	<style>
	#miFormulario span {width:100px;display:inline-block;}
	</style>
</head>

<body>

<form id="miFormulario" name="miFormulario">
	<div><span>ID:</span><input type="text" name="id" id="id" value=""> (introduce el id 10)</div>
	<div><span>Nombre:</span><input type="text" name="nombre" id="nombre" value=""></div>
	<div><span>Apellidos:</span><input type="text" name="apellidos" id="apellidos" value=""></div>
</form>

</body>
</html>
