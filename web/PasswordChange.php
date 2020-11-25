<?php
	//OrderManagement.php
	include_once('./include/debug.php');
	include('sms.php');

	$shipment_system = new sms();

	/*if(!$shipment_system->is_login())
	{
		header("location:".$shipment_system->base_url."");
	}*/

	include('admin_header.php');

	include('admin_sidebar.php');
	
	
	//--------------//
	// Initialize the session
	//session_start();
	 
	// Check if the user is logged in, otherwise redirect to login page
	/*if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: login.php");
		exit;
	}*/
	 
	// Include config file
	//require_once "./service/config.php";
	 
	// Define variables and initialize with empty values
	$new_password = $confirm_password = "";
	$new_password_err = $confirm_password_err = "";
	 
	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
		console_log("REQUEST_METHOD : POST");
		// Validate new password
		if(empty(trim($_POST["new_password"]))){
			$new_password_err = "Please enter the new password.";     
		} elseif(strlen(trim($_POST["new_password"])) < 6){
			$new_password_err = "Password must have atleast 6 characters.";
		} else{
			$new_password = trim($_POST["new_password"]);
		}
		
		// Validate confirm password
		if(empty(trim($_POST["confirm_password"]))){
			$confirm_password_err = "Please confirm the password.";
		} else{
			$confirm_password = trim($_POST["confirm_password"]);
			if(empty($new_password_err) && ($new_password != $confirm_password)){
				$confirm_password_err = "Password did not match.";
			}
		}
			
		// Check input errors before updating the database
		if(empty($new_password_err) && empty($confirm_password_err)){
			// Prepare an update statement
			$sql = "UPDATE users SET password = ? WHERE id = ?";
			
			if($stmt = mysqli_prepare($link, $sql)){
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
				
				// Set parameters
				$param_password = password_hash($new_password, PASSWORD_DEFAULT);
				$param_id = $_SESSION["id"];
				
				// Attempt to execute the prepared statement
				if(mysqli_stmt_execute($stmt)){
					// Password updated successfully. Destroy the session, and redirect to login page
					session_destroy();
					header("location: login.php");
					exit();
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}

				// Close statement
				mysqli_stmt_close($stmt);
			}
		}
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
    <meta charset="UTF-8">
    
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
	<link rel="stylesheet" href="./css/vendor.css">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/font-awesome.css">

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->
	<!-- CSS Files -->
	<!--<link href="./css/bootstrap.min.css" rel="stylesheet" />
	<link href="./css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />-->
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
    <?php 
		//include('./include/sidebar.php'); 
	?>
    <!-- end of side bar -->
	
	
	<!--CONTAINER-->
	<div class="col-sm-10 offset-sm-2 py-4">
		<span id="message"></span>
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col">
						<h2>Change Password</h2>
					</div>
					<div class="col text-right">
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="col-md-3">&nbsp;</div>
				<div class="col-md-6">
					<form method="post" id="user_form">
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 text-right">Current Password <span class="text-danger">*</span></label>
								<div class="col-md-8">
									<input type="password" name="current_password" id="current_password" class="form-control"  required data-parsley-minlength="6" data-parsley-maxlength="16" data-parsley-trigger="keyup" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 text-right">New Password <span class="text-danger">*</span></label>
								<div class="col-md-8">
									<input type="password" name="new_password" id="new_password" class="form-control" required data-parsley-minlength="6" data-parsley-maxlength="16" data-parsley-trigger="keyup" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 text-right">Re-enter Password <span class="text-danger">*</span></label>
								<div class="col-md-8">
									<input type="password" name="re_enter_new_password" id="re_enter_new_password" class="form-control" required data-parsley-equalto="#new_password"data-parsley-trigger="keyup" />
								</div>
							</div>
						</div>
						<br />
						<div class="form-group text-center">
							<input type="hidden" name="action" value="change_password" />
							<button type="submit" name="submit" id="submit_button" class="btn btn-success"><i class="fas fa-lock"></i> Change</button>
						</div>
					</form>
				</div>
				<div class="col-md-3">&nbsp;</div>
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

	$('#user_form').parsley();

	$('#user_form').on('submit', function(){
		event.preventDefault();
		if($('#user_form').parsley().isValid())
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
						$('#user_form')[0].reset();
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

