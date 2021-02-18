<!DOCTYPE html>
<html>
<head>
    <title>loading</title>

    <style>
	/* Paste this css to your style sheet file or under head tag */
	/* This only works with JavaScript, 
	if it's not present, don't show loader */
	.no-js #loader { display: none;  }
	.js #loader { display: block; position: absolute; left: 100px; top: 0; }
	.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(./images/Preloader_2.gif) center no-repeat #fff;
	}
	</style>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<script>
		//paste this code under head tag or in a seperate js file.
		// Wait for window load
		$(window).on("load", function (e) {//})
		//$(window).load(function() {
			// Animate loader off screen
			$(".se-pre-con").fadeOut("slow");;
		});
	</script>
</head>
<body>

    <div class="se-pre-con"></div>
</body>
</html>