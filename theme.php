<?php
if(isset($_GET["theme"]))
	{
		$themeId = $_GET["theme"];
	}

$servername = "localhost";
$username = "root";
$password = "eric";
$dbname = "cst_db";
$conn = new mysqli($servername, $username, $password,
					 $dbname);
if ($conn->connect_error) {
		  die("Connection Failed: ".$conn->connect_error);
}
echo "<html><body>";

$themeQuery = "select theme from themes where theme_id=$themeId";
$result = $conn->query($themeQuery);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<h1>".$row['theme']."</h1>";
	}
}
else {
	echo "<h1>ERROR: No theme</h1>";
}

$table = "select quote_id, quote from quotes where theme_id=$themeId";
$result = $conn->query($table);
if ($result->num_rows > 0) {
		  echo "<table border = '1'>";
		  echo "<tr>";
		  echo "<th>Quotes</th>";
		  echo "</tr>";
		  while($row = $result->fetch_assoc()) {
					 echo "<tr>";
					echo '<td><a href = "./quote.php?theme='.$themeId.'&quote='.$row['quote_id'].'">'.$row['quote'].'</a></td>';
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

$conn->close();
echo "</body></html>";
?>
