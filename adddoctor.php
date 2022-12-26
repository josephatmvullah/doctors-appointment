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
    header("location: adddoctor.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>REGISTER PAGE (IT CONSISTS OF FORM AND ACTION PAGE)</title>
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


                <?php
                if (isset($_POST['register'])) {

                    // get data from a form
                    $regno = $_POST['enrollNo'];
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $password = $_POST['pass'];
                    $role = $_POST['role'];

                    //secure password
                    $hash = sha1($password);

                    $sql = "INSERT INTO login (enrollNo,fname,lname,pass,role) VALUES ('$regno','$fname','$lname','$hash','$role')";
                    $query = mysqli_query($con, $sql);

                    if ($query) {
                        echo "<b>SUCCESSFUL REGISTER</b>";
                    }

                    else{
                        echo "<b>FAIL TO REGISTER</b>";
                    }
                }
                ?>




                <form method="post" action="adddoctor.php">

                        <br>
                        <br>
                            <label>First Name</label>
                        <input type="text" required placeholder="fname" name="fname">

                        <br>
                        <br>
                            <label>Last Name</label>
                        <input type="text" required placeholder="lname" name="lname">

                        <br>
                        <br>
                            <label>Enroll Number</label>
                            <input type="text" required placeholder="Enter enroll Number" name="enrollNo">

                        <br>
                        <br>
                            <label>Password</label>
                            <input type="password" required placeholder="Password" name="pass">

                        <br>
                        <br>

                            <select name="role">
                                <option>Select role..</option>
                                <option>doctor</option>
                                
                                
                            </select>

                            <br>
                            <br>
                            <input type="submit" name="register" value="REGISTER">
                </form>
                        <p> if you hav an account <a href="index.php">press here </a>to login</p>


</body>
</html>