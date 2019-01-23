<?php
session_start();
if (isset($_SESSION['id'])){
	$userId = $_SESSION['id'];
	$username = $_SESSION['username'];
}
else {
	header('Location: index.php');
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome user</title>
</head>
<body>
<h3>Welcome <?php echo $username; ?>. Your user id is <?php echo $userId; ?> </h3>

<?php
$db = mysqli_connect("localhost", "root", "eric", "cst_db") or die ("Failed to connect");
$table = "SELECT id,username from users";
$result = mysqli_query($db,$table);
if ($result->num_rows > 0) {
		  echo "<table border = '1'>";
		  echo "<tr>";
		  echo "<th colspan='2'>All Users</th>";
		  echo "</tr>";
			echo "<tr><th>id</th><th>username</th></tr>";
		  while($row = $result->fetch_assoc()) {
				echo "<tr>";
		 		echo '<td>'.$row['id'].'</td>'.'<td>'.$row['username'].'</td>';
			//echo '<td><a href = "./quote.php?quote='.$row['quote_id'].'">'.$row['quote'].'</a></td>';
				echo "</tr>";
		  }
		  echo "</table>";
}
else {
			echo "<table border = '1'>";
			echo "<tr>";
			echo "<th>Quotes</th>";
			echo "</tr>";
			echo "<tr>";
		  echo "<td>No Results</td>";
			echo "</tr>";
			echo "</table";
}
?>

<br/>
<a href="register.php" >Register new users</a>
<br/>
<a href="new_entry.php">Create a new entry</a>
<br/>
<a href="edit_entry.php">Edit an existing entry</a>
<br/>
<br/>
<form action="logout.php">
	<input type="submit" name="logout" value="Logout">
</form>

</body>
</html>
