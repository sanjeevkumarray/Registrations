<?php 
//This includes the session files.This file contain the code which start/stop the session.
include_once'includes/session.php'
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="css/site.css" />
  <title>Attendance- <?php echo $tittle ?></title>
</head>

<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">IT Conference</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="margin-right:845px"href="viewrecords.php">View Attendees</a>
            </li> <li class="nav-item">
              <?php 
              if(!isset($_SESSION['userid'])){
              ?>
              <a class="nav-link"href="login.php"aria-current="page">Login</a>
              <?php } else{ ?>
                <a class="nav-link"href="#"><span>Hello <?php echo $_SESSION['username'] ?>!</span></a>
                
                <a class="nav-link"href="logout.php"aria-current="page">Logout</a>
                <?php } ?>

            </li>   
      <!-- <div class="mx-2">
          <button type="button" class="btn btn-warning"action="login.php">LOGIN</button>
      </form> -->
          </ul>
        </div>
      </div>
    </nav>
