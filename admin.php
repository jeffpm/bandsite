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
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
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
		<table cellpadding="5" cellspacing="10">
			<tr>
				<th rowspan="5"><img src="images/redDesign.gif"></th>
			</tr>
			<?php
			if ($_SESSION['userid']==1){
			echo "<tr><td>";
				echo "<a href=viewadmin.php>View all accounts, bands, venues (ADMIN FEATURE ONLY)</a>";
			echo "</td></tr>";
			}
			?>
			
			<tr><td>
				<a href=changeaccount.php>Change account information</a>
			</td></tr>
			<tr><td>
				<a href=managebands.php>Manage added bands</a>
			</td></tr>
			<tr><td>
				<a href=managevenues.php>Manage added venues</a>
			</td></tr>
		</table>
	</div>

	<?php include("footer.html"); ?>
</div>
</body>
</html>