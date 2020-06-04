<?php

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');


if  ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = mysqli_real_escape_string($con,$_POST['user']);


    $image = $_FILES['pic']['name'];
    $target ="../../../../images/logo/";
    $target = $target .basename ($image);
    move_uploaded_file($_FILES['pic']['tmp_name'],$target);







    $query = "UPDATE `logo` SET `pic`='$image',`author`='$username',`timestamp`='$currentDateTime' WHERE id = '1'";

    if ($con->query($query)) {

        echo '<script>alert("Logo Change Successfully")</script>';
        echo "<script> window.location.href=' ../logo.php'</script> ";


    } else {


        echo '<script>alert("Logo Change Failed")</script>';
        echo "<script> window.location.href=' ../logo.php'</script> ";

    }


    function test_input($data){


        $data =trim($data);
        $data =stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;


    }

}

?>