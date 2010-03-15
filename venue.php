<?php
include "dbconnect.php";
	session_start();
$venueid = $_GET['id'];

$query = "select * from venues where venueid='$venueid'";
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

    <?php
		if(session_is_registered(myusername)){
			include("headerUser.html");
		} else {
			include("headerGuest.html");
		}
	?>	
	<div id="main">
    <img src="images/<?php echo "$picture"; ?>" />
	<?php
	echo "<p><a href=\"addevent.php?page=venue&id=$venueid\">Add Event</a>";
    echo " - <a href=\"edit.php?page=venue&id=$venueid\">Edit</a>";
    echo " </p>";
	echo "Venue: $name<br>";
	echo "Address: $address, $city, $state, $zip <br>";
	echo "Description: $description";
	?>
	</div>
    <div id="sidebar">
		<?php include("sidebar.php"); ?>
	</div>
	<?php include("footer.html"); ?>
</div>
</body>
</html>
