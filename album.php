<?php
session_start();
include "dbconnect.php";
include "imageresize.php";
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
	$refid = $row['userid'];
	
	$albumid = $row['albumid'];
	$albumname = $row['albumname'];
	$albumyear = $row['albumyear'];
	$albumband = $row['albumband'];
	$albumgenre = $row['albumgenre'];
	
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
  echo "<title>Band Profile For $bandname</title>";
  ?>
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
	if(isset($_SESSION['userid']) AND $_SESSION['userid']==$refid){
	//if(session_is_registered(myusername)){
	echo "<p><a href=\"edit.php?page=band&id=$bandid\">Edit/Delete Band Information</a>";
	echo " - <a href=\"addevent.php?page=band&id=$bandid\">Add Event</a>";
	echo " - <a href=\"addalbum.php?id=$bandid\">Add Album</a>";
	}
    echo " </p>";
	?>
	
	<table width="800" cellpadding="5" cellspacing="10">
		<tr>
			<td width="65%">
			<pagetitle><?php echo "$bandname";?></pagetitle>
			<th rowspan="6"><img src="images/<?php echo"$picture"; ?>" <?php imageResize(300, 300,"images/$picture");  ?>/></th>
			</td>
		</tr>
		<tr><td>
			<p><?php echo "<commentheader>Members:</commentheader> $members";?></p>
		</td></tr>

		<tr><td>
			<p><?php echo "<commentheader>Description:</commentheader> $description";?></p>
		</td></tr>
		<tr><td>
			<p><?php echo "<commentheader>Genre:</commentheader> $genre";?></p>
		</td></tr>
		<tr><td> 
			<p><?php echo "<commentheader>Albums:</commentheader> $albumname";?></p>
		</td></tr>
	</table>


	<?php include("footer.html"); ?>
</div>
</body>
</html>