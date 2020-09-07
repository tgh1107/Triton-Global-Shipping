<?php

//to delete the item by row
    $item_name = $_GET['name'];

    require('db_connect.php');
    $conn = db_connect();

    $query = $conn -> prepare("DELETE FROM temp_items WHERE name=?");
    $query -> bind_param("s", $item_name);
    $query -> execute();

    //close the connection after output data
    mysqli_close($conn);

    header("location: http://{$_SERVER['HTTP_HOST']}/jc561664/Group_10/shoppingCart.php");

?>