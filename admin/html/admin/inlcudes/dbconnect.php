<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "farzana2";
// Create connection
$con = mysqli_connect($servername,$username,$password,$dbName);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
 
}
?>