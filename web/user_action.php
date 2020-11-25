<?php

//user_action.php

include('sms.php');

$shipment_system = new sms();

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$order_column = array('admin_name', 'admin_contact_no', 'admin_email', 'admin_created_on');

		$output = array();

		$main_query = "
		SELECT * FROM admin_table 
		WHERE admin_type = 'User' 
		
		";

		$search_query = '';

		if(isset($_POST["search"]["value"]))
		{
			$search_query .= 'AND (admin_name LIKE "%'.$_POST["search"]["value"].'%" ';
			$search_query .= 'OR admin_contact_no LIKE "%'.$_POST["search"]["value"].'%" ';
			$search_query .= 'OR admin_email LIKE "%'.$_POST["search"]["value"].'%" ';
			$search_query .= 'OR admin_created_on LIKE "%'.$_POST["search"]["value"].'%") ';
		}

		if(isset($_POST["order"]))
		{
			$order_query = 'ORDER BY '.$order_column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_query = 'ORDER BY admin_id DESC ';
		}

		$limit_query = '';

		if($_POST["length"] != -1)
		{
			$limit_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$shipment_system->query = $main_query . $search_query . $order_query;

		$shipment_system->execute();

		$filtered_rows = $shipment_system->row_count();

		$shipment_system->query .= $limit_query;

		$result = $shipment_system->get_result();

		$shipment_system->query = $main_query;

		$shipment_system->execute();

		$total_rows = $shipment_system->row_count();

		$data = array();

		foreach($result as $row)
		{
			$sub_array = array();
			$sub_array[] = '<img src="'.$row["admin_profile"].'" class="img-fluid img-thumbnail" width="75" height="75" />';
			$sub_array[] = html_entity_decode($row["admin_name"]);
			$sub_array[] = $row["admin_contact_no"];
			$sub_array[] = $row["admin_email"];
			$sub_array[] = $row["admin_created_on"];
			$delete_button = '';
			if($row["admin_status"] == 'Enable')
			{
				$delete_button = '<button type="button" name="delete_button" class="btn btn-primary btn-sm delete_button" data-id="'.$row["admin_id"].'" data-status="'.$row["admin_status"].'">'.$row["admin_status"].'</button>';
			}
			else
			{
				$delete_button = '<button type="button" name="delete_button" class="btn btn-danger btn-sm delete_button" data-id="'.$row["admin_id"].'" data-status="'.$row["admin_status"].'">'.$row["admin_status"].'</button>';
			}
			$sub_array[] = '
			<div align="center">
			<button type="button" name="edit_button" class="btn btn-warning btn-sm edit_button" data-id="'.$row["admin_id"].'"><i class="fas fa-edit"></i></button>
			&nbsp;
			'.$delete_button.'
			</div>';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"    			=> 	intval($_POST["draw"]),
			"recordsTotal"  	=>  $total_rows,
			"recordsFiltered" 	=> 	$filtered_rows,
			"data"    			=> 	$data
		);
			
		echo json_encode($output);

	}

	if($_POST["action"] == 'Add')
	{
		$error = '';

		$success = '';

		$data = array(
			':admin_email'	=>	$_POST["admin_email"]
		);

		$shipment_system->query = "
		SELECT * FROM admin_table 
		WHERE admin_email = :admin_email
		";

		$shipment_system->execute($data);

		if($shipment_system->row_count() > 0)
		{
			$error = '<div class="alert alert-danger">User Email Already Exists</div>';
		}
		else
		{
			$user_image = '';
			if($_FILES["user_image"]["name"] != '')
			{
				$user_image = upload_image();
			}
			else
			{
				$user_image = make_avatar(strtoupper($_POST["admin_name"][0]));
			}

			$data = array(
				':admin_name'		=>	$shipment_system->clean_input($_POST["admin_name"]),
				':admin_contact_no'	=>	$_POST["admin_contact_no"],
				':admin_email'		=>	$_POST["admin_email"],
				':admin_password'	=>	password_hash($_POST["admin_password"], PASSWORD_DEFAULT),
				':admin_profile'	=>	$user_image,
				':admin_type'		=>	'User',
				':admin_created_on'	=>	$shipment_system->get_datetime()
			);

			$shipment_system->query = "
			INSERT INTO admin_table 
			(admin_name, admin_contact_no, admin_email, admin_password, admin_profile, admin_type, admin_created_on) 
			VALUES (:admin_name, :admin_contact_no, :admin_email, :admin_password, :admin_profile, :admin_type, :admin_created_on)
			";

			$shipment_system->execute($data);

			$success = '<div class="alert alert-success">User Added</div>';
		}

		$output = array(
			'error'		=>	$error,
			'success'	=>	$success
		);

		echo json_encode($output);

	}

	if($_POST["action"] == 'fetch_single')
	{
		$shipment_system->query = "
		SELECT * FROM admin_table 
		WHERE admin_id = '".$_POST["admin_id"]."'
		";

		$result = $shipment_system->get_result();

		$data = array();

		foreach($result as $row)
		{
			$data['admin_name'] = $row['admin_name'];
			$data['admin_contact_no'] = $row['admin_contact_no'];
			$data['admin_email'] = $row['admin_email'];
			$data['admin_profile'] = $row['admin_profile'];
		}

		echo json_encode($data);
	}

	if($_POST["action"] == 'Edit')
	{
		$error = '';

		$success = '';

		$data = array(
			':admin_email'	=>	$_POST["admin_email"],
			':admin_id'		=>	$_POST['hidden_id']
		);

		$shipment_system->query = "
		SELECT * FROM admin_table 
		WHERE admin_email = :admin_email 
		AND admin_id != :admin_id
		";

		$shipment_system->execute($data);

		if($shipment_system->row_count() > 0)
		{
			$error = '<div class="alert alert-danger">User Email Already Exists</div>';
		}
		else
		{
			$user_image = $_POST["hidden_user_image"];
			if($_FILES["user_image"]["name"] != '')
			{
				$user_image = upload_image();
			}

			$data[':admin_name'] = $shipment_system->clean_input($_POST["admin_name"]);
			$data[':admin_contact_no'] = $_POST["admin_contact_no"];
			$data[':admin_email'] = $_POST["admin_email"];
			if($_POST["admin_password"] != '')
			{
				$data[':admin_password'] = password_hash($_POST["admin_password"], PASSWORD_DEFAULT);
			}
			$data[':admin_profile'] = $user_image;

			if($_POST["admin_password"] != '')
			{
				$data = array(
					':admin_name'	=>	$shipment_system->clean_input($_POST["admin_name"]),
					':admin_contact_no'	=>	$_POST["admin_contact_no"],
					':admin_email'	=>	$_POST["admin_email"],
					':admin_password'	=>	password_hash($_POST["admin_password"], PASSWORD_DEFAULT),
					':admin_profile'	=>	$user_image
				);

				$shipment_system->query = "
				UPDATE admin_table 
				SET admin_name = :admin_name, 
				admin_contact_no = :admin_contact_no, 
				admin_email = :admin_email, 
				admin_password = :admin_password, 
				admin_profile = :admin_profile 
				WHERE admin_id = '".$_POST['hidden_id']."'
				";

				$shipment_system->execute($data);
			}
			else
			{
				$data = array(
					':admin_name'	=>	$shipment_system->clean_input($_POST["admin_name"]),
					':admin_contact_no'	=>	$_POST["admin_contact_no"],
					':admin_email'	=>	$_POST["admin_email"],
					':admin_profile'	=>	$user_image
				);

				$shipment_system->query = "
				UPDATE admin_table 
				SET admin_name = :admin_name, 
				admin_contact_no = :admin_contact_no, 
				admin_email = :admin_email,  
				admin_profile = :admin_profile 
				WHERE admin_id = '".$_POST['hidden_id']."'
				";

				$shipment_system->execute($data);
			}

			$success = '<div class="alert alert-success">User Details Updated</div>';
		}

		$output = array(
			'error'		=>	$error,
			'success'	=>	$success
		);

		echo json_encode($output);

	}

	if($_POST["action"] == 'delete')
	{
		$data = array(
			':admin_status'		=>	$_POST['next_status']
		);

		$shipment_system->query = "
		UPDATE admin_table 
		SET admin_status = :admin_status 
		WHERE admin_id = '".$_POST["id"]."'
		";

		$shipment_system->execute($data);

		echo '<div class="alert alert-success">User Status change to '.$_POST['next_status'].'</div>';
	}

	if($_POST["action"] == 'profile')
	{
		sleep(2);

		$error = '';

		$success = '';

		$admin_name = '';

		$admin_contact_no = '';

		$admin_email = '';

		$admin_profile = '';

		$data = array(
			':admin_email'	=>	$_POST["admin_email"],
			':admin_id'		=>	$_POST['hidden_id']
		);

		$shipment_system->query = "
		SELECT * FROM admin_table 
		WHERE admin_email = :admin_email 
		AND admin_id != :admin_id
		";

		$shipment_system->execute($data);

		if($shipment_system->row_count() > 0)
		{
			$error = '<div class="alert alert-danger">User Email Already Exists</div>';
		}
		else
		{
			$user_image = $_POST["hidden_user_image"];
			if($_FILES["user_image"]["name"] != '')
			{
				$user_image = upload_image();
			}

			$admin_name = $shipment_system->clean_input($_POST["admin_name"]);

			$admin_contact_no = $_POST["admin_contact_no"];

			$admin_email = $_POST["admin_email"];

			$admin_profile = $user_image;

			$data = array(
				':admin_name'	=>	$admin_name,
				':admin_contact_no'	=>	$admin_contact_no,
				':admin_email'	=>	$admin_email,
				':admin_profile'	=>	$admin_profile
			);

			$shipment_system->query = "
			UPDATE admin_table 
			SET admin_name = :admin_name, 
			admin_contact_no = :admin_contact_no, 
			admin_email = :admin_email,  
			admin_profile = :admin_profile 
			WHERE admin_id = '".$_POST['hidden_id']."'
			";

			$shipment_system->execute($data);

			$success = '<div class="alert alert-success">User Details Updated</div>';
		}

		$output = array(
			'error'		=>	$error,
			'success'	=>	$success,
			'admin_name'	=>	$admin_name,
			'admin_contact_no'	=>	$admin_contact_no,
			'admin_email'	=>	$admin_email,
			'admin_profile'	=>	$admin_profile
		);

		echo json_encode($output);
	}


	if($_POST["action"] == 'fetch_phone')
	{
		$shipment_system->query = "
		SELECT * FROM twilio_service WHERE USER_ID = 1
		";

		$result = $shipment_system->get_result();

		$data = array();

		foreach($result as $row)
		{
			$data['ACCOUNT_SID'] = $row['ACCOUNT_SID'];
			$data['AUTH_TOKEN'] = $row['AUTH_TOKEN'];
			$data['PHONE_NUMBER'] = $row['PHONE_NUMBER'];
			$data['ADMIN_PHONE_NUMBER'] = $row['ADMIN_PHONE_NUMBER'];
		}

		echo json_encode($data);
	}
	
	
	if($_POST["action"] == 'change_phone_number')
	{
		$error = '';
		$success = '';
		
		$data = array(
			':account_sid'	=>	$_POST["account_sid"],
			':auth_token'	=>	$_POST["auth_token"],
			':trail_number'	=>	$_POST["trail_number"],
			':phone_number'		=>	$_POST["phone_number"],
		);

		$shipment_system->query = "
		UPDATE twilio_service 
		SET ACCOUNT_SID = :account_sid, 
		AUTH_TOKEN = :auth_token, 
		PHONE_NUMBER = :trail_number, 
		ADMIN_PHONE_NUMBER = :phone_number 
		WHERE USER_ID = 1
		";

		$shipment_system->execute($data);

		echo '<div class="alert alert-success"> Phone Number Updated</div>';
	}
	
	if($_POST["action"] == 'change_password')
	{
		$error = '';
		$success = '';
		$shipment_system->query = "
		SELECT admin_password FROM admin_table 
		WHERE admin_id = '".$_SESSION["admin_id"]."'
		";

		$result = $shipment_system->get_result();

		foreach($result as $row)
		{
			if(password_verify($_POST["current_password"], $row["admin_password"]))
			{
				$data = array(
					':admin_password'	=>	password_hash($_POST["new_password"], PASSWORD_DEFAULT)
				);
				$shipment_system->query = "
				UPDATE admin_table 
				SET admin_password = :admin_password 
				WHERE admin_id = '".$_SESSION["admin_id"]."'
				";

				$shipment_system->execute($data);

				$success = '<div class="alert alert-success">Password Change Successfully</div>';
			}
			else
			{
				$error = '<div class="alert alert-danger">You have enter wrong current password</div>';
			}
		}
		$output = array(
			'error'		=>	$error,
			'success'	=>	$success
		);
		echo json_encode($output);
	}
}

function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = 'images/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $destination;
	}
}

function make_avatar($character)
{
    $path = "images/". time() . ".png";
	$image = imagecreate(200, 200);
	$red = rand(0, 255);
	$green = rand(0, 255);
	$blue = rand(0, 255);
    imagecolorallocate($image, $red, $green, $blue);  
    $textcolor = imagecolorallocate($image, 255,255,255);  

    imagettftext($image, 100, 0, 55, 150, $textcolor, 'font/arial.ttf', $character);
    imagepng($image, $path);
    imagedestroy($image);
    return $path;
}

?>