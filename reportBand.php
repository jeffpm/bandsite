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
		echo "<h2>Create Band:</h2>
		
			<form method=\"post\" action=\"reportBand.php\">
			<label for=\"bandname\">Band name:</label>
			<input type=\"text\" id=\"bandname\" name=\"bandname\" value=\"$bandname\" />$bandnamestatus<br />
			
			<label for=\"members\">Members:</label>
			<input type=\"text\" id=\"members\" name=\"members\" value=\"$members\" />$membersstatus<br />
 
			<p>Description<p>
				<textarea id=\"other\" name=\"description\" rows=\"5\" cols=\"50\" value=\"$description\" ></textarea><br />

			<input type=\"submit\" value=\"Create Band\" name=\"submit\" />
		</form>";
	}
	else {
		$query = "INSERT INTO bands (bandname, members, description) " . 
				 "VALUES ('$bandname', '$members', '$description')";
  
		$result = mysqli_query($db, $query)
			or die("Error: Could not create band.");
  
	echo "<div id=\"main\">";
	echo "<h3>Success!</h3>";
	echo "Your band, <b>$bandname</b>, has been created successfully!<br />";
	echo "<p><a href=\"index.php\">Return to Main Page</a></p>";
	echo "</div>";
	
	mysqli_close($db);
	}
  
  
?>
	
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>