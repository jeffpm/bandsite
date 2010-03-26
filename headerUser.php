<script type="text/javascript"> 
function make_blank1()
{
document.form1.searchB.value ="";
}
function make_blank2()
{
document.form2.searchV.value ="";
}
function refill(type){
	if(type == "venue"){
		if(document.form2.searchV.value==""){
			document.form2.searchV.value="Search for a venue";
		}
	}else if(type == "band"){
		if(document.form1.searchB.value ==""){
			document.form1.searchB.value ="Search for a band";
		}
	}
}
</script>
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
<form name="form1" = "post" action= "searchBand.php">
<input type = "text" id="searchB" name = "searchB" value="Search for a band" onclick="make_blank1();" onBlur="refill('band')" />
<input type = "submit" value= "go" name="submit" />
</form>
</td>
<td>
<form name="form2" method = "post" action= "searchVenue.php">
<input type = "text" id="searchV" name = "searchV" value="Search for a venue" onclick="make_blank2();" onBlur="refill('venue')" />
<input type = "submit" value= "go" name="submit"/>
</form>
</td>
</tr>
</table>
</div>