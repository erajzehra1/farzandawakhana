<?php
require_once 'dbconnect.php';

$id = $_GET['id'];
$query = "DELETE FROM slides WHERE id='$id'";
if ($con->query($query)) {
    echo "<script>alert('Data Deleted Succesfully')</script>";
    echo "<script> window.location.href=' ../Slider.php'</script> ";
} else {
    $msg = "Error While Deleting";


}




?>


