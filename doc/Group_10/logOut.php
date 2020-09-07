<?php

session_start();
// remove all session variables
session_unset();
/*// remove isUser section
unset($_SESSION['isUser']);
*/
// destroy the session
session_destroy();

include 'delete_tempItems.php'; //delete temp_items table for cart

?>