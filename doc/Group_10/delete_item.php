<?php

//to delete the item 

    require('db_connect.php');
    $conn = db_connect();

    $query = $conn -> prepare("DELETE FROM items WHERE item_id=?"); //delete the item by its id
    $query -> bind_param("i", $_POST['id']);
    $result = $query -> execute();

    if($result){
        echo "<script type='text/javascript'>alert('Item is deleted');window.location='admin.php';</script>"; 
       // header("Location: http://{$_SERVER['HTTP_HOST']}/Group10_A2/admin.php");
    }
    

?>