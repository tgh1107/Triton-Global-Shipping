
<?php
session_start();

//Checking if user logged in or not
/* if (!isset($_SESSION['username'])) {
	 header('Location: Login.php');
} */
?>

<?php
//Connect
require_once './service/config.php';

//Sql statement
$sql = "SELECT 
            *
        FROM 
            orderlist
        where OrderTrack = 1";
$result = mysqli_query($link, $sql);

//check error
if (!$result){
    die('error'.mysqli_error($link));
}
?>
<?php

 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
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
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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

<html>
    <head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<title>Pending Orders</title>
		<link rel="stylesheet" href="./css/vendor.css">
		<link rel="stylesheet" href="./css/main.css">
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/font-awesome.css">

		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<!-- CSS Files -->
		<link href="./css/bootstrap.min.css" rel="stylesheet" />
		<link href="./css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
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
	</div>
	
	<!--  side bar -->
    <?php include('./include/sidebar.php'); ?>
    <!-- end of side bar -->
	
	<!--CONTAINER-->
	<div class="main-panel">
	<div class="wrapper">
        <h2>Phone Management</h2>
        <p>Please fill this form to change phone number.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Phone</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input  name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
		
	</div>
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
	
    </body>
</html>

