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

	include('admin_sidebar.php');

	//Connect
	//require_once './service/config.php';
	
	//session_start();

	//Checking if user logged in or not
	/*if (!isset($_SESSION['username'])) {
		 header('Location: Login.php');
	}*/

function getOrderInfo(){
	
}

function updateOrderInfo(){
	
}

function deleteOrderInfo(){
	
}


	
	// MAIN
	
	
	//------ END ----------//
?>


<html>
    <head>
		<title>Pending Orders</title>
		<!--<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		
		<link rel="stylesheet" href="./css/vendor.css">
		<link rel="stylesheet" href="./css/main.css?v=111">
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/font-awesome.css">

		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->
		<!-- CSS Files -->
		<!--<link href="./css/bootstrap.min.css" rel="stylesheet" />
		<link href="./css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
		<style>
			
		.edit_btn {
			text-decoration: none;
			padding: 2px 5px;
			background: #2E8B57;
			color: white;
			border-radius: 3px;
		}

		.confirm_btn {
			text-decoration: none;
			padding: 2px 5px;
			color: white;
			border-radius: 3px;
			background: #800000;
		}
		</style>-->
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
	<style>
		.btn-group-xs > .btn, .btn-xs {
		  padding: .25rem .4rem;
		  font-size: .4rem;
		  line-height: .5;
		  border-radius: .2rem;
		}
		.table-condensed{
		  font-size: .5rem;
		}
	</style>
    </head>
    <body>
	<!--NAVIGATION-->
	<!-- <div class="header-main bg-white">
    	<div class="container">
    		<div class="row">
    			<nav class="navbar navbar-expand-lg navbar-light w-100" id="header-navbar">
					<img src="./image/logo.png">
    				<a class="navbar-brand font-weight-bold">TRITON GLOBAL SHIPPING</a> 
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
	</div> -->
	
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
	            				<h2>Pending Order</h2>
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
	            				<a href="#" name="file_export" id="file_export" class="text-success"><i class="fas fa-file-csv fa-2x"></i></a>
	            				&nbsp;
	            				<button type="button" name="add_shipment" id="add_shipment" class="btn btn-success btn-sm" style="margin-top: -15px;"><i class="fas fa-user-plus"></i></button>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="card-body">
	            		<div class="table-responsive">
	            			<table class="table table-striped table-bordered small text-xsmall display compact" id="shipment_table"  style="zoom: 75%;" >
	            				<thead>
	            					<tr>
	            						<th class="th-sm">Shipment Number</th>
										<th class="th-sm">Sender</th>
										<th class="th-sm">Receiver</th>
										<th class="th-sm">Estimated Cost</th>
										<th class="th-sm">Actual Cost</th>
										<th class="th-sm">Source</th>						
										<th class="th-sm">Destination</th>
										<th class="th-sm">Order day</th>
										<th class="th-sm">Priority</th>
										<th class="th-sm">Status</th>
										<th class="th-sm">Start Date</th>
										<th class="th-sm">End Date</th>
										<th class="th-sm">Action</th>
	            					</tr>
	            				</thead>
	            			</table>
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

<div id="shipmemtModal" class="modal fade">
  	<div class="modal-dialog modal-lg">
    	<form method="post" id="shipment_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">Add Shipment</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
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
					
					<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Shipment Status</b></label>
			            	<div class="col-md-8">
								<select name="shipment_pakage_status" id="shipment_pakage_status" class="form-control" required data-parsley-trigger="keyup">
			            			<option value="Pending">Pending</option>
									<option value="Confirmed">Confirmed</option>
									<option value="In Ship">In Ship</option>
									<option value="Done">Done</option>
									<option value="Cancelled">Cancelled</option>
			            		</select>
			            	</div>
			            </div>
		          	</div>
				
					
        		</div>
        		<div class="modal-footer">
          			<input type="hidden" name="hidden_id" id="hidden_id" />
          			<input type="hidden" name="action" id="action" value="Add" />
          			<input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
          			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>

