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

    <?php include("sidebar.php"); ?>	
	<div>
	<b>Featured Band</b>	
	</div>
	<?php
	$query = "select * from bands ORDER BY RAND() LIMIT 1";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	
	$row = mysqli_fetch_array($result);
	$id = $row['id'];
	$bandname = $row['bandname'];
	$members = $row['members'];
	$description = $row['description'];
	echo "Band: <a href=\"band.php?id=$id\">$bandname</a> <br>";
	echo "Members: $members <br>";
	echo "Description: $description <br>";
	?>
	<div>
	<b>Featured Venue</b>
	</div>
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
	echo "Venue: <a href=\"venue.php?id=$id\">$name</a> <br>";
	echo "Address: $address, $city, $state, $zip <br>";
	echo "Description: $description";
	?>
	</p>
	<?php include("footer.html"); ?>
</div>
</body>
</html>
