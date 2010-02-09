<html>
<body> 
<?php
	/*include "db_connect.php";*/
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$description = $_POST['description'];
	$valid_responses = true;
	echo " (test code) PASSED VARS: $name $address $city $state $zip $description";
	if(is_null($name) or $name == ""){
		$valid_responses = false;
		$name = "Invalid Entry";
	}
	if(is_null($address) or $address == ""){
		$valid_responses = false;
		$address = "Invalid Entry";
	}
	if(is_null($city) or $city == ""){
		$valid_responses = false;
		$city = "Invalid Entry";
	}
	if(is_null($state) or $state == ""){
		$valid_responses = false;
		$state = "Invalid Entry";
	}
	if(is_null($zip) or $zip == "" or !is_numeric($zip)){
		$valid_responses = false;
		$zip = "Invalid Entry";
	}
	if($valid_responses == false){
		echo "<br>Invalid Submission<br>";
		echo "<form method=\"post\" action=\"createVenue.php\"><label for=\"name\">Venue Name:</label>
		<input type=\"text\" id=\"name\" name=\"name\" value=\"$name\" /> <br /><label for=\"address\">Address:</label>
		<input type=\"text\" id=\"address\" name=\"address\" value=\"$address\" /> <br /><label for=\"city\">City:</label>
		<input type=\"text\" id=\"city\" name=\"city\" value=\"$city\" /> <br /><label for=\"state\">State:</label>
		<input type=\"text\" id=\"state\" name=\"state\" value=\"$state\" /> <br />
		<label for=\"zip\">Zipcode:</label><input type=\"text\" id=\"zip\" name=\"zip\" value=\"$zip\" /> 
		<br /> Short description of your venue:<br>
    	<textarea id=\"description\" name=\"description\" rows=\"8\" cols=\"54\" >$description</textarea><br />
		<input type=\"submit\" value=\"Add Venue\" name=\"submit\" /></form>";
	}else{
		/*$query = "INSERT INTO venues (name, address, city, state, zip, description) VALUES ('$name', '$address', '$city', '$state', '$zip', '$description')";
		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");*/
	}
?>
</body>
</html>