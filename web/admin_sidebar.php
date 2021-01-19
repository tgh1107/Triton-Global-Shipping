<div class="container-fluid fixed-top bg-dark " style="z-index:1049;">
	    <div class="row">
	        <!--<div class="col-2 collapse show sidebar text-center">
	            <img src="<?php echo $shipment_system->Get_profile_image(); ?>" class="img-fluid rounded-circle" width="50" />
	        </div>-->
	        <div class="col-10">
	            <!-- toggler -->
	            <a data-toggle="collapse" href="#" data-target=".collapse" role="button">
	                <h3 class="mt-2 mb-2 text-white">Shipment Management System</h3>
	            </a>
	        </div>
	    </div>
	</div>
	<div class="container-fluid">
	    <div class="row vh-100 flex-nowrap">
	        <div class="col-sm-2 collapse show sidebar bg-dark px-0 position-fixed">
	            <ul class="nav flex-column flex-nowrap pt-2 vh-100" id="sidebar">
	            	<?php 
	            	$page_name = basename($_SERVER['PHP_SELF']);
	            	$dashboard_active = 'inactive_class';
	            	$pending_order_active = 'inactive_class';
	            	$order_active = 'inactive_class';
	            	$phone_management_active = 'inactive_class';
	            	//$profile_active = 'inactive_class';
	            	$change_password_active = 'inactive_class';
					$live_chat_active = 'inactive_class';

	            	if($page_name == 'Dashboard.php')
	            	{
	            		$dashboard_active = 'active_class';
	            	}
	            	if($page_name == 'PendingOrder.php')
	            	{
	            		$pending_order_active = 'active_class';
	            	}
	            	if($page_name == 'OrderManagement.php')
	            	{
	            		$order_active = 'active_class';
	            	}
	            	if($page_name == 'PhoneManagement.php')
	            	{
	            		$phone_management_active = 'active_class';
	            	}
					/*if($page_name == 'profile.php')
	            	{
	            		$profile_active = 'active_class';
	            	}*/
	            	if($page_name == 'PasswordChange.php')
	            	{
	            		$change_password_active = 'active_class';
	            	}
					if($page_name == 'Livechat.php')
	            	{
	            		$live_chat_active = 'active_class';
	            	}
	            	?>


	            	<li class="nav-item">
	                    <a class="nav-link <?php echo $dashboard_active; ?>" href="Dashboard.php"><span class="ml-2 d-none d-sm-inline"><i class="fas fa-tachometer-alt"></i> Dashboard</span></a>
	                </li>

	            	<?php

	            	if(true)//$visitor->is_master_user())
	            	{
	            	?>
	            	<li class="nav-item">
	                    <a class="nav-link <?php echo $pending_order_active; ?>" href="PendingOrder.php"><span class="ml-2 d-none d-sm-inline"><i class="fas fa-clipboard"></i> Pending Order</span></a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link <?php echo $order_active; ?>" href="OrderManagement.php"><span class="ml-2 d-none d-sm-inline"><i class="far fa-clipboard"></i> Order</span></a>
	                </li>
	            	<?php
	            	}

	            	?>
	            	<li class="nav-item">
	                    <a class="nav-link <?php echo $phone_management_active; ?>" href="PhoneManagement.php"><span class="ml-2 d-none d-sm-inline"><i class="fas fa-mobile-alt"></i> Phone Management</span></a>
	                </li>
	                <!--<li class="nav-item">
	                    <a class="nav-link <?php echo $profile_active; ?>" href="profile.php"><span class="ml-2 d-none d-sm-inline"><i class="far fa-id-badge"></i>&nbsp;&nbsp;Profile</span></a>
	                </li>-->
	                <li class="nav-item">
	                    <a class="nav-link <?php echo $change_password_active; ?>" href="PasswordChange.php"><span class="ml-2 d-none d-sm-inline"><i class="fas fa-key"></i>&nbsp;&nbsp;Change Password</span></a>
	                </li>
					 <li class="nav-item">
	                    <a class="nav-link <?php echo $live_chat_active; ?>" href="Livechat.php"><span class="ml-2 d-none d-sm-inline"><i class="fas fa-comment-dots"></i>&nbsp;&nbsp;Live chat</span></a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link inactive_class" href="Logout.php"><span class="ml-2 d-none d-sm-inline"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</span></a>
	                </li>
	            </ul>
	        </div>