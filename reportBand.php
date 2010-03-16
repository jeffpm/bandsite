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
	include "dbconnect.php";
  
	$bandname = $_POST['bandname'];
	$members = $_POST['members'];
	$description = $_POST['description'];

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
			<form method="post" action="reportBand.php">
		<tr>
		<th rowspan="3"><img src="images/redDesign.gif"></th>
		</tr>
		<tr><td align="right">
			<label for="bandname">Band name:</label>
			<input type="text" id="bandname" name="bandname" value="<?php echo "$bandname" ?>" /><?php echo $bandnamestatus?>
		</td></tr>
		<tr><td align="right">
			<label for="members">Members:</label>
			<input type="text" id="members" name="members" value="<?php echo "$members" ?>" /><?php echo $membersstatus?>
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
		$query = "INSERT INTO bands (bandname, members, description) " . 
				 "VALUES ('$bandname', '$members', '$description')";
  
		$result = mysqli_query($db, $query)
			or die("Error: Could not create band.");
  
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