<?php

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');


if  ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $image = $_FILES['pic']['name'];
    $target ="../../../../img/slides/";
    $target = $target .basename ($image);
    move_uploaded_file($_FILES['pic']['tmp_name'],$target);






    $query = "INSERT INTO `slides`(`image`) VALUES ('$image')";

    if ($con->query($query)) {

        echo '<script>alert("Data Insert Successfully")</script>';
        echo "<script> window.location.href=' ../Slider.php'</script> ";


    } else {


        echo '<script>alert("Data Insert Failed")</script>';
        echo "<script> window.location.href=' ../Slider.php'</script> ";

    }


    }


?>