<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Add a Venue</TITLE>
	<link rel="stylesheet" type="text/css" href="style.css" />
 </HEAD>
 
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
	$name = $_POST['name'];
	/*
	$picture = $_FILES['picture']['name'];
	$target ="images/$picture";
	move_uploaded_file($_FILES['picture']['tmp_name'], $target);
	*/
	$picture = "tempVenue.jpg";
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$description = $_POST['description'];
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
		/*echo "<br>Invalid Submission<br>";*/
		echo "<form method=\"post\" action=\"reportvenue.php\"><label for=\"name\">Venue Name:</label>
		<input type=\"text\" id=\"name\" name=\"name\" value=\"$name\" /> $namestatus<br />
		<label for=\"address\">Address:</label>
		<input type=\"text\" id=\"address\" name=\"address\" value=\"$address\" /> $addressstatus<br /><label for=\"city\">City:</label>
		<input type=\"text\" id=\"city\" name=\"city\" value=\"$city\" /> $citystatus<br /><label for=\"state\">State:</label>
		<input type=\"text\" id=\"state\" name=\"state\" value=\"$state\" /> $statestatus<br />
		<label for=\"zip\">Zip Code:</label><input type=\"text\" id=\"zip\" name=\"zip\" value=\"$zip\" /> $zipstatus
		<br /> Short description of your venue:<br>
    	<textarea id=\"description\" name=\"description\" rows=\"8\" cols=\"54\" >$description</textarea><br />
		<input type=\"submit\" value=\"Add Venue\" name=\"submit\" /></form>";
	}else{
		$query = "INSERT INTO venues (name, picture, address, city, state, zip, description, userid) VALUES ('$name', '$picture', '$address', '$city', '$state', '$zip', '$description', '$userid')";
		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
			echo "Thank you for submitting your venue location!";
	}
?>
</div>	
	<div id="footer"><p>Footer here</p></div>
</div>
</body>
</html>