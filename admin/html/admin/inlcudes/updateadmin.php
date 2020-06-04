<?php
include 'dbconnect.php';

if  ($_SERVER['REQUEST_METHOD'] === 'POST') {



    $role = mysqli_real_escape_string($con, $_POST["role"]);
    $password = mysqli_real_escape_string($con, $_POST["pass"]);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);

        $query = "UPDATE `admin` SET `password`='$password',`role`='$role',`status`='$status' WHERE id = '$id'";
        if(mysqli_query($con, $query))
        {

            echo '<script>alert("Data Update Successfully")</script>';
            echo "<script> window.location.href=' ../alluser.php'</script> ";


        } else {


            echo '<script>alert("Data Update Unsuccessful")</script>';
            echo "<script> window.location.href=' ../alluser.php'</script> ";

        }


}





?>