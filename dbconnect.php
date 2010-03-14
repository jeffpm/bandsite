<?php
ob_start();
	$db = mysqli_connect('localhost', 'banduser', 'band', 'band')
	or header("Location: setup.php");
	//ob_flush();  // Katherine: Line gave errors with session header.
	//die ("ERROR: connecting to mysql server!");

?>