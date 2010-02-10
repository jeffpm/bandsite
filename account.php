<html>
<head>
<title>Account Creation</title>
</head>
<body>
<?php
//Collect the variables from the form
$username = $_POST["username"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$password = $_POST["password"];
$email = $_POST["email"];

//If the submit button wasn't pressed, show the form
if (!isset($_POST['submit'])) {
?>
<form method="post" action="<?php echo $PHP_SELF;?>">
<label for="username">Username:</label>
<input type="text" id="username" name="username" /><br />
<label for="firstname">First name:</label>
<input type="text" id="firstname" name="firstname" /><br />
<label for="lastname">Last name:</label>
<input type="text" id="lastname" name="lastname" /><br />
<label for="password">Password:</label>
<input type="password" id="password" name="password" /><br />
<label for="email">Email:</label>
<input type="text" id="email" name="email" /><br />
<input type="submit" value="submit" name="submit">
</form>
<?php
}
else {

	if (empty($username)|| empty($firstname)|| empty($lastname)|| empty ($password)|| empty($email)){
		?>
		
	
	<form method="post" action="<?php echo $PHP_SELF;?>">

	<?php
	echo "<label for=\"username\">Username:</label>";
	if(empty($username)){
	echo "<input type=\"text\" id=\"username\" name=\"username\" />Enter a username<br />";
	}
	else{
	echo "<input type=\"text\" id=\"username\" name=\"username\" value=\"$username\" /><br />";
	}

	echo "<label for=\"firstname\">First name:</label>";
	if (empty($firstname)){
		echo "<input type=\"text\" id=\"firstname\" name=\"firstname\" />Enter a first name<br />";
	}
	else{
	echo "<input type=\"text\" id=\"firstname\" name=\"firstname\" value=\"$firstname\" /><br />";
	}

	echo "<label for=\"lastname\">Last name:</label>";
	if (empty($lastname)){
		echo "<input type=\"text\" id=\"lastname\" name=\"lastname\" />Enter a last name<br />";
	}
	else{
	echo "<input type=\"text\" id=\"lastname\" name=\"lastname\" value=\"$lastname\" /><br />";
	}

	echo "<label for=\"password\">Password:</label>";
	echo "<input type=\"text\" id=\"password\" name=\"password\" />Enter a password<br />";

	echo "<label for=\"email\">Last name:</label>";
	if (empty($email)){
		echo "<input type=\"text\" id=\"email\" name=\"email\" />Enter an email<br />";
	}
	else{
	echo "<input type=\"text\" id=\"email\" name=\"email\" value=\"$email\" /><br />";
	}
	echo "<input type=\"submit\" value=\"submit\" name=\"submit\">";
	echo "</form>";
	}
else
	{
	echo "Thank you for submitting your form.";
	}
}
?>
</body>
</html>