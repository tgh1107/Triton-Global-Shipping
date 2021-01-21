<?php

//visitor_action.php
include_once('./include/debug.php');
include_once('sms.php');

$shipment_system = new sms();

if(isset($_POST["action"]))
{
	//#1
	//if($_POST["action"] == 'Add')
	//{
		
		$message = 'Customer number: '.$_POST['shipment_sender_mobile_no'].';'.' Customer Name: '.$_POST['shipment_sender_name'] .';'.'Day of Dispatch : '.$_POST['shipment_pakage_day_of_dispatch'].';'.'Level of urgency : '.$_POST['shipment_pakage_priority'] ;
		//echo $message;
		$shipment_system->send_message($message);
		
		
		 // insert sender  
		$sender_data = array(
			':shipment_sender_name'		=>	$_POST["shipment_sender_name"],
			':shipment_sender_email'	=>	$_POST["shipment_sender_email"],
			':shipment_sender_mobile_no'	=>	$_POST["shipment_sender_mobile_no"],
			':shipment_sender_address'	=>	$shipment_system->clean_input($_POST["shipment_sender_address"])
		);
		$shipment_system->query = "
		INSERT INTO tgs_customer ( cus_email, cus_phone, cus_lname, cus_fname, cus_initial, cus_type, cus_company, rg_code) 
		VALUES
		(:shipment_sender_email, :shipment_sender_mobile_no, :shipment_sender_name, :shipment_sender_name, '', 1, :shipment_sender_address, 0)
		";

		$shipment_system->execute($sender_data);
		
		$shipment_sender_id = $shipment_system->get_insert_id();
		
		
		// insert receiver 
		$receiver_data = array(
			':shipment_receiver_name'		=>	$_POST["shipment_receiver_name"],
			':shipment_receiver_email'	=>	$_POST["shipment_receiver_email"],
			':shipment_receiver_mobile_no'	=>	$_POST["shipment_receiver_mobile_no"],
			':shipment_receiver_address'	=>	$shipment_system->clean_input($_POST["shipment_receiver_address"])
		);
		$shipment_system->query = "
		INSERT INTO tgs_customer ( cus_email, cus_phone, cus_lname, cus_fname, cus_initial, cus_type, cus_company, rg_code) 
		VALUES
		(:shipment_receiver_email, :shipment_receiver_mobile_no, :shipment_receiver_name, :shipment_receiver_name, '', 1, :shipment_receiver_address, 0)
		";

		$shipment_system->execute($receiver_data);
		
		$shipment_receiver_id = $shipment_system->get_insert_id();
		
		
		// insert shipment
		$data = array(
			':shipment_sender_id'			=>	$shipment_sender_id,
			':shipment_receiver_id'			=>	$shipment_receiver_id,
			':shipment_order_day'	=>	$shipment_system->get_datetime(),
			':shipment_pakage_priority'	=>	$_POST["shipment_pakage_priority"],
			':shipment_pakage_day_of_dispatch'	=>	$_POST["shipment_pakage_day_of_dispatch"],
			':shipment_pakage_day_of_arrival'	=>	$_POST["shipment_pakage_day_of_arrival"],
			':shipment_pakage_type'	=>	$_POST["shipment_pakage_type"],
			':shipment_pakage_weight'	=>	$_POST["shipment_pakage_weight"],
			':shipment_pakage_lenght'	=>	$_POST["shipment_pakage_lenght"],
			':shipment_pakage_width'	=>	$_POST["shipment_pakage_width"],
			':shipment_pakage_height' =>	$_POST["shipment_pakage_height"],
			':shipment_pakage_quantity' =>	$_POST["shipment_pakage_quantity"]
		);
		
		$shipment_system->query = "	
		INSERT INTO tgs_shipment 
		( CUS_ID_SENDER, CUS_ID_RECEIVER, SHIPMENT_DESCRIPTION, SHIPMENT_ESTIMATED_COST, SHIPMENT_ACTUAL_COST, SHIPMENT_SOURCE, SHIPMENT_DESTINATION, SHIPMENT_ORDER_DAY,SHIPMENT_CONFIRMATION_PRIORITY, SHIPMENT_STATUS, SHIPMENT_SIGNED_DATE, SHIPMENT_START_DATE, SHIPMENT_END_DATE, SHIPMENT_ACTUAL_START_DATE, SHIPMENT_ACTUAL_END_DATE, SHIPMENT_PACKAGE_TYPE, SHIPMENT_PACKAGE_WEIGHT, SHIPMENT_PACKAGE_LENGTH, SHIPMENT_PACKAGE_WIDTH, SHIPMENT_PACKAGE_HEIGHT, SHIPMENT_PACKAGE_QUANTITY) 
		
		VALUES (:shipment_sender_id, :shipment_receiver_id, 'DESCRIPTION', '50', '50', 'Australia', 'Viet Nam', :shipment_order_day, :shipment_pakage_priority, 'Pending',:shipment_order_day , :shipment_pakage_day_of_dispatch, :shipment_pakage_day_of_dispatch, :shipment_pakage_day_of_arrival, :shipment_pakage_day_of_arrival, :shipment_pakage_type, :shipment_pakage_weight, :shipment_pakage_lenght, :shipment_pakage_width, :shipment_pakage_height, :shipment_pakage_quantity)
		"; 
		
		$shipment_system->execute($data); 
		
		
		
		
		echo '<div class="alert alert-success">Shipment Added</div>';
	//}


}

?>