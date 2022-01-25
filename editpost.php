<?php
ob_start();
?>
<?php
//Get values from the post Operation
require_once 'db/conn.php';

	if (isset($_POST['submit'])) {

		//extract values from the $_POST array
		$id = $_POST['id'];
		$fname = $_POST['firstName'];
		$lname = $_POST['lastName'];
		$dob = $_POST['dob'];
		$email = $_POST['email'];
		$contact = $_POST['phone'];
		$specialty = $_POST['specialty'];

		//call crud Funtion
		$result = $crud->editAttendees($id, $fname, $lname, $dob, $email, $contact, $specialty);
		//redirect  to index.php
		if ($result) {
			header("Location: viewrecords.php");
			ob_end_flush();
		} else {
			echo "error";
		}
	} 
	else {
		echo "error";
	}
?>
