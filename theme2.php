<html>
<body>
<h1>Call to Fam, Community, and Participation</h1>
<p>Student responses</p>

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

$table = "select * from test_demo where sent='Family'";
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
