<?php

//to add the new item

    require('db_connect.php');
    $conn = db_connect();

    $name = $_POST['name']; 
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];
    $picture = $_POST['pic'];
    $gender = $_POST['gender'];
    $year = $_POST['year'];
    $size = $_POST['size'];
    $item_status = $_POST['item_status'];
    $gender_status = $_POST['gender_status'];

    $query = $conn -> prepare("INSERT INTO items(item_name, item_description, item_price, item_brand, 
        item_picture, gender, item_launch_year, item_size, item_status, gender_status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); //add the item
    $query -> bind_param("ssdsssisii", $name, $desc, $price, $brand, $picture, $gender, $year, $size, $item_status, $gender_status);
    $result = $query -> execute();

    if($result){
        echo "<script type='text/javascript'>alert('Item is added');window.history.back();
        </script>";
    }

?>