<?php

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');



if  ($_SERVER['REQUEST_METHOD'] === 'POST' ) {


    $size = mysqli_real_escape_string($con,$_POST['size']);
    $price = mysqli_real_escape_string($con,$_POST['price']);



    $pro_id = mysqli_real_escape_string($con,$_POST['product_id']);



    $entity_id = mysqli_real_escape_string($con,$_POST['entityid']);















    $query = "INSERT INTO `product_attribute`(`size`, `price`,`product_id`,`entity_id`) VALUES ('$size','$price','$pro_id','$entity_id')";

    if ($con->query($query)) {

        echo '<script>alert("More Attributea Added")</script>';
        echo "<script> window.location.href=' ../addvariations.php?id=$pro_id'</script> ";


    } else {


        echo '<script>alert("More Attributea NotAdded")</script>';
        echo "<script> window.location.href=' ../addvariations.phpp?id=$pro_id'</script> ";

    }


}



?>