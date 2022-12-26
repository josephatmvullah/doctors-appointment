<?php
include "connection.php";
session_start();
// Check if not logged in, return to login
if(!isset($_SESSION['id']) || !isset($_SESSION['role'])){
    header('location: index.php');
}
// To check if the user who access the page is correct one 
//for example in this page user who suppose to access this page is lecturer
if($_SESSION['role'] !== 'patient'){ 
    header("location: patient.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>PATIENT PANEL</title>
</head>
<body>
<h3>Welcome  <?php echo $_SESSION['role'] ;?> <?php echo $_SESSION['first'] ;?> </h3>
<p><a href="">press here to search doctor availale apointment</a></p>