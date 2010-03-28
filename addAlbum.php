<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
include "dbconnect.php";
?>

<head>
<title>Account Creation</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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
	
	
	

<?php
$bandid = $_GET['id'];

//Collect the variables from the form 
$albumname = mysqli_real_escape_string($db, trim($_POST["albumname"]));
$albumband = mysqli_real_escape_string($db, trim("$bandid"));
$albumgenre = mysqli_real_escape_string($db, trim($_POST["albumgenre"]));
$albumyear = mysqli_real_escape_string($db, trim($_POST["albumyear"]));
$picture = $_POST['picture'];
//$email = mysqli_real_escape_string($db, trim($_POST["email"])); (picture look at edit.php)

//If the submit button wasn't pressed, show the form
if (!isset($_POST['submit'])) {
?>
<table cellpadding="5" cellspacing="10">
<form method="post" action="<?php echo $PHP_SELF;?>">
<tr>
	<th rowspan="7"><img src="images/redDesign.gif"></th>
</tr>
<tr>
	<td align="right">
		
		<label for="albumname">Album Name:</label>
		<input type="text" id="albumname" name="albumname" /><br />
	</td>
</tr>
<tr>
	<td align="right">
		
		<label for="albumyear">Album Year:</label>
		<input type="text" id="albumyear" name="albumyear" /><br />
	</td>
</tr>

<?php
$query="SELECT * from genre";
		$result = mysqli_query($db, $query)
				or die("Error: Could not query genre database.");
				?>

		<tr>
		<td><label for="pic">Genre:</label>
		<select name="albumgenre">
		<?php
		while($row = mysqli_fetch_array($result)) {
		$genre=$row['genre'];
		$genreid=$row['genreid'];
		echo "<option value=$genre>$genre</option>";
		}
?>
<tr>
	<td align="right">
		<input type="submit" value="submit" name="submit">
		</form>
	</td>
</tr>
</table>
<?php
}
else {

//if one of the fields was blank, show the form again
	if (empty($albumname)|| empty($albumyear)|| empty($albumgenre)){
		?>
	<table cellpadding="5" cellspacing="10">
	<tr>
		<th rowspan="7"><img src="images/redDesign.gif"></th>
	</tr>
	<form method="post" action="<?php echo $PHP_SELF;?>">
	<tr>
		<td>
	<?php
		//display error message for albumname field
	echo "<label for=\"albumname\">Album name:</label>";
	if(empty($albumname)){
	echo "<input type=\"text\" id=\"albumname\" name=\"albumname\" /> Enter a Album Name";
	}
	else{
	echo "<input type=\"text\" id=\"albumname\" name=\"albumname\" value=\"$albumname\" />";
	}
	?>
		</td>
	</tr>
	<tr>
		<td>
	
	<?php
		//display error message for albumyear field
		
	echo "<label for=\"albumyear\">Album Year:</label>";
	if(empty($albumyear)){
	echo "<input type=\"text\" id=\"albumyear\" name=\"albumyear\" /> Enter an Album Year";
	}
	else{
	echo "<input type=\"text\" id=\"albumyear\" name=\"albumyear\" value=\"$albumyear\" />";
	}
	?>
		</td>	
	</tr>
	<tr>
		<td>
	<?php
		//display error message for albumgenre field
		
	
		$query="SELECT * from genre";
		$result = mysqli_query($db, $query)
				or die("Error: Could not query genre database.");
				?>

		<tr>
		<td><label for="pic">Genre:</label>
		<select name="albumgenre">
		<?php
		while($row = mysqli_fetch_array($result)) {
		$genre=$row['genre'];
		$genreid=$row['genreid'];
		echo "<option value=$genre>$genre</option>";
		}
	?>
		</td>
	</tr>
	<tr>
		<td>
	

		</td>
	</tr>
	<tr>
		<td align="center">
	<?php
	echo "<input type=\"submit\" value=\"submit\" name=\"submit\">";
	echo "</form>";
	?>
		</td>
	</tr>
	</table>
	<?php
	//if everything was filled in correctly, add the album to the database
}else
	{
	$query="INSERT INTO albums(albumname, albumyear, albumband, albumgenre, picture) VALUES ('$albumname', '$albumyear', '$albumband', '$albumgenre', 'tempband.png')";
	$result = mysqli_query($db, $query)
		or die("Error querying database");
	?>
	<table cellpadding="5" cellspacing="10">
	<tr>
		<td><img src="images/redDesign.gif"></td>
		<td>
			<label>Thank you for adding an album.</label>
		</td>
	</tr>
	</table>
	<?php
	}
}
?>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>