<?php

//sms.php
//shipment management system

include_once('./include/debug.php');
include_once './service/vendor/autoload.php';
class sms
{
	public $base_url = 'http://localhost/Triton-Global-Shipping/web/';
	public $connect;
	public $query;
	public $statement;

	function sms()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=visitor_managment_system", "root", "");
		session_start();
	}

	function execute($data = null)
	{
		$this->statement = $this->connect->prepare($this->query);
		if($data)
		{
			$this->statement->execute($data);
		}
		else
		{
			$this->statement->execute();
		}		
	}

	function row_count()
	{
		return $this->statement->rowCount();
	}

	function statement_result()
	{
		return $this->statement->fetchAll();
	}

	function get_result()
	{
		return $this->connect->query($this->query, PDO::FETCH_ASSOC);
	}
	
	function get_insert_id()
	{
		return $this->connect->lastInsertId();
	}

	function is_login()
	{
		if(isset($_SESSION['admin_id']))
		{
			return true;
		}
		return false;
	}

	function is_master_user()
	{
		if(isset($_SESSION['admin_type']))
		{
			if($_SESSION["admin_type"] == 'Master')
			{
				return true;
			}
			return false;
		}
		return false;
	}

	function clean_input($string)
	{
	  	$string = trim($string);
	  	$string = stripslashes($string);
	  	$string = htmlspecialchars($string);
	  	return $string;
	}

	function get_datetime()
	{
		return date("Y-m-d H:i:s",  STRTOTIME(date('h:i:sa')));
	}

	function get_phone_number()
	{
		$this->query = "
		SELECT * FROM  twilio_service where USER_ID = 1
		";
		$result = $this->get_result();
		return $result;
	}
	
	function send_message($message)
	{
		// get admin info
		$phone_info = $shipment_system->get_phone_number();
		$account_sid = $phone_info['ACCOUNT_SID'];
		$auth_token = $phone_info['AUTH_TOKEN'];
		$twilio_number = $phone_info['PHONE_NUMBER'];
		$AdminNumber = $phone_info['ADMIN_PHONE_NUMBER'];
		
		if(empty($account_sid) && empty($auth_token) && empty($twilio_number) && empty($AdminNumber))
		{
			$client = new Twilio\Rest\Client($account_sid, $auth_token);
			$client->messages->create(
							$AdminNumber, 
								array(
									  'from' => $twilio_number,
									  'body' => $Message
									 )
							);
		}else{
			console_log("ERROR : Can not send the messages");
		}	
		
		
	}
	
	function load_department()
	{
		$this->query = "
		SELECT * FROM department_table 
		ORDER BY department_name ASC
		";
		$result = $this->get_result();
		$output = '';
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["department_name"].'" data-person="'.$row["department_contact_person"].'">'.$row["department_name"].'</option>';
		}
		return $output;
	}

	function Get_profile_image()
	{
		$this->query = "
		SELECT admin_profile FROM admin_table 
		WHERE admin_id = '".$_SESSION["admin_id"]."'
		";

		$result = $this->get_result();

		foreach($result as $row)
		{
			return $row['admin_profile'];
		}
	}

	function Get_total_today_shipment()
	{
		$this->query = "
		SELECT * FROM tgs_shipment 
		WHERE DATE(SHIPMENT_ORDER_DAY) = DATE(NOW())
		";

		

		$this->execute();
		return $this->row_count();
	}

	function Get_total_yesterday_shipment()
	{
		$this->query = "
		SELECT * FROM tgs_shipment 
		WHERE DATE(SHIPMENT_ORDER_DAY) = DATE(NOW()) - INTERVAL 1 DAY
		";
		
		$this->execute();
		return $this->row_count();
	}

	function Get_last_seven_day_total_shipment()
	{
		$this->query = "
		SELECT * FROM tgs_shipment 
		WHERE DATE(SHIPMENT_ORDER_DAY) >= DATE(NOW()) - INTERVAL 7 DAY
		";
		
		$this->execute();
		return $this->row_count();
	}

	function Get_total_shipment()
	{
		$this->query = "
		SELECT * FROM tgs_shipment 
		";
		
		$this->execute();
		return $this->row_count();
	}

}


?>