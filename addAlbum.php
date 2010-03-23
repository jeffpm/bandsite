<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
include "dbconnect.php";
?>

<head>
<title>Account Creation</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">
    <?php
	if(isset($_SESSION['userid'])){
		//if(session_is_registered(myusername)){
			include("headerUser.html");
		} else {
			include("headerGuest.html");
		}
	?>
	<div id="main">	
	
	
	

<?php
$bandid = $_GET['bandid'];

//Collect the variables from the form 
$albumame = mysqli_real_escape_string($db, trim($_POST["albumname"]));
$albumband = mysqli_real_escape_string($db, trim($_POST["albumband"]));
$albumgenre = mysqli_real_escape_string($db, trim($_POST["albumgenre"]));
$albumyear = mysqli_real_escape_string($db, trim($_POST["albumyear"]));
//$email = mysqli_real_escape_string($db, trim($_POST["email"])); (picture look at edit.php)

//If the submit button wasn't pressed, show the form
if (!isset($_POST['submit'])) {
?>
<table cellpadding="5" cellspacing="10">
<form method="post" action="<?php echo $PHP_SELF;?>">
<tr>
	<th rowspan="7"><img src="images/redDesign.gif"></th>
</tr>
<tr>
	<td align="right">
		
		<label for="albumname">Album Name:</label>
		<input type="text" id="albumname" name="albumname" /><br />
	</td>
</tr>
<tr>
	<td align="right">
		<label for="albumyear">Album Year:</label>
		<input type="text" id="albumyear" name="albumyear" /><br />
	</td>
</tr>
<tr>
	<td align="right">
		<label for="albumgenre">Album Genre:</label>
		<input type="text" id="albumgenre" name="albumgenre" /><br />
	</td>
</tr>
<tr>
	<td align="right">
		<label for="lastname">Last name:</label>
		<input type="text" id="lastname" name="lastname" /><br />
	</td>
</tr>
<tr>
	<td align="right">
		<label for="email">Email:</label>
		<input type="text" id="email" name="email" /><br />
	</td>
</tr>
<tr>
	<td align="right">
		<input type="submit" value="submit" name="submit">
		</form>
	</td>
</tr>
</table>
<?php
}
else {

//if one of the fields was blank, show the form again
	if (empty($username)|| empty($firstname)|| empty($lastname)|| empty ($password)|| empty($email)){
		?>
	<table cellpadding="5" cellspacing="10">
	<tr>
		<th rowspan="7"><img src="images/redDesign.gif"></th>
	</tr>
	<form method="post" action="<?php echo $PHP_SELF;?>">
	<tr>
		<td>
	<?php
		//display error message for username field
	echo "<label for=\"username\">Username:</label>";
	if(empty($username)){
	echo "<input type=\"text\" id=\"username\" name=\"username\" /> Enter a username";
	}
	else{
	echo "<input type=\"text\" id=\"username\" name=\"username\" value=\"$username\" />";
	}
	?>
		</td>
	</tr>
	<tr>
		<td>
	<?php
		//display error message for password field
	echo "<label for=\"password\">Password:</label>";
	echo "<input type=\"password\" id=\"password\" name=\"password\" /> Enter a password";
	?>
		</td>	
	</tr>
	<tr>
		<td>
	<?php
		//display error message for first name field
	echo "<label for=\"firstname\">First name:</label>";
	if (empty($firstname)){
		echo "<input type=\"text\" id=\"firstname\" name=\"firstname\" /> Enter a first name";
	}
	else{
	echo "<input type=\"text\" id=\"firstname\" name=\"firstname\" value=\"$firstname\" />";
         }
	?>
		</td>
	</tr>
	<tr>
		<td>
	<?php
		//display error message for last name field
	echo "<label for=\"lastname\">Last name:</label>";
	if (empty($lastname)){
		echo "<input type=\"text\" id=\"lastname\" name=\"lastname\" /> Enter a last name";
	}
	else{
	echo "<input type=\"text\" id=\"lastname\" name=\"lastname\" value=\"$lastname\" />";
	}
	?>
		</td>
	</tr>
	<tr>
		<td >
	<?php
		//display error messager for email field
	echo "<label for=\"email\">Email:</label>";
	if (empty($email)){
		echo "<input type=\"text\" id=\"email\" name=\"email\" /> Enter an email";
	}
	else{
	echo "<input type=\"text\" id=\"email\" name=\"email\" value=\"$email\" />";
	}
	?>
		</td>
	</tr>
	<tr>
		<td align="center">
	<?php
	echo "<input type=\"submit\" value=\"submit\" name=\"submit\">";
	echo "</form>";
	?>
		</td>
	</tr>
	</table>
	<?php
	//if everything was filled in correctly, add the entry to the database
}else
	{
	$query="INSERT INTO accounts(username, password, firstname, lastname, email) VALUES ('$username', SHA('$password'), '$firstname', '$lastname', '$email')";
	$result = mysqli_query($db, $query)
		or die("Error querying database");
	?>
	<table cellpadding="5" cellspacing="10">
	<tr>
		<td><img src="images/redDesign.gif"></td>
		<td>
			<label>Thank you for creating an account.</label>
		</td>
	</tr>
	</table>
	<?php
	}
}
?>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>