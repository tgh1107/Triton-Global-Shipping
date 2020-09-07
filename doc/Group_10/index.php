<!DOCTYPE html>

<html>

<head>
    <title>Pride-In-Perfume</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="CSS/myStyle.css" rel="stylesheet" type="text/css">
    <script src="JS/myJS.js" type="text/javascript"></script>
</head>

<body>
    <!-- header: logo and navigation-menu -->
    <?php 
    include('header.php'); 
    ?>
    <!-- end header -->
    
    <!-- start main body content -->
    <main>

        <div class="slideshow-container">

            <div class="mySlides">
                <img src="Images/img/pic1.jpg" style="width:100%">
            </div>
            <div class="mySlides">
                <img src="Images/img/pic2.jpg" style="width:100%">
            </div>
            <div class="mySlides">
                <img src="Images/img/pic3.jpg" style="width:100%">
            </div>
        </div>
        <script>
            var slideIndex = 0;
            showSlides(slideIndex);
        </script>

        <div class="newRelease">
            <div class="section-inner">
                
                <div class="col1">
                    <img src="Images/newRelease1.jpg" style="width:80%">
                    <div class="shop"><a href="ourBrands.php">SEE MORE</a></div>
                </div>

                <div class="col2">
                    <img src="data/2 Gucci Guilty Love Edition Pour Femme.jpg" style="width:80%">
                        <div class="text">
                            <p><b>Price- $127 (For Women)</b></p>
                            <p>Gucci Guilty Love Edition Pour (90ml)</p>
                    
                    </div>
                </div>

                <div class="col2">
                    <img src="data/3 A kiss from Violet.jpg" style="width:80%">
                        <div class="text">
                            <p><b>Price- $420 (For Women)</b></p>
                            <p>A kiss from violet (20ml)</p>
                    
                    </div>
                </div>

                <div class="col2">
                    <img src="data/6 Gucci Guilty Oud.jpg" style="width:80%">
                        <div class="text">
                            <p><b>Price- $160 (For Men)</b></p>
                            <p>Gucci Guilty Oud (90ml)</p>
                    
                    </div>
                </div>

                <div class="col2">
                     <img src="data/7 The voice of the snake, Oud.jpg" style="width:80%">
                        <div class="text">
                            <p><b>Price- $370 (For Men)</b></p>
                            <p>The voice of the Snake (100ml)</p>
                    
                    </div>
                </div>

            </div>
        </div>
        

        <div class="newRelease"> 
        <!-- "Best-Seller" section: class = "newRelease", since we are going to use the same css style for best-seller as of "newRelease" -->
            <div class="section-inner">
                
                <div class="col1">
                    <img src="Images/bestSeller.jpg" style="width:80%">
                    <div class="shop"><a href="ourBrands.php">SEE MORE</a></div>
                </div>

                <div class="col2">
                    <img src="data/2 Gucci Guilty Love Edition Pour Femme.jpg" style="width:80%">
                        <div class="text">
                            <p><b>Price- $127 (For Women)</b></p>
                            <p>Gucci Guilty Love Edition Pour (90ml)</p>
                    
                    </div>
                </div>

                <div class="col2">
                    <img src="data/3 A kiss from Violet.jpg" style="width:80%">
                        <div class="text">
                            <p><b>Price- $420 (For Women)</b></p>
                            <p>A kiss from violet (20ml)</p>
                    
                    </div>
                </div>

                <div class="col2">
                    <img src="data/6 Gucci Guilty Oud.jpg" style="width:80%">
                        <div class="text">
                            <p><b>Price- $160 (For Men)</b></p>
                            <p>Gucci Guilty Oud (90ml)</p>
                    
                    </div>
                </div>

                <div class="col2">
                    <img src="data/7 The voice of the snake, Oud.jpg" style="width:80%">
                        <div class="text">
                            <p><b>Price- $370 (For Men)</b></p>
                            <p>The voice of the Snake (100ml)</p>
                    
                    </div>
                </div>

            </div>
        </div>

    </main>
    <!-- end main -->

    <!-- footer start -->
    <?php include('footer.inc'); ?>
    <!-- end of footer -->

</body>
</html>