<?php

include 'dbconnect.php';





if  ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['pic']['name'] != "") {


    $add = mysqli_real_escape_string($con,$_POST['address']);

    $phone = mysqli_real_escape_string($con,$_POST['phone']);



    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);

    $email = mysqli_real_escape_string($con,$_POST['email']);


    $image = $_FILES['pic']['name'];
    $target ="../../../../img/";
    $target = $target .basename ($image);
    move_uploaded_file($_FILES['pic']['tmp_name'],$target);





    $query = "UPDATE `company` SET `address`='$add',`mobile`='$mobile',`email`='$email',`phone`='$phone',`logo`='$image' WHERE id = '1'";

    if ($con->query($query)) {

        echo '<script>alert("Details Change Successfully")</script>';
        echo "<script> window.location.href=' ../contact.php'</script> ";


    } else {


        echo '<script>alert("Details Change Failed")</script>';
        echo "<script> window.location.href=' ../contact.php'</script> ";

    }


    function test_input($data){


        $data =trim($data);
        $data =stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;


    }

}
else if  ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['pic']['name'] == "") {


    $add = mysqli_real_escape_string($con,$_POST['address']);

    $phone = mysqli_real_escape_string($con,$_POST['phone']);



    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);

    $email = mysqli_real_escape_string($con,$_POST['email']);



    $query = "UPDATE `company` SET `address`='$add',`mobile`='$mobile',`email`='$email',`phone`='$phone' WHERE id = '1'";

    if ($con->query($query)) {

        echo '<script>alert("Details Change Successfully")</script>';
        echo "<script> window.location.href=' ../contact.php'</script> ";


    } else {


        echo '<script>alert("Details Change Failed")</script>';
        echo "<script> window.location.href=' ../contact.php'</script> ";

    }


    function test_input($data){


        $data =trim($data);
        $data =stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;


    }

}

?>