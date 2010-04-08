<?php
	session_start();
	$genreid = $_GET['search'];
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
				$query="SELECT * FROM genre where genreid=$genreid";
				$result = mysqli_query($db, $query)
   				or die("Error Querying Database");
				$row = mysqli_fetch_array($result);
				$genre=$row['genre'];
				echo "<commentheader>Bands in the $genre genre:</commentheader>";
				
		$query="SELECT * FROM genre NATURAL JOIN bandgenre NATURAL JOIN bands where genre.genreid=$genreid ORDER BY bandname";
		$result = mysqli_query($db, $query)
   				or die("Error Querying Database");
				$genre=$row['genre'];
		
		
		?>
		
		<table width="800" cellpadding="5" cellspacing="10">
			<tr>
				<td width="15%"><tableheader>Band Name</tableheader></td>
				<!--<td width="15%"><tableheader>Genre</tableheader></td>-->
				<td width="40%"><tableheader>Description</tableheader></td>
			</tr>
			<?php
			while ($row = mysqli_fetch_array($result)) {
			$bandid=$row['bandid'];
			$bandname=$row['bandname'];
			$genre=$row['genre'];
			$description=$row['description'];
			echo "<tr><td><a href=\"band.php?id=$bandid\">$bandname</a></td><td>$description</td></tr>";
			}
			?>


		
		</table>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>