<?php

//dashboard.php
	include_once('./include/debug.php');
	include('sms.php');

	$shipment_system = new sms();

	/*if(!$shipment_system->is_login())
	{
		header("location:".$shipment_system->base_url."");
	}*/

	include('admin_header.php');

	include('admin_sidebar.php');

?>
	
	
	        <div class="col-sm-10 offset-sm-2 py-4">
	            <div class="row">
	            	<div class="col-sm-3">
	            		<div class="card text-white bg-success mb-3">
						  	<div class="card-header text-center"><h4>Total Today Order</h4></div>
						  	<div class="card-body">
						    	<h1 class="card-title text-center"><?php echo $shipment_system->Get_total_today_visitor(); ?></h1>
						  	</div>
						</div>
	            	</div>
	            	<div class="col-sm-3">
	            		<div class="card text-white bg-primary mb-3">
						  	<div class="card-header text-center"><h4>Total Order (Week)</h4></div>
						  	<div class="card-body">
						    	<h1 class="card-title text-center"><?php echo $shipment_system->Get_total_yesterday_visitor(); ?></h1>
						  	</div>
						</div>
	            	</div>
	            	<div class="col-sm-3">
	            		<div class="card text-white bg-warning mb-3">
						  	<div class="card-header text-center"><h4>Total Order (Month)</h4></div>
						  	<div class="card-body">
						    	<h1 class="card-title text-center"><?php echo $shipment_system->Get_last_seven_day_total_visitor(); ?></h1>
						  	</div>
						</div>
	            	</div>
	            	<div class="col-sm-3">
	            		<div class="card text-white bg-info mb-3">
						  	<div class="card-header text-center"><h4>Total Order (Year)</h4></div>
						  	<div class="card-body">
						    	<h1 class="card-title text-center"><?php echo $shipment_system->Get_total_visitor(); ?></h1>
						  	</div>
						</div>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>

</body>
</html>