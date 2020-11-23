<?php

//login_action.php

include_once('include/debug.php');
include_once('sms.php');

$shipment_system = new sms();

if($_POST["user_name"])
{
	sleep(2);
	$error = '';
	$data = array(
		':admin_name'	=>	$_POST["user_name"]
	);

	$shipment_system->query = "
		SELECT * FROM admin_table 
		WHERE admin_name = :admin_name
	";

	$shipment_system->execute($data);

	//$statement = $shipment_system->connect->prepare($query);

	//$statement->execute($data);

	//$total_row = $statement->rowCount();

	$total_row = $shipment_system->row_count();

	if($total_row == 0)
	{
		$error = '<div class="alert alert-danger">Wrong User Name</div>';
	}
	else
	{
		//$result = $statement->fetchAll();

		$result = $shipment_system->statement_result();

		foreach($result as $row)
		{
			if($row["admin_status"] == 'Enable')
			{
				if(password_verify($_POST["user_password"], $row["admin_password"]))
				{
					$_SESSION['admin_id'] = $row['admin_id'];
					$_SESSION['admin_type'] = $row['admin_type'];
				}
				else
				{
					$error = '<div class="alert alert-danger">Wrong Password</div>';
				}
			}
			else
			{
				$error = '<div class="alert alert-danger">Sorry, Your account has been disable, contact Admin</div>';
			}
		}
	}

	$output = array(
		'error'		=>	$error
	);

	echo json_encode($output);
}

?>