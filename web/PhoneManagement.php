<!DOCTYPE html>
<?php

	//PhoneManagement.php
	include_once('./include/debug.php');
	include('sms.php');

	$shipment_system = new sms();

	if(!$shipment_system->is_login())
	{
		header("location:".$shipment_system->base_url."");
	}

	include('admin_header.php');

	include('admin_sidebar.php');
	
	
	//--------------//
	
	// Include file
	include_once './include/debug.php';
	include_once './service/vendor/autoload.php';

	// Define variables and initialize with empty values
	$account_sid = $auth_token = $twilio_number = $AdminNumber = "";
	$username = $password = $confirm_password = "";
	$username_err = $password_err = $confirm_password_err = "";

	//session_start();

	//Checking if user logged in or not
	/* if (!isset($_SESSION['username'])) {
		 header('Location: Login.php');
	} */

	if (! function_exists('env')) {
	/**
	 * Gets the value of an environment variable.
	 *
	 * @param  string  $key
	 * @param  mixed   $default
	 * @return mixed
	 */
		function env($key, $default = null){
			$value = getenv($key);

			if ($value === false) {
				return value($default);
			}

			switch (strtolower($value)) {
				case 'true':
				case '(true)':
					return true;
				case 'false':
				case '(false)':
					return false;
				case 'empty':
				case '(empty)':
					return '';
				case 'null':
				case '(null)':
					return;
			}

			if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[$valueLength - 1] === '"') {
				return substr($value, 1, -1);
		}

		return $value;
		}
	}
	 
 // functions
function readEnv(){

    $root_dir = realpath(dirname(getcwd()));
    $ini_array = parse_ini_file($root_dir.'\web\.env', true, INI_SCANNER_RAW);

	putenv("TWILIO_ACCOUNT_SID={$ini_array['TWILIO_ACCOUNT_SID']}");
	putenv("TWILIO_AUTH_TOKEN={$ini_array['TWILIO_AUTH_TOKEN']}");
	putenv("TWILIO_PHONE_NUMBER={$ini_array['TWILIO_PHONE_NUMBER']}");
	putenv("TWILIO_ADMIN_PHONE_NUMBER={$ini_array['TWILIO_ADMIN_PHONE_NUMBER']}");
	

    return ;

}

function changeEnv($key,$value)
{
	$root_dir = realpath(dirname(getcwd()));
    $path = $root_dir.'\web\.env';

    if(is_bool(env($key)))
    {
        $old = env($key)? 'true' : 'false';
    }
    elseif(env($key)===null){
        $old = 'null';
    }
    else{
        $old = env($key);
    }

    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            "$key=".$old, "$key=".$value, file_get_contents($path)
        ));
    }
}

/*function sendMessage($Message)
{
	$account_sid = getenv("TWILIO_ACCOUNT_SID");
    $auth_token = getenv("TWILIO_AUTH_TOKEN");
    $twilio_number = getenv("TWILIO_PHONE_NUMBER");
    $AdminNumber = getenv("TWILIO_ADMIN_PHONE_NUMBER");
	console_log("account_sid :".$account_sid);
	console_log("auth_token : ".$auth_token);
	console_log("twilio_number : ".$twilio_number);
	console_log("AdminNumber : ".$AdminNumber);
	if(empty($account_sid) && empty($auth_token && empty($twilio_number) && empty($AdminNumber)
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
	$sql = "insert into orderlist (sender_name, sender_number) values ('".$_POST['sender_name']."','".$_POST['sender_number']."')";
	$result = mysqli_query($link, $sql);
}	*/

