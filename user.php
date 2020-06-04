<?php

include_once 'header.php';
if(!isset($_SESSION['user'])){

    echo "<script> window.location.href='  index.php'</script> ";


}

$user_id = $_SESSION['user']['id'];

$query = "SELECT * FROM user  WHERE id = '$user_id'";
$result = mysqli_query($con, $query);
$row=mysqli_fetch_array($result);

?>

<style>


    .panel .panel-heading .nav-tabs {
        margin-bottom: -11px;
    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #555;
        cursor: default;
        background-color: #700707;
        border: 1px solid #990913;
        border-bottom-color: transparent;
    }
    .nav-tabs>li>a:hover {
        border-color: #990913 #ca0029 #e81800;
    }


    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #555;
        cursor: default;
        background-color: #700707;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }
    .nav>li>a:focus, .nav>li>a:hover {
        text-decoration: none;
        background-color: #a61212;
    }



</style>
<div class="container">
    <h2 class="underline" style="text-align: center">User Panel</h2></div>
<hr>

<div id="exTab2" class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title" style="background-color: #ca0029;">
                <ul class="nav nav-tabs" style="margin-left: 30%">
                    <li class="active">
                        <a href="#1" data-toggle="tab" style="color: white">User Profile</a>
                    </li>
                    <li><a href="#2" data-toggle="tab" style="color: white">Total Orders</a>
                    </li>
                    <li><a href="#3" data-toggle="tab" style="color: white">Change Password</a>
                    </li>
                    <li><a href="logout.php" style="color: white" >Logout</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="tab-content ">
                <div class="tab-pane active" id="1">
                    <br>
                    <div class="card-body" style="width: 80%;margin-left: 10%">

                        <form class="" action="includes/updateuser.php" method="post">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-12">


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">First Name</label>
                                            <div class="col-sm-10">

                                                <input class="form-control" type="text" name="fname" id="example-text-input" value="<?php echo $row['firstname'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
                                            <div class="col-sm-10">

                                                <input class="form-control" type="text" name="lname" id="example-text-input"  value="<?php echo $row['lastname'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">mobile</label>
                                            <div class="col-sm-10">

                                                <input class="form-control" type="text" name="mob" id="example-text-input"  value="<?php echo$row['mobile'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Adress</label>
                                            <div class="col-sm-10">

                                                <input class="form-control" type="text" name="adress" id="example-text-input"  value="<?php echo $row['address'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">City</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="id" value="<?php echo $_SESSION["user"]['id'] ?>">
                                                <input class="form-control" type="text" name="city" id="example-text-input"  value="<?php echo $row['city'] ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.col -->
                                </div>
                                <input type="submit" class="btn btn-success mb-5" style="float: right">

                                <!-- /.row -->
                            </div>
                        </form>

                        <br>
                        <hr>


                    </div>
                </div>
                <div class="tab-pane" id="2">

                    <div class="card-body">

                        <div class="col-12">

                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">List</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Order ID </th>

                                                <th>Name </th>


                                                <th>Delivery</th>
                                                <th>Total Bill </th>

                                                <th>Extra Note </th>
                                                <th>Order Status </th>
                                                <th>Date </th>
                                                <th>Details </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $query = "SELECT * FROM order_table WHERE user_id = '$user_id'  ORDER by id DESC";
                                            $result = mysqli_query($con, $query);
                                            while($row=mysqli_fetch_array($result)){?>
                                                <tr>
                                                    <td>FH<?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['firstname'] ?><?php echo $row['lastname'] ?></td>
                                                    <?php

                                                    $shipid = $row['shipping_id'];
                                                    $queryship = "SELECT * FROM shipping where  id = '$shipid'";
                                                    $resultship = mysqli_query($con, $queryship);
                                                    $rowship=mysqli_fetch_array($resultship);


                                                    ?>



                                                    <td>Shipping Company : <?php echo $rowship['name'] ?>
                                                        <hr>
                                                        Shipping Rate : <?php echo $rowship['rate'] ?>
                                                    </td>



                                                    <td><?php echo $row['total'] ?></td>
                                                    <td><?php echo $row['note'] ?></td>

                                                    <?php
                                                    if($row['status'] == 'Completed'){

                                                        ?>

                                                        <td>Dispatched to Courier</td>
                                                    <?php } else { ?>

                                                        <td><?php echo $row['status'] ?></td>

                                                    <?php } ?>
                                                    <td><?php echo $row['date'] ?></td>
                                                    <td>
                                                        <button type="button"   class="openBtn btn btn-success" data-toggle="modal" data-target="#myModal" data-id="<?php echo  $row['id'] ?>"><div>Details</div></button>


                                                    </td>

                                                </tr>
                                            <?Php } ?>

                                        </table>

                                        <script>

                                            $(document).ready(function(){
                                                $('#myModal').on('show.bs.modal', function (e) {
                                                    var rowid = $(e.relatedTarget).data('id');
                                                    $.ajax({
                                                        type : 'post',
                                                        url : 'fetch_orderproduct.php', //Here you will fetch records
                                                        data :  'rowid='+ rowid, //Pass $id
                                                        success : function(data){
                                                            $('.fetched-data').html(data);//Show fetched data from database
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                        <script>

                                            $(document).ready(function(){
                                                $('#reviewmodal').on('show.bs.modal', function (e) {
                                                    var rowid = $(e.relatedTarget).data('id');
                                                    $.ajax({
                                                        type : 'post',
                                                        url : 'fetchreview.php', //Here you will fetch records
                                                        data :  'rowid='+ rowid, //Pass $id
                                                        success : function(data){
                                                            $('.fetched-data').html(data);//Show fetched data from database
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->


                            <!-- /.box -->
                        </div>

                    </div>

                </div>
                <div class="tab-pane" id="3">
                    <div class="card-body" style="width: 80%;margin-left: 10%">

                        <form action="includes/changepass.php" method="post">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Change Password</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="id" value="<?php echo $_SESSION["user"]['id'] ?>">
                                                <input class="form-control" type="password" name="name" id="example-text-input">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <input type="submit" class="btn btn-success mb-5" style="float: right">

                                <!-- /.row -->
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : 'fetch_orderdetails.php', //Here you will fetch records
                data :  'rowid='+ rowid, //Pass $id
                success : function(data){
                    $('.fetched-data').html(data);//Show fetched data from database
                }
            });
        });
    });
</script>
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">

                <div class="fetched-data"></div>


            </div>
        </div>
    </div>
</div>
<div id="reviewmodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">

                <div class="fetched-data"></div>


            </div>
        </div>
    </div>
</div>
<?php



include_once 'footer.php'

?>

<!-- JS
============================================ -->

<script src="js/jquery-3.3.1.min.js" defer=""></script>

<script src="js/bootstrap.min.js" defer=""></script>
<script src="js/owl.carousel.min.js" defer=""></script>
<script src="js/scripts.js" defer=""></script>



</body>

</html>