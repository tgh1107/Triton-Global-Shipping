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
        require 'Connect.php';
        include './vendor/autoload.php';
        if(isset($_POST['CusMobile'])&& isset($_POST['CusName'])){
            
            // Your Account SID and Auth Token from twilio.com/console
            $account_sid = 'AC7584d3fb35316261a0fb7bfcd23f7522';
            $auth_token = '5e3b921a565b986295d1f7e57846708f';
            $twilio_number = "+19179094650";
            
            $AdminNumber ="+61410372707";
            
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
