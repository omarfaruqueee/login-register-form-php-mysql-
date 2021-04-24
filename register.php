<?php 
	 
	 // Database connection

	if(file_exists('connnect.php')){
		require_once('connnect.php');
	}
	// Register form submit

	if(isset($_POST['register'])) {

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$error = array();
		if($username == NULL){
			$error['username'] = 'Username missing';
		}
		if($email == NULL){
			$error['email'] = 'email missing';
		}
		if($password == NULL){
			$error['password'] = 'password missing';
		}
		elseif(strlen($password) <= 7){
			$error['password'] = 'Password requires minimum 7 charcter';
		}

		if(count($error) == 0){

			mysqli_query($connection, "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')");
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>User registration</title>
</head>
<body>

	<!-- Register form -->

	<div class="form">
	<form border="1 px solid black" action="" method="POST">
		<input type="text" name="username" placeholder="Full name"><br>
		<div class="error"><?php if(isset($error['username'])) {echo $error['username']; } ?></div>
		<input type="email" name="email" placeholder="email"><br>
		<div class="error"><?php if(isset($error['email'])) {echo $error['email']; } ?></div>
		<input type="password" name="password" placeholder="Password"><br>
		<div class="error"><?php if(isset($error['password'])) {echo $error['password']; } ?></div>
		<input type="submit" name="register" value="Register">
	</form>
	<div class="exists">
		<h3>If you already registered. please <a href="login.php">Login</a></h3>
	</div>
	</div>
</body>
</html>