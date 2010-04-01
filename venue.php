<?php
include "dbconnect.php";
	session_start();
	include "imageresize.php";
$venueid = $_GET['id'];

$query = "select * from venues where venueid='$venueid'";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	
	$row = mysqli_fetch_array($result);
	$venueid = $row['venueid'];
	$name = $row['name'];
	$picture = $row['picture'];
	$address = $row['address'];
	$city = $row['city'];
	$state = $row['state'];
	$zip = $row['zip'];
	$description = $row['description'];
	$refid=$row['userid'];

	  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php
  echo "<title>Venue Profile For $name</title>";
  ?>
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
	if(isset($_SESSION['userid'])  AND $_SESSION['userid']==$refid){
	//if(session_is_registered(myusername)){
	echo "<p><a href=\"edit.php?page=venue&id=$venueid\">Edit/Delete Venue Information</a>";
	echo " - <a href=\"addevent.php?page=venue&id=$venueid\">Add Event</a>";
    echo " </p>";
	}
	?>
	<table width="800" cellpadding="5" cellspacing="10">
		<tr>
			<td width="65%">
			<pagetitle><?php echo "$name";?></pagetitle>
			<th rowspan="4" valign="top"><img src="images/<?php echo"$picture"; ?>" <?php imageResize(300, 300,"images/$picture");  ?>/></th>
			</td>
		</tr>
		<tr><td>
			<p><?php echo "<commentheader>Address:</commentheader> $address, $city, $state, $zip";?></p>
		</td></tr>
		<tr><td>
			<p><?php echo "<commentheader>Description:</commentheader> $description";?></p>
		</td></tr>
		
		<tr>
			<td rowspan="3"><p>Location:</p>
			
			<!--
  // Created with a Google AJAX Search Wizard
  // http://code.google.com/apis/ajaxsearch/wizards.html
  -->

  <!--
  // The Following div element will end up holding the map search control.
  // You can place this anywhere on your page
  -->
  <div id="mapsearch">
    <span style="color:#676767;font-size:11px;margin:10px;padding:4px;">Loading...</span>
  </div>

  <!-- Maps Api, Ajax Search Api and Stylesheet
  // Note: If you are already using the Maps API then do not include it again
  //       If you are already using the AJAX Search API, then do not include it
  //       or its stylesheet again
  //
  // The Key Embedded in the following script tags is designed to work with
  // the following site:
  // http://localhost/bandsite/index.php
  -->
  <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAZH4K8UiEV1G6QtgjL0a3cBQW89c7v4afIrv3usSIGZsmEkBAUBTqNsYxCl96ZEO-nw1ve1AuLGIwDw"
    type="text/javascript"></script>
  <script src="http://www.google.com/uds/api?file=uds.js&v=1.0&source=uds-msw&key=ABQIAAAAZH4K8UiEV1G6QtgjL0a3cBQW89c7v4afIrv3usSIGZsmEkBAUBTqNsYxCl96ZEO-nw1ve1AuLGIwDw"
    type="text/javascript"></script>
  <style type="text/css">
    @import url("http://www.google.com/uds/css/gsearch.css");
  </style>

  <!-- Map Search Control and Stylesheet -->
  <script type="text/javascript">
    window._uds_msw_donotrepair = true;
  </script>
  <script src="http://www.google.com/uds/solutions/mapsearch/gsmapsearch.js?mode=new"
    type="text/javascript"></script>
  <style type="text/css">
    @import url("http://www.google.com/uds/solutions/mapsearch/gsmapsearch.css");
  </style>

  <style type="text/css">
    .gsmsc-mapDiv {
      height : 300px;
	  width:400px;
    }

    .gsmsc-idleMapDiv {
      height : 300px;
	  width:400px;
    }

    #mapsearch {
      width : 400px;
      margin: 10px;
      padding: 4px;
    }
  </style>
  <script type="text/javascript">
    function LoadMapSearchControl() {

      var options = {
            zoomControl : GSmapSearchControl.ZOOM_CONTROL_ENABLE_ALL,
            title : "<?php echo "$name";?>",
            //url : "http://www.google.com/corporate/index.html",
            idleMapZoom : GSmapSearchControl.ACTIVE_MAP_ZOOM,
            activeMapZoom : GSmapSearchControl.ACTIVE_MAP_ZOOM
            }

      new GSmapSearchControl(
            document.getElementById("mapsearch"),
            "<?php echo"$address, $zip"; ?>",
            options
            );

    }
    // arrange for this function to be called during body.onload
    // event processing
    GSearch.setOnLoadCallback(LoadMapSearchControl);
  </script>
			
			
			<!--<img src="http://maps.google.com/maps/api/staticmap?size=400x400&maptype=roadmap\&markers=size:mid|color:red|
			<?php echo"$address,$zip";?>&sensor=false" />-->
		</td></tr>
	</table>
    
	
	
    <?php
	
	$query = "select events.date, bands.bandid, bands.bandname, events.description from events INNER JOIN bands ON events.bandid=bands.bandid AND events.venueid='$venueid' ORDER BY events.date";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	  $hasResults=true;
	  	while ($row = mysqli_fetch_array($result)) {
			if($hasResults){ //creates the start of table on first run
			?>
            <tableheader>Events:</tableheader>
            <table width="750" cellpadding="5" cellspacing="10">
			<tr>
				<td width="25%"><commentheader>Date</commentheader></td>
				<td width="35%"><commentheader>Featured Band</commentheader></td>
				<td width="40%"><commentheader>Details</commentheader></td>
			</tr>
            <?php
				$hasResults=false;
			}
				$id=$row['bandid'];
				$date=$row['date'];
				$description = $row['description'];
				$name=$row['bandname'];
				$temp=substr($date, -5, 2)."/".substr($date, -2)."/".substr($date, 0, 4);
				echo "<tr><td>$temp</td><td><a href=\"band.php?id=$id\">$name</a></td><td>$description</td></tr>\n";
			}
	
	
	?>
    </table>
	</div>
	<?php include("footer.html"); ?>
</div>
</body>
</html>
