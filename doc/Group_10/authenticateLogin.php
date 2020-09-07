<?php
    
    if (isset($_POST['username']) and isset($_POST['password'])){
        session_start();
            require('db_connect.php');
            $conn = db_connect();
            
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($_POST['username'] =='Admin'){
                $query = $conn->prepare("SELECT * FROM admin WHERE name = ? AND password = SHA2(CONCAT(?, salt), 0)");
            }
            else{
                $query = $conn->prepare("SELECT * FROM users WHERE name = ? AND password = SHA2(CONCAT(?, salt), 0)");
            }

            $query->bind_param("ss",$username,$password);
            $query->execute();
                
            $result = $query->get_result();
            $count = $result->num_rows; echo $count;

            if($result->num_rows > 0){
                //session_start();
                $_SESSION['isUser'] = true;
                $_SESSION['username'] = $username;
                if($username == 'Admin'){
                    //echo "<script type='text/javascript'>alert('Login Credentials verified');window.location='admin.php';</script>";
                    header("Location: http://{$_SERVER['HTTP_HOST']}/jc561664/Group_10/admin.php"); //if admin
                }
                else{
                    
                    //echo "<script type='text/javascript'>alert('Login Credentials verified');window.location='user.php';</script>";
                    header("Location: http://{$_SERVER['HTTP_HOST']}/jc561664/Group_10/user.php"); //if user
                }
            }else{
                echo "<script type='text/javascript'>alert('Invalid Login Credentials');window.history.back();</script>";
            }
           
    } 
        
    //else echo '<script type="text/javascript">alert("You must login first");window.history.back();</script>';

?>