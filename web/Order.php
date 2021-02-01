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
//require_once './service/config.php';
//require_once './service/database_connection.php';
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
	/* getAdminInfo();
	console_log("account_sid :".$account_sid);
	console_log("auth_token : ".$auth_token);
	console_log("twilio_number : ".$twilio_number);
	console_log("AdminNumber : ".$AdminNumber); */
	
	// handle post
	//if(isset($_POST['sender_number'])&& isset($_POST['sender_name']) && isset($_POST['day_of_dispatch']) && isset($_POST['level_of_urgency'])){
	/* if($_SERVER["REQUEST_METHOD"] == "POST"){ 
		$Message = 'Customer number: '.$_POST['sender_number'].';'.' Customer Name: '.$_POST['sender_name'] .';'.'Day of Dispatch : '.$_POST['day_of_dispatch'].';'.'Level of urgency : '.$_POST['level_of_urgency'] ;
		
		sendMessage($Message);

	} */
	
	//------ END ----------//
?>
<html >
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<title>REQUEST AN ORDER </title>
	<link rel="stylesheet" href="./css/vendor.css">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/font-awesome.css">
   	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet"> 
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJYjmTFKo21igdDqgNXOb171mXQzn3hnk&sensor=false&libraries=visualization"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
			
	<style>
	/* Paste this css to your style sheet file or under head tag */
	/* This only works with JavaScript, 
	if it's not present, don't show loader */
	.no-js #loader { display: none;  }
	.js #loader { display: block; position: absolute; left: 100px; top: 0; }
	.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(./images/Preloader_2.gif) center no-repeat #fff;
	}
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<script>
		//paste this code under head tag or in a seperate js file.
		// Wait for window load
		$(window).load(function() {
			// Animate loader off screen
			$(".se-pre-con").fadeOut("slow");;
		});
	</script>
    <script>
	$(document).ready(function(){
		var date = new Date();
			
		$('.input-daterange').datepicker({
			todayBtn: "linked",
			format: "yyyy-mm-dd",
			autoclose: true
		});
			
	});
	</script>
	<script src="./js/vendor.js.download"></script>
	<?php
		include_once('loading.php');
	?>
</head>
<body>
	<!--NAVIGATION-->
	  <div id="page-start-anchor"></div>
    	<section class="header">
    		
			<!--NAVIGATION-->
    <div class="header-main bg-white">
    	<div class="container">
    		<div class="row">
    			<nav class="navbar navbar-expand-lg navbar-light w-100" id="header-navbar">
					<img src="images/logo.png">
					<a class="navbar-brand font-weight-bold">TRITON GLOBAL </br> &nbsp; &nbsp; SHIPPING</a> 
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			        <span class="navbar-toggler-icon"></span>
		            </button>
    				<div class="collapse navbar-collapse" id="navbarResponsive">
    					<ul class="navbar-nav ml-auto">
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="index.php">HOME</a></li>
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="AboutUs.php">ABOUT US</a>
							</li>
							<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="FAQ.php">FAQs</a>
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
	</div>
	
	<!--BODY-->
	
	<div class="network" style="background-image: url(./images/contactus.jpg);">
		<h1> REQUEST AN ORDER</h1>
	</div>
	<h2 style="margin-top: 30px; text-align: center;">READY TO SHIP YOUR PACKAGE? </h2>
	
	
	<!--<div class="order_form">
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
				<button> ORDER</button>--
				<input type="submit" value="ORDER">
			</div>
		</form>

	</div>
	-->

