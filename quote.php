<?php
if(isset($_GET["theme"]) && isset($_GET["quote"]))
	{
		$themeId = $_GET["theme"];
		$quoteId = $_GET["quote"];
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

$quoteQuery = "select quote from quotes where quote_id=$quoteId";
$result = $conn->query($quoteQuery);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<h1>QUOTE: ".$row['quote']."</h1>";
	}
}
else {
	echo "<h1>ERROR: No quote</h1>";
}

$table = "select exp_id, experience from experiences where quote_id=$quoteId";
$result = $conn->query($table);
if ($result->num_rows > 0) {
		  echo "<table border = '1'>";
		  echo "<tr>";
		  echo "<th>Experiences</th>";
		  echo "</tr>";
		  while($row = $result->fetch_assoc()) {
					 echo "<tr>";
					 echo "<td>".$row['experience']."</td>";
					 echo "</tr>";
		  }
		  echo "</table>";
}
else {
			echo "<table border = '1'>";
			echo "<tr>";
			echo "<th>Experiences</th>";
			echo "</tr>";
			echo "<tr>";
		  echo "<td>No Results</td>";
			echo "</tr>";
			echo "</table";
}

echo '<br>';
echo '<td><a href = "./theme.php?theme='.$themeId.'">'."Return to Theme".'</a></td>';
echo '<br>';
echo '<a href = "./index.html">'."Return to Homepage".'</a>';

$conn->close();
echo "</body></html>";
?>
