<html>
<head>
	<title>New Entry</title>
</head>
<body>
<h1>New Entry</h1>
<form method="post" action="new_entry.php">
</br>
Theme:
	<select name="theme">
		<option value="1">Life and Dignity of the Human Person</option>
		<option value="2">Call to Family, Community, and Participation</option>
		<option value="3">Rights and Responsibility</option>
		<option value="4">Option for the Poor and Vulnerable</option>
		<option value="5">The Dignity of Work and Rights of Workers</option>
		<option value="6">Solidarity</option>
		<option value="7">Care for God's Creation</option>
	</select>
</br>
Quote:
	<input list="quotes">
	<datalist id="quotes">
		<option value="Test"></option>
	</datalist>
</br>
Include a student experience?
	<input type="radio" name="experience_bool" value="1">Yes<br>
Experience:
</br>
	<textarea name="experience" rows="10" cols="100"></textarea>
</br>
</br>
	<input type="submit" name="submit" value="Submit">
</form>
</br>
<a href = "user.php" >Return to user page</a>


</body>
</html>
