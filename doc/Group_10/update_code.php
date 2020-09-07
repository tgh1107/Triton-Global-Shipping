<?php

//to insert and update coupon-code in admin and users tables

    require('db_connect.php');
    $conn = db_connect();
    $query = $conn -> prepare("UPDATE admin SET coupon_code=?"); //adding code to admin table
    $query -> bind_param("s", $_POST['code']);
    $result = $query -> execute();

    $query2 = $conn -> prepare("UPDATE users SET coupon_code=?"); //adding code to users table for all users
    $query2 -> bind_param("s", $_POST['code']);
    $result2 = $query2  -> execute();

    if($result && $result2){
        echo "<script type='text/javascript'>alert('Success');window.history.back();
        </script>";
    }

?>