<?php
	$servername = "localhost";
	$username = "root";
	$password = "eric";
	$dbname = "cst_db";
	$conn = new mysqli($servername, $username, $password,
		$dbname);
	if ($conn->connect_error) {
		die("Connection Failed: ".$conn->connect_error);
	}
	echo "Connected Successfully";
?>

<html>
	<body>
		<br>Theme id: <?php $theme_id = $_POST["theme"]; echo $theme_id; ?>
		<br>Quote: <?php $quote = $_POST["quote"]; echo $quote; ?>
		<br>

<?php
	$max_id = "select max(id) from quotes";
	$result = $conn->query($max_id);
	$id = $result->fetch_assoc();
	$id = $id["max(id)"] + 1;

	$insert = "insert into quotes(id, quote)
		values ($id, '$quote')";
	if ($conn->query($insert) === TRUE) {
		echo "New record added:";
	}
	else {
		echo "Error: ".$insert."<br>".$conn->error;
	}

	$table = "select * from quotes";
	$result = $conn->query($table);
	if ($result->num_rows > 0) {
		echo "<table border = '1'>";
		echo "<tr>";
		echo "<th>id</th>";
		echo "<th>quote</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["quote"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else {
		echo "No Results";
	}

//	$max_id = "select max(id) from test_demo";
//	$result = $conn->query($max_id);
//	$id = $result->fetch_assoc();
//	$id = $id["max(id)"] + 1;

	$insert = "insert into theme_quote(theme_id, id)
		values ($theme_id, $id)";
	if ($conn->query($insert) === TRUE) {
		echo "New record added:";
	}
	else {
		echo "Error: ".$insert."<br>".$conn->error;
	}

	$table = "select * from theme_quote";
	$result = $conn->query($table);
	if ($result->num_rows > 0) {
		echo "<table border = '1'>";
		echo "<tr>";
		echo "<th>theme_id</th>";
		echo "<th>quote_id</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$row["theme_id"]."</td>";
			echo "<td>".$row["quote_id"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else {
		echo "No Results";
	}
	$conn->close();
?>

	</body>
</html>
