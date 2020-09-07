<html>
<head><link href="CSS/myStyle.css" rel="stylesheet" type="text/css"></head>
<body>
    <footer class="footer">
        <div class="container-fluid">
            <div class="about-us">
                <h5>ABOUT US</h5>
                <a href="ourStory.php"> ABOUT US</a><br>
                <a href="contactUs.php"> CONTACT US</a><br>
                <a href="faqs.php"> FAQs</a>
            </div>
            <div class="fragrance">
                <h5>FRAGRANCES</h5>
                <a href="ourBrands.php">BROWSE OUR PERFUME</a><br>
                <a href="aboutPerfume.php">ALL ABOUT PERFUMES</a>
            </div>
            <center><div class="myAccount">
                <h5>MY ACCOUNT</h5>
                <?php
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
                            <a href="logIn.php">LOGIN/REGISTER</a>
			    <?php } ?> 

                
                
            </div></center>
        </div>

        <center>
            <div class="social-icon">
                <img src="Images/fb.png" class="icon" alt="" />
                <img src="Images/insta.png" class="icon" alt="" />
                <img src="Images/twitter.png" class="icon" alt="" />
                <img src="Images/email.png" class="icon" alt="" />
            </div>
        </center>

        <div class="copyright">
            <p class="">©2019-20 | All rights reserved | Design by GROUP10</p>
        </div>
    </footer>
</body>
</html>