<?php
/*// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: Dashboard.php");
  exit;
}
 
// Include config file
require_once "./service/config.php";
require_once './service/database_connection.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            //session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: Dashboard.php");
							//header("location: PendingOrder.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}*/
	include_once('./include/debug.php');
	include_once('sms.php');

	//echo("-----load_data ==".$_SERVER['HTTP_HOST']  . dirname($_SERVER['PHP_SELF']));
	$shipment_system = new sms();

	
	if($shipment_system->is_login())
	{
		header("location:".$shipment_system->base_url."Dashboard.php");
	}

	include('admin_header.php');

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	
	<link rel="stylesheet" href="./css/vendor.css">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/font-awesome.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet"> 
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJYjmTFKo21igdDqgNXOb171mXQzn3hnk&sensor=false&libraries=visualization"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ padding: 20px; }
    </style>
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
	
	<div class="contactus" style="background-image: url(./images/contactus.jpg);">
		<h1> LOG IN</h1>
	</div>
	
		<!--FORM-->
	<div class="login">
    <div class="form"> 
		<div class="wrapper">
		<!--<h2>ARE YOU A MEMBER?</h2> -->
		<h3> Log In here</h3>

        <p>Please fill in your credentials to login.</p>
        <div class="row1">
				<div class="col-md-39">&nbsp;</div>
				<div class="col-md-69">
					<span id="error"></span>
					<div class="card">
						<div class="card-header">Login</div>
						<div class="card-body">
							<form method="post" id="login_form">
								<div class="form-group">
									<label>Enter Email Address</label>
									<input type="text" name="user_name" id="user_name" class="form-control" required data-parsley-trigger="keyup" />
								</div>
								<div class="form-group">
									<label>Enter password</label>
									<input type="password" name="user_password" id="user_password" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
								<div class="form-group text-center">
									<input type="submit" name="login" id="login_button" class="btn btn-primary" value="Login" />
								</div>
							</form>
							<br /><br />
							<h3><u>Admin Login Details</u></h3><br />
							<p><b>User Email - </b>admin</p>
							<p><b>Password - </b>password123</p>
							<br />
						</div>
					</div>
					<br />
					<br />
				</div>
			</div>
		</div> 
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


					
				
	<!--<script type="text/javascript" async="" src="./js/analytics.js.download"></script>
	<script async="" src="./js"></script>
	<script>window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-176058743-1');</script>
	<script src="./js/vendor.js.download"></script>
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

	$('#login_form').parsley();

	$('#login_form').on('submit', function(event){
		event.preventDefault();
		if($('#login_form').parsley().isValid())
		{		
			$.ajax({
				url:"login_action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:'json',
				beforeSend:function()
				{
					$('#login_button').attr('disabled', 'disabled');
					$('#login_button').val('wait...');
				},
				success:function(data)
				{
					$('#login_button').attr('disabled', false);
					if(data.error != '')
					{
						console.log("00000000000000000000");
						$('#error').html(data.error);
						$('#login_button').val('Login');
					}
					else
					{
						window.location.href = "<?php echo $shipment_system->base_url; ?>Dashboard.php";
					}
				}
			})
		}
	});

});

</script>