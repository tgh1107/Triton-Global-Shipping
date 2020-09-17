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

	<!--CONTAINER-->
	<div class="container">
        <h4>
            Pending orders<br>
            <?php 
                echo "Date of report: ".date("Y/m/d");
            ?>
        </h4>
        <table border="1">
            <thread>
                <tr style="font-weight:bold">
                    <td>Order_id</</td>
                    <td>Customer Name</td>
                    <td>Customer Mobile Number</td>
                </tr>
            </thread>
            <tbody>
                <?php
                if (mysqli_num_rows($result)>0){
                    while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['OrderID']?></td>
                        <td><?php echo $row['CusName']?></td>
                        <td><?php echo $row['CusMobile']?></td>
                        <?php

                        
                    };
                        ?>
                    </tr>
                    <?php
                    
                }
                ?>
            </tbody>
        </table>
        <form method="post">
            Select order to confirm <br>
            <input type ="number" name="update"><br>
            <input type="submit" value="confirm" name="abc">
            
            <?php
            require './service/database_connection.php';
            if(isset($_POST['abc'])){
                $update = $_POST['update'];
                    $sql1= "UPDATE `orderlist` SET `OrderTrack`= '1' WHERE OrderID = '$update'";
                    $result1 = mysqli_query($conn, $sql1);
                header("Location: PendingOrder.php");
            }
            ?>
            
        </form>
        <a href="Logout.php"> logout</a>
		
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
<?php
session_start();

//Checking if user logged in or not
if (!isset($_SESSION['username'])) {
	 header('Location: Login.php');
}
?>
<?php
//Connect
require './service/database_connection.php';

//Sql statement
$sql = "SELECT 
            *
        FROM 
            orderlist
        where OrderTrack = 1";
$result = mysqli_query($conn, $sql);

//check error
if (!$result){
    die('error'.mysqli_error($conn));
}
?>
