<?php
require_once 'dbconnect.php';

$id = $_GET['id'];
$pro_id = $_GET['pro_id'];
$query = "DELETE FROM variableproducts WHERE id='$id'";
if ($con->query($query)) {
    echo "<script>alert('Data Deleted Succesfully')</script>";
    echo "<script> window.location.href=' ../addvariations.php?id=$pro_id'</script> ";
} else {
    echo "<script>alert('Data Deleted Failed')</script>";
    echo "<script> window.location.href=' ../addvariations.php?id=$pro_id'</script> ";


}




?>


