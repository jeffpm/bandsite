<?php
include "dbconnect.php";

?>
<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add an Event</title>

  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<script type="text/javascript" src="calendarDateInput.js"></script>
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
//Collect the variables from the form


		//Note:
		//
		//
		//
		//
		//I imagine an "add event" button will reside on either a band or a venue page, 
		//only visible if the account that created the page is logged in.
		//
		//The referring page must send these variables (frompage, fromid), that is, if both Venue's and Band's can add events
		//
		//(The code when $frompage = venue (because I don't yet know the band table specifics) worked when I used dummy values)
		//
		//
		//
		//
		
	$frompage = $_POST['frompage'];
	$fromid = $_POST['fromid'];


	$id = $_POST['id'];
	$date = $_POST['date'];
	$description = $_POST['description'];

//If the submit button wasn't pressed, show the form
if (!isset($_POST['submit'])) {
?>
	<form method="post" action="<?php echo $PHP_SELF;?>">
				<?php
		$frompage = $_GET['page'];
		$fromid = $_GET['id'];
		echo "<input type =\"hidden\" name=\"frompage\" value=\"$frompage\" />\n";
		echo "<input type =\"hidden\" name=\"fromid\" value=\"$fromid\" />\n";
		
		if($frompage == "band"){ //if user got here from a band's page, display list of venues
			$table="venues";
			$query = "SELECT venueid, name, city, state FROM $table";
		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
			echo "<label for=\"venue\">Name of Venue:</label><br /><select name=\"id\">";
			while($row = mysqli_fetch_array($result)) {
				$id = $row['id'];
  				$name = $row['name'];
  				$city = $row['city'];
  				$state = $row['state'];
  				echo "<option value=\"$venueid\">$name ($city, $state)</option>";
  			}
			echo "</select><br />"; 
  
  			mysqli_close($db);
		}else if($frompage == "venue"){ //if the user got here from a venue's page, display list of bands
			//Don't know the Band code, so this is rough, but you should get the idea
			$table="bands";
			$query = "SELECT bandid, bandname FROM $table";
			$result = mysqli_query($db, $query)
   				or die("Error Querying Database");
			echo "<label for=\"band\">Name of Band:</label><br /><select name=\"id\">";
			while($row = mysqli_fetch_array($result)) {
				$id = $row['id'];
  				$name = $row['bandname'];
  				echo "<option value=\"$bandid\">$name</option>";
  			}
			echo "</select><br />"; 
  
  			mysqli_close($db);
		}
	
	
	?>
	<label for="date">Date of Event:</label>
    <script>DateInput('date', true, 'YYYY-MM-DD')</script>
    <br />
    <p>Event Description<p>
     <textarea id="description" name="description" rows="8" cols="54" ></textarea><br />
     <input type="submit" value="Add Event" name="submit" />
  </form>
<?php
}
else {

//if one of the fields was blank, show the form again
	if (empty($description)){
	?>
	<form method="post" action="<?php echo $PHP_SELF;?>">
    <?php 
    	echo "<input type =\"hidden\" name=\"frompage\" value=\"$frompage\" />\n";
		echo "<input type =\"hidden\" name=\"fromid\" value=\"$fromid\" />\n";
        echo "<input type =\"hidden\" name=\"id\" value=\"$id\" />\n";
		echo "<input type =\"hidden\" name=\"date\" value=\"$date\" />\n";
	?>
    
    	<p>*Please Enter Event Description<p>
     <textarea id="description" name="description" rows="8" cols="54" ></textarea><br />
     <input type="submit" value="Add Event" name="submit" />
    </form>
<?php
	//if everything was filled in correctly, add the entry to the database
	
	}
else
	{
	if($frompage == "band"){
			$bandid="$fromid";
			$venueid="$id";
			$var="bandname";
		}else if($frompage == "venue"){
			$bandid="$id";
			$venueid="$frompage";
			$var="name";
		}
		$query = "INSERT INTO events (date, venueid, bandid, description) VALUES ('$date', '$venueid', '$bandid', '$description')";
		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
		$query = "SELECT $var from ".$frompage."s where id='$fromid'";
		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
		$row = mysqli_fetch_array($result);
		if($var == "bandname"){
			$name = $row['bandname'];
		}else if($var == "venue"){
			$name = $row['name'];
		}echo "An event has been added on $date for $name";
		mysqli_close($db);
	}
}
?>
	</div>
	
	<?php include("footer.html"); ?>
</div>
</body>
</html>