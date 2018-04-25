<html>
<body>
<h1>Call</h1>
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

$table = "select quote_id, quote from quotes where theme_id=1";
$result = $conn->query($table);
if ($result->num_rows > 0) {
		  echo "<table border = '2'>";
		  echo "<tr>";
		  echo "<th>quote_id</th>";
		  echo "<th>quote</th>";
		  echo "</tr>";
		  while($row = $result->fetch_assoc()) {
					 echo "<tr>";
					 echo "<td>".$row["quote_id"]."</td>";
					 echo "<td>".$row["quote"]."</td>";
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
