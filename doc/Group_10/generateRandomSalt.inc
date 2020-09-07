<?php
    function generateSalt(){
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chars_length = strlen($chars);
        $salt_length = 13;
        $random_character = '';
        $salt = '';
        for($i = 0; $i < $salt_length; $i++) {
            $random_character = $chars[rand(0, $chars_length - 1)];
            $salt .= $random_character;
        }
 
    return $salt;
    }
?>