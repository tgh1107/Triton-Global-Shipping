<?php 
    include 'permission.php';
?>
<!DOCTYPE html>

<html>


<head>
    <title>Pride-In-Perfume</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
    <link href="CSS/myStyle.css" rel="stylesheet" type="text/css">
    <script src="/JS/myJS.js"></script>
</head>

<body>

    <!-- header: logo and navigation-menu -->
    <?php include('header.php'); ?>
    <!-- end header -->
    
    <!-- start main body content -->
    <main>

        <div class="ourStory">
            
            <?php 
                
                include('add_to_cart.php'); 
            ?>

        </div>

    </main>
    <!-- end main -->

    <!-- footer start -->
    <?php include('footer.inc'); ?>
    <!-- end of footer -->

</body>

</html>