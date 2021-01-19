<!DOCTYPE html>
<?php

	//PhoneManagement.php
	include_once('./include/debug.php');
	include('sms.php');

	$shipment_system = new sms();

	if(!$shipment_system->is_login())
	{
		header("location:".$shipment_system->base_url."");
	}

	include('admin_header.php');

	include('admin_sidebar.php');
	
	
	//--------------//
	
	// Include file
	include_once './include/debug.php';
	//include_once './service/vendor/autoload.php';





	
	//------ END ----------//
?>
<html>
    <head>
		<title>Live chat Management</title>

	</head>
    <body>
	

	
	<!--CONTAINER-->
	<div class="col-sm-10 offset-sm-2 py-4">
	<div class="card">
		<div class="card-header">
        <h2>Live chat Management</h2>
        <!--<p>Please fill this form to change phone number.</p>-->
		</div>
		<!--<div class="card-body">
        <form action="" method="post" id="phone_management_form">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>ACCOUNT SID</label>
                <input type="text" name="account_sid" id="account_sid"  class="form-control" value="<?php echo $account_sid; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>AUTH TOKEN</label>
                <input type="text"  name="auth_token" id="auth_token" class="form-control" value="<?php echo $auth_token; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>TRIAL NUMBER</label>
                <input type="text" name="trail_number" id="trail_number" class="form-control" value="<?php echo $twilio_number; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
			<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>PHONE NUMBER</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo $AdminNumber; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
				<input type="hidden" name="action" value="change_phone_number" />
                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
	
        </form>
		</div>-->
	<div class="card-header">
        <p><a class="btn btn-success" href="https://dashboard.tawk.to/login">Live chat access</a></p>
	</div>
    </div>    
		
	</div>
	</div>



	
    </body>
</html>

<script>
$(document).ready(function(){

	//load_data();

	//#1
	function load_data()
	{
		console.log("-----load_data");
		$('#phone_management_form').parsley().reset();
		$.ajax({
	      	url:"user_action.php",
	      	method:"POST",
	      	data:{action:'fetch_phone'},
	      	dataType:'JSON',
	      	success:function(data)
	      	{
				console.log(data);
	        	$('#account_sid').val(data.ACCOUNT_SID);
	        	$('#auth_token').val(data.AUTH_TOKEN);
	        	$('#trail_number').val(data.PHONE_NUMBER);
	        	$('#phone_number').val(data.ADMIN_PHONE_NUMBER);
	      	},
			error:function(data)
	      	{
				console.log("ERROR : load error");
	        	console.log(data);

	      	}
	    })
		console.log("-----load_data--done");
	}

	$('#phone_management_form').parsley();

	$('#phone_management_form').on('submit', function(){
		event.preventDefault();
		if($('#phone_management_form').parsley().isValid())
		{
			$.ajax({
				url:"user_action.php",
				method:"POST",
				data:new FormData(this),
				contentType:false,
				processData:false,
				dataType:"JSON",
				beforeSend:function()
				{
					$('#submit_button').attr('disabled', 'disabled');
					$('#submit_button').html('wait...');
				},
				success:function(data)
				{
					$('#submit_button').attr('disabled', false);
					$('#submit_button').html('<i class="fas fa-lock"></i> Change');
					if(data.error != '')
					{
						$('#message').html(data.error);
					}
					else
					{
						$('#phone_management_form')[0].reset();
						$('#message').html(data.success);
						setTimeout(function(){
							$('#message').html('');
						}, 5000);
					}
				},
				error:function(data)
				{
					console.log("ERROR : ");
					console.log(data);

				}
			})
		}
	});

});

</script>

