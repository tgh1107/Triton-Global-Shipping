<?php

//visitor_action.php

include('sms.php');

$shipment_system = new sms();

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$order_column = array('visitor_table.visitor_name', 'visitor_table.visitor_meet_person_name', 'visitor_table.visitor_department', 'visitor_table.visitor_enter_time', 'visitor_table.visitor_out_time', 'visitor_table.visitor_status', 'admin_table.admin_name');

		$output = array();

		$main_query = "
		SELECT * FROM visitor_table 
		INNER JOIN admin_table 
		ON admin_table.admin_id = visitor_table.visitor_enter_by 
		";

		if(!$shipment_system->is_master_user())
		{
			$main_query .= "
			WHERE visitor_table.visitor_enter_by = '".$_SESSION["admin_id"]."' 
			";

			if($_POST["from_date"] != '')
			{
				$search_query = "
				AND DATE(visitor_table.visitor_enter_time) BETWEEN '".$_POST["from_date"]."' AND  '".$_POST["to_date"]."' AND ( 
				";
			}
			else
			{
				$search_query = " AND ( ";	
			}
			
		}
		else
		{
			if($_POST["from_date"] != '')
			{
				$search_query = "WHERE DATE(visitor_table.visitor_enter_time) BETWEEN '".$_POST["from_date"]."' AND  '".$_POST["to_date"]."' AND ( ";
			}
			else
			{
				$search_query = "WHERE ";	
			}
		}
		

		if(isset($_POST["search"]["value"]))
		{
			$search_query .= 'visitor_table.visitor_name LIKE "%'.$_POST["search"]["value"].'%" ';
			$search_query .= 'OR visitor_table.visitor_meet_person_name LIKE "%'.$_POST["search"]["value"].'%" ';
			$search_query .= 'OR visitor_table.visitor_department LIKE "%'.$_POST["search"]["value"].'%" ';
			$search_query .= 'OR visitor_table.visitor_enter_time LIKE "%'.$_POST["search"]["value"].'%" ';
			$search_query .= 'OR visitor_table.visitor_out_time LIKE "%'.$_POST["search"]["value"].'%" ';
			$search_query .= 'OR visitor_table.visitor_status LIKE "%'.$_POST["search"]["value"].'%" ';
			
			if($shipment_system->is_master_user())
			{
				$search_query .= 'OR admin_table.admin_name LIKE "%'.$_POST["search"]["value"].'%" ';
				if($_POST["from_date"] != '')
				{
					$search_query .= ') ';
				}
			}
			else
			{
				$search_query .= ') ';
			}
		}

		if(isset($_POST["order"]))
		{
			$order_query = 'ORDER BY '.$order_column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_query = 'ORDER BY visitor_table.visitor_id DESC ';
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
			$sub_array[] = html_entity_decode($row["visitor_name"]);
			$sub_array[] = html_entity_decode($row["visitor_meet_person_name"]);
			$sub_array[] = $row["visitor_department"];
			$sub_array[] = $row["visitor_enter_time"];
			$sub_array[] = $row["visitor_out_time"];
			$status = '';
			if($row["visitor_status"] == 'In')
			{
				$status = '<span class="badge badge-success">In Premises</span>';
			}
			else
			{
				$status = '<span class="badge badge-danger">Leave</span>';
			}
			$sub_array[] = $status;
			if($shipment_system->is_master_user())
			{
				$sub_array[] = $row["admin_name"];
			}
			$sub_array[] = '
			<div align="center">
			<button type="button" name="view_button" class="btn btn-primary btn-sm view_button" data-id="'.$row["visitor_id"].'"><i class="fas fa-eye"></i></button>
			&nbsp;
			<button type="button" name="edit_button" class="btn btn-warning btn-sm edit_button" data-id="'.$row["visitor_id"].'"><i class="fas fa-edit"></i></button>
			&nbsp;
			<button type="button" name="delete_button" class="btn btn-danger btn-sm delete_button" data-id="'.$row["visitor_id"].'"><i class="fas fa-times"></i></button>
			</div>
			';
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
		$data = array(
			':visitor_name'			=>	$shipment_system->clean_input($_POST["visitor_name"]),
			':visitor_email'		=>	$_POST["visitor_email"],
			':visitor_mobile_no'	=>	$_POST["visitor_mobile_no"],
			':visitor_address'		=>	$shipment_system->clean_input($_POST["visitor_address"]),
			':visitor_meet_person_name' =>	$_POST["visitor_meet_person_name"],
			':visitor_department'	=>	$_POST["visitor_department"],
			':visitor_reason_to_meet' =>	$shipment_system->clean_input($_POST["visitor_reason_to_meet"]),
			':visitor_enter_time'	=>	$shipment_system->get_datetime(),
			':visitor_outing_remark'=>	'',
			':visitor_out_time'		=>	'',
			':visitor_status'		=>	'In',
			':visitor_enter_by'		=>	$_SESSION["admin_id"]
		);

		$shipment_system->query = "
		INSERT INTO visitor_table 
		(visitor_name, visitor_email, visitor_mobile_no, visitor_address, visitor_meet_person_name, visitor_department, visitor_reason_to_meet, visitor_enter_time, visitor_outing_remark, visitor_out_time, visitor_status, visitor_enter_by) 
		VALUES (:visitor_name, :visitor_email, :visitor_mobile_no, :visitor_address, :visitor_meet_person_name, :visitor_department, :visitor_reason_to_meet, :visitor_enter_time, :visitor_outing_remark, :visitor_out_time, :visitor_status, :visitor_enter_by)
			";

		$shipment_system->execute($data);

		echo '<div class="alert alert-success">Department Added</div>';
	}

	if($_POST["action"] == 'fetch_single')
	{
		$shipment_system->query = "
		SELECT * FROM visitor_table 
		WHERE visitor_id = '".$_POST["visitor_id"]."'
		";

		$result = $shipment_system->get_result();

		$data = array();

		foreach($result as $row)
		{
			$data['visitor_name'] = $row['visitor_name'];
			$data['visitor_email'] = $row['visitor_email'];
			$data['visitor_mobile_no'] = $row['visitor_mobile_no'];
			$data['visitor_address'] = $row['visitor_address'];
			$data['visitor_meet_person_name'] = $row['visitor_meet_person_name'];
			$data['visitor_department'] = $row['visitor_department'];
			$data['visitor_reason_to_meet'] = $row['visitor_reason_to_meet'];
			$data['visitor_outing_remark'] = $row['visitor_outing_remark'];
		}

		echo json_encode($data);
	}

	if($_POST["action"] == 'Edit')
	{
		$data = array(
			':visitor_name'			=>	$shipment_system->clean_input($_POST["visitor_name"]),
			':visitor_email'		=>	$_POST["visitor_email"],
			':visitor_mobile_no'	=>	$_POST["visitor_mobile_no"],
			':visitor_address'		=>	$shipment_system->clean_input($_POST["visitor_address"]),
			':visitor_meet_person_name' =>	$_POST["visitor_meet_person_name"],
			':visitor_department'	=>	$_POST["visitor_department"],
			':visitor_reason_to_meet' =>	$shipment_system->clean_input($_POST["visitor_reason_to_meet"]),
		);

		$shipment_system->query = "
		UPDATE visitor_table 
		SET visitor_name = :visitor_name, 
		visitor_email = :visitor_email, 
		visitor_mobile_no = :visitor_mobile_no, 
		visitor_address = :visitor_address, 
		visitor_meet_person_name = :visitor_meet_person_name, 
		visitor_department = :visitor_department, 
		visitor_reason_to_meet = :visitor_reason_to_meet 
		WHERE visitor_id = '".$_POST['hidden_id']."'
		";

		$shipment_system->execute($data);

		echo '<div class="alert alert-success">Visitor Details Updated</div>';
	}

	if($_POST["action"] == 'delete')
	{
		$shipment_system->query = "
		DELETE FROM visitor_table 
		WHERE visitor_id = '".$_POST["id"]."'
		";

		$shipment_system->execute();

		echo '<div class="alert alert-success">Visitor Details Deleted</div>';
	}

	if($_POST["action"] == 'update_outing_detail')
	{
		$data = array(
			':visitor_outing_remark'	=>	$shipment_system->clean_input($_POST["visitor_outing_remark"]),
			':visitor_out_time'			=>	$shipment_system->get_datetime(),
			':visitor_status'			=>	'Out'
		);

		$shipment_system->query = "
		UPDATE visitor_table 
		SET visitor_outing_remark = :visitor_outing_remark, 
		visitor_out_time = :visitor_out_time, 
		visitor_status = :visitor_status 
		WHERE visitor_id = '".$_POST["hidden_visitor_id"]."'
		";

		$shipment_system->execute($data);

		echo '<div class="alert alert-success">Visitor Out Details Updated</div>';
	}
}

?>