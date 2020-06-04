<?php

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');


if  ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $rate = mysqli_real_escape_string($con,$_POST['rate']);










    $query = "INSERT INTO `Shipping`(`name`, `rate`) VALUES ('$name','$rate')";

    if ($con->query($query)) {

        echo '<script>alert("Data Insert Successfully")</script>';
        echo "<script> window.location.href=' ../shipping.php'</script> ";


    } else {


        echo '<script>alert("Data Insert Failed")</script>';
        echo "<script> window.location.href=' ../shipping.php'</script> ";

    }


    function test_input($data){


        $data =trim($data);
        $data =stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;


    }
}

?>