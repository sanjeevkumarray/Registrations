<?php
ob_start();
?>
<?php
require_once 'includes/auth_check.php';
	require_once 'db/conn.php';
	if(!$_GET['id']){
		echo"error";
		
	}else{
		//get id value
		$id=$_GET['id'];
		//call Delete fun.
		$result=$crud->deleteAttendee($id);
		//redirect to list
		if($result){

			header("Location:viewrecords.php");
			ob_end_flush();
		}else{
			echo'';
		}
	}
	
?>
