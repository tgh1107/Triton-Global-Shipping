<!DOCTYPE html>
<?php

	//OrderManagement.php

	include('sms.php');

	$shipment_system = new sms();

	/*if(!$shipment_system->is_login())
	{
		header("location:".$shipment_system->base_url."");
	}*/

	include('admin_header.php');

	include('admin_sidebar.php');
	
	
	//--------------//
	// Include file
	//require_once './service/config.php';

	//session_start();

	//Checking if user logged in or not
	//if (!isset($_SESSION['username'])) {
		// header('Location: Login.php');
	//}

function getOrderInfo(){
	
}

function updateOrderInfo(){
	
}

function deleteOrderInfo(){
	
}

//Sql statement
/*$sql = "SELECT 
            *
        FROM 
            orderlist
        where OrderTrack = 1";
$result = mysqli_query($link, $sql);

//check error
if (!$result){
    die('error'.mysqli_error($link));
}*/
	// MAIN
	
	//------ END ----------//
?>

<html>
    <head>
		<title>Order  Management</title>
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
		<link href="./css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />-->
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
		<span id="message"></span>
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-sm-4">
						<h2>Order Management</h2>
					</div>
					<div class="col-sm-4">
						<div class="row input-daterange">
							<div class="col-md-6">
								<input type="text" name="from_date" id="from_date" class="form-control form-control-sm" placeholder="From Date" readonly />
							</div>
							<div class="col-md-6">
								<input type="text" name="to_date" id="to_date" class="form-control form-control-sm" placeholder="To Date" readonly />
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<button type="button" name="filter" id="filter" class="btn btn-info btn-sm"><i class="fas fa-filter"></i></button>
						&nbsp;
						<button type="button" name="refresh" id="refresh" class="btn btn-secondary btn-sm"><i class="fas fa-sync-alt"></i></button>
					</div>
					<div class="col-md-2" align="right">
						<a href="#" name="export" id="export" class="text-success"><i class="fas fa-file-csv fa-2x"></i></a>
						&nbsp;
						<button type="button" name="add_visitor" id="add_visitor" class="btn btn-success btn-sm" style="margin-top: -15px;"><i class="fas fa-user-plus"></i></button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="visitor_table">
						<thead>
							<tr>
								<th>Visitor Name</th>
								<th>Meet Person Name</th>
								<th>Department</th>
								<th>In Time</th>
								<th>Out Time</th>
								<th>Status</th>
								<?php
								if($visitor->is_master_user())
								{
									echo '<th>Enter By</th>';
								}
								?>										
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<!--<div class="col-sm-10 offset-sm-2 py-4">
	<div class="main-panel">
        <h4>
            Total orders<br>
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
					<th colspan="2">Action</th>
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
						<td>
							<a href="OrderManagement.php?edit=<?php echo $row['OrderID']; ?>" class="edit_btn" >Edit</a>
						</td>
						<td>
							<a href="OrderManagement.php?confirm=<?php echo $row['OrderID']; ?>" class="confirm_btn">Confirm</a>
						</td>
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
            require_once './service/config.php';
            if(isset($_POST['abc'])){
                $update = $_POST['update'];
                    $sql1= "UPDATE `orderlist` SET `OrderTrack`= '0' WHERE OrderID = '$update'";
                    $result1 = mysqli_query($conn, $sql1);
                header("Location: PendingOrder.php");
            }
            ?>
            
        </form>
        		
	</div>
	</div>-->


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

