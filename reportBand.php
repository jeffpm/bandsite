<?php 
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Adding Band</title>
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
	include "dbconnect.php";
  
	$bandname = mysqli_real_escape_string($db, trim($_POST['bandname']));
	$genreid = $_POST['genre'];
	$members = mysqli_real_escape_string($db, trim($_POST['members']));
	$description = mysqli_real_escape_string($db, trim($_POST['description']));
	$picture = "tempBand.jpg";
	$pic = $_FILES['pic']['name'];
			if(!empty($pic)){
				$picture=$pic;
				$picture=urlencode($picture);
				$target ="images/$picture";
				move_uploaded_file($_FILES['pic']['tmp_name'], $target);
			}
	$valid_responses = true;
	
	if (is_null($bandname) or $bandname == ""){
		$valid_responses = false;
		$bandnamestatus = "*Invalid Entry";
	}

	if(is_null($members) or $members == ""){
		$valid_responses = false;
		$membersstatus = "*Invalid Entry";
	}
	
	if(!$valid_responses){
	?>
		<table cellpadding="5" cellspacing="10">
		<tr><td colspan="2">
		<tableHeader>Create a New Band</tableheader>
		</td></tr>
			<form method="post" action="reportBand.php" enctype="multipart/form-data">
		<tr>
		<th rowspan="5"><img src="images/redDesign.gif"></th>
		</tr>
		<tr><td align="right">
			<label for="bandname">Band name:</label>
			<input type="text" id="bandname" name="bandname" value="<?php echo "$bandname" ?>" /><?php echo $bandnamestatus?>
		</td></tr>
        <tr><td align="right">
        	<Label for ="defaultpicture">Default Picture:</Label><br />
        	<img src="images/tempBand.jpg" /><br />
        </td>
        </tr>
        <tr><td align="right">
        	<label for="pic">Change Picture:</label> <font color="#999999">(not required to change)</font>
        	<input type="file" id="pic" name="pic"  /><br />
        </td>
        </tr>
				<?php
		$query="SELECT * from genre";
		$result = mysqli_query($db, $query)
				or die("Error: Could not query genre database.");
				?>

		<tr><td align="right">
		<label for="pic">Genre:</label>
		<select name="genre">
		<?php
		while($row = mysqli_fetch_array($result)) {
		$genre=$row['genre'];
		$genreid=$row['genreid'];
		echo "<option value=$genreid>$genre</option>";
		}
		?>
			</select>
		</td></tr>
		
		<tr><td align="right">
			<label for="members">Members:</label>
			<input type="text" id="members" name="members" value="<?php echo "$members" ?>" /><?php echo $membersstatus?><br />
            <font color="#999999">(Separate members with a comma ",")</font>
		</td></tr>
		<tr><td align="left" colspan="2">
			<label>Description</label>
			<textarea id="other" name="description" rows="5" cols="50" value="$description" ></textarea>
		</td></tr>
		<tr><td align="left">
			<input type="submit" value="Add Band" name="submit" />
		</td></tr>
		</form>
		</table>
	<?php	
	}
	else {
	//insert adding picture to database
	$userid = $_SESSION['userid'];
		$query = "INSERT INTO bands (bandname, picture, description, userid) " . 
				 "VALUES ('$bandname', '$picture', '$description', '$userid')";
  
		$result = mysqli_query($db, $query)
			or die("Error: Could not create band.");
			
		$query = "SELECT bandid FROM bands WHERE userid='$userid' AND bandname='$bandname' AND picture='$picture' AND description='$description'";
  		
		$result = mysqli_query($db, $query)
			or die("Error: Could not find band.");
		$row = mysqli_fetch_array($result);
		$bandid=$row['bandid'];
				
		$members=explode(",", $members);
		for($i=0; $i<sizeof($members); $i++){
			$query = "INSERT INTO bandmembers (membername, bandid) " . 
				 "VALUES ('".trim($members[$i])."', '$bandid')";
  
			$result = mysqli_query($db, $query)
				or die("Error: Could not add members.");
		}
		$query = "INSERT INTO bandgenre (bandid, genreid) VALUES ($bandid, $genreid)";

		$result = mysqli_query($db, $query)
			or die("Error: Could not insert genre");
	echo "<div id=\"main\">";
	?>
	<table cellpadding="5" cellspacing="10">
	<tr>
		<th rowspan="4"><img src="images/redDesign.gif"></th>
	</tr>
	<tr><td>
		<label>Success!</label>
	</td></tr>
	<tr><td>
		<?php echo "<label>Your band, $bandname, has been added successfully!</label>"; ?>
	</td></tr>
	<tr><td>
		<label><a href="index.php">Return to Main Page</a></label>
	</td></tr>
	</table>
	<?php
	echo "</div>";
	
	mysqli_close($db);
	}
  
  
?>
	
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>