<div id="shipmemtModal" class="">
  	<div class="">

    	<form method="post" id="shipment_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">Add Shipment</h4>
        		</div>
        		<div class="modal-body">
					<div class="card-header">Sender</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right">Sender Name</label>
			            	<div class="col-md-8">
			            		<input type="text" name="shipment_sender_name" id="shipment_sender_name" class="form-control" required data-parsley-pattern="/^[a-zA-Z\s]+$/" data-parsley-maxlength="150" data-parsley-trigger="keyup" />
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right">Sender Email</label>
			            	<div class="col-md-8">
			            		<input type="text" name="shipment_sender_email" id="shipment_sender_email" class="form-control" required data-parsley-type="email" data-parsley-maxlength="150" data-parsley-trigger="keyup" />
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right">Sender Mobile No.</label>
			            	<div class="col-md-8">
			            		<input type="text" name="shipment_sender_mobile_no" id="shipment_sender_mobile_no" class="form-control" required data-parsley-type="integer" data-parsley-minlength="10" data-parsley-maxlength="12" data-parsley-trigger="keyup" />
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right">Sender Address</label>
			            	<div class="col-md-8">
			            		<textarea name="shipment_sender_address" id="shipment_sender_address" class="form-control" required data-parsley-maxlength="400" data-parsley-trigger="keyup"></textarea>
			            	</div>
			            </div>
		          	</div>
					
					<div class="card-header">Receiver</div>
					<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right">Receiver Name</label>
			            	<div class="col-md-8">
			            		<input type="text" name="shipment_receiver_name" id="shipment_receiver_name" class="form-control" required data-parsley-pattern="/^[a-zA-Z\s]+$/" data-parsley-maxlength="150" data-parsley-trigger="keyup" />
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right">Receiver Email</label>
			            	<div class="col-md-8">
			            		<input type="text" name="shipment_receiver_email" id="shipment_receiver_email" class="form-control" required data-parsley-type="email" data-parsley-maxlength="150" data-parsley-trigger="keyup" />
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right">Receiver Mobile No.</label>
			            	<div class="col-md-8">
			            		<input type="text" name="shipment_receiver_mobile_no" id="shipment_receiver_mobile_no" class="form-control" required data-parsley-type="integer" data-parsley-minlength="10" data-parsley-maxlength="12" data-parsley-trigger="keyup" />
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right">Receiver Address</label>
			            	<div class="col-md-8">
			            		<textarea name="shipment_receiver_address" id="shipment_receiver_address" class="form-control" required data-parsley-maxlength="400" data-parsley-trigger="keyup"></textarea>
			            	</div>
			            </div>
		          	</div>
					
					<div class="card-header">Shipment Details</div>
					<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Package Type</b></label>
			            	<div class="col-md-8">			            		
								<select name="shipment_pakage_type" id="shipment_pakage_type" class="form-control" required data-parsley-trigger="keyup">
			            			<option value="">Hazardous item ?</option>
									<option value="Hazardous">Hazardous</option>
									<option value="Non-hazardous">Non-hazardous</option>
			            		</select>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Package Type</b></label>
			            	<div class="col-md-8">
								<select name="shipment_pakage_type_2" id="shipment_pakage_type_2" class="form-control" required data-parsley-trigger="keyup">
			            			<option value="Solid">Solid</option>
									<option value="Liquid">Liquid</option>	
									<option value="Gas">Gas</option>
			            		</select>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Package Type</b></label>
			            	<div class="col-md-8">
								<select name="shipment_pakage_type_3" id="shipment_pakage_type_3" class="form-control" required data-parsley-trigger="keyup">
			            			<option value="">Food ?</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>	
			            		</select>
			            	</div>
			            </div>
		          	</div>
					<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Weight (kg)</b></label>
			            	<div class="col-md-8">
								<input type="text" name="shipment_pakage_weight" id="shipment_pakage_weight" class="form-control" required data-parsley-type="integer" data-parsley-minlength="1" data-parsley-maxlength="10" data-parsley-trigger="keyup" />
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Lenght (cm)</b></label>
			            	<div class="col-md-8">
								<input type="text" name="shipment_pakage_lenght" id="shipment_pakage_lenght" class="form-control" required data-parsley-type="integer" data-parsley-minlength="1" data-parsley-maxlength="10" data-parsley-trigger="keyup" />
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Width (cm)</b></label>
			            	<div class="col-md-8">
								<input type="text" name="shipment_pakage_width" id="shipment_pakage_width" class="form-control" required data-parsley-type="integer" data-parsley-minlength="1" data-parsley-maxlength="10" data-parsley-trigger="keyup" />
			            	</div>
			            </div>
		          	</div>
					<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Height(cm)</b></label>
			            	<div class="col-md-8">
								<input type="text" name="shipment_pakage_height" id="shipment_pakage_height" class="form-control" required data-parsley-type="integer" data-parsley-minlength="1" data-parsley-maxlength="10" data-parsley-trigger="keyup" />
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Quantity</b></label>
			            	<div class="col-md-8">
								<input type="text" name="shipment_pakage_quantity" id="shipment_pakage_quantity" class="form-control" required data-parsley-type="integer" data-parsley-minlength="1" data-parsley-maxlength="10" data-parsley-trigger="keyup" />
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Day of dispatch</b></label>        		
							<div class="col-md-8 input-daterange">
								<input type="text" name="shipment_pakage_day_of_dispatch" id="shipment_pakage_day_of_dispatch" class="form-control form-control-sm" placeholder="Day of dispatch" readonly />
							</div>
			      
			            </div>
		          	</div>
					<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Day of arrival</b></label>
			            	<div class="col-md-8 input-daterange">
								<input type="text" name="shipment_pakage_day_of_arrival" id="shipment_pakage_day_of_arrival" class="form-control form-control-sm" placeholder="Day of arrival" readonly />
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Priority</b></label>
			            	<div class="col-md-8">
								<select name="shipment_pakage_priority" id="shipment_pakage_priority" class="form-control" required data-parsley-trigger="keyup">
			            			<option value="">Priority</option>
									<option value="1"> In 1 week</option>
									<option value="2"> In 2 weeks</option>
									<option value="3"> In 1 month</option>
			            		</select>
			            	</div>
			            </div>
		          	</div>
					

				
					
        		</div>
        		<div class="modal-footer">
          			<input type="hidden" name="hidden_id" id="hidden_id" />
          			<input type="hidden" name="action" id="action" value="Add" />
          			<input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />

        		</div>
      		</div>
    	</form>
		
	  	</div>
