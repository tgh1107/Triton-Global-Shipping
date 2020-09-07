<?php

//to manually delete the code from admin side
    require('db_connect.php');
    $conn = db_connect();

    $value = '';

    $query1 = $conn -> prepare("UPDATE admin SET coupon_code=?"); //removing code from admin table
    //echo $conn -> error;
    $query1 -> bind_param("s", $value);
    $result1 = $query1 -> execute();

    $query2 = $conn -> prepare("UPDATE users SET coupon_code=?"); //removing code from users table
    //echo $conn -> error;
    $query2 -> bind_param("s", $value);
    $result2 = $query2 -> execute();

    if($result1 && $result2){
        echo "<script type='text/javascript'>alert('Successfully Deleted!');window.history.back();
        </script>";
    }

?>