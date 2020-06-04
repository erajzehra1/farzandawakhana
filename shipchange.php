
<?php

include_once 'admin/html/admin/inlcudes/dbconnect.php';

$shipid = mysqli_real_escape_string($con,$_POST['shipid']);
$totalbill = mysqli_real_escape_string($con,$_POST['totalbill']);


$querys = "SELECT * FROM shipping WHERE id = '$shipid'";
$results = mysqli_query($con, $querys);
$rows=mysqli_fetch_array($results);

header("Content-Type: application/json; charset=utf-8", true);
    $name = $rows['name'];
     $rate = $rows['rate'];

        $total = $rate+$totalbill;


    echo  json_encode(array(

        "rate" => $rate,
        "name" => $name,
        "total" => 'Rs'.$total.'/-',
        "totalbill" => $total,
    ));


?>





