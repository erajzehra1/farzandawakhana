<?php

include '../admin/html/admin/inlcudes/dbconnect.php';
if  ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $password = mysqli_real_escape_string($con, $_POST["name"]);
    $password = password_hash($password, PASSWORD_DEFAULT);




    $query = "UPDATE `user` SET  password = '$password' WHERE id = '$id'";
    if ($con->query($query)) {


        echo "<script> alert('Password Change Successfully')</script> ";
        echo "<script> window.location.href=' ../user.php'</script> ";


    } else {




        echo "<script> alert('Password Change Unsuccessfully')</script> ";
        echo "<script> window.location.href=' ../user.php'</script> ";

    }






}