<?php
include "connection.php";
session_start();
// Check if not logged in, return to login
if(!isset($_SESSION['id']) || !isset($_SESSION['role'])){
	header('location: index.php');
}
// To check if the user who access the page is correct one 
//for example in this page user who suppose to access this page is lecturer
if($_SESSION['role'] !== 'admin'){ 
    header("location: admindelete.php");
}

if(isset($_GET['delete'])){
	$id = $_GET['u_id'];
	$query = "DELETE FROM doctor WHERE id = '$id' ";
	$query_run = mysqli_query($con,$query);

	if($query_run){

		echo '<script>alert("data deleted")</script>';
	}
	else {
		//echo '<script type = "text/javascript">alert("data not deleted")</script>';
			echo'error deletig record'.mysqli_error($con);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>delete data</title>

	<style>
		body{
	width: 100%;
	min-height: 100%;
	background: #34495e;
	justify-content: center;
	align-items: center;

			}	

			input{

				width:40%; 
				height:20%;
				border:1px;
				border-radius: 5px;
				padding: 8px 15px 8px 15px;
			}

	</style>
</head>
<body>
	<h3>Welcome  <?php echo $_SESSION['role'] ;?> <?php echo $_SESSION['first'] ;?> </h3>
		<center>
			<h1>delete the data here</h1>

			<form action="admindelete.php" method="get">
				<input type="text" name="u_id" placeholder="enter enroll number to delete"> <br><br>
				<input type="submit" name="delete" value="delete data">
			</form>
		</center>
		<p><a href="admin.php">press here </a>back</p>

</body>
</html>