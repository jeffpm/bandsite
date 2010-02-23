<?php
include "dbconnect.php";

?>
<html>
<head>
<title>Account Creation</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">
    <?php include("header.html"); ?>
	<div id="main">	
	
	
	

<?php
//Collect the variables from the form
$username=$_POST["username"];
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
<label for="password">Password:</label>
<input type="password" id="password" name="password" /><br />
<label for="firstname">First name:</label>
<input type="text" id="firstname" name="firstname" /><br />
<label for="lastname">Last name:</label>
<input type="text" id="lastname" name="lastname" /><br />
<label for="email">Email:</label>
<input type="text" id="email" name="email" /><br />
<input type="submit" value="submit" name="submit">
</form>
<?php
}
else {

//if one of the fields was blank, show the form again
	if (empty($username)|| empty($firstname)|| empty($lastname)|| empty ($password)|| empty($email)){
		?>
	<form method="post" action="<?php echo $PHP_SELF;?>">

	<?php
		//display error message for username field
	echo "<label for=\"username\">Username:</label>";
	if(empty($username)){
	echo "<input type=\"text\" id=\"username\" name=\"username\" />Enter a username<br />";
	}
	else{
	echo "<input type=\"text\" id=\"username\" name=\"username\" value=\"$username\" /><br />";
	}

		//display error message for password field
	echo "<label for=\"password\">Password:</label>";
	echo "<input type=\"text\" id=\"password\" name=\"password\" />Enter a password<br />";

		//display error message for first name field
	echo "<label for=\"firstname\">First name:</label>";
	if (empty($firstname)){
		echo "<input type=\"text\" id=\"firstname\" name=\"firstname\" />Enter a first name<br />";
	}
	else{
	echo "<input type=\"text\" id=\"firstname\" name=\"firstname\" value=\"$firstname\" /><br />";
         }

		//display error message for last name field
	echo "<label for=\"lastname\">Last name:</label>";
	if (empty($lastname)){
		echo "<input type=\"text\" id=\"lastname\" name=\"lastname\" />Enter a last name<br />";
	}
	else{
	echo "<input type=\"text\" id=\"lastname\" name=\"lastname\" value=\"$lastname\" /><br />";
	}

		//display error messager for email field
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
	//if everything was filled in correctly, add the entry to the database
else
	{
	$query="INSERT INTO accounts(username, password, firstname, lastname, email) VALUES ('$username', '$password', '$firstname', '$lastname', '$email')";
	$result = mysqli_query($db, $query)
		or die("Error querying database");
	echo "Thank you for submitting your form.";
	}
}
?>
	</div>
	
	<div id="footer"><p>Footer here</p></div>
</div>
</body>
</html>