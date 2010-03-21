<?php
session_start();
include "dbconnect.php";
//if the submit button was not pressed, show the form
if (!isset($_POST['submit'])) {
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

 <HEAD>
  <TITLE>Log In </TITLE>
	<link rel="stylesheet" type="text/css" href="style.css" />
 </HEAD>
 
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
	<table cellpadding="5" cellspacing="10">
		<form method="post" action="<?php echo $PHP_SELF;?>">
		<!--<form method="post" action="login.php">-->
		<tr>
			<th rowspan="4"><img src="images/redDesign.gif"></th>
		</tr>
		
		<tr>
			<td align="right">
				<label for="username">Enter Username:</label>
				<input type="text" id="username" name="username" /><br />
			</td>
		</tr>
		
		<tr>
			<td align="right">
				<label for="password">Enter Password:</label>
				<input type="password" id="password" name="password" /><br />
			</td>
		</tr>
		
		<tr>
			<td align="right">
				<input type="submit" value="submit" name="submit">
			</td>
		</tr>
		</form>
	</table>
	</div>
	<?php include("footer.html"); ?>
 </div>
 </body>	
	

</html>
<?php
}
else
{
  $username=$_POST["username"];
  $password=$_POST["password"];

$query="SELECT * FROM accounts where username='$username' AND password=SHA('$password')";
$result=mysqli_query($db, $query);
	$row = mysqli_fetch_array($result);

$userid=$row['userid'];

$num=mysqli_num_rows($result);
if ($num<1){
	//header("location:login.php");
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <HEAD>
  <TITLE>Log In </TITLE>
  <link rel="stylesheet" type="text/css" href="style.css" />
 </HEAD>
 <body>
 <div id="wrap">
    <?php
		if(session_is_registered(myusername)){
			include("headerUser.html");
		} else {
			include("headerGuest.html");
		}
	?>
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
	<?php include("footer.html"); ?>
</div>
</html>
<?php
}
	else {
		//session_register("myusername");
		$_SESSION['userid']=$userid;
		header("location:index.php");
		}
}
?>