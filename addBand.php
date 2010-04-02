<?php
include "dbconnect.php";
session_start();
if(!isset($_SESSION['userid'])){
//if(!session_is_registered(myusername)){
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
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>

<body>

<div id="wrap">

	<?php
	if(isset($_SESSION['userid'])){
		//if(session_is_registered(myusername)){
			include("headerUser.php");
		} else {
			include("headerGuest.html");
		}
	?>
	
	<div id="main">
		<table cellpadding="5" cellspacing="10">
		<tr><td colspan="2">
		<tableHeader>Create a New Band</tableheader>
		</td></tr>
		<form method="post" action="reportBand.php" enctype="multipart/form-data">
		<tr>
		<th rowspan="8"><img src="images/redDesign.gif"></th>
		</tr>
		<tr><td align="right">
			<label for="bandname">Band name:</label>
			<input type="text" id="bandname" name="bandname" /><br />
		</td></tr>
        <tr><td align="right">
        	<Label for ="defaultpicture">Default Picture:</Label><br />
        	<img src="images/tempBand.jpg" /><br />
        </td>
        </tr>
        <tr><td align="right">
        	<label for="pic">Change Picture:</label> <font color="#999999">(not required to change)</font>
        	<input type="file" id="pic" name="pic"  /><br />
        </td>
        </tr>
		<?php
		$query="SELECT * from genre";
		$result = mysqli_query($db, $query)
				or die("Error: Could not query genre database.");
				?>

		<tr><td align="right">
		<label for="pic">Genre:</label>
		<select name="genre">
		<?php
		while($row = mysqli_fetch_array($result)) {
		$genre=$row['genre'];
		$genreid=$row['genreid'];
		echo "<option value=$genreid>$genre</option>";
		}
		?>
			</select>
		</td></tr>
		<tr><td align="right">
			<label for="members">Members:</label>
			<input type="text" id="members" name="members" /><br />
            <font color="#999999">(Separate members with a comma ",")</font>
		</td></tr>
	
		<tr><td align="right">
			<label>Description:</label>
			<textarea id="other" name="description" rows="5" cols="50" ></textarea>
		</td></tr>
		<tr><td align="right">
			<input type="submit" value="Add Band" name="submit" />
		</td></tr>
		</form>
		</table>
	
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>
