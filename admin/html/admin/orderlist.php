<?php




include_once 'header.php';
$_SESSION['admin']['username'];
$username = $_SESSION['admin']['username'];


?>
<style>

    button.btn.btn-info.btn-rounded {
        float: right;
        margin-top: -37px;
    }
    .page-breadcrumb {
        color: white;
        background-color: #4C9DD9;
        padding: 49px 20px 0;
    }


</style>
<link rel="stylesheet" href="pic.css">


<link href="../../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->






    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-breadcrumb">
                            <h4 style="margin-top: -35px;">All Orders</h4>

                        </div>
                        <br>
                        <hr>
                        <div class="table-responsive">
                            <table id="zero_config" class="table m-t-30  table-hover contact-list table-striped  table-bordered" data-page-size="10">
                                <thead>       <tr>
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
                                $query = "SELECT * FROM `order_table`";
                                $result = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($result)) {
                                    ?>

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
                                <?php } ?>
                                </tbody>

                                <tfoot>
                                <tr>

                                    <td colspan="7">
                                        <div class="">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination float-right"></ul>
                                            </nav>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        <script>

            $(document).ready(function(){
                $('#myModal').on('show.bs.modal', function (e) {
                    var rowid = $(e.relatedTarget).data('id');
                    $.ajax({
                        type : 'post',
                        url : 'fetch_orderdetail.php', //Here you will fetch records
                        data :  'rowid='+ rowid, //Pass $id
                        success : function(data){
                            $('.fetched-data').html(data);//Show fetched data from database
                        }
                    });
                });
            });
        </script>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>

</div>






<div class="chat-windows"></div>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<script src="../../dist/js/app.min.js"></script>
<script src="../../dist/js/app.init.js"></script>
<script src="../../dist/js/app-style-switcher.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="../../dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../../dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../../dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<script src="../../assets/libs/footable/dist/footable.all.min.js"></script>
<script src="../../dist/js/pages/tables/footable-init.js"></script>

<script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="../../dist/js/pages/datatable/datatable-basic.init.js"></script>

</body>

</html>