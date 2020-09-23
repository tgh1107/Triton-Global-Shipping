<!DOCTYPE html>
        <?php
        //require 'Connect.php';
        //include './vendor/autoload.php';
		require './service/config.php';
        include './service/vendor/autoload.php';
        //if(isset($_POST['sender_number'])&& isset($_POST['sender_name']) && isset($_POST['day_of_dispatch']) && isset($_POST['level_of_urgency'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){    
            // Your Account SID and Auth Token from twilio.com/console
			$account_sid = 'AC3ade4674ed858c35870efd8a9791cca3';
            $auth_token = '2468ecd6a18aa0819946360af04bd85c';
            $twilio_number = "+12029534948";
            

            $AdminNumber ="+61481272472";
            
            $Message = 'Customer number: '.$_POST['sender_number'].';'.' Customer Name: '.$_POST['sender_name'] .';'.'Day of Dispatch : '.$_POST['day_of_dispatch'].';'.'Level of urgency : '.$_POST['level_of_urgency'] ;
            
            $client = new Twilio\Rest\Client($account_sid, $auth_token);
            $client->messages->create(
                    $AdminNumber, 
                        array(
                              'from' => $twilio_number,
                              'body' => $Message
                             )
                    );
          
            
            //Insert record into DB
            $sql = "insert into orderlist (sender_name, sender_number) values ('".$_POST['sender_name']."','".$_POST['sender_number']."')";
            $result = mysqli_query($link, $sql);
        }
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
		<form action = "" method="post" >
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
</body>
</html>
