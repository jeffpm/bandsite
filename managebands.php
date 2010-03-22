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
			include("headerUser.html");

		} else {
			include("headerGuest.html");
		}
		$userid=$_SESSION['userid'];
		$query="SELECT * from bands where userid=$userid ORDER BY bandname";
		$result = mysqli_query($db, $query)
		or die("Error querying Database");
	
	?>

	<div id="main">
		<table width="750" cellpadding="5" cellspacing="10">
			<tr>
				<td width="25%"><commentheader>Band</commentheader></td>
				<td width="35%"><commentheader>Edit</commentheader></td>
			</tr>
			<?php
			while ($row = mysqli_fetch_array($result)) {
			$bandname=$row['bandname'];
			$bandid=$row['bandid'];
			echo "<tr><td>$bandname</td><td><a href=http://localhost/bandsite/edit.php?page=band&id=$bandid>Edit</a></td></tr>\n";
			}
			?>
	</div>

	<?php include("footer.html"); ?>
</div>
</body>
</html>