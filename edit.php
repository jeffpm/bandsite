<?php
include "dbconnect.php";

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
    <?php include("header.html"); ?>
    
	<div id="main">	
	
	
	

<?php
//Collect the variables from the form
		
	$frompage = $_POST['frompage'];
	$fromid = $_POST['fromid'];

	if($frompage == "band"){
		$bandname = $_POST['bandname'];
		$members = $_POST['members'];
	}else if($frompage == "venue"){
		$name = $_POST['name'];
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
	<form method="post" action="<?php echo $PHP_SELF;?>">
				<?php
		$frompage = $_GET['page'];
		$fromid = $_GET['id'];
		echo "<input type =\"hidden\" name=\"frompage\" value=\"$frompage\" />\n";
		echo "<input type =\"hidden\" name=\"fromid\" value=\"$fromid\" />\n";
		$table=$frompage.'s';
		$query = "SELECT * FROM $table WHERE id='$fromid'";
			$result = mysqli_query($db, $query)
   				or die("Error Querying Database");
			$row=mysqli_fetch_array($result);
		if($frompage == "band"){ 
			$bandname = $row['bandname'];
			$members = $row['members'];
			$description = $row['description']; ?>
			<label for="bandname">Band name:</label>
			<input type="text" id="bandname" name="bandname" value="<?php echo "$bandname"; ?>" /><br />
			
			<label for="members">Members:</label>
			<input type="text" id="members" name="members" value="<?php echo "$members"; ?>" /><br />
 
			Short description of your band:
				<textarea id="other" name="description" rows="5" cols="50" ><?php echo "$description"; ?></textarea><br />
			<?php
  
  			mysqli_close($db);
		}else if($frompage == "venue"){ 
			$name = $row['name'];
			$picture = $row['picture'];
			$address = $row['address'];
			$city = $row['city'];
			$state = $row['state'];
			$zip = $row['zip'];
  			$description = $row['description']; ?>
			<label for="name">Venue Name:</label>
			<input type="text" id="name" name="name" value="<?php echo "$name"; ?>" /> <br />
			<label for="address">Address:</label>
			<input type="text" id="address" name="address" value="<?php echo "$address"; ?>" /> <br />
			<label for="city">City:</label>
			<input type="text" id="city" name="city" value="<?php echo "$city"; ?>" /> <br />
			<label for="state">State:</label>
			<input type="text" id="state" name="state" value="<?php echo "$state"; ?>" /> <br />
			<label for="zip">Zip Code:</label>
			<input type="text" id="zip" name="zip" value="<?php echo "$zip"; ?>" /> <br />
			Short description of your venue:<br>
    		<textarea id="description" name="description" rows="8" cols="54" ><?php echo "$description"; ?></textarea><br />
			<?php
			
  			mysqli_close($db);
		}
	?>
     <input type="submit" value="Edit Information" name="submit" />
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
	<form method="post" action="<?php echo $PHP_SELF;?>">
    
    
    <?php 
    	echo "<input type =\"hidden\" name=\"frompage\" value=\"$frompage\" />\n";
		echo "<input type =\"hidden\" name=\"fromid\" value=\"$fromid\" />\n";
	if($frompage == "band"){
		?>
            <label for="bandname">Band name:</label>
			<input type="text" id="bandname" name="bandname" value="<?php echo "$bandname"; ?>" /><?php echo "$bandnamestatus"; ?><br />
			
			<label for="members">Members:</label>
			<input type="text" id="members" name="members" value="<?php echo "$members"; ?>" /><?php echo "$membersstatus"; ?><br />
 
			<?php echo "$descriptionstatus $frompage".":"; ?>
				<textarea id="other" name="description" rows="5" cols="50" ><?php echo "$description"; ?></textarea><br />
            
		<?php
  
  		mysqli_close($db);
		}else if($frompage == "venue"){
		?>
    	<label for="name">Venue Name:</label>
			<input type="text" id="name" name="name" value="<?php echo "$name"; ?>" /><?php echo "$namestatus"; ?> <br />
			<label for="address">Address:</label>
			<input type="text" id="address" name="address" value="<?php echo "$address"; ?>" /><?php echo "$addressstatus"; ?> <br />
			<label for="city">City:</label>
			<input type="text" id="city" name="city" value="<?php echo "$city"; ?>" /><?php echo "$citystatus"; ?> <br />
			<label for="state">State:</label>
			<input type="text" id="state" name="state" value="<?php echo "$state"; ?>" /><?php echo "$statestatus"; ?> <br />
			<label for="zip">Zip Code:</label>
			<input type="text" id="zip" name="zip" value="<?php echo "$zip"; ?>" /><?php echo "$zipstatus"; ?> <br />
			<?php echo "$descriptionstatus $frompage".":"; ?><br>
    		<textarea id="description" name="description" rows="8" cols="54" ><?php echo "$description"; ?></textarea><br />
     <?php 
	 
	 	mysqli_close($db);
	 } 
	 ?>
     <input type="submit" value="Add Event" name="submit" />
    </form>
<?php
	//if everything was filled in correctly, add the entry to the database
	
	}
else
	{
	if($frompage == "band"){
			$query="UPDATE bands SET bandname='$bandname', members='$members', description='$description' WHERE id='$fromid'";
		}else if($frompage == "venue"){
			$query="UPDATE venues SET name='$name', picture='$picture', address='$address', city='$city', state='$state', zip='$zip', description='$description' WHERE id='$fromid'";
		}
		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
		echo "Updated profile! now redirecting... (add that code here)";
		mysqli_close($db);
	}
}
?>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>