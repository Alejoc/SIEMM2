<?php
	if(isset($_POST['first_name']) && isset($_POST['last_name']))
	{
		// include Database connection file
		include("config/db_connection.php");

		// get values
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$user = $_POST['user'];
		$idadm=$_POST['idadm'];

		$query = "INSERT INTO ord_med_hosp(id_adm_hosp,id_user,procedimiento,obs_proc,estado_ord_med_hosp) VALUES('$idadm', '$user','$first_name', '$last_name','Solicitado')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "Procedimientos agregado";
	}
?>
