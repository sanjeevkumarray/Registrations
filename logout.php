<?php 
//this includes session start
include_once'includes/session.php'
?>
<?php 
//destroy session
session_destroy();
header('location: index.php');
?>