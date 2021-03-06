<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>The Ultimate Band Search</title>
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
		<?php
		include "dbconnect.php";
		$search = mysqli_real_escape_string($db, trim($_POST['searchV']));
		if($search=="Search for a venue" AND $_POST['hidden']=="false"){
			$search="";
		}
		$query ="SELECT * FROM venues WHERE (city) = '$search' or (state) = '$search'  or (name) like '%$search%'  or (address) like '%$search%' ORDER BY name";
		$result=mysqli_query($db, $query)
			or die("Error Querying Database");
		?>

		<table width="800" cellpadding="5" cellspacing="10">
			<tr>
				<td width="15%"><tableheader>Name</tableheader></td>
				<td width="20%"><tableheader>Address</tableheader></td>
				<td width="15%"><tableheader>City</tableheader></td>
				<td width="10%"><tableheader>State</tableheader></td>
				<td width="10%"><tableheader>Zip</tableheader></td>
				<td width="30%"><tableheader>Description</tableheader></td>
			</tr>
			<?php
			while ($row = mysqli_fetch_array($result)) {
				$id=$row['venueid'];
				$name=$row['name'];
				$address=$row['address'];
				$city=$row['city'];
				$state=$row['state'];
				$zip = $row['zip'];
				$description = $row['description'];

				echo "<tr><td><a href=\"venue.php?id=$id\">$name</a></td><td>$address</td><td>$city</td><td>$state</td><td>$zip</td><td>$description</td></tr>\n";
			}
			?>
		</table>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>