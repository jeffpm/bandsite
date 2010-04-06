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
	
	$query = "SELECT * FROM bandmembers WHERE bandid='$bandid' ORDER BY memberid ASC";
			$result = mysqli_query($db, $query)
   				or die("Error Querying Database");
				$firstloop=true;
			while ($row = mysqli_fetch_array($result)) {
				if(!$firstloop){
					$members=$members.", ";
				}
				$members=$members.$row['membername'];
				$firstloop=false;
			}
	$query = "SELECT genre, genreid FROM genre NATURAL JOIN bands NATURAL JOIN bandgenre WHERE bandid='$bandid' ORDER BY genreid ASC";
				$result = mysqli_query($db, $query)
   					or die("Error Querying Database");
				$firstloop=true;
				while ($row = mysqli_fetch_array($result)) {
					if(!$firstloop){
						$genre=$genre.", ";
					}
					$gid = $row['genreid'];
					$genre = $genre."<a href=\"searchBand.php?search=".$gid."\">".$row['genre']."</a>";
					$firstloop=false;
				}
	$query = "SELECT albumname, albumband FROM albums INNER JOIN bands ON albums.albumband='$bandid' AND albums.albumband = bands.bandid ORDER BY albumid ASC";
				$result = mysqli_query($db, $query)
					or die("Error Querying Database");
				$firstloop = true;
				while($row = mysqli_fetch_array($result)) {
					if(!$firstloop){
						$albumname=$albumname.", ";
						
					}
					
					$aid = $row['albumband'];
					$albumname = $albumname."<a href=\"album.php?id=".$aid."\">".$row['albumname']."</a>";
					$firstloop = false;
				}
			   
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
    <table>
	<tr>
	<tableheader>Videos:</tableheader>
	</tr>
	</table>
	<div id="videoPlayer">
	
	</div>

  <!--
  // The Following div element will end up holding the actual videobar.
  // You can place this anywhere on your page.
  -->
  <div id="videoBar-bar">
    <span style="color:#676767;font-size:11px;margin:10px;padding:4px;">Loading...</span>
  </div>

  <!-- Ajax Search Api and Stylesheet
  // Note: If you are already using the AJAX Search API, then do not include it
  //       or its stylesheet again
  -->
  <script src="http://www.google.com/uds/api?file=uds.js&v=1.0&source=uds-vbw"
    type="text/javascript"></script>
  <style type="text/css">
    @import url("http://www.google.com/uds/css/gsearch.css");
  </style>

  <!-- Video Bar Code and Stylesheet -->
  <script type="text/javascript">
    window._uds_vbw_donotrepair = true;
  </script>
  <script src="http://www.google.com/uds/solutions/videobar/gsvideobar.js?mode=new"
    type="text/javascript"></script>
  <style type="text/css">
    @import url("http://www.google.com/uds/solutions/videobar/gsvideobar.css");
  </style>

  <style type="text/css">
    .playerInnerBox_gsvb .player_gsvb {
      width : 360px;
      height : 240px;
    }
  </style>
  <script type="text/javascript">
    function LoadVideoBar() {

    var videoBar;
    var options = {
	string_allDone : "Close this window",
	//thumbnailSize : GSvideoBar.THUMBNAILS_SMALL,
        largeResultSet : !true,
        horizontal : true,
        autoExecuteList : {
          cycleTime : GSvideoBar.CYCLE_TIME_SHORT,
          cycleMode : GSvideoBar.CYCLE_MODE_RANDOM,
          executeList : ["<?php echo "$bandname"; ?>"]
        }
      }

	  
    videoBar = new GSvideoBar(document.getElementById("videoBar-bar"),
                              document.getElementById("videoPlayer"),
                              options);
    }
    // arrange for this function to be called during body.onload
    // event processing
    GSearch.setOnLoadCallback(LoadVideoBar);
  </script>
  
  
           
	
    <?php 
		$query = "select events.date, venues.venueid, venues.name, events.description from events INNER JOIN venues ON events.venueid=venues.venueid AND events.bandid='$bandid' ORDER BY events.date";
		$result = mysqli_query($db, $query)
	  	or die("Error querying Database");
		$hasResults=true;
	  	while ($row = mysqli_fetch_array($result)) {
			if($hasResults){ //creates the start of table on first run
			?>
            <table width="750" cellpadding="5" cellspacing="10">
			<tr>
			<tableheader>Events:</tableheader>
			</tr>
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
	
	<?php
	$query="select c.commentid, c.name, c.comment, c.date from comments as c inner join bands as b on c.bandid=b.bandid AND b.bandid=$bandid ORDER BY commentid desc LIMIT 5";
		$result = mysqli_query($db, $query)
	  	or die("Error querying Database");
		
	?>
	
		<table width="500" cellpadding="5" cellspacing="10">
			<tr>
			<tableheader>Comments:</tableheader>
			</tr>
			<?php
			while ($row = mysqli_fetch_array($result)) {
					?> 
					<tr>
						<td><commentheader>Date</commentheader></td>
						<td><commentheader>Name</commentheader></td>
						<td><commentheader>Comment</commentheader></td>
					</tr>
					
					<?php
			$date=$row['date'];
			$name=$row['name'];
			$comment=$row['comment'];
			echo "<tr><td>$date</td><td>$name</td><td>$comment</td></tr>\n";
			}
			?>	
   
			<tr><td><p>Add a comment:</p></td></tr>
		
			<form method="post" action="<?php echo "addComment.php?id=$bandid"?>" enctype="multipart/form-data">
		
			<tr><td>
				<label for="name">Name:</label>
				<td><input type="text" id="name" name="name" /> <br /></td>
			</td></tr>
			<tr><td>
				<label for="name">Comment:</label>
				<td><textarea id="comment" name="comment" rows="3" cols="50" ></textarea></td>
			</td></tr>
			<tr><td>
				<input type="submit" value="Submit Comment" name="submit" />
			</td></tr>
			</form>
        </table>
	
</div>
	<?php include("footer.html"); ?>
</div>
</body>
</html>
