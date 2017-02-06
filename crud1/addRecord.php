<?php
	if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']))
	{
		// include Database connection file
		include("db_connection.php");

		// get values
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$clave = $_POST['clave'];
		$email = $_POST['email'];
		$perfil = $_POST['perfil'];
		$tdoc = $_POST['tdoc'];
		$doc = $_POST['doc'];
		$dir_user = $_POST['dir_user'];
		$tel_user = $_POST['tel_user'];
		$rm_profesional = $_POST['rm_profesional'];
		$especialidad = $_POST['especialidad'];
		$estado = $_POST['estado'];

		$query = "INSERT INTO user(nombre,cuenta,clave, email,tdoc,doc,dir_user,tel_user,rm_profesional,especialidad,id_perfil,estado)
		VALUES('$first_name', '$last_name','$clave' ,'$email','$perfil','$tdoc','$doc','$dir_user','$tel_user','$rm_profesional','$especialidad','$estado')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";

	}
?>
