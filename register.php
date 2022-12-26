<?php

require('connection.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>REGISTER PAGE (IT CONSISTS OF FORM AND ACTION PAGE)</title>

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




                <form method="post" action="register.php">

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
                                <option>admin</option>
                                <option>patient</option>
                                
                            </select>

                            <br>
                            <br>
                            <input type="submit" name="register" value="REGISTER">
                </form>
                        <p> if you hav an account <a href="index.php">press here </a>to login</p>


</body>
</html>