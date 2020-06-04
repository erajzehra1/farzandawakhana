<?php
include_once 'admin/html/admin/inlcudes/dbconnect.php';
if(isset($_POST['useremail']))
{
    $emailId=$_POST['useremail'];



    $check="SELECT * FROM `user` WHERE   email = '$emailId'";
    $res_e = mysqli_query($con, $check);
    if (mysqli_num_rows($res_e) > 0) {


        $msg= 'Username Already in Exist!';

    }

    else{

        $msg = 'Email Available';


    }

    header("Content-Type: application/json; charset=utf-8", true);

    echo  $msg;


}
?>