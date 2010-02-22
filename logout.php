<?php
/*
session_start();
session_destroy();
header("location:index.php");
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Add a Venue</TITLE>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<SCRIPT LANGUAGE="JavaScript">
  function redireccionar() {
    setTimeout("location.href='index.php'", 3000);
  }
  </SCRIPT>
 </HEAD>
 
 <body onLoad="redireccionar()">
 <div id="wrap">
     <?php include("header.html"); ?>
	<div id="main">	
	Logged out. Redirecting to index.php in 3 seconds...
	</div>	
	<div id="footer"><p>Footer here</p></div>
</div>
</body>
</html>