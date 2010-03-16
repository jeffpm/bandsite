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
	<?php
	if(session_is_registered(myusername)){
	echo "<p><a href=\"edit.php?page=venue&id=$venueid\">Edit Venue Information</a>";
	echo " - <a href=\"addevent.php?page=venue&id=$venueid\">Add Event</a>";
    echo " </p>";
	}
	?>
	<table width="750" cellpadding="5" cellspacing="10">
		<tr>
			<td width="65%">
			<tableheader><?php echo "$name";?></tableheader>
			</td>
			<td>
			<?php //temporary picture until pictures implemented
			  //this code to be used after implementation <img src="images/ (php) echo "$picture"; (/php)" /> ?>
			<th rowspan="3"><img src="images/<?php echo"$picture"; ?>" /></th>
			</td>
		</tr>
		<tr><td>
			<p><?php echo "Address: $address, $city, $state, $zip";?></p>
		</td></tr>
		<tr><td>
			<p><?php echo "Description: $description";?></p>
		</td></tr>
	</table>
	</div>
    <div id="sidebar">
		<?php include("sidebar.php"); ?>
	</div>
	<?php include("footer.html"); ?>
</div>
</body>
</html>
