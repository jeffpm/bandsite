<?php
ob_start();

if(isset($_POST['create']))
{
$root = $_POST['root'];
$pass = $_POST['pass'];
$db = mysqli_connect('localhost',$root,$pass);
if(!$db)
	die('Connect Error, did you enter the right information?');
mysqli_query($db,"CREATE DATABASE IF NOT EXISTS band");

$db = mysqli_connect('localhost',$root,$pass,'band');
$file=fopen("dbsetup.sql","r");

while(!feof($file))
{
$line = fgets($file);
mysqli_query($db,$line);
}
fclose($file);

header("Location: index.php");
ob_flush();

}
else
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>The Ultimate Band Surf database setup</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<form method="post" action="setup.php">
<H3>Enter your username and password to your MySql database server</H3>
<b>Enter userame (root):</b><input type="text" name="root">
<br>
<b>Enter Password:</b> <input type="password" name="pass">
<br>
<input type="submit" name="create" value="Create">
</form>
</body>
</html>
<?php
}
?>