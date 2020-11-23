<?php

//department.php

include('vms.php');

$visitor = new vms();

if(!$visitor->is_login())
{
	header("location:".$visitor->base_url."");
}

include('header.php');

include('sidebar.php');
?>
	
	
	        <div class="col-sm-10 offset-sm-2 py-4">
	        	<span id="message"></span>
	            <div class="card">
	            	<div class="card-header">
	            		<div class="row">
	            			<div class="col">
	            				<h2>Change Password</h2>
	            			</div>
	            			<div class="col text-right">
	            			</div>
	            		</div>
	            	</div>
	            	<div class="card-body">
	            		<div class="col-md-3">&nbsp;</div>
	            		<div class="col-md-6">
	            			<form method="post" id="user_form">
	            				<div class="form-group">
					          		<div class="row">
						            	<label class="col-md-4 text-right">Current Password <span class="text-danger">*</span></label>
						            	<div class="col-md-8">
						            		<input type="password" name="current_password" id="current_password" class="form-control"  required data-parsley-minlength="6" data-parsley-maxlength="16" data-parsley-trigger="keyup" />
						            	</div>
						            </div>
					          	</div>
					          	<div class="form-group">
					          		<div class="row">
						            	<label class="col-md-4 text-right">New Password <span class="text-danger">*</span></label>
						            	<div class="col-md-8">
						            		<input type="password" name="new_password" id="new_password" class="form-control" required data-parsley-minlength="6" data-parsley-maxlength="16" data-parsley-trigger="keyup" />
						            	</div>
						            </div>
					          	</div>
					          	<div class="form-group">
					          		<div class="row">
						            	<label class="col-md-4 text-right">Re-enter Password <span class="text-danger">*</span></label>
						            	<div class="col-md-8">
						            		<input type="password" name="re_enter_new_password" id="re_enter_new_password" class="form-control" required data-parsley-equalto="#new_password"data-parsley-trigger="keyup" />
						            	</div>
						            </div>
					          	</div>
					          	<br />
					          	<div class="form-group text-center">
					          		<input type="hidden" name="action" value="change_password" />
					          		<button type="submit" name="submit" id="submit_button" class="btn btn-success"><i class="fas fa-lock"></i> Change</button>
					          	</div>
	            			</form>
	            		</div>
	            		<div class="col-md-3">&nbsp;</div>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>

</body>
</html>

<script>

$(document).ready(function(){

	$('#user_form').parsley();

	$('#user_form').on('submit', function(){
		event.preventDefault();
		if($('#user_form').parsley().isValid())
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
						$('#user_form')[0].reset();
						$('#message').html(data.success);
						setTimeout(function(){
							$('#message').html('');
						}, 5000);
					}
				}
			})
		}
	});

});

</script>