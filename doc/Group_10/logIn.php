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
        
        <div id="login">
        <!-- log in form -->
            <div class="form_class1">
                <h4>Already signed up? Log in below:</h4>
                <form name="form1" class="form-inline" method="post" action="authenticateLogin.php" >
                    <label for="username">User Name:</label>
                    <input type="text" id="username" placeholder="Please enter your name" name="username" required >
                    <label for="password">Password:</label>
                    <input type="password" id="password" placeholder="Please enter password" name="password" required >
                    <input type="submit" name="login" value="OK" >
                </form> 
            </div>	
     
        <!-- registration form -->
            <div class="form_class2">
                <h4>Sign Up</h4>
                <form name="form2" class="form-inline" action="storeUserData.php" method="post">
                    <table>
                        <tr><th><label for="username">User Name:</label></th>
                            <th><input type="text" id="username" placeholder="Please enter your name." name="username" required ></th>
                        </tr>
                        <tr><th><label for="password">Password:</label></th>
                            <th><input type="password" id="password" placeholder="Please enter a password." name="password" required ></th>
                        </tr>
                        <tr><th><label for="email">Email:</label></th>
                            <th><input type="text" id="email" placeholder="eg:abc@gmail.com" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" required ></th>
                        </tr>
                        <tr><th><label for="phone">Phone: </th>
                            <th><input type="text" id="phone" placeholder="eg:123 000 000" name="phone" pattern="[0-9]{3} [0-9]{3} [0-9]{3}" required ></th>
                         </tr>
                        <tr><th><label for="address">Address: </th>
                            <th><input type="text" id="address" placeholder="Please type your address." name="address" required ></th>
                        </tr>
                        <tr><th><label for="bday">Birthday: </th>
                            <th><input type="date" id="bday" name="bday" required ></th>
                        </tr>
                        <tr><th><label>Gender: </th>
                            <th><input type="radio" id="genderMale" name="gender" value="male" required >Male
                                <input type="radio" id="genderFemale" name="gender" value="female">Female	
                            </th>
                        </tr>
                        <tr>
                            <th></th><th><input type="reset" value="Cancel"><input type="submit" value="Submit"></th>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </main>
    <!-- end main -->

    <!-- footer start -->
    <?php include('footer.inc'); ?>
    <!-- end of footer -->



</body>

</html>