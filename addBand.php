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
		<tableHeader>Create a New Band</tableheader>
		</td></tr>
		<form method="post" action="reportBand.php">
		<tr>
		<th rowspan="3"><img src="images/redDesign.gif"></th>
		</tr>
		<tr><td align="right">
			<label for="bandname">Band name:</label>
			<input type="text" id="bandname" name="bandname" /><br />
		</td></tr>
		<tr><td align="right">
			<label for="members">Members:</label>
			<input type="text" id="members" name="members" /><br />
		</td></tr>
		<tr><td align="left" colspan="2">
			<label>Description:</label>
			<textarea id="other" name="description" rows="5" cols="50" ></textarea>
		</td></tr>
		<tr><td align="left">
			<input type="submit" value="Add Band" name="submit" />
		</td></tr>
		</form>
		</table>
	
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>
