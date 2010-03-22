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
	$refid = $row['userid'];
	
	$albumid = $row['albumid'];
	$albumname = $row[albumname];
	$albumyear = $row[albumyear];
	$albumband = $row[albumband];
	$albumgenre = $row[albumgenre];

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
	if(isset($_SESSION['userid']) AND $_SESSION['userid']==$refid){
	//if(session_is_registered(myusername)){
	echo "<p><a href=\"edit.php?page=band&id=$bandid\">Edit Band Information</a>";
	echo " - <a href=\"addevent.php?page=band&id=$bandid\">Add Event</a>";
	}
    echo " </p>";
	?>
	<table width="900" cellpadding="5" cellspacing="10">
		<tr>
			<td width="65%">
			<pagetitle><?php echo "$bandname";?></pagetitle>
			</td>
			<td>
			<th rowspan="3"><img src="images/<?php echo"$picture"; ?>" /></th>
			</td>
		</tr>
		<tr><td>
			<p><?php echo "Members: $members";?></p>
		</td></tr>
		<tr><td>
			<p><?php echo "Description: $description";?></p>
		</td></tr>
		<tr><td> 
			<p><?php echo "Albums: $albumname";?></p>
		</td></tr>
	</table>
    
	
	
    <?php 
		$query = "select events.date, venues.venueid, venues.name, events.description from events INNER JOIN venues ON events.venueid=venues.venueid AND events.bandid='$bandid' ORDER BY events.date";
		$result = mysqli_query($db, $query)
	  	or die("Error querying Database");
		$hasResults=true;
	  	while ($row = mysqli_fetch_array($result)) {
			if($hasResults){ //creates the start of table on first run
			?><tableheader>Events:</tableheader>
            <table width="750" cellpadding="5" cellspacing="10">
			<tr>
				<td width="25%"><commentheader>Date</commentheader></td>
				<td width="35%"><commentheader>Location</commentheader></td>
				<td width="40%"><commentheader>Details</commentheader></td>
			</tr>
            <?php
				$hasResults=false;
			}
				$id=$row['venueid'];
				$date=$row['date'];
				$description = $row['description'];
				$name=$row['name'];
				$temp=substr($date, -5, 2)."/".substr($date, -2)."/".substr($date, 0, 4);
				echo "<tr><td>$temp</td><td><a href=\"venue.php?id=$id\">$name</a></td><td>$description</td></tr>\n";
			}
	if(!hasResults){
		echo "</table>";
	}
	?>
	</table>
	<?php
	$query="select c.commentid, c.name, c.comment, c.date from comments as c inner join bands as b on c.bandid=b.bandid AND b.bandid=$bandid ORDER BY commentid desc LIMIT 5";
		$result = mysqli_query($db, $query)
	  	or die("Error querying Database");
		
	?>
	
	
			<?php
			$hasResults=true;
			while ($row = mysqli_fetch_array($result)) {
				if($hasResults){ //runs once (if there are comments) and displays the headers of the table
					?> 
     <tableheader>Comments:</tableheader>
		<table width="750" cellpadding="5" cellspacing="10">
			<tr>
				<td width="25%"><commentheader>Date</commentheader></td>
				<td width="35%"><commentheader>Name</commentheader></td>
				<td width="40%"><commentheader>Comment</commentheader></td>
			</tr>
					
					<?php
					$hasResults=false;
				}
			$date=$row['date'];
			$name=$row['name'];
			$comment=$row['comment'];
			echo "<tr><td>$date</td><td>$name</td><td>$comment</td></tr>\n";
			}
			if(!$hasResults){
				echo "</table>";
			}
			?>
					
   
    <table>
    <tr><td><p>Add a comment:</p></td>
		</tr>
		<tr>
		
		<form method="post" action="<?php echo "addComment.php?id=$bandid"?>" enctype="multipart/form-data">
		
		<tr><td>
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" /> <br />
		</td></tr>
		<tr><td>
			<label for="name">Comment:</label>
			<textarea id="comment" name="comment" rows="3" cols="50" ></textarea>
		</td></tr>
		<tr><td>
			<input type="submit" value="Submit Comment" name="submit" />
            </form>
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
