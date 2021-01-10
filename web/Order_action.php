<?php

//visitor_action.php
include_once('./include/debug.php');
include_once('sms.php');

$shipment_system = new sms();

if(isset($_POST["action"]))
{
	//#1
	if($_POST["action"] == 'Add')
	{
		
		$message = 'Customer number: '.$_POST['sender_number'].';'.' Customer Name: '.$_POST['sender_name'] .';'.'Day of Dispatch : '.$_POST['day_of_dispatch'].';'.'Level of urgency : '.$_POST['level_of_urgency'] ;
		$shipment_system->send_message($message);
		
		//console_log("action : Add");
		 $data = array(
			':shipment_sender_name'			=>	$shipment_system->clean_input($_POST["shipment_sender_name"]),
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
		
		VALUES ('1', '2', 'DESCRIPTION', '50', '50', 'Australia', 'Viet Nam', :shipment_order_day, :shipment_pakage_priority, 'Pending',:shipment_order_day , :shipment_pakage_day_of_dispatch, :shipment_pakage_day_of_dispatch, :shipment_pakage_day_of_arrival, :shipment_pakage_day_of_arrival, :shipment_pakage_type, :shipment_pakage_weight, :shipment_pakage_lenght, :shipment_pakage_width, :shipment_pakage_height, :shipment_pakage_quantity)
		";
		
		
		
		/* $shipment_system->query = "	
		INSERT INTO tgs_shipment 
		( CUS_ID_SENDER, CUS_ID_RECEIVER, SHIPMENT_DESCRIPTION, SHIPMENT_ESTIMATED_COST, SHIPMENT_ACTUAL_COST, SHIPMENT_SOURCE, SHIPMENT_DESTINATION, SHIPMENT_ORDER_DAY,SHIPMENT_CONFIRMATION_PRIORITY, SHIPMENT_STATUS, SHIPMENT_SIGNED_DATE, SHIPMENT_START_DATE, SHIPMENT_END_DATE, SHIPMENT_ACTUAL_START_DATE, SHIPMENT_ACTUAL_END_DATE, SHIPMENT_PACKAGE_TYPE, SHIPMENT_PACKAGE_WEIGHT, SHIPMENT_PACKAGE_LENGTH, SHIPMENT_PACKAGE_WIDTH, SHIPMENT_PACKAGE_HEIGHT, SHIPMENT_PACKAGE_QUANTITY) 
		
		VALUES ( '1', '2', 'DESCRIPTION', '50', '50', 'Australia', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 2, '0', '0', '0', 0)
		"; */

		$shipment_system->execute();

		echo '<div class="alert alert-success">Shipment Added</div>';
	}


}

?>