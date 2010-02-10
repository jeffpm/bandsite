<?php
include "dbconnect.php";
session_start();
  $username=$_POST["username"];
  $password=$_POST["password"];

$query="SELECT * FROM accounts where username='$username' AND password='$password'";
$result=mysqli_query($db, $query);

$num=mysqli_num_rows($result);
if ($num<1){
	header("location:login.html");

}
	else {
		session_register("myusername");
		header("location:account.php");

		}
	?>