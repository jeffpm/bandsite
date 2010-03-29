<?php
	session_start();
	$searchgenre = $_GET['genre'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>The Ultimate Band Search</title>
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
	
		<?php
		include "dbconnect.php";
		$search = mysqli_real_escape_string($db, trim($_POST['searchB']));
		$query = "SELECT * FROM bands NATURAL JOIN genre NATURAL JOIN bandgenre WHERE genreid = '$searchgenre' ORDER BY bandname";
		$result = mysqli_query($db, $query)
			or die("Error Querying Database");
		?>
		<table width="800" cellpadding="5" cellspacing="10">
			<tr>
				<td width="20%"><tableheader>Band Name</tableheader></td>
				<td width="35%"><tableheader>Members</tableheader></td>
				<td width="45%"><tableheader>Description</tableheader></td>
			</tr>
		<?php	

		while ($row = mysqli_fetch_array($result)) {
			$id=$row['bandid'];
			$bandname=$row['bandname'];
			$description = $row['description'];

			$query = "SELECT * FROM bandmembers WHERE bandid='$id' ORDER BY memberid ASC";
			$result2 = mysqli_query($db, $query)
   				or die("Error Querying Database");
			$firstloop=true;
			while ($row = mysqli_fetch_array($result2)) {
				if(!$firstloop){
					$members=$members.", ";
				}
				$members=$members.$row['membername'];
				$firstloop=false;
			}
			
			echo "<tr><td><a href=\"band.php?id=$id\">$bandname</a></td><td>$members</td><td>$description</td></tr>\n";

		}
		?>
		</table>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>