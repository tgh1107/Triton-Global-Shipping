<!DOCTYPE html>
<?php


	//PendingOrder.php
	include_once('./include/debug.php');
	include_once('sms.php');

	$shipment_system = new sms();

	/*if(!$shipment_system->is_login())
	{
		header("location:".$shipment_system->base_url."");
	}*/

	include('admin_header.php');

	//include('admin_sidebar.php');
	
	
// Include file
include_once './include/debug.php';
//require_once './include/EnvFile.php';
require_once './service/config.php';
require_once './service/database_connection.php';
include_once './service/vendor/autoload.php';

// Define variables and initialize with empty values
$account_sid = $auth_token = $twilio_number = $AdminNumber = "";

// functions
function readEnv(){
    $root_dir = realpath(dirname(getcwd()));
	//echo nl2br (" ========== \n".$root_dir."\r\n");
	//echo " ========== ".getcwd()."\n";
    $ini_array = parse_ini_file($root_dir.'\web\.env', true, INI_SCANNER_RAW);
	console_log("root_dir :".$root_dir);
    //$env_str[0] = $ini_array['DB_DATABASE'];
	//echo " ========== ".$ini_array['DB_DATABASE']."\n";
	//putenv("DB_DATABASE=$env_str[0]");
	//putenv("DB_DATABASE={$ini_array['DB_DATABASE']}");
	putenv("TWILIO_ACCOUNT_SID={$ini_array['TWILIO_ACCOUNT_SID']}");
	putenv("TWILIO_AUTH_TOKEN={$ini_array['TWILIO_AUTH_TOKEN']}");
	putenv("TWILIO_PHONE_NUMBER={$ini_array['TWILIO_PHONE_NUMBER']}");
	putenv("TWILIO_ADMIN_PHONE_NUMBER={$ini_array['TWILIO_ADMIN_PHONE_NUMBER']}");
	
    //$env_str[1] = $ini_array['DB_USERNAME'];
    //$env_str[2] = $ini_array['DB_PASSWORD'];
	/*$ef = new EnvFile($root_dir.'\web\.env'); 
	$ef->addOrChangeKey('DB_DATABASE', 'ROSEY');
	$ef->save();*/
    return ;

}

function getAdminInfo()
{
	global $conn, $account_sid, $auth_token, $twilio_number, $AdminNumber;
	$sql = "SELECT * FROM  twilio_service where USER_ID = 1";
	$result = mysqli_query($conn, $sql);

	//check error
	if (!$result){
		die('error'.mysqli_error($conn));
	}
	
	$row_number = mysqli_num_rows($result);
	console_log("row_number :".$row_number);
	
	if (mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)){
			$account_sid = $row['ACCOUNT_SID'];
			$auth_token = $row['AUTH_TOKEN'];
			$twilio_number = $row['PHONE_NUMBER'];
			$AdminNumber = $row['ADMIN_PHONE_NUMBER'];
		}
	}
	console_log("account_sid :".$account_sid);
	console_log("auth_token : ".$auth_token);
	console_log("twilio_number : ".$twilio_number);
	console_log("AdminNumber : ".$AdminNumber);
}	