function getAdminInfo()
{
	global $conn, $account_sid, $auth_token, $twilio_number, $AdminNumber;
	//$sql = "SELECT * FROM  twilio_service where USER_ID = 1";
	//$result = mysqli_query($conn, $sql);

	//check error
	//if (!$result){
		//die('error'.mysqli_error($conn));
	//}
	
	$row = $shipment_system->get_phone_number();
	//mysqli_num_rows($result);
	//console_log("row_number :".$row_number);
	
	//if (mysqli_num_rows($result) > 0){
		//while ($row = mysqli_fetch_assoc($result)){
			$account_sid = $row['ACCOUNT_SID'];
			$auth_token = $row['AUTH_TOKEN'];
			$twilio_number = $row['PHONE_NUMBER'];
			$AdminNumber = $row['ADMIN_PHONE_NUMBER'];
		//}
	//}
	console_log("account_sid :".$account_sid);
	console_log("auth_token : ".$auth_token);
	console_log("twilio_number : ".$twilio_number);
	console_log("AdminNumber : ".$AdminNumber);
}	


function setAdminInfo()
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
	
	/*if(isset($_POST['abc'])){
                $update = $_POST['update'];
                    $sql1= "UPDATE `orderlist` SET `OrderTrack`= '0' WHERE OrderID = '$update'";
                    $result1 = mysqli_query($conn, $sql1);
                header("Location: PendingOrder.php");
            }*/
}

	// MAIN
	//readEnv();
	//getAdminInfo();
	console_log("account_sid :".$account_sid);
	console_log("auth_token : ".$auth_token);
	console_log("twilio_number : ".$twilio_number);
	console_log("AdminNumber : ".$AdminNumber);

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST111"){
		if(isset($_POST['submit'])){
			console_log("============ [INFO] $_POST : submit");
			$Message1 = 'TWILIO_ADMIN_PHONE_NUMBER'; 
			$Message2 = '+61481272472111111111';
			
			
			changeEnv($Message1,$Message2);
			// Validate password
			/*if(empty(trim($_POST["password"]))){
				$password_err = "Please enter a password.";     
			} elseif(strlen(trim($_POST["password"])) < 6){
				$password_err = "Password must have atleast 6 characters.";
			} else{
				$password = trim($_POST["password"]);
			}
			
			// Validate confirm password
			if(empty(trim($_POST["confirm_password"]))){
				$confirm_password_err = "Please confirm password.";     
			} else{
				$confirm_password = trim($_POST["confirm_password"]);
				if(empty($password_err) && ($password != $confirm_password)){
					$confirm_password_err = "Password did not match.";
				}
			}
			
			// Check input errors before inserting in database
			if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
				
		 
			}*/
		
		}
	}

	//if(isset($_POST['sender_number'])&& isset($_POST['sender_name']) && isset($_POST['day_of_dispatch']) && isset($_POST['level_of_urgency'])){
	//if($_SERVER["REQUEST_METHOD"] == "POST"){ 
		//$Message = 'Customer number: '.$_POST['sender_number'].';'.' Customer Name: '.$_POST['sender_name'] .';'.'Day of Dispatch : '.$_POST['day_of_dispatch'].';'.'Level of urgency : '.$_POST['level_of_urgency'] ;
		
		//sendMessage($Message);

	//}
	
	//------ END ----------//
