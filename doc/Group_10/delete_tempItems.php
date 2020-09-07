<?php
//delete everything from temp_items table

    require('db_connect.php');
    $conn = db_connect();
    $query = $conn -> prepare("DELETE FROM temp_items");
    $query -> execute();
    
    //close the connection after output data
    mysqli_close($conn);

    //go back to home page
    header("location: http://{$_SERVER['HTTP_HOST']}/jc561664/Group_10/index.php");
?>