function sendMessage($Message)
{
	global $account_sid, $auth_token, $twilio_number, $AdminNumber;
	/*$account_sid = getenv("TWILIO_ACCOUNT_SID");
    $auth_token = getenv("TWILIO_AUTH_TOKEN");
    $twilio_number = getenv("TWILIO_PHONE_NUMBER");
    $AdminNumber = getenv("TWILIO_ADMIN_PHONE_NUMBER");*/
	console_log("account_sid :".$account_sid);
	console_log("auth_token : ".$auth_token);
	console_log("twilio_number : ".$twilio_number);
	console_log("AdminNumber : ".$AdminNumber);
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

function saveData()
{
	//Insert record into DB
	/*$sql = "insert into orderlist (sender_name, sender_number) values ('".$_POST['sender_name']."','".$_POST['sender_number']."')";
	$result = mysqli_query($link, $sql);*/
}	

	// main process
	//readEnv();
	getAdminInfo();
	console_log("account_sid :".$account_sid);
	console_log("auth_token : ".$auth_token);
	console_log("twilio_number : ".$twilio_number);
	console_log("AdminNumber : ".$AdminNumber);
	
	// handle post
	//if(isset($_POST['sender_number'])&& isset($_POST['sender_name']) && isset($_POST['day_of_dispatch']) && isset($_POST['level_of_urgency'])){
	if($_SERVER["REQUEST_METHOD"] == "POST"){ 
		$Message = 'Customer number: '.$_POST['sender_number'].';'.' Customer Name: '.$_POST['sender_name'] .';'.'Day of Dispatch : '.$_POST['day_of_dispatch'].';'.'Level of urgency : '.$_POST['level_of_urgency'] ;
		
		sendMessage($Message);

	}
	
	//------ END ----------//
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<title>REQUEST AN ORDER </title>
	<link rel="stylesheet" href="./css/vendor.css">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/font-awesome.css">
   
    
</head>
<body>
	<!--NAVIGATION-->
	<div class="header-main bg-white">
    	<div class="container">
    		<div class="row">
    			<nav class="navbar navbar-expand-lg navbar-light w-100" id="header-navbar">
					<img src="./image/logo.png">
    				<a class="navbar-brand font-weight-bold">TRITON GLOBAL </br> &nbsp; &nbsp; SHIPPING</a> 
    				<div class="collapse navbar-collapse" id="navbarSupportedContent">
    					<ul class="navbar-nav ml-auto">
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="index.php">HOME</a></li>
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="">ABOUT US</a>
    						</li>
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="ContactUs.php">CONTACT US</a>
    						</li>
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="Ournetworks.php">OUR NETWORKS</a>
    						</li>
    						<li class="nav-item"><a class="nav-link text-uppercase" data-toggle="none" href="">ORDER</a>
    						</li>
    						<li class="nav-item"><a class="nav-link text-uppercase" data-toggle="none" href="Login.php">LOGIN</a>
    						</li>
    					</ul>
    				</div>
    			</nav>
    		</div>
    	</div>
    </div>
    </section>
    <div class="header-spacing-helper" style="height: 90px;">
	</div>
	
	<!--BODY-->
	
	<div class="network">
		<h1> REQUEST AN ORDER</h1>
	</div>
	<h2 style="margin-top: 30px; text-align: center;">READY TO SHIP YOUR PACKAGE? </h2>
	<div class="order_form">
		<p> Fields marked * are required</p>
		<form action = "" method="post" id="shipment_form">
			<div>
			<div class="cus_info">
				<h4> SENDER DETAILS</h4>
				<label> Name*</label><br>
				<input type="text" name="sender_name"><br>
				<label> Email*</label><br>
				<input type="text" name=""><br>
				<label> Contact number*</label><br>
				<input type="text" name="sender_number"><br>
				<label> Address*</label><br>
				<input type="text" name="">
			</div>
			
			<div class="cus_info">
				<h4> RECEIVER DETAILS</h4>
				<label> Name*</label><br>
				<input type="text" name=""><br>
				<label> Email</label><br>
				<input type="text" name=""><br>
				<label> Contact number*</label><br>
				<input type="text" name=""><br>
				<label> Address*</label><br>
				<input type="text" name="">
			</div>
		</div>
			<div style="margin-left: 8px"><h4> PACKAGE DETAILS *</h4></div>
			<div class="package_info">	
				
				<label> Package type</label> <br>
				<label for="">Hazardous item ?</label>
				<select name="" id="">
  					<option value="">Hazardous</option>
  					<option value="">Non-hazardous</option>	
				</select> <br>
				<label for="">Package type</label>
				<select name="" id="">
  					<option value="">Solid</option>
					<option value="">Liquid</option>	
					<option value="">Gas</option>
				</select> <br>
				<label for="">Food ?</label>
				<select name="" id="">
  					<option value="">Yes</option>
					<option value="">No</option>	
				</select> <br>
				<label class="form_title"> Weight(kg)</label><br>
				<input type="text" name=""><br>
				<label class="form_title"> Length(cm)</label><br>
				<input type="text" name="">
			
			</div>
			<div class="package_info">
				<label> Width(cm)</label> <br>
				<input type="text" name=""> <br>
				<label class="form_title"> Height(cm)</label> <br>
				<input type="text" name=""><br>
				<label class="form_title"> Quantity</label> <br>
				<input type="text" name="">
			
			</div>
			<div class="package_info"> 
				<label> Day of dispatch</label> <br>
				<input type="date" name="day_of_dispatch"> <br>
				<label class="form_title"> Day of arrival</label> <br>
				<input type="date" name=""> <br>
				<label class="form_title"> Level of urgency</label> <br>
				<select name='level_of_urgency'>
					<option value="level1"> In 1 week</option>
					<option value="level2"> In 2 weeks</option>
					<option value="level3"> In 1 month</option>
				</select>
			
				
			
			</div>
			<div class="order_button">
				<!--<button> ADD ANOTHER ITEM</button>
				<button> ORDER</button>-->
				<input type="submit" value="ORDER">
			</div>
		</form>

	</div>
	


	

	<!--FOOTER-->
	<div class="row1">
		<div class="columnpic">
			<img src="./image/logo1.png">	
		</div>
		<div class="column">
			<p>TGS 2017 Copyright (c) </br> TRITON GLOBAL SHIPPING (PVT) LTD </br> Office: Level 36, The Riparian Plaza 71 Eagle Street BRISBANE, QLD. 4000 AUSTRALIA</br> </p>
		</div>
		<div class="column">
			<p>TELEPHONE Sri Lanka- +94 11 252 1394 </br> TELEPHONE Australia - +61 41 725 4352 </br> EMAIL- info@tritonglobalshipping.com.au </br> WEB-www.tritonglobalshipping.com.au</p>
		</div>
	</div>
	<script type='text/javascript' src='https://www.google.com/recaptcha/api.js?render=6LeSCLMZAAAAAKVvuKlLIW4VcnyHi_yYvp3Ar1Qh&#038;ver=3.0'></script>
	<script type='text/javascript'>
	/* <![CDATA[ */
	var wpcf7_recaptcha = {"sitekey":"6LeSCLMZAAAAAKVvuKlLIW4VcnyHi_yYvp3Ar1Qh","actions":{"homepage":"homepage","contactform":"contactform"}};
	/* ]]> */
	</script>
</body>
</html>

<script>
$(document).ready(function(){
	
	//#
	$('#shipment_form').on('submit', function(event){
		console.log("-----shipment_form -- submit");
		event.preventDefault();
		if($('#shipment_form').parsley().isValid())
		{		
			$.ajax({
				url:"Order_action.php",
				method:"POST",
				data:$(this).serialize(),
				beforeSend:function()
				{
					$('#submit_button').attr('disabled', 'disabled');
					$('#submit_button').val('wait...');
				},
				success:function(data)
				{
					$('#submit_button').attr('disabled', false);
					//$('#shipmemtModal').modal('hide');
					//$('#message').html(data);
					//$('#shipment_table').DataTable().destroy();
					//load_shipment_data();
					//setTimeout(function(){
						//$('#message').html('');
					//}, 5000);
				},
				error:function(data)
				{
					console.log("ERROR : load error");
					console.log(data);

				}
			})
		}
	});

});

</script>
	
