<?php
session_start();
?>

<?php
require 'service/database_connection.php';
	if (isset($_POST["btn_submit"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
                //protect from sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			echo "username or password can not be blank";
		}else{
			$sql = "select * from users where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "Wrong username or password";
			}else{
				$_SESSION['username'] = $username;
                header('Location: PendingOrder.php');
			}
		}
	}
?>
<html>
<head>
	<title>Login page</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="login.php">
	<fieldset>
	    <legend>Please fill in your credentials to login</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input type="submit" name="btn_submit" value="login"></td>
	    		</tr>
	    	</table>
  </fieldset>
  </form>
</body>
</html>