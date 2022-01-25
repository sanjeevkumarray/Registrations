<?php $tittle = 'Edit';
require_once 'includes/header.php';
require_once 'db/conn.php';
require_once 'includes/auth_check.php';
$results=  $crud->getSpecialty();
if(!isset($_GET['id'])){
	echo"<h1 class='text-danger'>Please Check Details and try again</h1>";
	
}else{
	$id=$_GET['id'];
	$attendee=$crud->getAttendeeDetails($id);

?>

<h1 class="text-center"> Edit The Detatils</h1>
<!--Form contains of:-
  First Name
  Last Name
  Date of Birth(Date picker)
  specialty(DataBase Admin,Software Developer,Web Administrator,Other)
  Email Adress
  Contact Number
-->
<form method="post" action="editpost.php">
<input type="hidden"name="id" value="<?php echo $attendee['index_id']?>"/>
	<div class="mb-3">
		<label for="firstName" class="form-label">First Name</label>
		<input type="text" class="form-control" id="firstName"value="<?php echo $attendee['firstName'] ?>"name="firstName"><!--name is used in php,id and class is for visual but php works on name -->

	</div>
	<div class="mb-3">
		<label for="lastName" class="form-label">Last Name</label>
		<input type="text" class="form-control" id="lastName"value="<?php echo $attendee['lastName'] ?>"name="lastName">

	</div>
	<div class="mb-3">
		<label for="dob" class="form-label">Date Of Birth</label>
		<input type="text" class="form-control" id="dob"value="<?php echo $attendee['dateOfBirth'] ?>"name="dob">

	</div>
	<div class="mb-3">
		<label for="specialty" class="form-label">Area Of Experties</label>
		<select class="form-select" aria-label="Default select example"id="specialty"name="specialty">
			<!-- <option value="1">DataBase Admin</option>
			<option value="3">Software Developer</option>
			<option value="4">Web Administrator</option>
			<option value="5">Other</option> -->
			<?php while($r= $results->fetch(PDO::FETCH_ASSOC)){ ?>
				<option value="<?php echo $r['specialty_id'] ?>"<?php if($r['specialty_id']==$attendee['specialty_id'])
				echo 'selected' ?>>
				<?php echo $r['name'] ?></option>

			<?php }?>	
		</select>

	</div>
	<div class="mb-3">
		<label for="email" class="form-label">Email address</label>
		<input type="email" class="form-control" id="email"value="<?php echo $attendee['emailAddress']?>"name="email" aria-describedby="emailHelp">
		<div id="emailHelp"value="<?php echo $attendee[''] ?>" class="form-text">We'll never share your email with anyone else.</div>
	</div><div class="mb-3">
		<label for="phone" class="form-label">Contact Number</label>
		<input type="number" class="form-control" id="phone"name="phone"value="<?php echo $attendee['contact']?>" aria-describedby="phoneHelp">
		<div id="phoneHelp" class="form-text">We'll never share your Contact info with anyone else.</div>
	</div>
	<div class="d-grid gap-2">
	<button type="submit"name="submit" class="btn btn-success col-6 mx-auto">Save Changes</button></div>
	<a href="viewrecords.php"class="btn btn-danger btn ">Cancel</a>
</form>
<?php } ?>
<br>
<br>
<br>
<br>


<?php require_once 'includes/footer.php';  ?>