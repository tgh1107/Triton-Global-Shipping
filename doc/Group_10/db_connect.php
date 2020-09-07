<?php
  $conn = "";

  function db_connect(){
    // Create connection
    $conn = new mysqli('localhost', 'jc561664', 'Password664', 'jc561664_ebusinessa2');

    // Check connection
    if($conn -> connect_error){
        die("Connection Failed:".$conn -> connect_error);
    }
    else 
      return $conn;
  }
?>