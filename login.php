<?php
include "dbconnect.php";
//if the submit button was not pressed, show the form
if (!isset($_POST['submit'])) {
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Log In </TITLE>
	<link rel="stylesheet" type="text/css" href="style.css" />
 </HEAD>
 
 <body>
 <div id="wrap">
    <?php include("header.html"); ?>
	<div id="main">	
<form method="post" action="<?php echo $PHP_SELF;?>">
<!--<form method="post" action="login.php">-->
<label for="username">Enter Username:</label>
<input type="text" id="username" name="username" /><br />
<label for="password">Enter Password:</label>
<input type="password" id="password" name="password" /><br />
<input type="submit" value="submit" name="submit">
</form>
</body>
</div>	
	<div id="footer"><p>Footer here</p></div>
</div>
</html>
<?php
}
else
{
session_start();
  $username=$_POST["username"];
  $password=$_POST["password"];

$query="SELECT * FROM accounts where username='$username' AND password='$password'";
$result=mysqli_query($db, $query);

$num=mysqli_num_rows($result);
if ($num<1){
	//header("location:login.php");
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Log In </TITLE>
  <link rel="stylesheet" type="text/css" href="style.css" />
 </HEAD>
 <body>
 <div id="wrap">
    <?php include("header.html"); ?>
	<div id="main">	
<form method="post" action="<?php echo $PHP_SELF;?>">
<!--<form method="post" action="login.php">-->
Your username/password combination was incorrect. Please try again.
<br>
<label for="username">Enter Username:</label>
<input type="text" id="username" name="username" /><br />
<label for="password">Enter Password:</label>
<input type="password" id="password" name="password" /><br />
<input type="submit" value="submit" name="submit">
</form>
</body>
</div>	
	<div id="footer"><p>Footer here</p></div>
</div>
</html>
<?php
}
	else {
		session_register("myusername");
		header("location:index.php");
		}
}
	?>