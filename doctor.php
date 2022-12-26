<?php
session_start();
// Check if not logged in, return to login
if(!isset($_SESSION['id']) || !isset($_SESSION['role'])){
	header('location: index.php');
}
// To check if the user who access the page is correct one 
//for example in this page user who suppose to access this page is lecturer
	if($_SESSION['role'] !== 'doctor'){ 
        header("location: doctor.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> page to show how to use session to welcome someone</title>
</head>
<body>

	
<h1>Welcome  <?php echo $_SESSION['role'] ;?> <?php echo $_SESSION['first'] ;?> </h1>

	<ul>
		<li><a href="doctorinfo.php">VIEW MY INFORMATION</a></li>
		<li><a href="adddoctor.php">UPDATE MY INFORMATION</a></li>
		<li><a href="adddoctor.php">MY APOINTMENTS</a></li>
	</ul>

</body>

</html>