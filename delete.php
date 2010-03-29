<?php session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php

include "dbconnect.php";
	
	 //or die ("");

?>

<head>
<title>Account Creation</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<style type="text/css">

  .submitLink {
   color: #FFF;
   background-color: transparent;
   text-decoration: underline;
   border: none;
   cursor: pointer;
   cursor: hand;
  }

</style>
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
//Collect the Session variables
	$id = $_SESSION['id'];
	$type = $_SESSION['type'];
	$name = $_SESSION['name'];
	//$id = "1";
if(!empty($id)){

	
//If the submit button (Yes) wasn't pressed, show the form
if (!isset($_POST['submit'])) {
?>
<br />
<tableheader>Delete page for: <?php echo "$name" ?></tableheader>
    
<p>Are you sure you want to delete this page?</p><br /> 
<table width="25%" border="0" cellspacing="10" cellpadding="3">
<tr height="25">
<td width="35">
<form id="myform" method="post" action="<?php echo $PHP_SELF;?>">
<input type="submit" class="submitLink" value="Yes" name="submit">
</form>
</td>
<td width="25"><center>-</center>
</td>
<td width="35">
<form id="myform" method="post" action="index.php">
<input type="submit" class="submitLink" value="No" name="submit">
</form>
</td>
</tr>
</table>
<?php
}
else {
?>
<meta http-equiv="refresh" content="4;url=index.php">
<?php
	//echo "type: $type $id";
	$query="DELETE FROM ".$type."s WHERE ".$type."id=$id";
	//echo "$query";
	$result = mysqli_query($db, $query)
   			or die("Error Querying Database1");
	$query="DELETE FROM events WHERE ".$type."id=$id";
	$result = mysqli_query($db, $query)
   			or die("Error Querying Database2");
			
	echo "<p>Page deleted! now redirecting to homepage...</p>";
	
	mysqli_close($db);
	$_SESSION['id'] = "";
	$_SESSION['type'] = "";
	$_SESSION['name'] = "";
}
}else{
	echo "Error. Redirecting..";
	?> <meta http-equiv="refresh" content="4;url=index.php">
	<?php
	
	}
	?>
	
	<?php include("footer.html"); ?>
    
</div>
</body>
</html>