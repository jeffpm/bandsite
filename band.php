<?php
session_start();
include "dbconnect.php";
$bandid = $_GET['id'];

$query = "select * from bands where bandid='$bandid'";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	
	$row = mysqli_fetch_array($result);
	$bandid = $row['bandid'];
	$bandname = $row['bandname'];
	$picture = $row['picture'];
	$members = $row['members'];
	$description = $row['description'];
?>
<?php
	//session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php
  echo "<title>Band Profile For $id</title>";
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
	echo "<p><a href=\"edit.php?page=band&id=$bandid\">Edit Band Information</a>";
	echo " - <a href=\"addevent.php?page=band&id=$bandid\">Add Event</a>";
	}
    echo " </p>";
	?>
	<table width="750" cellpadding="5" cellspacing="10">
		<tr>
			<td width="65%">
			<tableheader><?php echo "$bandname";?></tableheader>
			</td>
			<td>
			<?php //temporary picture until pictures implemented
			  //this code to be used after implementation <img src="images/ (php) echo "$picture"; (/php)" /> ?>
			<th rowspan="3"><img src="images/tempBand.jpg" /></th>
			</td>
		</tr>
		<tr><td>
			<p><?php echo "Members: $members";?></p>
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
