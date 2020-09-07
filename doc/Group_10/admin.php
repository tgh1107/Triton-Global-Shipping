<?php 
    include 'permission.php';
?>
<!DOCTYPE html>

<html>


<head>
    <title>Pride-In-Perfume</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="CSS/myStyle.css" rel="stylesheet" type="text/css">   
</head>

<body>

   <!-- header: logo and navigation-menu -->
   <?php include('header.php'); ?>
    <!-- end header -->
    
    <!-- start main body content -->
    <main>
	
    <div class="admin">
        &nbsp;
		<!-- Admin generates special offer (coupon-code here) and only members can see it [optional features]-->
        <h5>Generate promotion code and insert it into all accounts:</h5> 
		<p>	<script src="JS/myJS.js"></script>
			<form action="update_code.php" method="post" >
				<input type="button" name="generate" value="Generate coupon-code" onClick="generateCode(9);">
				<input type="text" id="code" name="code" readonly="readonly">&nbsp;
				<input type="submit" value="Let members see the code" >
			</form>
		</p>&nbsp;

		<p>
		<form action="delete_code.php" method="post" >		
			Delete the code (after the code had expired) : <input type="submit" value="Delete Code" >
		</form><p>&nbsp;<br>
		<!-- End of special offer -->


		<!--add, delete, update items (optional features)-->
		
			<h5>Add New Item:</h5> 
			<form class="form-inline" action="add_item.php" method="post" >	
				
				<table class="tb">
					<tr><th><label for="name">Name:</label><input type="text" id="name" name="name"></th>
						<th><label for="desc">Description:</label><input type="text" id="desc" name="desc"></th>
					</tr>
					<tr><th><label for="price">Price:</label><input type="text" id="price" name="price"></th>
						<th><label for="brand">Brand:</label><input type="text" id="brand" name="brand"></th>
					</tr>
					<tr><th><label for="pic">Picture:</label><input type="text" id="pic" name="pic"></th>
						<th><label for="year">Item Launch Year:</label><input type="text" id="year" name="year"></th>
					</tr>
					<tr><th><label for="size">Item Size:</label><input type="text" id="size" name="size"></th>
						<th><label for="item_status">Item Status:</label><input type="text" id="item_status" name="item_status"></th>
					</tr>
					<tr><th><label for="gender">Gender:</label><input type="text" id="gender" name="gender"></th>
						<th><label for="gender_status">Gender Status:</label><input type="text" id="gender_status" name="gender_status"></th>
					</tr>		
					<tr><th></th><th><input type="submit" value=" Add the Item " ></th></tr>
				</table>
			</form><br>
		
		<p><h5>Delete the Item:</h5>
		<form class="form-inline" action="delete_item.php" method="post" >		
				Item ID:<input type="text" id="id" name="id"><input type="submit" value="Delete Item" >
		</form><p><br>

		<p><h5>Update the Item:</h5>
		<form class="form-inline" action="update_item.php" method="post" >	
				<table class="tb">
				<tr><th><label for="name">Name:</label><input type="text" id="name" name="name"></th>
						<th><label for="desc">Description:</label><input type="text" id="desc" name="desc"></th>
					</tr>
					<tr><th><label for="price">Price:</label><input type="text" id="price" name="price"></th>
						<th><label for="brand">Brand:</label><input type="text" id="brand" name="brand"></th>
					</tr>
					<tr><th><label for="pic">Picture:</label><input type="text" id="pic" name="pic"></th>
						<th><label for="year">Item Launch Year:</label><input type="text" id="year" name="year"></th>
					</tr>
					<tr><th><label for="size">Item Size:</label><input type="text" id="size" name="size"></th>
						<th><label for="item_status">Item Status:</label><input type="text" id="item_status" name="item_status"></th>
					</tr>
					<tr><th><label for="gender">Gender:</label><input type="text" id="gender" name="gender"></th>
						<th><label for="gender_status">Gender Status:</label><input type="text" id="gender_status" name="gender_status"></th>
					</tr>		
					<tr><th><label for="id">Item ID:</label><input type="text" id="id" name="id"></th>
					<th><input type="submit" value=" Update the Item " ></th></tr>
				</table>
			</form><p>
		<!--End of add, delete, update items (optional features)-->

		
		<br>
        <a href="logOut.php" class="logout_btn" >Log Out</a>
    </div>
    </main>
    <!-- end main -->

    <!-- footer start -->
    <?php include('footer.inc'); ?>
    <!-- end of footer -->

</body>

</html>