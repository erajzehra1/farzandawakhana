<?php

include 'dbconnect.php';



date_default_timezone_set("Asia/Karachi");

$currentDateTime = date('d-m-Y h:i:s: a');


if  ($_SERVER['REQUEST_METHOD'] === 'POST') {



    $name = mysqli_real_escape_string($con,$_POST['name']);
    $id = mysqli_real_escape_string($con,$_POST['id']);








    $query = "INSERT INTO `variableproducts`(`product_id`, `attribute`) VALUES ('$id','$name')";

    if ($con->query($query)) {



        $last_id = $con->insert_id;


//        foreach ($_REQUEST['size'] as $rkey => $rvalue) {
//
//
//
//        }
//        foreach ($_REQUEST['price'] as $pricekey => $pricevalue) {
//
//
//
//
//        }

        $size  = count($_POST["size"]);
        $price  = count($_POST["price"]);
        if($size > 0)
        {

            for($i=0; $i<$size; $i++) {
                if (trim($_POST["size"][$i] != '')) {
                    // Your database query goes here

                    $query2 = "INSERT INTO `product_attribute`(`size`, `price`,`product_id`,`entity_id`) VALUES ('" . mysqli_real_escape_string($con, $_POST["size"][$i])  . "','" . mysqli_real_escape_string($con, $_POST["price"][$i])  ."','$id','$last_id')";

                    if ($con->query($query2)) {



                    }

                    else{


                        echo $query2;

                    }






                } }  }


        echo '<script>alert("Data Insert Successfully")</script>';
       echo "<script> window.location.href=' ../addvariations.php?id=$id'</script> ";


    } else {


        echo '<script>alert("Data Insert Failed")</script>';
        echo "<script> window.location.href=' ../addvariations.php?id=$id'</script> ";

    }


}

?>