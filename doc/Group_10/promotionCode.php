<?php

//to display the special offer (promotional code) to the user
    require('db_connect.php');
    $conn = db_connect();

    $query = $conn -> prepare("SELECT * FROM users WHERE name=?");
    echo $conn->error;
    $query -> bind_param("s", $_SESSION['username']);

    $result = $query -> execute();
    $result = $query -> get_result();
    if($result -> num_rows > 0){
		$row =$result -> fetch_assoc();
	
        if($row['coupon_code'] != null){
            echo $row['coupon_code'];
            echo "<br>";
        }
        else{
            echo "<b>Sorry ! You don't have a valid code at the moment</b><br><br>";
        }
    }
?>