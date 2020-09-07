<?php

//to update the existing item

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
    $id = $_POST['id'];

    $query1 = $conn -> prepare("UPDATE items SET item_name=? WHERE item_id=?");
    $query2 = $conn -> prepare("UPDATE items SET item_description=? WHERE item_id=?");
    $query3 = $conn -> prepare("UPDATE items SET item_price=? WHERE item_id=?");
    $query4 = $conn -> prepare("UPDATE items SET item_brand=? WHERE item_id=?");
    $query5 = $conn -> prepare("UPDATE items SET item_picture=? WHERE item_id=?");
    $query6 = $conn -> prepare("UPDATE items SET gender=? WHERE item_id=?");
    $query7 = $conn -> prepare("UPDATE items SET item_launch_year=? WHERE item_id=?");
    $query8 = $conn -> prepare("UPDATE items SET item_size=? WHERE item_id=?");
    $query9 = $conn -> prepare("UPDATE items SET item_status=? WHERE item_id=?");
    $query10 = $conn -> prepare("UPDATE items SET gender_status=? WHERE item_id=?");
    
    $query1 -> bind_param("si", $name, $id);
    $result = $query1 -> execute();

    $query2 -> bind_param("si", $desc, $id);
    $result = $query2 -> execute();

    $query3 -> bind_param("di", $price, $id);
    $result = $query3 -> execute();

    $query4 -> bind_param("si", $brand, $id);
    $result = $query4 -> execute();

    $query5 -> bind_param("si", $picture, $id);
    $result = $query5 -> execute();

    $query6 -> bind_param("si", $gender, $id);
    $result = $query6 -> execute();

    $query7 -> bind_param("ii", $year, $id);
    $result = $query7 -> execute();

    $query8 -> bind_param("si", $size, $id);
    $result = $query8 -> execute();

    $query9 -> bind_param("ii", $item_status, $id);
    $result = $query9 -> execute();

    $query10 -> bind_param("ii", $gender_status, $id);
    $result = $query10 -> execute();

    if($result){
        echo "<script type='text/javascript'>alert('Item is updated');window.history.back();
        </script>";
    }

?>