<?php
session_start();
if(!session_is_registered(myusername)){
header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

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
	<table cellpadding="5" cellspacing="10">
		<tr><td colspan="2">
			<tableHeader>Create a New Venue</tableheader>
		</td></tr>
		<form method="post" action="reportvenue.php">
		<tr>
		<th rowspan="6"><img src="images/redDesign.gif"></th>
		</tr>
		<tr><td align="right">
			<label for="name">Venue Name:</label>
			<input type="text" id="name" name="name" /> <br />
		</td></tr>
		<tr><td align="right">
			<label for="address">Address:</label>
			<input type="text" id="address" name="address" /> <br />
		</td></tr>
		<tr><td align="right">
			<label for="city">City:</label>
			<input type="text" id="city" name="city" /> <br />
		</td></tr>
		<tr><td align="right">
			<label for="state">State:</label>
			<input type="text" id="state" name="state" /> <br />
		</td></tr>
		<tr><td align="right">
			<label for="zip">Zip Code:</label>
			<input type="text" id="zip" name="zip" /> <br />
		</td></tr>
		<tr><td align="left" colspan="2">
			<label>Description:</label>
			<textarea id="description" name="description" rows="5" cols="50" ></textarea>
		</td></tr>
		<tr><td align="left">
			<input type="submit" value="Add Venue" name="submit" />
		</td></tr>
		</form>
	</table>
	</div>	
	<?php include("footer.html"); ?>
</div>
</body>
</html>