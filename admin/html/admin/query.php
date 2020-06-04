<?php
include_once 'inlcudes/dbconnect.php';




$query = "INSERT INTO `product`(`name`, `price`, `category`, `description`, `stock`, `image`, `parent_category`,`urduname`,`sellprice`) VALUES ('test','100','','loremupsahkdbsfhabdfhjabsdhfjabhdfjabsjhdfbasjhdfbashjfdbjashdfbajshbfdjhasbfhj','100','PHOTO-2020-02-04-00-19-30.jpg','37','ہنگ','')";

if ($con->query($query)) {

    echo '<script>alert("Data Insert Successfully")</script>';



}

?>