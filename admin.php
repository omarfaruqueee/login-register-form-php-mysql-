<?php 
	include('function.php');

	if(!logged_in()){
		header('location: login.php');
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin panel</title>
</head>
<body>
	<h3 class="form error">Welcome to admin panel</h3>
</body>
</html>