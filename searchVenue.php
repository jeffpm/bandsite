<?php
	session_start();
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
	?>
	<div id="main">
	
<?php
	include "dbconnect.php";
$search = $_POST['searchV'];
$query ="SELECT * FROM venues WHERE (city) = '$search' or (state) = '$search'  or (name) like '%$search%'  or (address) like '%$search%' ORDER BY name";
$result=mysqli_query($db, $query)
or die("Error Querying Database");

echo "<table id=\"hor-minimalist-b\">\n<tr><th>Name</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Description</th><tr>\n\n";

while ($row = mysqli_fetch_array($result)) {
$id=$row['id'];
$name=$row['name'];
$address=$row['address'];
$city=$row['city'];
$state=$row['state'];
$zip = $row['zip'];
$description = $row['description'];

echo "<tr><td><a href=\"venue.php?id=$id\">$name</a></td><td>$address</td><td>$city</td><td>$state</td><td>$zip</td><td>$description</td></tr>\n";


}
echo "</table>\n";

?>	
</body>
</html>