<!-- Reading File cRud -->
<?php $tittle = 'View Attendees';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
//Get all attendees
$results= $crud->getAttendees();  
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <!-- <th scope="col">Date Of Birth</th>
      <th scope="col">Email Address</th>
      <th scope="col">Contact</th> -->
      <th scope="col">Area of Experties</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <?php while($r= $results->fetch(PDO::FETCH_ASSOC)){ ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $r['index_id'] ?></th>
      <td><?php echo $r['firstName'] ?></td>
      <td><?php echo $r['lastName'] ?></td>
      <!-- <td><?php //echo $r['dateOfBirth'] ?></td>
      <td><?php //echo $r['emailAddress'] ?></td>
      <td><?php //echo $r['contact'] ?></td> -->
      <td><?php echo $r['name'] ?></td><?php //inner joint power?>
      <td>
        <a href="view.php?id=<?php echo $r['index_id'] ?>"class="btn btn-primary">View</a>
        <a href="edit.php?id=<?php echo $r['index_id'] ?>"class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are You Sure You Want To Delete This Record?');" 
        href="delete.php?id=<?php echo $r['index_id'] ?>"class="btn btn-danger">Remove</a>
      </td>
    </tr>
    <tr>
  </tbody>
  <?php }?>
</table>



<br>
<br>
<br>
<br>


<?php require_once 'includes/footer.php';  ?>