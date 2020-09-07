<?php 
    //Connect to DB
    require('db_connect.php');
    $conn = db_connect();

    //Preventing user input data from SQL Injectin
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $bday = mysqli_real_escape_string($conn, $_POST['bday']);
    
    /*echo "escape: $bday <br>htmlentities: $rawdate";*/
    $date = date('Y-m-d', strtotime($bday)); //to change the date format to yyyy-mm-dd
    //echo "$date";
    $salt = '';
    
    if(htmlentities($_POST['username'])=='admin'){
	    echo "<script type='text/javascript'>alert('Name cannot be admin');window.history.back();
	    </script>";
    }
    else{
        
       /*to prevent users having the same username*/
		$query = $conn->prepare("SELECT * FROM users WHERE name = ?");
	    $query->bind_param("s",$username);
	    $query->execute();
	    $result = $query->get_result();
	    if($result->num_rows > 0){
            echo "<script type='text/javascript'>alert('This username already exists');window.history.back();
            </script>";
         }
        else{
            //inserting user data into data with prepare statement to prevent SQL injection, also use SHA2 for hashed passwords
            include('generateRandomSalt.inc');
            $salt = generateSalt();
            $prepare = $conn -> prepare("insert into users(dob, name, email_id, salt, password, address, gender, phone_no) 
            values (?, ?, ?, ?, sha2(concat(?,?), 0), ?, ?, ?)");
            //INSERT INTO admins (username, salt, password) VALUES ('Wayne', '4b3403665fea6', SHA2(CONCAT('Secret!', '4b3403665fea6'), 0))
            $prepare->bind_param("sssssssss", $date, $username, $email, $salt, $password, $salt, $address, $gender, $phone);
            $result = $prepare->execute();
            /*echo "insert success";*/
            session_start();
            $_SESSION['isUser'] = true;
            $_SESSION['username']=htmlentities($_POST['username']);
            echo "<script type='text/javascript'>alert('Successful Registration');
                window.location.href = 'index.php';
            </script>";
        }
    }
?>