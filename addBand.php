<?php
session_start();
if(!session_is_registered(myusername)){
header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Add a Band</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<div id="wrap">

	<?php include("header.html"); ?>
	
	<div id="main">
	
		<h2>Create Band:</h2>
	
		<form method="post" action="reportBand.php">
			<label for="bandname">Band name:</label>
			<input type="text" id="bandname" name="bandname" /><br />
			
			<label for="members">Members:</label>
			<input type="text" id="members" name="members" /><br />
 
			Description
				<textarea id="other" name="description" rows="5" cols="50" ></textarea><br />

			<input type="submit" value="Create Band" name="submit" />
		</form>
	
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>
