<?php 
session_start();
include "dbconnect.php";  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>The Ultimate Band Surf</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="wrap">
    <?php
		//if(session_is_registered(myusername)){
		if(isset($_SESSION['userid'])){
			include("headerUser.php");
		} else {
			include("headerGuest.html");
		}
	?>
	
	<div id="features">
		<table border="1" width="700" cellpadding="5" cellspacing="10">
			<tr align="center">
			<td width="50%">
			<tableHeader>Featured Band</tableHeader>
			</td>
			<td>
			<tableHeader>Featured Venue</tableHeader>
			</tr>
			<tr>
			<td>
			<?php
				$query = "select * from bands ORDER BY RAND() LIMIT 1";
				$result = mysqli_query($db, $query)
					or die("Error querying Database");
	
				$row = mysqli_fetch_array($result);
				$bandid = $row['bandid'];
				$bandname = $row['bandname'];
				$picture = $row['picture'];
				$description = $row['description'];
				$query = "SELECT * FROM bandmembers WHERE bandid='$bandid' ORDER BY memberid ASC";
				$result = mysqli_query($db, $query)
   					or die("Error Querying Database");
				$firstloop=true;
				while ($row = mysqli_fetch_array($result)) {
					if(!$firstloop){
						$members=$members.", ";
					}
					$members=$members.$row['membername'];
					$firstloop=false;
				}
				$query = "SELECT genre FROM genre NATURAL JOIN bands NATURAL JOIN bandgenre WHERE bandid='$bandid' ORDER BY genreid ASC";
				$result = mysqli_query($db, $query)
   					or die("Error Querying Database");
				$firstloop=true;
				while ($row = mysqli_fetch_array($result)) {
					if(!$firstloop){
						$genre=$genre.", ";
					}
					$genre=$genre.$row['genre'];
					$firstloop=false;
				}
			?>
				<table cellpadding="5">
					<tr>
					<?php //to be used later <img src="images/(php) echo "$picture"; (/php)"  /> ?>
					<td><a href="band.php?id=<?php echo "$bandid"; ?>"><img src="images/<?php echo"$picture"; ?>"></a></td>
					<td>
						<?php
							echo "<p><a href=\"band.php?id=$bandid\">$bandname</a> <br></p>";
							echo "<commentheader>Members:</commentheader> <p>$members <br></p>";
							echo "<commentheader>Genre:</commentheader> <p>$genre <br></p>";
							echo "<commentheader>Description:</commentheader> <p>$description <br></p>";
						?>
					</td>
					</tr>
				</table>
			</td>
			<td width="50%">
			<?php
				$query = "select * from venues ORDER BY RAND() LIMIT 1";
				$result = mysqli_query($db, $query)
					or die("Error querying Database");
	
				$row = mysqli_fetch_array($result);
				$venueid = $row['venueid'];
				$name = $row['name'];
				$picture = $row['picture'];
				$address = $row['address'];
				$city = $row['city'];
				$state = $row['state'];
				$zip = $row['zip'];
				$description = $row['description'];
			?>
				<table cellpadding="5">
					<tr>
					<?php //to be used later <img src="images/(php) echo "$picture"; (/php)"  /> ?>
					<td><a href="venue.php?id=<?php echo "$venueid"; ?>"><img src="images/<?php echo"$picture"; ?>"></a></td>
					<td>
						<?php
							echo "<p><a href=\"venue.php?id=$venueid\">$name</a> <br></p>";
							echo "<commentheader>Address:</commentheader> <p>$address, $city, $state, $zip <br></p>";
							echo "<commentheader>Description:</commentheader> <p>$description</p>";
						?>
					</td>
					</tr>
				</table>
			</td>
			</tr>
		</table>
	</div>
	
	<div id="sidebar">
		<?php include("sidebar.php"); ?>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>