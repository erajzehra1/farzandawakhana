<?php

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');


if  ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pcat = mysqli_real_escape_string($con,$_POST['pcat']);
    $cat = mysqli_real_escape_string($con,$_POST['cat']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $uname = mysqli_real_escape_string($con,$_POST['uname']);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    $stock = mysqli_real_escape_string($con,$_POST['stock']);
    $ckeditor = mysqli_real_escape_string($con,$_POST['ckeditor']);
    $sprice = mysqli_real_escape_string($con,$_POST['sprice']);

    $image = $_FILES['pic']['name'];
    $target ="../../../../img/product/";
    $target = $target .basename ($image);
    move_uploaded_file($_FILES['pic']['tmp_name'],$target);






    $query = "INSERT INTO `product`(`name`, `price`, `category`, `description`, `stock`, `image`, `parent_category`,`urduname`,`sellprice`) VALUES ('$name','$price','$cat','$ckeditor','$stock','$image','$pcat','$uname','$sprice')";

    if ($con->query($query)) {

        echo '<script>alert("Data Insert Successfully")</script>';
        echo "<script> window.location.href=' ../product.php'</script> ";


    } else {


        echo '<script>alert("Data Insert Failed")</script>';
        echo "<script> window.location.href=' ../product.php'</script> ";

    }


    function test_input($data){


        $data =trim($data);
        $data =stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;


    }
}

?>