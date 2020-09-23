<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Testing form</h2>
        <form action = "" method="post">
            Enter your mobile: <br>
            <input type ="text" placeholder="Mobile Number" name="CusMobile"><br>
            Name:<br>
            <input type ="text" placeholder="Name" name="CusName"><br>
            <input type="submit" value="Send">
        </form>
        <?php
        //require 'Connect.php';
        //include './vendor/autoload.php';
		require './service/database_connection.php';
        include './service/vendor/autoload.php';
        if(isset($_POST['CusMobile'])&& isset($_POST['CusName'])){
            
            // Your Account SID and Auth Token from twilio.com/console
			$account_sid = 'AC3ade4674ed858c35870efd8a9791cca3';
            $auth_token = '2468ecd6a18aa0819946360af04bd85c';
            $twilio_number = "+12029534948";
            

            $AdminNumber ="+61481272472";
            
            $Message = 'Customer number: '.$_POST['CusMobile'].'.'.' Customer Name: '.$_POST['CusName'];
            
            $client = new Twilio\Rest\Client($account_sid, $auth_token);
            $client->messages->create(
                    $AdminNumber, 
                        array(
                              'from' => $twilio_number,
                              'body' => $Message
                             )
                    );
          
            
            //Insert record into DB
            $sql = "insert into orderlist (CusName, CusMobile) values ('".$_POST['CusName']."','".$_POST['CusMobile']."')";
            $result = mysqli_query($conn, $sql);
        }
        ?>
    </body>
</html>
