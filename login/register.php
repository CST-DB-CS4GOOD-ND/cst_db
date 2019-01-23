<?php
	session_start();
	if($_POST['submit']){
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		$db = mysqli_connect("localhost", "root", "eric", "cst_db") or die ("Failed to connect");
		$query = "SELECT max(id) from users";
		$id_num = mysqli_query($db,$query);
		$id_num = $id_num + 1;
		$query = "INSERT INTO users(id,username,password) VALUES($id_num, '$username', '$password')";
		$result = mysqli_query($db,$query);
		if($result) {
			echo "Succesfully registered";
			header('Location: user.php');
		}
		else {
			echo "Failed to register";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
<h1>Register</h1>
<form method="post" action="register.php">
	<input type="text" name = "username" placeholder="Enter username">
	<input type="password" name="password" placeholder="Enter password here">
	<input type="submit" name="submit" value="Register">
</form>
<a href = "user.php" >Return to user page</a>

</body>
</html>
