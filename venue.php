<?php
include "dbconnect.php";
$id = $_GET['id'];

$query = "select * from venues where id='$id'";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php
  echo "<title>Venue Profile For $name</title>";
  ?>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="wrap">
    <?php include("header.html"); ?>

    <?php include("sidebar.php"); ?>	
	<div>
	<?php
	echo "Venue: $name<br>";
	echo "Address: $address, $city, $state, $zip <br>";
	echo "Description: $description";
	?>
	</div>
	<?php include("footer.html"); ?>
</div>
</body>
</html>
