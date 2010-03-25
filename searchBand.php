
<?php
	session_start();
	$searcha = $_GET['search'];
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
			include("headerUser.php");
		} else {
			include("headerGuest.html");
		}
	?>
	<div id="main">
	
		<?php
		include "dbconnect.php";
		$search = mysqli_real_escape_string($db, trim($_POST['searchB']));
		if(isset($_GET['search'])){
			// set search to $_GET['search'] if provided
			$search = mysqli_real_escape_string($db, trim($searcha));
		}
		//$query ="SELECT * FROM bands WHERE (bandname) like '%$search%' ORDER BY bandname";
		$query = "SELECT * FROM bands NATURAL JOIN genre NATURAL JOIN bandgenre NATURAL JOIN bandmembers WHERE bandname like '%$search%' OR membername like '%$search%' OR genreid like '%$search%' GROUP BY bandname ORDER BY bandname";
		$result=mysqli_query($db, $query)
			or die("Error Querying Database");
				
		?>
		<table width="800" cellpadding="5" cellspacing="10">
			<tr>
				<td width="15%"><tableheader>Band Name</tableheader></td>
				<td width="30%"><tableheader>Members</tableheader></td>
				<td width="15%"><tableheader>Genre</tableheader></td>
				<td width="40%"><tableheader>Description</tableheader></td>
			</tr>
		<?php	

		while ($row = mysqli_fetch_array($result)) {
			$id=$row['bandid'];
			$bandname=$row['bandname'];
			$description = $row['description'];
			
			$query = "SELECT * FROM bandmembers WHERE bandid='$id' ORDER BY memberid ASC";
			$result2 = mysqli_query($db, $query)
   				or die("Error Querying Database");
			$firstloop=true;
			while ($row = mysqli_fetch_array($result2)) {
				if(!$firstloop){
					$members=$members.", ";
				}
				$members=$members.$row['membername'];
				$firstloop=false;
			}
			
			$query = "SELECT * FROM genre NATURAL JOIN bandgenre NATURAL JOIN bands WHERE bandid = '$id' ORDER BY genre ASC";
			$result2 = mysqli_query($db, $query)
   				or die("Error Querying Database");
			$firstloop=true;
			while ($row = mysqli_fetch_array($result2)) {
				if(!$firstloop){
						$genre=$genre.", ";
					}
					$genre = $genre."<a href=\"searchBand.php?search=".$row['genreid']."\">".$row['genre']."</a>";
				$firstloop=false;
			}
			
			echo "<tr><td><a href=\"band.php?id=$id\">$bandname</a></td><td>$members</td><td>$genre</td><td>$description</td></tr>\n";
			$members='';
			
			$genre = "";
		}
		?>
		</table>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>