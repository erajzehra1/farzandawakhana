<?php

include 'dbconnect.php';




if  (isset($_POST['upperbanner'])) {


    $name = mysqli_real_escape_string($con,$_POST['name']);


    $image = $_FILES['pic']['name'];
    $target ="../../../../img/banners/";
    $target = $target .basename ($image);
    move_uploaded_file($_FILES['pic']['tmp_name'],$target);











    $query = "INSERT INTO `banners`(`name`, `image`) VALUES ('$name','$image')";

    if ($con->query($query)) {

        echo '<script>alert("Banner Added")</script>';
        echo "<script> window.location.href=' ../banners.php'</script> ";


    } else {


        echo '<script>alert("Banners not Add")</script>';
        echo "<script> window.location.href=' ../banners.php'</script> ";

    }


}


?>