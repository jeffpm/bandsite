<?php
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Add a Venue</TITLE>
	<link rel="stylesheet" type="text/css" href="style.css" />
 </HEAD>
 
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
	include "dbconnect.php";
	$name = mysqli_real_escape_string($db, trim($_POST['name']));
	/*
	$picture = $_FILES['picture']['name'];
	$target ="images/$picture";
	move_uploaded_file($_FILES['picture']['tmp_name'], $target);
	*/
	$picture = "tempVenue.jpg";
	$pic = $_FILES['pic']['name'];
			if(!empty($pic)){
				$picture=$pic;
				$picture=urlencode($picture);
				$target ="images/$picture";
				move_uploaded_file($_FILES['pic']['tmp_name'], $target);
			}
	$address = mysqli_real_escape_string($db, trim($_POST['address']));
	$city = mysqli_real_escape_string($db, trim($_POST['city']));
	$state = mysqli_real_escape_string($db, trim($_POST['state']));
	$zip = mysqli_real_escape_string($db, trim($_POST['zip']));
	$description = mysqli_real_escape_string($db, trim($_POST['description']));
	$valid_responses = true;
	/*echo " (test code) PASSED VARS: $name $address $city $state $zip $description";*/
	if(is_null($name) or $name == ""){
		$valid_responses = false;
		$namestatus = "*Invalid Entry";
		$name="";
	}
	if(is_null($address) or $address == ""){
		$valid_responses = false;
		$addressstatus = "*Invalid Entry";
		$address="";
	}
	if(is_null($city) or $city == ""){
		$valid_responses = false;
		$citystatus = "*Invalid Entry";
		$city="";
	}
	if(is_null($state) or $state == ""){
		$valid_responses = false;
		$statestatus = "*Invalid Entry";
		$state="";
	}
	if(is_null($zip) or $zip == "" or !is_numeric($zip)){
		$valid_responses = false;
		$zipstatus = "*Invalid Entry";
		$zip="";
	}
	if(empty($description)){
		$valid_responses= false;
	}
	if($valid_responses == false){
	?>
		<table cellpadding="5" cellspacing="10">
		<tr><td colspan="2">
		<tableHeader>Create a New Venue</tableheader>
		</td></tr>
			<form method="post" action="reportvenue.php" enctype="multipart/form-data">
		<tr>
		<th rowspan="8"><img src="images/redDesign.gif"></th>
		</tr>
		<tr><td align="right">
			<label for="name">Venue Name:</label>
			<input type="text" id="name" name="name" value="<?php echo "$name" ?>" /> <label><?php echo $namestatus ?></label>
		</td></tr>
        <tr><td align="right">
              <Label for ="defaultpicture">Default Picture:</Label><br />
        	<img src="images/tempVenue.jpg" /><br />
		</td></tr>
        <tr><td align="right">
			<label for="pic">Change Picture:</label> <font color="#999999">(not required to change)</font>
        	<input type="file" id="pic" name="pic"  /><br />
		</td></tr>
		<tr><td align="right">
			<label for="address">Address:</label>
			<input type="text" id="address" name="address" value="<?php echo "$address" ?>" /> <label><?php echo $addressstatus ?></label>
		</td></tr>
		<tr><td align="right">
			<label for="city">City:</label>
			<input type="text" id="city" name="city" value="<?php echo "$city" ?>" /> <label><?php echo $citystatus ?></label>
		</td></tr>
		<tr><td align="right">	
			<label for="state">State:</label>
			<input type="text" id="state" name="state" value="<?php echo "$state" ?>" /> <label><?php echo $statestatus ?></label>
		</td></tr>
		<tr><td align="right">	
			<label for="zip">Zip Code:</label>
			<input type="text" id="zip" name="zip" value="<?php echo "$zip" ?>" /> <label><?php echo $zipstatus ?></label>
		</td></tr>
		<tr><td align="left" colspan="2">
			<label>Description:</label>
			<textarea id="description" name="description" rows="5" cols="50" /> <?php echo $description ?></textarea>
		<tr><td align="left">	
			<input type="submit" value="Add Venue" name="submit" />
		</td></tr>
			</form>
		</table>
	<?php
	}else{
		$userid = $_SESSION['userid'];
		$query = "INSERT INTO venues (name, picture, address, city, state, zip, description, userid) VALUES ('$name', '$picture', '$address', '$city', '$state', '$zip', '$description', '$userid')";
		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
	?>
		<table cellpadding="5" cellspacing="10">
		<tr>
			<th rowspan="4"><img src="images/redDesign.gif"></th>
		</tr>
		<tr><td>
			<label>Success!</label>
		</td></tr>
		<tr><td>
			<?php echo "<label>Your venue, $name, has been added successfully!</label>"; ?>
		</td></tr>
		<tr><td>
			<label><a href="index.php">Return to Main Page</a></label>
		</td></tr>
		</table>
	<?php
	}
?>
</div>		
	<?php include("footer.html"); ?>
</div>
</body>
</html>