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
        header("location: admin.php");
}


if(isset($_POST['id'])){
	$enrollNo=$_POST['id'];
    $delete =mysqli_query($con,"DELETE FROM `doctor` WHERE `enrollNo` = '$enrollNo'");
}
?>

<?php
$select="SELECT * FROM `doctor`";
$query=mysqli_query($con,$select);
?>




<!DOCTYPE html>
<html>
<head>
    <title>ADMIN PANEL</title>
</head>
<body>
<h3>Welcome  <?php echo $_SESSION['role'] ;?> <?php echo $_SESSION['first'] ;?> </h3>
<p><a href="adddoctor.php">press here to register doctor</a></p>
<table border="3" cellpadding="0">
	<tr>
		<th>enrollNo</th>
		<th>gender</th>
		<th>station</th>
		<th>email</th>
		<th>number</th>
		<th>operation</th>
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
						    <td><a href= 'adminupdate.php?'>update
						    <td><a href= 'admindelete.php?'>delete
						    	
						    	

						    </td>
						</tr>
				     ";
			}
		}
	?>
</table>
	
</body>

<style type="">
body{
	width: 100%;
	min-height: 100%;
	background: #34495e;
	justify-content: center;
	align-items: center;
}	

table{

	border-collapse: collapse;
	width: 75%;
}
table th{
	color: #fff;
	padding: 10px;
}

table td{

		color: #fff;
		font-size: 1.2em;
		padding: 10px;
		text-align: center;
		border-spacing: 5px;

}

.btn{
	background: #fff;
	color: darkred;
	font-size: 1.2em;
	padding: 5px 30px;
	text-decoration: none; 
}
.btn:hover{
	background: darkred;
	color: #fff;
}

</style>

</html>