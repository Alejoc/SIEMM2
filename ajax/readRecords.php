<?php
	// include Database connection file
	include("config/db_connection.php");
$id=$_POST["idadm"];
	// Design initial table header
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Procedimiento solicitado</th>
							<th>Observacion</th>
							<th>Estado</th>
							<th>Interpretacion</th>
						</tr>';

	$query = "SELECT * FROM ord_med_hosp";
echo $query;
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
				<td>'.$row['procedimiento'].'</td>
				<td>'.$row['obs_proc'].'</td>
				<td>'.$row['id_user'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id_ord_med_hosp'].')" class="btn btn-warning">Update</button>
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
