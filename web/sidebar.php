<div class="container-fluid fixed-top bg-dark py-3" style="z-index:1049;">
	    <div class="row">
	        <div class="col-2 collapse show sidebar text-center">
	            <img src="<?php echo $visitor->Get_profile_image(); ?>" class="img-fluid rounded-circle" width="50" />
	        </div>
	        <div class="col-10">
	            <!-- toggler -->
	            <a data-toggle="collapse" href="#" data-target=".collapse" role="button">
	                <h3 class="mt-2 mb-2 text-white">Visitor Management System</h3>
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
	            	$user_active = 'inactive_class';
	            	$department_active = 'inactive_class';
	            	$visitor_active = 'inactive_class';
	            	$profile_active = 'inactive_class';
	            	$change_password_active = 'inactive_class';

	            	if($page_name == 'dashboard.php')
	            	{
	            		$dashboard_active = 'active_class';
	            	}
	            	if($page_name == 'user.php')
	            	{
	            		$user_active = 'active_class';
	            	}
	            	if($page_name == 'department.php')
	            	{
	            		$department_active = 'active_class';
	            	}
	            	if($page_name == 'visitor.php')
	            	{
	            		$visitor_active = 'active_class';
	            	}
	            	if($page_name == 'profile.php')
	            	{
	            		$profile_active = 'active_class';
	            	}
	            	if($page_name == 'change_password.php')
	            	{
	            		$change_password_active = 'active_class';
	            	}
	            	?>


	            	<li class="nav-item">
	                    <a class="nav-link <?php echo $dashboard_active; ?>" href="dashboard.php"><span class="ml-2 d-none d-sm-inline"><i class="fas fa-tachometer-alt"></i> Dashboard</span></a>
	                </li>

	            	<?php

	            	if($visitor->is_master_user())
	            	{
	            	?>
	            	<li class="nav-item">
	                    <a class="nav-link <?php echo $user_active; ?>" href="user.php"><span class="ml-2 d-none d-sm-inline"><i class="fas fa-users"></i> User</span></a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link <?php echo $department_active; ?>" href="department.php"><span class="ml-2 d-none d-sm-inline"><i class="far fa-building"></i> Department</span></a>
	                </li>
	            	<?php
	            	}

	            	?>
	            	<li class="nav-item">
	                    <a class="nav-link <?php echo $visitor_active; ?>" href="visitor.php"><span class="ml-2 d-none d-sm-inline"><i class="fas fa-person-booth"></i>&nbsp;&nbsp;Visitor</span></a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link <?php echo $profile_active; ?>" href="profile.php"><span class="ml-2 d-none d-sm-inline"><i class="far fa-id-badge"></i>&nbsp;&nbsp;Profile</span></a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link <?php echo $change_password_active; ?>" href="change_password.php"><span class="ml-2 d-none d-sm-inline"><i class="fas fa-key"></i>&nbsp;&nbsp;Change Password</span></a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link inactive_class" href="logout.php"><span class="ml-2 d-none d-sm-inline"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</span></a>
	                </li>
	            </ul>
	        </div>