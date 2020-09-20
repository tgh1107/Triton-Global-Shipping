<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
		<form>
			<div>
			<div class="cus_info">
				<h4> SENDER DETAILS</h4>
				<label> Name*</label><br>
				<input type="text" name=""><br>
				<label> Email*</label><br>
				<input type="text" name=""><br>
				<label> Contact number*</label><br>
				<input type="text" name=""><br>
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
			<div style="margin-left: 8px"><h4> PACKAGE DETAILS</h4></div>
			<div class="package_info">		
				<div>
				<label> Package type</label>
				<div id="list1" class="dropdown-check-list" tabindex="100">
					<span class="anchor">Select package types</span>
				<ul class="items">
					<li><input type="checkbox" />Hazardous </li>
					<li><input type="checkbox" />Non-hazardous</li>
					<li><input type="checkbox" />Liquid </li>
					<li><input type="checkbox" />Solid </li>
					<li><input type="checkbox" />Gas </li>
					<li><input type="checkbox" />Food </li>
				  </ul>
				</div>
				<label class="form_title"> Weight(kg)</label>
				<input type="text" name="">
				<label class="form_title"> Length(cm)</label>
				<input type="text" name="">
			</div>
			<div class="package_info">
				<label> Width(cm)</label>
				<input type="text" name="">
				<label class="form_title"> Height(cm)</label>
				<input type="text" name="">
				<label class="form_title"> Quantity</label>
				<input type="text" name="">
			
			</div>
			<div class="package_info"> 
				<label> Day of dispatch</label>
				<input type="date" name="">
				<label class="form_title"> Day of arrival</label>
				<input type="date" name="">
				<label class="form_title"> Level of urgency</label>
				<select>
					<option value="level1"> In 1 week</option>
					<option value="level2"> In 2 weeks</option>
					<option value="level3"> In 1 month</option>
				</select>
			
				<input type="checkbox">
				<label> Dangerous item</label>
			
			</div>
			<div class="order_button">
				<button> ADD ANOTHER ITEM</button>
				<button> ORDER</button>
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
<script>
	var checkList = document.getElementById('list1');
checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
  if (checkList.classList.contains('visible'))
    checkList.classList.remove('visible');
  else
    checkList.classList.add('visible');
}
</script>
</body>
</html>
