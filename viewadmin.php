<?php
session_start();
include "dbconnect.php";
if(!isset($_SESSION['userid']) || $_SESSION['userid']!=1){
//if(!session_is_registered(myusername)){
header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Account Management</title>
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
			<table width="800" cellpadding="5" cellspacing="10">
			<tr>
				<td width="25%"><commentheader>User</commentheader></td>
				<td width="35%"><commentheader>Bands</commentheader></td>
                <td width="35%"><commentheader>Venues</commentheader></td>
			</tr>
	<?php
	$query = 
	$query = "select accounts.userid, accounts.firstname, accounts.lastname, bands.bandname, bands.bandid, venues.name, venues.venueid from (accounts LEFT OUTER JOIN bands ON accounts.userid=bands.userid) LEFT OUTER JOIN venues ON accounts.userid=venues.userid";
	$result = mysqli_query($db, $query)
	or die("Error querying Database");
	$namestring="";
	$bandstring="";
	$venuestring="";
	$isFirst=true;
	$lastbandid="";
	$lastvenueid="";
	$lastaccountid="";
	$startoftable=true;
	$brepeats=false;
	$vrepeats=false;
	
	while ($row = mysqli_fetch_array($result)) {
		$userid=$row['userid'];
		if($userid==$lastaccountid){
			$isFirst=false;
		}else{
			$isFirst=true;
			$brepeats=false;
			$vrepeats=false;
			if($startoftable){
				$startoftable=false;
			}else{
				echo "<tr><td>$namestring</td><td>$bandstring</td><td>$venuestring</td></tr>\n";
				$namestring="";
				$bandstring="";
				$venuestring="";
				
			}
		}
		$lastaccountid=$userid;
		$firstname=$row['firstname'];
		$f = $firstname;
		$lastname=$row['lastname'];
		$l = $lastname;
		$bandid=$row['bandid'];
		$bandname=$row['bandname'];
		
		$venueid=$row['venueid'];
		$venuename=$row['name'];
		
		if($isFirst){
			
			$namestring=$f." ".$l;
			$isFirst=false;
			$bandstring="<a href=\"band.php?id=$bandid\">".$bandname."</a>";
			$lastbandid=$bandid;
			$venuestring="<a href=\"venue.php?id=$venueid\">".$venuename."</a>";
			$lastvenueid=$venueid;
			$bandids=array($bandid);
			$venueids=array($venueid);
			array_push($bandids, $bandid);
			array_push($venueids, $venueid);
		}else{
			
			if(!(in_array($bandid, $bandids))){
				$bandstring=$bandstring.", "."<a href=\"band.php?id=$bandid\">".$bandname."</a>";
				array_push($bandids, $bandid);
			}else{
				$brepeats=true;
			}
			if(!(in_array($venueid, $venueids))){
				$venuestring=$venuestring.", "."<a href=\"venue.php?id=$venueid\">".$venuename."</a>";
				array_push($venueids, $venueid);
			}else{
				$vrepeats=true;
			}
		}
		//echo "<tr><td>$f $l</td><td>$bands</td></tr>\n";
		/*while ($row = mysqli_fetch_array($result)) {
			$firstname=$row['firstname'];
			$lastname=$row['lastname'];
			if($firstname==$f && $lastname==$l) {
				$bands=$bands.", ";
				$bands=$bands.$row['bandname'];
				echo "<tr><td>$f $l</td><td>$bands</td></tr>\n";
			}
			else {
				echo "<tr><td>$f $l</td><td>$bands</td></tr>\n";
				$f = $firstname;
				$l = $lastname;
				$bands="";
				$bands=$row['bandname'];
			}
		}*/
		
	} 
	echo "<tr><td>$namestring</td><td>$bandstring</td><td>$venuestring</td></tr>\n";
	?>
		</table>
	</div>

	<?php include("footer.html"); ?>
</div>
</body>
</html>