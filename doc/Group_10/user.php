<?php 
    include 'permission.php';
/*session_start();
if (!isset($_SESSION['isUser']))
{
    header("Location:logIn.php");
    exit();
}

/*if(!isset($_SESSION['username'])||($_SESSION['username']!='Admin')){
    header("location:logIn.php");
}
 */
?>

<!DOCTYPE html>

<html>


<head>
    <title>Pride-In-Perfume</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="CSS/myStyle.css" rel="stylesheet" type="text/css">
    <script src="JS/myJS.js"></script>
</head>

<body>

   <!-- header: logo and navigation-menu -->
   <?php include('header.php'); ?>
    <!-- end header -->
    
    <!-- start main body content -->
    <main>

    <div class="ourStory">
        
    &nbsp;<h3><?php echo "Hello ".$_SESSION['username']."!" ?></h3><br>

        <h5><em>Promotion-code for you:</em></h5>
		<p><div class="promo_code">
                <b><?php include('promotionCode.php'); ?></b>
            </div>	
			<br>
            <em>(Please note that the current code can be used only once and 
				is valid only for a specific promotional period.)
		    </em>
        </p>
        
		<br>
		<p>With this code, you will get 5% off of your total purchases.</p>
		<a href="logOut.php" class="logout_btn" >Log Out</a>

    </div>

    </main>
    <!-- end main -->

    <!-- footer start -->
    <?php include('footer.inc'); ?>
    <!-- end of footer -->

</body>

</html>
                    