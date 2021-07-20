<!DOCTYPE html>
<html lang="en">
<head>
<style>
.carousel-caption {
position: absolute;
top:65px
}

.carousel-caption h1 {
font-size:      3.5em;
color:          rgb(0, 0, 0) !important;
font-weight: 350;
font-family: Garamond;
}

.carousel-caption hr.solid {
border-top: 1px solid rgb(0, 0, 0);
}


</style>
<meta name="description" content="View Doctors Page">
    <meta name="author" content="Justin Jao, Angela Li, Xinyu Liu">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
    <a class="navbar-brand" href="index.php">
        <img src="logoTrans.PNG"
             height="80"
             alt=""
             loading="lazy"/></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#myNavBar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavBar">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
                <a class="nav-link px-4" href="index.php">Home Page</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link px-4" href="Doctor.php">Doctors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-4" href="MedicalExams.php">Medical Exams</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-4" href="Patients.php">Patients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-4" href="Appointment.php">Appointments</a>
            </li>
        </ul>
    </div>
</div>
</nav>


<div id="Images" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="doctor.jpeg" style="width:100%; opacity:0.3;" >
            <div class="carousel-caption">
                <hr class="solid">
                <h1 class="display-3">View Doctors</h1>
                <hr class="solid">
            </div>
        </div>
</div>


<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT *
FROM Doctor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
<br>
<br>
<table class="table text-center">
  <thead>
    <tr>
     <th scope="col">#</th>
      <th scope="col">DoctorID</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Specialization</th>
	  <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  
    <?php
    $rowNumber = 0;
    while($row = $result->fetch_assoc()) { 
        $rowNumber = $rowNumber + 1;
      echo "<tr><th style='text-align: center;' scope='row'>$rowNumber</th>
      <td>".$row["DoctorID"]."</td>
      <td>".$row["Name"]."</td>
      <td>".$row["Age"]."</td>
      <td>".$row["Gender"]."</td>
      <td>".$row["Specialization"]."</td>
      <form class='box1' action='update-Doctor.php' method='post'>
      <td>
      <input type='hidden' value=".$row['DoctorID']." name='DoctorID'> 
      <button type='submit' style='margin: 0rem 0rem 1rem 0rem; background-color: #c5e9e7; border: 1px solid #c5e9e7;' class='btn btn-primary'><i class='far fa-edit'></i></button> 
      </td>
      </form>
      <form class='box2' action='process-delete-Doctor.php' method='post'>
      <input type='hidden' value=".$row['DoctorID']." name='DoctorID'> 
      <td>
       <button type='submit' style='margin: 0rem 0rem 1rem 0rem; background-color: rgb(235, 102, 68); border: 1px solid rgb(235, 102, 68);' class='btn btn-primary'><i class='far fa-trash-alt'></i></button> 
       </td>
       </form>
      </tr>";
    }
} else {
	echo "<p style='text-align: center; font-weight: 350;
    font-family: Garamond; font-size: 20px'>0 results</p>";
}

CloseCon($conn);
      ?>
  </form>
  </tbody>
</table>
<br>
<div class="text-center">
<div class="btn-group" role="group" aria-label="Button_Groups">
<form class='insertBox' action='insert-Doctor.php' method='post'>
<button style="background: #c5e9e7; margin-left: 20px;
  border: 1px solid #c5e9e7; padding: 7px 5px;
  width: 220px; color: black;" type="submit" type='button' class="btn btn-secondary">Insert A Doctor</button>
</form>
<form class='deleteBox' action='delete-Doctor.php' method='post'>
<button style="background: #c5e9e7; margin-left: 20px;
  border: 1px solid #c5e9e7; padding: 7px 5px;
  width: 220px; color: black;" type="submit" type='button' class="btn btn-secondary">Delete A Doctor</button>
</form>
<form class='filter' action='nested-aggregation-Appointment.php' method='post'>
<button style="background: #c5e9e7; margin-left: 20px;
  border: 1px solid #c5e9e7; padding: 7px 5px;
  width: 220px; color: black;" type="submit" type='button' class="btn btn-secondary">Filter Doctor By Availability</button>
</form>
</div>
</div>
<br>
<br>
<br>
</body>
</html>
