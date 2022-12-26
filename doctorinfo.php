<?php
include "connection.php";
session_start();
// Check if not logged in, return to login
if(!isset($_SESSION['id']) || !isset($_SESSION['role'])){
    header('location: index.php');
}
// To check if the user who access the page is correct one 
//for example in this page user who suppose to access this page is lecturer
if($_SESSION['role'] !== 'doctor'){ 
    header("location: doctorinfo.php");
};

if(isset($_SESSION['id'])){
 //$select= "SELECT * FROM `doctor` WHERE `id` = '".$_SESSION['id']."' ";
 $select= "SELECT * FROM `doctor` WHERE `id` = '3'";
 
 
    //Results can be accessed like $row['username'] and $row['Email']
 $query=mysqli_query($con,$select);
}
//$query=mysqli_query($con,$select);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Welcome  <?php echo $_SESSION['role'] ;?> <?php echo $_SESSION['first'] ;?> </h3>

<html>
	<table border="3" cellpadding="0">
	<tr>
		<th>enrollNo</th>
		<th>gender</th>
		<th>station</th>
		<th>email</th>
		<th>number</th>
	</tr>
	


<?php

		$num=mysqli_num_rows($query);
		if($num>0){
			while ($result=mysqli_fetch_assoc($query)) {
				echo "
						<tr>
							<td>".$result['enrollNo']."</td>
							<td>".$result['gender']."</td>
							<td>".$result['station']."</td>
							<td>".$result['email']."</td>
							<td>".$result['number']."</td>
						</tr>
				     ";
			}
		}
?>
</table>


</table>
</html>


</body>
</html>