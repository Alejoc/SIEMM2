<!DOCTYPE html>
<html>
<head>
	<title>SIEMM Software</title>
	<script src="js/jquery.js"></script>
	<script>
			function mostrar(){
				var usuarios = $("#usuarios").val();
				$.ajax({
					url: "pacientes_dom.php",
					data: {idusuario:usuarios},
					type: "POST",
					success: function(resultado){
	        			$("#datos").html(resultado);
	    			}
	    		});
	    	}

	</script>
</head>
<body>
	<?php include('conexion.php'); ?>
	<form>
		<input type="text" class="form-control" name="usuarios" id="usuarios" value="" keypress="mostrar()">
	</form>
	<div id="datos">

	</div>
	<?php mysqli_close($conex); ?>
</body>
</html>
