<?php 
	include('function.php');
	if(file_exists('connnect.php')){
		require_once('connnect.php');
	}
	if(logged_in()){
		header('location: admin.php');
	}
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$error = array();
		if($email == NULL){
			$error['email'] = 'Please insert your email address';
		}
		if($password == NULL){
			$error['password'] = 'Your password is missing';
		}

		$query = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");

		if(mysqli_num_rows($query) == 1){

			$password_query = mysqli_query($connection, "SELECT password FROM users WHERE email = '$email'");

			$row = mysqli_fetch_assoc($password_query);

			if($password == $row['password'] ){

				$_SESSION['success'] = '';

				header('location: admin.php');
			} else {

				'Your password is wrong';
			}

		} else {
			echo 'Your email address does not exists in our database';
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Login</title>
</head>
<body>
	<div class="form">
	<form action="" method="POST">
		<input type="text" name="email" placeholder="Your email address"><br>
		<div class="error"> <?php if(isset($error['email'])) { echo $error['email']; } ?></div> 
		<input type="password" name="password" placeholder="Your password"> <br>
		<div class="error"><?php if(isset($error['password'])) {echo $error['password'];} ?></div> 
		<input type="submit" name="login" value="Login">
	</form>
	</div>
</body>
</html>