<?php
set_time_limit(0);

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');



if  ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['pic']['name'] != "") {

    $pcat = mysqli_real_escape_string($con,$_POST['pcat']);
    $cat = mysqli_real_escape_string($con,$_POST['cat']);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $urdu = mysqli_real_escape_string($con,$_POST['urdu']);

    $image = $_FILES['pic']['name'];
    $target ="../../../../img/category/";
    $target = $target .basename ($image);
    move_uploaded_file($_FILES['pic']['tmp_name'],$target);





    $query = "UPDATE `categories` SET `parent_id`='$pcat',`name`='$cat',`pic`='$image',`timestamp` = '$currentDateTime',`urduname`='$urdu'  WHERE id = '$id'";
    // echo $query;
    // exit();

    if ($con->query($query)) {

        echo '<script>alert("Data Update Successfully")</script>';
        echo "<script> window.location.href=' ../category.php'</script> ";


    } else {

        echo("Error description: " . mysqli_error($con));



    }
}

else if  ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['pic']['name'] == "") {

    $pcat = mysqli_real_escape_string($con,$_POST['pcat']);
    $cat = mysqli_real_escape_string($con,$_POST['cat']);
    $id = mysqli_real_escape_string($con,$_POST['id']);



    $urdu = mysqli_real_escape_string($con,$_POST['urdu']);


    $query = "UPDATE `categories` SET `parent_id`='$pcat',`name`='$cat',`timestamp` = '$currentDateTime',`urduname`='$urdu' WHERE id = '$id'";
    // echo $query;
    // exit();

    if ($con->query($query)) {

        echo '<script>alert("Data Update Successfully")</script>';
        echo "<script> window.location.href=' ../category.php'</script> ";


    } else {

        echo("Error description: " . mysqli_error($con));



    }
}

?>