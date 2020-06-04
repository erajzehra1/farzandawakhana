<?php
include 'dbconnect.php';

if  ($_SERVER['REQUEST_METHOD'] === 'POST') {



    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $product_id = mysqli_real_escape_string($con, $_POST["product_id"]);
    $id = mysqli_real_escape_string($con, $_POST["id"]);

    $query = "UPDATE `variableproducts` SET `attribute`= '$name' WHERE id = '$id'";
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