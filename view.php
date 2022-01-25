<?php $tittle = 'View record';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
//Get attendee by id
if(!isset($_GET['id'])){
	echo"<h1 class='text-danger'>Please Check Details and try again</h1>";
	
}else{
	$id=$_GET['id'];
	$result=$crud->getAttendeeDetails($id);

?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $result['firstName'] . " " . $result['lastName'] ?></h5>
    <!--concatinating first name and last name-->
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name'] ?></h6>
    <p class="card-text">
      Date Of Birth:<?php echo $result['dateOfBirth'] ?></p>
    <p class="card-text">
      Email:<?php echo $result['emailAddress'] ?></p>
    <p class="card-text">
      Contact :<?php echo $result['contact'] ?></p>
  </div>
</div>
<br>
<a href="viewrecords.php"class="btn btn-info">Back To List</a>
<a href="edit.php?id=<?php echo $result['index_id'] ?>"class="btn btn-warning">Edit</a>
<?php } ?>

<br>
<br>
<br>
<br>


<?php require_once 'includes/footer.php';  ?>