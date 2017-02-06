<?php
	// include Database connection file
	include("db_connection.php");

	// Design initial table header
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Nombre Completo</th>
							<th>Cuenta</th>
							<th>Email</th>
							<th>Perfil</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';

	$query = "SELECT a.*,p.* FROM perfil p LEFT JOIN user a on a.id_perfil=p.id_perfil where estado='Activo'";

	if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows
    if(mysql_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysql_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['nombre'].'</td>
				<td>'.$row['cuenta'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['nombre_perfil'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>
