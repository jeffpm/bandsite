<?php
session_start();
include "dbconnect.php";
if(!isset($_SESSION['userid'])){
//if(!session_is_registered(myusername)){
header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Account Management</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">
    <?php
	if(isset($_SESSION['userid'])){
		//if(session_is_registered(myusername)){
			include("headerUser.php");

		} else {
			include("headerGuest.html");
		}
		$userid=$_SESSION['userid'];
		$query="SELECT * FROM accounts where userid='$userid'";
		$result=mysqli_query($db, $query);
		$row = mysqli_fetch_array($result);

		$username=$row['username'];
		$password=$row['password'];
		$firstname=$row['firstname'];
		$lastname=$row['lastname'];
		$email=$row['email'];
	?>
	<div id="main">
	<?php if (!isset($_POST['submit'])) {
?>
<table cellpadding="5" cellspacing="10">
<form method="post" action="<?php echo $PHP_SELF;?>">
<tr>
	<td align="right">

		<label for="username">Username:</label>
		<input type="text" id="username" name="username" value="<?php echo "$username"; ?>" /><br />
	</td>
</tr>
<tr>
	<td align="right">
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"/>
		<br />
	</td>
	<td>
	If you would like to keep your password, leave this field blank.
	</td>
</tr>
<tr>
	<td align="right">
		<label for="firstname">First name:</label>
		<input type="text" id="firstname" name="firstname" value="<?php echo "$firstname"; ?>"/><br />
	</td>
</tr>
<tr>
	<td align="right">
		<label for="lastname">Last name:</label>
		<input type="text" id="lastname" name="lastname" value="<?php echo "$lastname"; ?>"/><br />
	</td>
</tr>
<tr>
	<td align="right">
		<label for="email">Email:</label>
		<input type="text" id="email" name="email" value="<?php echo "$email"; ?>"/><br />
	</td>
</tr>
<tr>
	<td align="right">
		<input type="submit" value="submit" name="submit">
		</form>
	</td>
</tr>
</table>
<?php }
else {
$username=mysqli_real_escape_string($db, trim($_POST["username"]));
$password=mysqli_real_escape_string($db, trim($_POST["password"]));
$firstname=mysqli_real_escape_string($db, trim($_POST["firstname"]));
$lastname = mysqli_real_escape_string($db, trim($_POST["lastname"]));
$email = mysqli_real_escape_string($db, trim($_POST["email"]));

		$query="SELECT * FROM accounts where userid=$userid";
		$result=mysqli_query($db, $query);
		$row = mysqli_fetch_array($result);

		$oldusername=$row['username'];
		$oldpassword=$row['password'];
		$oldfirstname=$row['firstname'];
		$oldlastname=$row['lastname'];
		$oldemail=$row['email'];

		if (empty($username)){
		$username=$oldusername;
		}
		if (empty($password)){
		$password=$oldpassword;
		}
		else {
		$password=SHA1($password);
		}
		if (empty($firstname)){
		$firstname=$oldfirstname;
		}
		if (empty($lastname)){
		$lastname=$oldlastname;
		}
		if (empty($email)){
		$email=$oldemail;
		}
		
		$query="UPDATE accounts SET username='$username', password='$password', firstname='$firstname', lastname='$lastname', email='$email' WHERE userid=$userid";
	$result = mysqli_query($db, $query)
		or die("Error querying database");
		
		echo "Your account information has been changed.";
}
?>
	</div>

	<?php include("footer.html"); ?>
</div>
</body>
</html>