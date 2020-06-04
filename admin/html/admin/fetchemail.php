<?php
include_once 'inlcudes/dbconnect.php';
session_start();
$_SESSION['admin']['username'];
$username = $_SESSION['admin']['username'];

$id = $_POST['rowid'];

$query1 = "SELECT * FROM `inbox` WHERE id= '$id'";
$result1 = mysqli_query($con,$query1);
$rows = mysqli_fetch_array($result1);




?>

<form class="form-horizontal form-material" method="post" action="inlcudes/update_category.php" enctype="multipart/form-data">
    <div class="form-group">

        <div class="row">
            <div class="col-md-12 m-b-20">
                   <textarea class="form-control" name="ckeditor" cols="30" rows="10" style="border-color: black;">


                                    </textarea>
            </div>


        </div>
        <div class=formter" style="float: right">
            <button type="submit" class="btn btn-info waves-effect">Save</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
        </div>


</form>
