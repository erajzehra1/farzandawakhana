<?php

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');


if  ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pcat = mysqli_real_escape_string($con,$_POST['pcat']);
    $cat = mysqli_real_escape_string($con,$_POST['cat']);
    $urdu = mysqli_real_escape_string($con, $_POST['urdu']);



    $image = $_FILES['pic']['name'];
    $target ="../../../../img/category/";
    $target = $target .basename ($image);
    move_uploaded_file($_FILES['pic']['tmp_name'],$target);






    $query = "INSERT INTO `categories`(`parent_id`, `name`, `pic`,`timestamp`,`urduname`) VALUES ('$pcat','$cat','$image','$currentDateTime','$urdu')";

    if ($con->query($query)) {

        echo '<script>alert("Data Insert Successfully")</script>';
        echo "<script> window.location.href=' ../category.php'</script> ";


    } else {


        echo '<script>alert("Data Insert Failed")</script>';
        echo "<script> window.location.href=' ../category.php'</script> ";

    }


    function test_input($data){


        $data =trim($data);
        $data =stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;


    }
 }

?>