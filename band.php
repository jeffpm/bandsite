<?php
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
	session_start();
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
    <img src="images/<?php echo "$picture"; ?>" />
	<?php
	echo "<p><a href=\"addevent.php?page=band&id=$bandid\">Add Event</a>";
    echo " - <a href=\"edit.php?page=band&id=$bandid\">Edit</a>";
    echo " </p>";
	echo "Band: $bandname <br>";
	echo "Members: $members <br>";
	echo "Description: $description <br>";
	?>
	</div>
    <div id="sidebar">
		<?php include("sidebar.php"); ?>
	</div>
	<?php include("footer.html"); ?>
</div>
</body>
</html>
