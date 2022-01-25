<?php $tittle = 'Success';
require_once 'includes/header.php';
require_once 'db/conn.php';

if(isset($_POST['submit'])) {
 
  //extract values from the $_POST array
  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $contact = $_POST['phone'];
  $specialty = $_POST['specialty'];

  // //pic work
  // $orig_file = $_FILES["avatar"]["tmp_name"];
  // // $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
  // $target_dir = 'uploads/';
  // $destination = $target_dir . basename($_FILES["avatar"]["name"]);
  // move_uploaded_file($orig_file,$destination);

  // exit();
  //call function to insert and track if success or not
  $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);
  $specialtyName = $crud->getSpecialtyById($specialty);

  if ($isSuccess) {
    echo '<h1 class="text-center text-success">You have been registerd sir! </h1>';
  }
   else {
    echo '<h1 class="text-center text-danger">There was an error in processing sir!</h1>';
}
}
?>
<!-- <h1 class="text-center text-success">You have been registerd sir! </h1> -->
<!-- Get Method -->
<!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><? //php echo $_GET['firstName']." ".$_GET['lastName']
                            ?></h5>concatinating first name and last name
    <h6 class="card-subtitle mb-2 text-muted"><? //php echo $_GET['specialty']
                                              ?></h6>
    <p class="card-text">
	    Date Of Birth:<? //php echo $_GET['dob']
                    ?></p>
    <p class="card-text">
	    Email:<? //php echo $_GET['email']
            ?></p>
    <p class="card-text">
	    Contact :<? //php echo $_GET['phone']
                ?></p>
  </div>
</div> -->
<!-- POST Method -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstName'] . " " . $_POST['lastName'] ?></h5>
    <!--concatinating first name and last name-->
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $specialtyName['name'] ?></h6>
    <p class="card-text">
      Date Of Birth:<?php echo $_POST['dob'] ?></p>
    <p class="card-text">
      Email:<?php echo $_POST['email'] ?></p>
    <p class="card-text">
      Contact :<?php echo $_POST['phone'] ?></p>
  </div>
</div>

<?php require_once 'includes/footer.php';  ?>