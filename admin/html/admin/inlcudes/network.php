<?php
include 'dbconnect.php';
date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');


if  ($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $owner = mysqli_real_escape_string($con, $_POST["owner"]);

    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $username = mysqli_real_escape_string($con,$_POST['user']);



        $query = "INSERT INTO `network`(`name`, `owner`,`status`, `author`,`timestamp`) VALUES ('$name','$owner','$status','$username','$currentDateTime')";
        if(mysqli_query($con, $query))
        {
            echo '<script>alert("Insert Data Done")</script>';
            echo "<script> window.location.href=' ../network.php'</script> ";
        }
        else{




            echo '<script>alert("Data Insert Failed")</script>';
            echo "<script> window.location.href=' ../network.php'</script> ";


        }

}




?>