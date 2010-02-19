<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Add a Venue</TITLE>
	<link rel="stylesheet" type="text/css" href="style.css" />
 </HEAD>
 
 <body>
 <div id="wrap">
     <?php include("header.html"); ?>
	<div id="main">	
<form method="post" action="reportvenue.php">
	<label for="name">Venue Name:</label>
		<input type="text" id="name" name="name" /> <br />
	<label for="address">Address:</label>
		<input type="text" id="address" name="address" /> <br />
	<label for="city">City:</label>
		<input type="text" id="city" name="city" /> <br />
	<label for="state">State:</label>
		<input type="text" id="state" name="state" /> <br />
	<label for="zip">Zip Code:</label>
		<input type="text" id="zip" name="zip" /> <br />
    Short description of your venue:<br>
    	<textarea id="description" name="description" rows="8" cols="54" ></textarea><br />
	<input type="submit" value="Add Venue" name="submit" />
</form>

</div>	
	<div id="footer"><p>Footer here</p></div>
</div>
</body>
</html>