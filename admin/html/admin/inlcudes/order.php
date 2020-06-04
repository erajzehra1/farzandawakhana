<?php
include_once 'dbconnect.php';

if(isset($_POST["submit"])) {
    $id_ary = explode(",",$_POST["row_order"]);
    for($i=0;$i<count($id_ary);$i++) {
        $query=  "UPDATE coupon SET sort ='" . $i . "' WHERE id =  $id_ary[$i]";
        if(mysqli_query($con, $query)){


            echo '<script>alert("Order Change  Done")</script>';
            echo "<script> window.location.href=' ../stores.php'</script> ";


        }

        else{


            echo $query;



        }
    }
}


?>