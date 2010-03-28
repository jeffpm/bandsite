<?php
session_start();
include "dbconnect.php";
if(!isset($_SESSION['userid']) || $_SESSION['userid']!=1){
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
	?>
	<div id="main">
			<table width="800" cellpadding="5" cellspacing="10">
			<tr>
				<td width="25%"><commentheader>User</commentheader></td>
				<td width="35%"><commentheader>Band</commentheader></td>
			</tr>
	<?php
	$query = 
/*	$query = "select accounts.firstname, accounts.lastname, bands.bandname from accounts LEFT OUTER JOIN bands ON accounts.userid=bands.userid";
	$result = mysqli_query($db, $query)
	or die("Error querying Database");
	
	while ($row = mysqli_fetch_array($result)) {
		$firstname=$row['firstname'];
		$f = $firstname;
		$lastname=$row['lastname'];
		$l = $lastname;
		$bands=$row['bandname'];
		echo "<tr><td>$f $l</td><td>$bands</td></tr>\n";
		while ($row = mysqli_fetch_array($result)) {
			$firstname=$row['firstname'];
			$lastname=$row['lastname'];
			if($firstname==$f && $lastname==$l) {
				$bands=$bands.", ";
				$bands=$bands.$row['bandname'];
				echo "<tr><td>$f $l</td><td>$bands</td></tr>\n";
			}
			else {
				echo "<tr><td>$f $l</td><td>$bands</td></tr>\n";
				$f = $firstname;
				$l = $lastname;
				$bands="";
				$bands=$row['bandname'];
			}
		}
	} */
	?>
		</table>
	</div>

	<?php include("footer.html"); ?>
</div>
</body>
</html>