<?php include "dbconnect.php"; 
session_start(); 
$bandid = $_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>The Ultimate Band Surf</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="wrap">
    <?php
	if(isset($_SESSION['userid'])){
		//if(session_is_registered(myusername)){
			include("headerUser.html");
		} else {
			include("headerGuest.html");
		}
		$name = mysqli_real_escape_string($db, trim($_POST['name']));
		$comment = mysqli_real_escape_string($db, trim($_POST['comment']));
		$date=mysqli_real_escape_string($db, trim(date("Y-m-d")));
		
	$query = "INSERT INTO comments(bandid, name, comment, date) " . 
			 "VALUES ('$bandid', '$name', '$comment', '$date')";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	  
	  
	?>
	
	<div id="main">
	<table cellpadding="5" cellspacing="10">
	<tr><td>
	Thank you, your comment has been added.
	</td></tr>
	<tr><td>
	<label><a href="index.php">Return to Main Page</a></label>
	</td></tr>
	</table>	
	</div>
	
	<div id="sidebar">
		<?php include("sidebar.php"); ?>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>