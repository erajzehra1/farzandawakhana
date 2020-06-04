
<?php

include_once 'admin/html/admin/inlcudes/dbconnect.php';

$productid = mysqli_real_escape_string($con,$_POST['productid']);
$variationid = mysqli_real_escape_string($con,$_POST['variationid']);
$price = mysqli_real_escape_string($con,$_POST['price']);
$entityname = mysqli_real_escape_string($con,$_POST['entityname']);
$attributid = mysqli_real_escape_string($con,$_POST['attributid']);




header("Content-Type: application/json; charset=utf-8", true);

echo  json_encode(array(
    "price" => $price,
    "price2" =>'Rs'.$price,
    "attributid" => $attributid,
));



?>