<?php
session_start();
include "dbconnect.php";
include "imageresize.php";
$albumid = $_GET['id'];

$query = "select * from albums where albumid='$albumid'";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	
	$row = mysqli_fetch_array($result);
//	$bandid = $row['bandid'];
//	$bandname = $row['bandname'];
	$picture = $row['picture'];
//	$members = $row['members'];
//	$description = $row['description'];
	$refid = $row['userid'];
	
	$albumid = $row['albumid'];
	$albumname = $row['albumname'];
	$albumyear = $row['albumyear'];
	$albumband = $row['albumband'];
	$albumgenre = $row['albumgenre'];
	
	$songname = $row['songname'];
	$songid = $row['songid'];
	
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
  //add album name variable from query
  echo "<title>Album Info For $albumname</title>";
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
	echo " - <a href=\"addalbum.php?id=$bandid\">Add Album</a>";
	}
    echo " </p>";
	?>
	
	<table width="800" cellpadding="5" cellspacing="10">
		<tr>
			<td width="65%">
			<pagetitle><?php echo "$albumname";?></pagetitle>
			<th rowspan="6"><img src="images/<?php echo"$picture"; ?>" <?php imageResize(300, 300,"images/$picture");  ?>/></th>
			</td>
		</tr>
		<tr><td>
			<commentheader>Tracks:</commentheader>
		</td></tr>
		<tr><td>
		<?php
			$query = "SELECT songname, songid FROM songs NATURAL JOIN albums NATURAL JOIN songalbum WHERE albumid='$albumid' ORDER BY songid ASC";
			$result = mysqli_query($db, $query)
   				or die("Error Querying Database");
			$count = 1;
			while ($row = mysqli_fetch_array($result)) {
				$songname = $row['songname']."\n";
				echo "<p>$count.$songname</p>";
				$songname = "";
				$count++;
			}
		?>
		</td></tr>
	</table>

</div>
	<?php include("footer.html"); ?>
</div>
</body>
</html>