<?php
session_start();
if(!session_is_registered(myusername)){
header("location:account.php");
}
?>