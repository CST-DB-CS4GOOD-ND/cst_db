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
		<br>Sentence: <?php $sent = $_POST["sent"]; echo $sent; ?>
		<br>Passage: <?php $pass = $_POST["pass"]; echo $pass; ?>
		<br>

<?php
	$max_id = "select max(id) from test_demo";
	$result = $conn->query($max_id);
	$id = $result->fetch_assoc();
	$id = $id["max(id)"] + 1;

	$insert = "insert into test_demo(id, sent, pass)
		values ($id, '$sent', '$pass')";
	if ($conn->query($insert) === TRUE) {
		echo "New record added:";
	}
	else {
		echo "Error: ".$insert."<br>".$conn->error;
	}

	$table = "select * from test_demo";
	$result = $conn->query($table);
	if ($result->num_rows > 0) {
		echo "<table border = '1'>";
		echo "<tr>";
		echo "<th>id</th>";
		echo "<th>sentence</th>";
		echo "<th>passage</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["sent"]."</td>";
			echo "<td>".$row["pass"]."</td>";
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
