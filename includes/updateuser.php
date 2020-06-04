<?php
include '../admin/html/admin/inlcudes/dbconnect.php';

if  ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fname = mysqli_real_escape_string($con,$_POST['fname']);
    $lname = mysqli_real_escape_string($con,$_POST['lname']);
    $mob = mysqli_real_escape_string($con,$_POST['mob']);
    $adress = mysqli_real_escape_string($con,$_POST['adress']);
    $city  = mysqli_real_escape_string($con,$_POST['city']);
    $id = mysqli_real_escape_string($con,$_POST['id']);

    $query = "UPDATE `user` SET `firstname`='$fname',`lastname`= '$lname',`mobile`='$mob',`address`='$adress',`city`='$city' WHERE id = '$id'";

    if ($con->query($query)) {

        echo "<script>alert('Data Update Succesfully')</script>";
        echo "<script> window.location.href='  ../user.php'</script> ";


    } else {


        echo "<script>alert('Data Update Unsuccesfully')</script>";
        echo "<script> window.location.href=' ../user.php'</script> ";

    }


    function test_input($data){


        $data =trim($data);
        $data =stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;


    }

}

?>