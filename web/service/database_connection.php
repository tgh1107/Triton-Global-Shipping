<?php
$db = array (
  'server' => 'localhost',
  'username' => 'root',
  'password' =>  '',
  'dbname' => 'ict2020'
);

$conn = mysqli_connect($db['server'], $db['username'], $db['password'], $db['dbname']);

//check error
if (!$conn) {
    (die('error' . mysqli_connect_error($conn)));
}

