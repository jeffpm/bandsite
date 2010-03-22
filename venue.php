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
	$refid=$row['userid'];

	  
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
	if(isset($_SESSION['userid'])){
		//if(session_is_registered(myusername)){
			include("headerUser.html");
		} else {
			include("headerGuest.html");
		}
	?>	
	<div id="main">
	<?php
	if(isset($_SESSION['userid'])  AND $_SESSION['userid']==$refid){
	//if(session_is_registered(myusername)){
	echo "<p><a href=\"edit.php?page=venue&id=$venueid\">Edit Venue Information</a>";
	echo " - <a href=\"addevent.php?page=venue&id=$venueid\">Add Event</a>";
    echo " </p>";
	}
	?>
	<table width="800" cellpadding="5" cellspacing="10">
		<tr>
			<td width="65%">
			<pagetitle><?php echo "$name";?></pagetitle>
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
		
		<tr>
			<th rowspan="3"><p>Location:</p><img src="http://maps.google.com/maps/api/staticmap?size=400x400&maptype=roadmap\&markers=size:mid|color:red|
			<?php echo"$address,$zip";?>&sensor=false" /></th>
		</td></tr>
	</table>
    
	
	
    <?php
	
	$query = "select events.date, bands.bandid, bands.bandname, events.description from events INNER JOIN bands ON events.bandid=bands.bandid AND events.venueid='$venueid' ORDER BY events.date";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	  $hasResults=true;
	  	while ($row = mysqli_fetch_array($result)) {
			if($hasResults){ //creates the start of table on first run
			?>
            <tableheader>Events:</tableheader>
            <table width="750" cellpadding="5" cellspacing="10">
			<tr>
				<td width="25%"><commentheader>Date</commentheader></td>
				<td width="35%"><commentheader>Featured Band</commentheader></td>
				<td width="40%"><commentheader>Details</commentheader></td>
			</tr>
            <?php
				$hasResults=false;
			}
				$id=$row['bandid'];
				$date=$row['date'];
				$description = $row['description'];
				$name=$row['bandname'];
				$temp=substr($date, -5, 2)."/".substr($date, -2)."/".substr($date, 0, 4);
				echo "<tr><td>$temp</td><td><a href=\"band.php?id=$id\">$name</a></td><td>$description</td></tr>\n";
			}
	
	
	?>
    </table>
	</div>
    <div id="sidebar">
		<?php include("sidebar.php"); ?>
	</div>
	<?php include("footer.html"); ?>
</div>
</body>
</html>