<div id="shipmentdetailModal" class="modal fade">
  	<div class="modal-dialog modal-lg">
    	<form method="post" id="shipment_details_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">View Shipment Details</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
					<div class="card-header">Sender</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Sender Name</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_sender_name_detail"></span>
			            	</div>
			            </div>
		          	</div>
					
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Sender Email</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_sender_email_detail"></span>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Sender Mobile No.</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_sender_mobile_no_detail"></span>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Sender Address</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_sender_address_detail"></span>
			            	</div>
			            </div>
		          	</div>
					
					<div class="card-header">Receiver</div>
					<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Receiver Name</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_receiver_name_detail"></span>
			            	</div>
			            </div>
		          	</div>
					
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Receiver Email</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_receiver_email_detail"></span>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Receiver Mobile No.</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_receiver_mobile_no_detail"></span>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Receiver Address</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_receiver_address_detail"></span>
			            	</div>
			            </div>
		          	</div>
					
		          	
					<div class="card-header">Shipment Details</div>
					<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Pakage Type</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_pakage_type_detail"></span>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Package Type</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_pakage_type_detail_2"></span>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Package Type</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_pakage_type_detail_3"></span>
			            	</div>
			            </div>
		          	</div>
					<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Weight (kg)</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_pakage_weight_detail"></span>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Lenght (cm)</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_pakage_lenght_detail"></span>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Width (cm)</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_pakage_width_detail"></span>
			            	</div>
			            </div>
		          	</div>
					<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Height(cm)</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_pakage_height_detail"></span>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Quantity</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_pakage_quantity_detail"></span>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Day of dispatch</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_pakage_day_of_dispatch_detail"></span>
			            	</div>
			            </div>
		          	</div>
					<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Day of arrival</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_pakage_day_of_arrival_detail"></span>
			            	</div>
			            </div>
		          	</div>
		          	<div class="form-group">
		          		<div class="row">
			            	<label class="col-md-4 text-right"><b>Priority</b></label>
			            	<div class="col-md-8">
			            		<span id="shipment_pakage_priority_detail"></span>
			            	</div>
			            </div>
		          	</div>

        		</div>
        		<div class="modal-footer">
          			<input type="hidden" name="hidden_shipment_number" id="hidden_shipment_number" />
          			<input type="hidden" name="action" value="update_shipment_status" />
          			<input type="submit" name="submit" id="detail_submit_button" class="btn btn-success" value="Confirm" />
          			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>

