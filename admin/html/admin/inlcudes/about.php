<?php

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');



if  ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['pic']['name'] != "") {


    $text = mysqli_real_escape_string($con,$_POST['ckeditor']);


    $image = $_FILES['pic']['name'];
    $target ="../../../../img/";
    $target = $target .basename ($image);
    move_uploaded_file($_FILES['pic']['tmp_name'],$target);











    $query = "UPDATE `about` SET `content`='$text',`image`='$image',`timestamp`='$currentDateTime' WHERE id = '1'";

    if ($con->query($query)) {

        echo '<script>alert("About Change Successfully")</script>';
        echo "<script> window.location.href=' ../about.php'</script> ";


    } else {


        echo '<script>alert("About Change Failed")</script>';
        echo "<script> window.location.href=' ../about.php'</script> ";

    }


}


else if  ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['pic']['name'] == "") {


    $text = mysqli_real_escape_string($con,$_POST['ckeditor']);













    $query = "UPDATE `about` SET `content`='$text',`timestamp`='$currentDateTime' WHERE id = '1'";

    if ($con->query($query)) {

        echo '<script>alert("About Change Successfully")</script>';
        echo "<script> window.location.href=' ../about.php'</script> ";


    } else {


        echo '<script>alert("About Change Failed")</script>';
        echo "<script> window.location.href=' ../about.php'</script> ";

    }


}

?>