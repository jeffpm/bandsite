<?php
include "dbconnect.php";
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit</title>

  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<script type="text/javascript" src="calendarDateInput.js"></script>
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
//Collect the variables from the form
		
	$frompage = $_POST['frompage'];
	$fromid = $_POST['fromid'];
	$_SESSION['id']=$fromid;
	$_SESSION['type']=$frompage;

	if($frompage == "band"){
		$bandname = $_POST['bandname'];
		$picture = $_POST['picture'];
		$members = $_POST['members'];
		$_SESSION['name']=$bandname;
	}else if($frompage == "venue"){
		$name = $_POST['name'];
		$_SESSION['name']=$name;
		$picture = $_POST['picture'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
	}
	
	$description = $_POST['description'];

//If the submit button wasn't pressed, show the form
if (!isset($_POST['submit'])) {
?>
	
	<form method="post" action="<?php echo $PHP_SELF;?>" enctype="multipart/form-data">
				<?php
		$frompage = $_GET['page'];
		$fromid = $_GET['id'];
		$_SESSION['id']=$fromid;
		$_SESSION['type']=$frompage;
		echo "<input type =\"hidden\" name=\"frompage\" value=\"$frompage\" />\n";
		echo "<input type =\"hidden\" name=\"fromid\" value=\"$fromid\" />\n";
		$table=$frompage.'s';
		$query = "SELECT * FROM $table WHERE ".$frompage."id='$fromid'";
			$result = mysqli_query($db, $query)
   				or die("Error Querying Database 1");
			$row=mysqli_fetch_array($result);
		if($frompage == "band"){ 
			$bandname = $row['bandname'];
			$_SESSION['name']=$bandname;
			$picture = $row['picture'];
			$members = $row['members'];
			$description = $row['description']; ?>
            <input type="hidden" name="picture" value="<?php echo "$picture"; ?>" />
            <a href="delete.php"> Delete Page </a><br />
			<table cellpadding="5" cellspacing="10">
				<tr>
					<td><label for="bandname">Band name:</label></td>
					<td><input type="text" id="bandname" name="bandname" value="<?php echo "$bandname"; ?>" /></td>
				</tr>
				<tr>
					<td valign="top"><Label for ="currentpicture">Current Picture:</Label></td>
					<?php //to be used later <img src="images/(php) echo "$picture"; (/php)"  /> ?>
					<td><img src="images/tempBand.jpg"></td>
				</tr>
				<tr>
					<td><label for="pic">Change Picture:</label></td>
					<td><input type="file" id="pic" name="pic"  /></td>
				</tr>
				<tr>
					<td><label for="members">Members:</label></td>
					<td><input type="text" id="members" name="members" value="<?php echo "$members"; ?>" /></td>
				</tr>
				<tr><td colspan="2">
					<label for"description">Description:</label>
					<textarea id="other" name="description" rows="5" cols="50" ><?php echo "$description"; ?></textarea>
				</td></tr>
				<tr><td>
					<input type="submit" value="Edit Information" name="submit" />
				</td></tr>
			</table>
			
			<?php
  
  			mysqli_close($db);
		}else if($frompage == "venue"){ 
			$name = $row['name'];
			$_SESSION['name']=$name;
			$picture = $row['picture'];
			$address = $row['address'];
			$city = $row['city'];
			$state = $row['state'];
			$zip = $row['zip'];
  			$description = $row['description']; ?>
            <input type="hidden" name="picture" value="<?php echo "$picture"; ?>" />
            <a href="delete.php"> Delete Page </a>
            <table cellspacing="10" cellpadding="3">
				<tr>
					<td><label for="name">Venue Name:</label></td>
					<td><input type="text" id="name" name="name" value="<?php echo "$name"; ?>" /> <br /></td>
				</tr>
				<tr>
					<td valign="top"><Label for ="currentpicture">Current Picture: </Label></td>
					<?php //to be used later <img src="images/(php) echo "$picture"; (/php)"  /> ?>
					<td><img src="images/tempVenue.jpg"></td>
				</tr>
				<tr>
					<td><label for="pic">Change Picture:</label></td>
					<td><input type="file" id="pic" name="pic"  /><br /></td>
				</tr>
				<tr>
					<td><label for="address">Address:</label></td>
					<td><input type="text" id="address" name="address" value="<?php echo "$address"; ?>" /> <br /></td>
				</tr>
				<tr>
					<td><label for="city">City:</label></td>
					<td><input type="text" id="city" name="city" value="<?php echo "$city"; ?>" /> <br /></td>
				</tr>
				<tr>
					<td><label for="state">State:</label></td>
					<td><input type="text" id="state" name="state" value="<?php echo "$state"; ?>" /> <br /></td>
				</tr>
				<tr>
					<td><label for="zip">Zip Code:</label></td>
					<td><input type="text" id="zip" name="zip" value="<?php echo "$zip"; ?>" /> <br /></td>
				</tr>
				<tr><td colspan="2">
					<label for="description">Description:</label>
					<textarea id="description" name="description" rows="5" cols="50" ><?php echo "$description"; ?></textarea>
				</td></tr>
				<tr><td>
					<input type="submit" value="Edit Information" name="submit" />
				</td></tr>
			</table>
			<?php
			
  			mysqli_close($db);
		}
	?>
  </form>
<?php
}
else {

//Check for valid responses
	$invalidresponses=false;
	$descriptionstatus = "Short description of your";
	if($frompage == "band"){
		if(empty($bandname)){
			$invalidresponses=true;
			$bandnamestatus = "*Invalid Entry";
			$name="";
		}if(empty($members)){
			$invalidresponses=true;
			$membersstatus = "*Invalid Entry";
			$name="";
		}if(empty($description)){
			$invalidresponses=true;
			$descriptionstatus = "*Please enter a description for your";
			$name="";
		}
	}else if($frompage =="venue"){
		if(empty($name)){
			$invalidresponses=true;
			$namestatus = "*Invalid Entry";
			$name="";
		}/*if(empty($picture)){
			$invalidresponses=true;
			
		}*/if(empty($address)){
			$invalidresponses=true;
			$addressstatus = "*Invalid Entry";
			$address="";
		}if(empty($city)){
			$invalidresponses=true;
			$citystatus = "*Invalid Entry";
			$city="";
		}if(empty($state)){
			$invalidresponses=true;
			$statestatus = "*Invalid Entry";
			$state="";
		}if(empty($zip) or $zip == "" or !is_numeric($zip)){
			$invalidresponses=true;
			$zipstatus = "*Invalid Entry";
			$zip="";
		}if(empty($description)){
			$invalidresponses=true;
			$descriptionstatus = "*Please enter a description for your";
		}
	}
	
	if ($invalidresponses){
	?>
	<form method="post" action="<?php echo $PHP_SELF;?>" enctype="multipart/form-data">
    <?php 
    	echo "<input type =\"hidden\" name=\"frompage\" value=\"$frompage\" />\n";
		echo "<input type =\"hidden\" name=\"fromid\" value=\"$fromid\" />\n";
	if($frompage == "band"){
		?>
        <input type="hidden" name="picture" value="<?php echo "$picture"; ?>" />
            <a href="delete.php"> Delete Page </a><br />
        	<table>
            <tr>
			<td><label for="bandname">Band name:</label></td>
            <td><input type="text" id="bandname" name="bandname" value="<?php echo "$bandname"; ?>" /><?php echo "$bandnamestatus"; ?></td>
            </tr>
            <tr>
            <td valign="top"><Label for ="currentpicture">Current Picture: </Label></td>
			<?php //to be used later <img src="images/(php) echo "$picture"; (/php)"  /> ?>
			<td><img src="images/tempVenue.jpg"></td>
            </tr>
            <tr>
            <td><label for="pic">Change Picture:</label></td>
            <td><input type="file" id="pic" name="pic"  /></td>
            </tr>
            <tr>
            <td><label for="members">Members:</label></td>
            <td>
			<input type="text" id="members" name="members" value="<?php echo "$members"; ?>" /><?php echo "$membersstatus"; ?></td>
            </tr>
			<tr><td colspan="2">
					<label for="description">Description:</label>
					<textarea id="description" name="description" rows="5" cols="50" ><?php echo "$description"; ?></textarea>
			</td></tr>
            </table>
		<?php
  
  		mysqli_close($db);
		}else if($frompage == "venue"){
		?>
        <a href="delete.php"> Delete Page </a><br />
        <input type="hidden" name="picture" value="<?php echo "$picture"; ?>" />
       <table width="100%" border="0" cellspacing="10" cellpadding="3"> 
			<tr>
				<td width="20%"><label for="name">Venue Name:</label></td>
				<td width="80%"><input type="text" id="name" name="name" value="<?php echo "$name"; ?>" /><?php echo "$namestatus"; ?><br /></td>
			</tr>
			<tr>
				<td valign="top"><Label for ="currentpicture">Current Picture: </Label></td>
				<?php //to be used later <img src="images/(php) echo "$picture"; (/php)"  /> ?>
				<td><img src="images/tempVenue.jpg"></td>
			</tr>
			<tr>
				<td><label for="pic">Change Picture:</label></td>
				<td><input type="file" id="pic" name="pic"  /><br /></td>
			</tr>
			<tr>
				<td><label for="address">Address:</label></td>
				<td><input type="text" id="address" name="address" value="<?php echo "$address"; ?>" /><?php echo "$addressstatus"; ?><br /></td>
			</tr>
			<tr>
				<td><label for="city">City:</label></td>
				<td><input type="text" id="city" name="city" value="<?php echo "$city"; ?>" /><?php echo "$citystatus"; ?> <br /></td>
			</tr>
			<tr>
				<td><label for="state">State:</label></td>
				<td><input type="text" id="state" name="state" value="<?php echo "$state"; ?>" /><?php echo "$statestatus"; ?> <br /></td>
			</tr>
			<tr>
				<td><label for="zip">Zip Code:</label></td>
				<td><input type="text" id="zip" name="zip" value="<?php echo "$zip"; ?>" /><?php echo "$zipstatus"; ?> <br /></td>
			</tr>
			<tr>
				<td colspan="2"><label for="description"><?php echo "$descriptionstatus $frompage".":"; ?></label>
				<textarea id="description" name="description" rows="8" cols="54" ><?php echo "$description"; ?></textarea></td>
			</tr>
		</table>
	<?php 
	 
	 	mysqli_close($db);
	 } 
	 ?>
     <input type="submit" value="Edit Information" name="submit" />
    </form>
<?php
	//if everything was filled in correctly, add the entry to the database
	
	}
else
	{
	if($frompage == "band"){
			$pic = $_FILES['pic']['name'];
			if(!empty($pic)){
				$picture=$pic;
				$target ="images/$pic";
				move_uploaded_file($_FILES['pic']['tmp_name'], $target);
			}
			//insert added picture to database later
			$query="UPDATE bands SET bandname='$bandname', members='$members', description='$description' WHERE bandid='$fromid'";
		}else if($frompage == "venue"){
			$pic = $_FILES['pic']['name'];
			if(!empty($pic)){
				$picture=$pic;
				$target ="images/$pic";
				move_uploaded_file($_FILES['pic']['tmp_name'], $target);
			}
			$query="UPDATE venues SET name='$name', address='$address', city='$city', state='$state', zip='$zip', description='$description' WHERE venueid='$fromid'";
		}
		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
		echo "<br>";
		echo "<p>Updated profile! now redirecting to homepage...</p>";
		echo "<br>";
		mysqli_close($db);
		?><meta http-equiv="refresh" content="4;url=index.php"> <?php
	}
}
?>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>