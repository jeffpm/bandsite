<?php

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
    <?php include("header.html"); ?>
	
	<div id="features">
		<table border="1" width="750" cellpadding="5" cellspacing="10">
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
				$id = $row['id'];
				$bandname = $row['bandname'];
				$members = $row['members'];
				$description = $row['description'];
			?>
				<table cellpadding="5">
					<tr>
					<td><img src="tempBand.jpg"></td>
					<td>
						<?php
							echo "<p><a href=\"band.php?id=$id\">$bandname</a> <br></p>";
							echo "<p>Members: $members <br></p>";
							echo "<p>Description: $description <br></p>";
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
				$id = $row['id'];
				$name = $row['name'];
				$address = $row['address'];
				$city = $row['city'];
				$state = $row['state'];
				$zip = $row['zip'];
				$description = $row['description'];
			?>
				<table cellpadding="5">
					<tr>
					<td><img src="tempVenue.jpg"></td>
					<td>
						<?php
							echo "<p><a href=\"venue.php?id=$id\">$name</a> <br></p>";
							echo "<p>Address: $address, $city, $state, $zip <br></p>";
							echo "<p>Description: $description</p>";
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
