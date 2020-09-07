<html>
<head><link href="CSS/myStyle.css" rel="stylesheet" type="text/css">
<script src="JS/myJS.js" type="text/javascript"></script>
</head>
<body>
    
        <div id="container">
            <div class="logoHeader">
                <div class="logo">
                    <a href="index.php" class="navbar-brand">
                        <img src="Images/logoo.PNG" class="logoImg">
                    </a>
                </div>
                <div class="info">
                    <a href="contactUs.php" class="navbar-brand">
                        <h2>ORDER & SUPPORT</h2>
                        <h2><img src="Images/phoneicon.png" class="icon"> 1300145000</h2>
                    </a>
                </div>

            </div>

            <div class="main-nav">
                <ul>
                    <li><a href="ourBrands.php">FRAGRANCES</a></li>
                    <li><a href="ourStory.php">OUR STORY</a></li>
                    <li><a href="contactUs.php">CONTACT US</a></li>

                    <li>
                        <?php //session_start();
                        /*Usually this isset below is not required. But if we prevent direct access to specific URL, 
                        we need to use 'permission.php' with a new session so it will ignore this current session 
                        since this line comes after that session in 'user.php' and 'admin.php'*/
                        /*For that reason, we will only create this session only if there's no existing session before.*/
                        
                        if(!isset($_SESSION)) { 
                            session_start(); //logIn.php should be hidden while the user is logged in (in a session)
                        } 
                    
                        if(isset($_SESSION['username'])&& !empty($_SESSION['username'])){
                            
                            if($_SESSION['username']==='Admin'){ ?> 
                                <a href="admin.php" >
                                    <!-- <?php echo $_SESSION['username'] ?> -->
                                    <?php echo "Profile" ?>
                                </a>
                            <?php }
                            
                            else{ ?>
                                <a href="user.php">
                                        <!-- <?php echo $_SESSION['username'] ?> -->
                                        <?php echo "Profile" ?>
                                </a>
                            <?php } 
                           
                        }
			            else{ ?> 
                            <a href="logIn.php">LOGIN</a>
			            <?php } ?> 

                    </li>

                    <li>
                        <a href="shoppingCart.php"><img src="Images/cart1.png" width="40" height="40" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
    
</body>
</html>