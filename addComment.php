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
		if(session_is_registered(myusername)){
			include("headerUser.html");
		} else {
			include("headerGuest.html");
		}
		$name = $_POST['name'];
		$comment = $_POST['comment'];
		
	$query = "INSERT INTO comments(bandid, name, comment) " . 
			 "VALUES ('$bandid', '$name', '$comment')";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	  
	  
	?>
	
	<div id="features">
			
	</div>
	
	<div id="sidebar">
		<?php include("sidebar.php"); ?>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>