<script>
$(document).ready(function(){

	//load_data();
	load_shipment_data();
	
	//#1
	function load_data(from_date = '', to_date = '')
	{
		console.log("-----load_data");
		var dataTable = $('#shipment_table').DataTable({
			"processing" : true,
			"serverSide" : true,
			"order" : [],
			"ajax" : {
				url:"PendingOrder_action.php",
				type:"POST",
				data:{action:'fetch', from_date:from_date, to_date:to_date},
				success:function(data)
				{
					console.log(data)
				},
				error:function(data)
				{
					console.log("ERROR : load error");
					console.log(data);

				}
			},
			"columnDefs":[
				{
					<?php
					if($shipment_system->is_master_user())
					{
					?>
					"targets":[7],
					<?php
					}
					else
					{
					?>
					"targets":[6],
					<?php
					}
					?>
					"orderable":false,
				},
			],
		});
		console.log("-----load_data--done");
	}
	

	//#1A
	function load_shipment_data(from_date = '', to_date = '')
	{
		console.log("-----load_shipment_data");
		var dataTable = $('#shipment_table').DataTable({
			"processing" : true,
			"serverSide" : true,
			"order" : [],
			"ajax" : {
				url:"PendingOrder_action.php",
				type:"POST",
				data:{action:'fetch_shipment', from_date:from_date, to_date:to_date},
				error:function(data)
				{
					console.log("ERROR : load error");
					console.log(data);

				}
			},
			"columnDefs":[
				{
					"targets":[12],
					"orderable":false,
				},
			],
		});
		console.log("-----load_shipment_data--done");
	}

	//#2
	$('#add_shipment').click(function(){	
		console.log("-----add_shipment -- click");
		$('#shipment_form')[0].reset();
		$('#shipment_form').parsley().reset();
    	$('#modal_title').text('Add Shipment');
    	$('#action').val('Add');
    	$('#submit_button').val('Add');
    	$('#shipmemtModal').modal('show');
	});

	//#3
	$(document).on('change', '#visitor_department', function(){
		console.log("-----visitor_department -- change");
		/* var person = $('#visitor_department').find(':selected').data('person');
		var person_array = person.split(", ");
		var html = '<option value="">Select Person</option>';
		for(var count = 0; count < person_array.length; count++)
		{
			html += '<option value="'+person_array[count]+'">'+person_array[count]+'</option>';
		}
		$('#visitor_meet_person_name').html(html); */
	});

	//#4
	$('#shipment_form').parsley();

	//#5
	$('#shipment_form').on('submit', function(event){
		console.log("-----shipment_form -- submit");
		event.preventDefault();
		if($('#shipment_form').parsley().isValid())
		{		
			$.ajax({
				url:"PendingOrder_action.php",
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
					$('#shipmemtModal').modal('hide');
					$('#message').html(data);
					$('#shipment_table').DataTable().destroy();
					load_shipment_data();
					setTimeout(function(){
						$('#message').html('');
					}, 5000);
				},
				error:function(data)
				{
					console.log("ERROR : load error");
					console.log(data);

				}
			})
		}
	});

	//#6
	$(document).on('click', '.edit_button', function(){
		console.log("-----edit_button -- click");
		var shipment_number = $(this).data('id');
		$('#shipment_form').parsley().reset();
		$.ajax({
	      	url:"PendingOrder_action.php",
	      	method:"POST",
	      	data:{shipment_number:shipment_number, action:'fetch_single'},
	      	dataType:'JSON',
	      	success:function(data)
	      	{
				$('#shipment_sender_name').val(data.shipment_sender_name);
	      		$('#shipment_sender_email').val(data.shipment_sender_email);
	      		$('#shipment_sender_mobile_no').val(data.shipment_sender_mobile_no);
	      		$('#shipment_sender_address').val(data.shipment_sender_address);
				
				$('#shipment_receiver_name').val(data.shipment_receiver_name);
	      		$('#shipment_receiver_email').val(data.shipment_receiver_email);
	      		$('#shipment_receiver_mobile_no').val(data.shipment_receiver_mobile_no);
	      		$('#shipment_receiver_address').val(data.shipment_receiver_address);
				
				
				$('#shipment_pakage_type').text(data.shipment_pakage_type);
	      		$('#shipment_pakage_type_2').text(data.shipment_pakage_type);
	      		$('#shipment_pakage_type_3').text(data.shipment_pakage_type);
	      		$('#shipment_pakage_weight').val(data.shipment_pakage_weight);
	      		$('#shipment_pakage_lenght').val(data.shipment_pakage_lenght);
	      		$('#shipment_pakage_width').val(data.shipment_pakage_width);
				$('#shipment_pakage_height').val(data.shipment_pakage_height);
	      		$('#shipment_pakage_quantity').val(data.shipment_pakage_quantity);
	      		$('#shipment_pakage_day_of_dispatch').text(data.shipment_pakage_day_of_dispatch);
				$('#shipment_pakage_day_of_arrival').text(data.shipment_pakage_day_of_arrival);
	      		$('#shipment_pakage_priority').text(data.shipment_pakage_priority);
				
	        	/* $('#visitor_name').val(data.visitor_name);
	        	$('#visitor_email').val(data.visitor_email);
	        	$('#visitor_mobile_no').val(data.visitor_mobile_no);
	        	$('#visitor_address').val(data.visitor_address);
	        	$('#visitor_department').val(data.visitor_department);

	        	var person = $('#visitor_department').find(':selected').data('person');
				var person_array = person.split(", ");
				var html = '<option value="">Select Person</option>';
				for(var count = 0; count < person_array.length; count++)
				{
					html += '<option value="'+person_array[count]+'">'+person_array[count]+'</option>';
				}
				$('#visitor_meet_person_name').html(html);
				$('#visitor_meet_person_name').val(data.visitor_meet_person_name);
				$('#visitor_reason_to_meet').val(data.visitor_reason_to_meet); */
	        	
	        	$('#modal_title').text('Edit Shipment');
	        	$('#action').val('Edit');
	        	$('#submit_button').val('Edit');
	        	$('#shipmemtModal').modal('show');
	        	$('#hidden_id').val(shipment_number);

	      	},
			error:function(data)
			{
				console.log("ERROR : load error");
				console.log(data);

			}
	    })
	});
	
	//#7
	$(document).on('click', '.delete_button', function(){
		console.log("-----delete_button -- click");
		var id = $(this).data('id');
		if(confirm("Are you sure you want to remove it?"))
    	{
    		$.ajax({
    			url:"PendingOrder_action.php",
    			method:"POST",
    			data:{id:id, action:'delete'},
    			success:function(data)
        		{
        			$('#message').html(data);
        			$('#shipment_table').DataTable().destroy();
        			load_shipment_data();
        			setTimeout(function(){
        				$('#message').html('');
        			}, 5000);
        		},
				error:function(data)
				{
					console.log("ERROR : load error");
					console.log(data);

				}
        	});
    	}
  	});

	//#8
  	$(document).on('click', '.view_button', function(){
		console.log("-----view_button -- click");
  		var shipment_number = $(this).data('id');
		console.log("-----view_button -- click  shipment_number:" + shipment_number);
  		$.ajax({
  			url:"PendingOrder_action.php",
	      	method:"POST",
	      	data:{shipment_number:shipment_number, action:'fetch_single'},
	      	dataType:'JSON',
	      	success:function(data)
	      	{
	      		$('#shipment_sender_name_detail').text(data.shipment_sender_name);
	      		$('#shipment_sender_email_detail').text(data.shipment_sender_email);
	      		$('#shipment_sender_mobile_no_detail').text(data.shipment_sender_mobile_no);
	      		$('#shipment_sender_address_detail').text(data.shipment_sender_address);
				
				$('#shipment_receiver_name_detail').text(data.shipment_receiver_name);
	      		$('#shipment_receiver_email_detail').text(data.shipment_receiver_email);
	      		$('#shipment_receiver_mobile_no_detail').text(data.shipment_receiver_mobile_no);
	      		$('#shipment_receiver_address_detail').text(data.shipment_receiver_address);
	      		
				$('#shipment_pakage_type_detail').text(data.shipment_pakage_type);
	      		$('#shipment_pakage_type_detail_2').text(data.shipment_pakage_type);
	      		$('#shipment_pakage_type_detail_3').text(data.shipment_pakage_type);
	      		$('#shipment_pakage_weight_detail').text(data.shipment_pakage_weight);
	      		$('#shipment_pakage_lenght_detail').text(data.shipment_pakage_lenght);
	      		$('#shipment_pakage_width_detail').text(data.shipment_pakage_width);
				$('#shipment_pakage_height_detail').text(data.shipment_pakage_height);
	      		$('#shipment_pakage_quantity_detail').text(data.shipment_pakage_quantity);
	      		$('#shipment_pakage_day_of_dispatch_detail').text(data.shipment_pakage_day_of_dispatch);
				$('#shipment_pakage_day_of_arrival_detail').text(data.shipment_pakage_day_of_arrival);
	      		$('#shipment_pakage_priority_detail').text(data.shipment_pakage_priority);

	      		
				$('#shipmentdetailModal').modal('show');
	      		$('#hidden_shipment_number').val(shipment_number);
	      	},
			error:function(data)
			{
				console.log("ERROR : ");
				console.log(data);

			}
  		})
		console.log("-----view_button -- click  -- done");
  	});

	//#9
  	$('#shipment_details_form').parsley();

	//#10
  	$('#shipment_details_form').on('submit', function(event){
		console.log("-----shipment_details_form -- submit");
  		event.preventDefault();
  		if($('#shipment_details_form').parsley().isValid())
		{		
			$.ajax({
				url:"PendingOrder_action.php",
				method:"POST",
				data:$(this).serialize(),
				beforeSend:function()
				{
					$('#detail_submit_button').attr('disabled', 'disabled');
					$('#detail_submit_button').val('wait...');
				},
				success:function(data)
				{
					$('#detail_submit_button').attr('disabled', false);
					$('#detail_submit_button').val('Conform');
					$('#shipmentdetailModal').modal('hide');
					$('#message').html(data);
					$('#shipment_table').DataTable().destroy();
					load_shipment_data();
					setTimeout(function(){
						$('#message').html('');
					}, 5000);
				},
				error:function(data)
				{
					console.log("ERROR : load error");
					console.log(data);

				}
			});
		}
  	});

	//#11
  	$('#filter').click(function(){
		console.log("-----filter -- click");
  		var from_date = $('#from_date').val();
  		var to_date = $('#to_date').val();
  		$('#shipment_table').DataTable().destroy();
  		load_shipment_data(from_date, to_date);
  	});

	//#12
  	$('#refresh').click(function(){
		console.log("-----refresh -- click");
  		$('#from_date').val('');
  		$('#to_date').val('');
  		$('#shipment_table').DataTable().destroy();
  		load_shipment_data();
  	});

	//#13
  	$('#file_export').click(function(){
		console.log("-----file_export -- click");
  		var from_date = $('#from_date').val();
  		var to_date = $('#to_date').val();

  		if(from_date != '' && to_date != '')
  		{
  			window.location.href="<?php echo $shipment_system->base_url; ?>export.php?from_date="+from_date+"&to_date="+to_date+"";
  		}
  		else
  		{
  			window.location.href="<?php echo $shipment_system->base_url; ?>export.php";
  		}
  	});

});

</script>


