<?php

include 'admin/html/admin/inlcudes/dbconnect.php';
require_once "phpmailer/class.phpmailer.php";
session_start();
$user_id = $_SESSION['user']['id'];
if  ($_SERVER['REQUEST_METHOD'] === 'POST')
{


    $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $city = mysqli_real_escape_string($con,$_POST['city']);
    $ordernote = mysqli_real_escape_string($con,$_POST['ordernote']);
    $shipingid = mysqli_real_escape_string($con,$_POST['shipingorder']);
    $totalbillwithship = mysqli_real_escape_string($con,$_POST['totalbillwithship']);

$query = "INSERT INTO `order_table`(`firstname`, `lastname`,  `mobile`, `shipping_id`, `email`, `address`, `city`,`date`,`status`,`user_id`,`total`) VALUES ('$firstname', '$lastname',  '$mobile', '$shipingid', '$email', '$address', '$city',CURDATE(),'In Process','$user_id','$totalbillwithship')";
if ($con->query($query)) {

$last_order = $con->insert_id;

if(!empty($_SESSION["shoping_cart"]))
{
$last_id = $con->insert_id;
foreach($_SESSION["shoping_cart"] as $keys => $values)
{
$pro_id=$values["product_id"];
$name=$values["product_name"];
$price=$values["product_price"];
$quantity=$values["product_quantity"];
$product_state=$values["product_state"];
$size=$values["product_size"];
$stock = $values['product_stock'];
$newstock=(int)$stock-(int)$quantity;
$product_query = "INSERT INTO `order_product`(`name`, `price`, `quantity`, `form`, `size`, `order_id`, `cart_product_id`) VALUES ('$name','$price','$quantity','$product_state','$size','$last_id','$pro_id')";
if ($con->query($product_query)) {


$stockquery = "update product set stock='$newstock' where id='$pro_id'";
if ($con->query($stockquery)) {

}

}
else {




}


}


}




    $to = "info@farzanaherbs.com";
    $from = "$email";
    $subject = "Booking Confirmation";
    $message = "<!DOCTYPE html>
     <html lang='en'>
     <head>

       <meta charset='utf-8'>
       <meta name='viewport' content='width=device-width, initial-scale=1'>
       <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
       <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
       <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
     <style>
     .head{
         background-color: #4ea258;
         padding: 2% 2%;
         text-align: center;
     }
     h2{
         color:white;
     }
     .body{
         border:2px solid #4aa23f;
         text-align:center;
     }

     table{

     width:100%;
         margin-top:3%;
         margin-bottom: 5%;
          border-collapse: collapse;
     }
     table th{

         font-size: 18px;
     }
     table td{

         font-size: 16px;
     }
     table, th, td {
       border: 1px solid #4aa23f;
     }
     </style>
     </head>
     <body>

     <div class='container body'>
       <div class='col-md-12 text-center head'>

          <h2 style='color:white;font-size:60px;'> FarzanaHerbs</h2>

        </div>
       <div class='col-md-12'>
      <h3>
         Hello $name,<br>Your Order Has been recorded and Recieved, <br>
        Your Booking No. $last_order



      </h3>

         </div><Br>
         <hr>

     </div>

     </body>
     </html>
     ";


    $headers = "From: $from";
    // boundary
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Additional headers
    $headers .= "To: $email, .";


    $ok = @mail($to, $subject, $message, $headers, "-f " . $from);




echo "<script> window.location.href=' success.php?orderid=$last_order'</script> ";
unset($_SESSION["shoping_cart"]);



} else {



echo '<script>alert("Order NotSuccessfull")</script>';
    echo "<script> window.location.href='index.php'</script> ";


}


}

?>

