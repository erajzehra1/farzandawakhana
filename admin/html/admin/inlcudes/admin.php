<?php
include 'dbconnect.php';

if  ($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $check="SELECT * FROM `admin` WHERE username = '$username'";
    $res_e = mysqli_query($con, $check);
    if (mysqli_num_rows($res_e) > 0)
    {
        echo '<script>alert("Username already Exist")</script>';
        echo "<script> window.location.href=' ../admin.php'</script> ";
    }
    else{


        $query = "INSERT INTO `admin`(`password`,`username`, `name`) VALUES ('$password','$username','$name')";
        if(mysqli_query($con, $query))
        {
            echo '<script>alert("Registration Done")</script>';
            echo "<script> window.location.href=' ../admin.php'</script> ";
        }
        else{


            echo '<script>alert("Registration Failed")</script>';
            echo "<script> window.location.href=' ../admin.php'</script> ";


        }
    }
}




                                                ?>