?>
<html>
    <head>
		<title>Phone Management</title>
		<!--<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		
		<link rel="stylesheet" href="./css/vendor.css">
		<link rel="stylesheet" href="./css/main.css">
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/font-awesome.css">

		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->
		<!-- CSS Files -->
		<!--<link href="./css/bootstrap.min.css" rel="stylesheet" />
		<link href="./css/paper-dashboard.css" rel="stylesheet" />-->
	</head>
    <body>
	
	<!--NAVIGATION-->
	<!--<div class="header-main bg-white">
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
    							<a class="nav-link text-uppercase" data-toggle="none" href="AboutUs.php">ABOUT US</a>
    						</li>
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="ContactUs.php">CONTACT US</a>
    						</li>
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="Ournetworks.php">OUR NETWORKS</a>
    						</li>
    						<li class="nav-item"><a class="nav-link text-uppercase" data-toggle="none" href="Order.php">ORDER</a>
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
	</div>-->
	
	<!--  side bar -->
    <?
		//php include('./include/sidebar.php'); 
	?>
    <!-- end of side bar -->
	
	<!--CONTAINER-->
	<div class="col-sm-10 offset-sm-2 py-4">
	<div class="card">
		<div class="card-header">
        <h2>Phone Management</h2>
        <p>Please fill this form to change phone number.</p>
		</div>
		<div class="card-body">
        <form action="" method="post" id="phone_management_form">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>ACCOUNT SID</label>
                <input type="text" name="account_sid" id="account_sid"  class="form-control" value="<?php echo $account_sid; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>AUTH TOKEN</label>
                <input type="text"  name="auth_token" id="auth_token" class="form-control" value="<?php echo $auth_token; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>TRIAL NUMBER</label>
                <input type="text" name="trail_number" id="trail_number" class="form-control" value="<?php echo $twilio_number; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
			<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>PHONE NUMBER</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo $AdminNumber; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
				<input type="hidden" name="action" value="change_phone_number" />
                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
	
        </form>
		</div>
		<div class="card-header">
            <p>Already have an phone number? <a class="btn btn-success" href="https://www.twilio.com/">Register</a></p>
			<p>NOTE : You need to register and add here</p>
		
		</div>
    </div>    
		
	</div>
	</div>


	<!--FOOTER-->
	<!--<div class="row1">
		<div class="columnpic">
			<img src="./image/logo1.png">	
		</div>
		<div class="column">
			<p>TGS 2017 Copyright (c) </br> TRITON GLOBAL SHIPPING (PVT) LTD </br> Office: Level 36, The Riparian Plaza 71 Eagle Street BRISBANE, QLD. 4000 AUSTRALIA</br> </p>
		</div>
		<div class="column">
			<p>TELEPHONE Sri Lanka- +94 11 252 1394 </br> TELEPHONE Australia - +61 41 725 4352 </br> EMAIL- info@tritonglobalshipping.com.au </br> WEB-www.tritonglobalshipping.com.au</p>
		</div>
	</div>-->
	
    </body>
</html>

<script>
$(document).ready(function(){

	load_data();

	//#1
	function load_data()
	{
		console.log("-----load_data");
		$('#phone_management_form').parsley().reset();
		$.ajax({
	      	url:"user_action.php",
	      	method:"POST",
	      	data:{action:'fetch_phone'},
	      	dataType:'JSON',
	      	success:function(data)
	      	{
				console.log(data);
	        	$('#account_sid').val(data.ACCOUNT_SID);
	        	$('#auth_token').val(data.AUTH_TOKEN);
	        	$('#trail_number').val(data.PHONE_NUMBER);
	        	$('#phone_number').val(data.ADMIN_PHONE_NUMBER);
	      	},
			error:function(data)
	      	{
				console.log("ERROR : load error");
	        	console.log(data);

	      	}
	    })
		console.log("-----load_data--done");
	}

	$('#phone_management_form').parsley();

	$('#phone_management_form').on('submit', function(){
		event.preventDefault();
		if($('#phone_management_form').parsley().isValid())
		{
			$.ajax({
				url:"user_action.php",
				method:"POST",
				data:new FormData(this),
				contentType:false,
				processData:false,
				dataType:"JSON",
				beforeSend:function()
				{
					$('#submit_button').attr('disabled', 'disabled');
					$('#submit_button').html('wait...');
				},
				success:function(data)
				{
					$('#submit_button').attr('disabled', false);
					$('#submit_button').html('<i class="fas fa-lock"></i> Change');
					if(data.error != '')
					{
						$('#message').html(data.error);
					}
					else
					{
						$('#phone_management_form')[0].reset();
						$('#message').html(data.success);
						setTimeout(function(){
							$('#message').html('');
						}, 5000);
					}
				},
				error:function(data)
				{
					console.log("ERROR : ");
					console.log(data);

				}
			})
		}
	});

});

</script>

