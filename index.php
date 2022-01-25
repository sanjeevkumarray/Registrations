<?php $tittle = 'Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
$results=  $crud->getSpecialty();
?>

<h1 class="text-center"> Resgistration for IT Conference</h1>
<!--Form contains of:-
  First Name
  Last Name
  Date of Birth(Date picker)
  specialty(DataBase Admin,Software Developer,Web Administrator,Other)
  Email Adress
  Contact Number
-->
<form method="post" action="success.php">
	<!-- <input type="hidden"name="id" value="<?//php $attendee['index_id']?>"/> -->
	<div class="mb-3">
		<label for="firstName" class="form-label">First Name</label>
		<input required type="text" class="form-control" id="firstName"name="firstName"><!--name is used in php,id and class is for visual but php works on name -->

	</div>
	<div class="mb-3">
		<label for="lastName" class="form-label">Last Name</label>
		<input required type="text" class="form-control" id="lastName"name="lastName">

	</div>
	<div class="mb-3">
		<label for="dob" class="form-label">Date Of Birth</label>
		<input required type="text" class="form-control" id="dob"name="dob">

	</div>
	<div class="mb-3">
		<label for="specialty" class="form-label">Area Of Experties</label>
		<select class="form-select" aria-label="Default select example"id="specialty"name="specialty">
			<!-- <option value="1">DataBase Admin</option>
			<option value="3">Software Developer</option>
			<option value="4">Web Administrator</option>
			<option value="5">Other</option> -->
			<?php while($r= $results->fetch(PDO::FETCH_ASSOC)){ ?>
				<option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>

			<?php }?>	
		</select>

	</div>
	<div class="mb-3">
		<label for="email" class="form-label">Email address</label>
		<input required type="email" class="form-control" id="email"name="email" aria-describedby="emailHelp">
		<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
	</div><div class="mb-3">
		<label for="phone" class="form-label">Contact Number</label>
		<input required type="number" class="form-control" id="phone"name="phone" aria-describedby="phoneHelp">
		<div id="phoneHelp" class="form-text">We'll never share your Contact info with anyone else.</div>
	</div>
	<!-- <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" >
            <label class="custom-file-label" for="avatar"></label>
	    <br>
            <small id="avatar" class="form-text text-danger">File Upload is Optional</small>

        </div> -->
	<div class="d-grid gap-2">
	<button type="submit"name="submit" class="btn btn-secondary col-6 mx-auto">Submit</button></div>
</form>
<br>
<br>
<br>
<br>


<?php require_once 'includes/footer.php';  ?>