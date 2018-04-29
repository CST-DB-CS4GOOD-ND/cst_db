<html>
<body>
<h1>Experience</h1>
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
$conn->close();
?>

</body>
</html>
