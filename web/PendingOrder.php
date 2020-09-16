<?php
session_start();

//Checking if user logged in or not
if (!isset($_SESSION['username'])) {
	 header('Location: Login.php');
}
?>
<?php
//Connect
require './service/database_connection.php';

//Sql statement
$sql = "SELECT 
            *
        FROM 
            orderlist
        where OrderTrack = 0";
$result = mysqli_query($conn, $sql);

//check error
if (!$result){
    die('error'.mysqli_error($conn));
}
?>

<html>
    <head>
        <meta charset="utf8"
    </head>
    <body>
        <h4>
            Pending orders<br>
            <?php 
                echo "Date of report: ".date("Y/m/d");
            ?>
        </h4>
        <table border="1">
            <thread>
                <tr style="font-weight:bold">
                    <td>Order_id</</td>
                    <td>Customer Name</td>
                    <td>Customer Mobile Number</td>
                </tr>
            </thread>
            <tbody>
                <?php
                if (mysqli_num_rows($result)>0){
                    while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['OrderID']?></td>
                        <td><?php echo $row['CusName']?></td>
                        <td><?php echo $row['CusMobile']?></td>
                        <?php

                        
                    };
                        ?>
                    </tr>
                    <?php
                    
                }
                ?>
            </tbody>
        </table>
        <form method="post">
            Select order to confirm <br>
            <input type ="number" name="update"><br>
            <input type="submit" value="confirm" name="abc">
            
            <?php
            require './service/database_connection.php';
            if(isset($_POST['abc'])){
                $update = $_POST['update'];
                    $sql1= "UPDATE `orderlist` SET `OrderTrack`= '1' WHERE OrderID = '$update'";
                    $result1 = mysqli_query($conn, $sql1);
                header("Location: PendingOrder.php");
            }
            ?>
            
        </form>
        <a href="Logout.php"> logout</a>
    </body>
</html>

