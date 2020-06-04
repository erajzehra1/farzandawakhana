<?php
include 'dbconnect.php';

if  ($_SERVER['REQUEST_METHOD'] === 'POST') {



    $size = mysqli_real_escape_string($con, $_POST["size"]);
    $price = mysqli_real_escape_string($con, $_POST["price"]);
    $product_id = mysqli_real_escape_string($con, $_POST["product_id"]);
    $id = mysqli_real_escape_string($con, $_POST["id"]);

    $query = "UPDATE `product_attribute` SET `size`= '$size',`price` = '$price' WHERE id = '$id'";
    if(mysqli_query($con, $query))
    {

        echo '<script>alert("Data Update Successfully")</script>';
        echo "<script> window.location.href=' ../addvariations.php?id=$product_id'</script> ";


    } else {


        echo '<script>alert("Data Update Unsuccessful")</script>';
        echo "<script> window.location.href=' ../addvariations.php?id=$product_id'</script> ";

    }


}





?>