<div id="header"><h1><a href="index.php"><img src=images/logo2.png></a></h1></div>

<div id="header2"><p><i>All your favorite bands and where to find them!</i></p></div>

<div id="toolbar">
		<a href="addBand.php">Create Band</a> | 
		<a href="addvenue.php">Create Venue</a> | 
		<a href="admin.php">Account Management</a> | 

		<?php echo $_SESSION['username'] ?> <a href="logout.php">Logout</a>
		<table align=center>
<tr>
<td>
<form method = "post" action= "searchBand.php">
<input type = "text" id="searchB" name = "searchB" value="Search for a band"/>
<input type = "submit" value= "go" name="submit" />
</form>
</td>
<td>
<form method = "post" action= "searchVenue.php">
<input type = "text" id="searchV" name = "searchV" value="Search for a venue"/>
<input type = "submit" value= "go" name="submit"/>
</form>
</td>
</tr>
</table>
</div>