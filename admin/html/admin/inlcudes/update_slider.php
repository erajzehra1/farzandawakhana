<?php
set_time_limit(0);

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');



if  ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['pic']['name'] != "") {


    $sort = mysqli_real_escape_string($con, $_POST['sort']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $username = mysqli_real_escape_string($con, $_POST['user']);


    $image = $_FILES['pic']['name'];
    $target = "../../../../images/slider/";
    $target = $target . basename($image);
    move_uploaded_file($_FILES['pic']['tmp_name'], $target);
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $link = mysqli_real_escape_string($con,$_POST['link']);

    $check = "SELECT * FROM `slider` WHERE sort = '$sort'";
    $res_e = mysqli_query($con, $check);



        $query = "UPDATE `slider` SET `pic`='$image',`sort`='$sort',`author`='$username',`edittime`='$currentDateTime',`status`='$status',`title`='$title',`link`='$link' WHERE id = '$id'";
        // echo $query;
        // exit();

        if ($con->query($query)) {

            echo '<script>alert("Data Update Successfully")</script>';
            echo "<script> window.location.href=' ../Slider.php'</script> ";


        } else {

            echo("Error description: " . mysqli_error($con));


        }
    }


else if  ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['pic']['name'] == "") {


    $sort = mysqli_real_escape_string($con, $_POST['sort']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $link = mysqli_real_escape_string($con,$_POST['link']);

    $id = mysqli_real_escape_string($con, $_POST['id']);

        $query = "UPDATE `slider` SET `sort`='$sort',`author`='$username',`edittime`='$currentDateTime',`status`='$status',`title`='$title',`link`='$link' WHERE id = '$id'";
        // echo $query;
        // exit();

        if ($con->query($query)) {

            echo '<script>alert("Data Update Successfully")</script>';
            echo "<script> window.location.href=' ../Slider.php'</script> ";


        } else {

            echo("Error description: " . mysqli_error($con));


        }



}






?>