</div>	

	<!--FOOTER-->
	<div class="container-fluid padding">	
	<div class="row text-center">
		<div class="col-md-4">
			<img src="./images/logo1.png">
		</div>
		<div class="col-md-4">				
			<hr class="light">
			<h5>ADDRESS</h5>
			<hr class="light">
			<p>Level 36, The Riparian Plaza</p>
			<p>71 Eagle Street </p>
			<p>BRISBANE, QLD, 4000 AUSTRALIA</p>
		</div>
		<div class="col-md-4">				
			<hr class="light">
			<h5>CONTACT</h5>
			<hr class="light">
			<p>Email: info@tritonglobalshipping.com.au</p>
			<p>Website: wwww.tritonglobalshipping.com.au</p>
			<p>Sri Lanka: +94 11 252 1394</p>
			<p>Australia: +61 41725 4352</p>
			
		</div>
		<div class="col-12">
			<hr class="light-100">
			<h5>&copy; Group 14 - ICT</h5>
		</div>
	</div>
</div>

	<!-- <div class="se-pre-con"></div>
	Ends -->
	
	
					
				
	<!--<script type="text/javascript" async="" src="./js/analytics.js.download"></script>
	<script async="" src="./js"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-176058743-1');</script>-->
	<!--<script src="./js/vendor.js.download"></script>
	<script src="./js/polyfills.js.download"></script>
	<script src="./js/app.js.download"></script>-->
	
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/5fec1448df060f156a9200fb/1eqp2ufgh';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->
</body>
</html>

<script>
$(document).ready(function(){
	
	$('#shipment_form').parsley();
	//#
	$('#shipment_form').on('submit', function(event){
		console.log("-----shipment_form -- submit --");
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
					console.log("add success ");
					console.log(data);
					$('#submit_button').attr('disabled', false);
					$('#submit_button').val('Add');
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
	
