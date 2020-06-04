<?php

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');


if  ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cat = mysqli_real_escape_string($con, $_POST['cat']);
    $urdu = mysqli_real_escape_string($con, $_POST['urdu']);

    $image = $_FILES['pic']['name'];
    $target = "../../../../img/category/";
    $target = $target . basename($image);
    move_uploaded_file($_FILES['pic']['tmp_name'], $target);

    $check = "SELECT * FROM `parent_cat` WHERE name = '$cat'";
    $res_e = mysqli_query($con, $check);
    if (mysqli_num_rows($res_e) > 0) {
        echo '<script>alert("Parent Category already Exist")</script>';
        echo "<script> window.location.href=' ../parent_cat.php'</script> ";
    } else {


        $query = "INSERT INTO `parent_cat`(`name`, `pic`,`urduname`) VALUES ('$cat','$image','$urdu')";

        if ($con->query($query)) {

            echo '<script>alert("Data Insert Successfully")</script>';
            echo "<script> window.location.href=' ../parent_cat.php'</script> ";


        } else {


            echo '<script>alert("Data Insert Failed")</script>';
            echo "<script> window.location.href=' ../parent_cat.php'</script> ";

        }


        function test_input($data)
        {


            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;


        }
    }
}
?>