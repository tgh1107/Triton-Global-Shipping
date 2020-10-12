<!DOCTYPE html>
<?php
// Include file
include_once './include/debug.php';
include_once './service/vendor/autoload.php';

// Define variables and initialize with empty values
$account_sid = $auth_token = $twilio_number = $AdminNumber = "";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

session_start();

//Checking if user logged in or not
/* if (!isset($_SESSION['username'])) {
	 header('Location: Login.php');
} */
?>

<?php
if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
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


// MAIN
	readEnv();

// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
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
?>


<?php
	//if(isset($_POST['sender_number'])&& isset($_POST['sender_name']) && isset($_POST['day_of_dispatch']) && isset($_POST['level_of_urgency'])){
	//if($_SERVER["REQUEST_METHOD"] == "POST"){ 
		//$Message = 'Customer number: '.$_POST['sender_number'].';'.' Customer Name: '.$_POST['sender_name'] .';'.'Day of Dispatch : '.$_POST['day_of_dispatch'].';'.'Level of urgency : '.$_POST['level_of_urgency'] ;
		
		//sendMessage($Message);

	//}
?>
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
		<link href="./css/paper-dashboard.css" rel="stylesheet" />
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
        <form action="" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>ACCOUNT SID</label>
                <input type="text" name="username" class="form-control" value="<?php echo getenv("TWILIO_ACCOUNT_SID"); ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>AUTH TOKEN</label>
                <input  name="password" class="form-control" value="<?php echo getenv("TWILIO_AUTH_TOKEN"); ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>TRIAL NUMBER</label>
                <input name="confirm_password" class="form-control" value="<?php echo getenv("TWILIO_PHONE_NUMBER"); ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
			<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>PHONE NUMBER</label>
                <input name="confirm_password" class="form-control" value="<?php echo getenv("TWILIO_ADMIN_PHONE_NUMBER"); ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an phone number? <a class="btn" href="https://www.twilio.com/">Register</a></p>
			<p>NOTE : You need to register and add here</p>
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

