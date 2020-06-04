<?php
set_time_limit(0);

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');



if  ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['pic']['name'] != "") {

    $pcat = mysqli_real_escape_string($con,$_POST['pcat']);
    $cat = mysqli_real_escape_string($con,$_POST['cat']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    $stock = mysqli_real_escape_string($con,$_POST['stock']);
    $ckeditor = mysqli_real_escape_string($con,$_POST['ckeditor']);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $image = $_FILES['pic']['name'];
    $target ="../../../../img/product/";
    $target = $target .basename ($image);
    move_uploaded_file($_FILES['pic']['tmp_name'],$target);
    $uname = mysqli_real_escape_string($con,$_POST['uname']);

    $sprice = mysqli_real_escape_string($con,$_POST['sprice']);



    $query = "UPDATE `product` SET `name`='$name',`price`='$price',`category`= '$cat',`description`='$ckeditor',`stock`= '$stock',`image`='$image',`parent_category`='$pcat',`urduname`='$uname',`sellprice`='$sprice' WHERE id = '$id'";
    // echo $query;
    // exit();

    if ($con->query($query)) {

        echo '<script>alert("Data Update Successfully")</script>';
        echo "<script> window.location.href=' ../product.php'</script> ";


    } else {

        echo '<script>alert("Data Update Unsuccessfully")</script>';
        echo "<script> window.location.href=' ../product.php'</script> ";



    }
}

else if  ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['pic']['name'] == "") {
    $pcat = mysqli_real_escape_string($con,$_POST['pcat']);
    $cat = mysqli_real_escape_string($con,$_POST['cat']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    $stock = mysqli_real_escape_string($con,$_POST['stock']);
    $ckeditor = mysqli_real_escape_string($con,$_POST['ckeditor']);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $uname = mysqli_real_escape_string($con,$_POST['uname']);


    $sprice = mysqli_real_escape_string($con,$_POST['sprice']);



    $query = "UPDATE `product` SET `name`='$name',`price`='$price',`category`= '$cat',`description`='$ckeditor',`stock`= '$stock',`parent_category`='$pcat',`urduname`='$uname',`sellprice`='$sprice' WHERE id = '$id'";
    // exit();

    if ($con->query($query)) {

        echo '<script>alert("Data Update Successfully")</script>';
        echo "<script> window.location.href=' ../product.php'</script> ";


    } else {

        echo '<script>alert("Data Update Unsuccessfully")</script>';
        echo "<script> window.location.href=' ../product.php'</script> ";



    }
}

?>