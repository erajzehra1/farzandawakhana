<?php
include_once 'admin/html/admin/inlcudes/dbconnect.php';
session_start();


if  ($_SERVER['REQUEST_METHOD'] === 'POST') {



    $username = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["pass"]);


    $query = "SELECT * FROM user WHERE  email = '$username'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            if(password_verify($password, $row["password"]))


            {
                //return true;
                $_SESSION["user"] = $row;
                header("location:index.php");
            }
            else
            {
                //return false;
                echo '1';
            }
        }
    }
    else
    {
        echo '2';

    }
}

?>