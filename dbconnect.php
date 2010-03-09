<?php
ob_start();
	$db = mysqli_connect('localhost', 'banduser', 'band', 'band')
	or header("Location: setup.php");
	ob_flush();
	//die ("ERROR: connecting to mysql server!");

?>