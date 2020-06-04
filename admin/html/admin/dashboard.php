<?php

include_once 'header.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <style>
            .table-responsive {
                overflow-x: hidden;
            }
        </style>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="d-flex align-items-center">

                    </div>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex no-block justify-content-end align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Info box -->
            <!-- ============================================================== -->
            <div class="card-group">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-danger">
                                        <i class="ti-clipboard text-white"></i>
                                    </span>
                            </div>
                            <div>
                                Total Products
                            </div>
                            <div class="ml-auto">
                                <?php
                                $total_pages_sql2 = "SELECT COUNT(*) FROM product ";
                                $result2 = mysqli_query($con,$total_pages_sql2);
                                $total_rows = mysqli_fetch_array($result2)[0];


                                ?>
                                <h2 class="m-b-0 font-light"><?php echo $total_rows ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card -->
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg btn-info">
                                        <i class="ti-wallet text-white"></i>
                                    </span>
                            </div>
                            <div>
                                Total Inbox

                            </div>
                            <div class="ml-auto">
                                <?php

                                $total_pages_sql2 = "SELECT COUNT(*) FROM inbox";
                                $result2 = mysqli_query($con,$total_pages_sql2);
                                $total_rows = mysqli_fetch_array($result2)[0];


                                ?>
                                <h2 class="m-b-0 font-light"><?php echo $total_rows ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card -->
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="ti-shopping-cart text-white"></i>
                                    </span>
                            </div>
                            <div>
                                Total Orders

                            </div>
                            <div class="ml-auto">
                                <?php

                                $total_pages_sql55 = "SELECT COUNT(*) FROM order_table ";
                                $result2224 = mysqli_query($con,$total_pages_sql55);
                                $total_rows = mysqli_fetch_array($result2224)[0]


                                ?>
                                <h2 class="m-b-0 font-light"><?php echo $total_rows; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card -->
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-warning">
                                        <i class="mdi mdi-currency-usd text-white"></i>
                                    </span>
                            </div>
                            <div>
                                Total Registered Users

                            </div>
                            <div class="ml-auto">
                                <?php

                                $total_pages_sql2 = "SELECT count(*) FROM user ";
                                $result2 = mysqli_query($con,$total_pages_sql2);
                                $total_rows = mysqli_fetch_array($result2)[0]

                                ?>
                                <h2 class="m-b-0 font-light"><?php echo $total_rows ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card -->
                <!-- Column -->


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
            <!-- ============================================================== -->
            <!-- Info box -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Email campaign chart -->
            <!-- ============================================================== -->
              <!-- ============================================================== -->
            <!-- Email campaign chart -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Top Selliing Products -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Top Selliing Products -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->


    <?php


    include 'footer.php'

    ?>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->


    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- customizer Panel -->
<!-- ============================================================== -->
<aside class="customizer">
    <a href="javascript:void(0)" class="service-panel-toggle">
        <i class="fa fa-spin fa-cog"></i>
    </a>
    <div class="customizer-body">
        <ul class="nav customizer-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab
                                   " aria-controls="pills-home" aria-selected="true">
                    <i class="mdi mdi-wrench font-20"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#chat" role="tab
                                   " aria-controls="chat" aria-selected="false">
                    <i class="mdi mdi-message-reply font-20"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab
                                   " aria-controls="pills-contact" aria-selected="false">
                    <i class="mdi mdi-star-circle font-20"></i>
                </a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!-- Tab 1 -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="p-15 border-bottom">
                    <!-- Sidebar -->
                    <h5 class="font-medium m-b-10 m-t-10">Layout Settings</h5>
                    <div class="custom-control custom-checkbox m-t-10">
                        <input type="checkbox" class="custom-control-input" name="theme-view" id="theme-view">
                        <label class="custom-control-label" for="theme-view">Dark Theme</label>
                    </div>
                    <div class="custom-control custom-checkbox m-t-10">
                        <input type="checkbox" class="custom-control-input sidebartoggler" name="collapssidebar
                                   " id="collapssidebar">
                        <label class="custom-control-label" for="collapssidebar">Collapse Sidebar</label>
                    </div>
                    <div class="custom-control custom-checkbox m-t-10">
                        <input type="checkbox" class="custom-control-input" name="sidebar-position" id="sidebar-position">
                        <label class="custom-control-label" for="sidebar-position">Fixed Sidebar</label>
                    </div>
                    <div class="custom-control custom-checkbox m-t-10">
                        <input type="checkbox" class="custom-control-input" name="header-position" id="header-position">
                        <label class="custom-control-label" for="header-position">Fixed Header</label>
                    </div>
                    <div class="custom-control custom-checkbox m-t-10">
                        <input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                        <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
                    </div>
                </div>
                <div class="p-15 border-bottom">
                    <!-- Logo BG -->
                    <h5 class="font-medium m-b-10 m-t-10">Logo Backgrounds</h5>
                    <ul class="theme-color">
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-logobg="skin1"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-logobg="skin2"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-logobg="skin3"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-logobg="skin4"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-logobg="skin5"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-logobg="skin6"></a>
                        </li>
                    </ul>
                    <!-- Logo BG -->
                </div>
                <div class="p-15 border-bottom">
                    <!-- Navbar BG -->
                    <h5 class="font-medium m-b-10 m-t-10">Navbar Backgrounds</h5>
                    <ul class="theme-color">
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin1"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin2"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin3"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin4"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin5"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin6"></a>
                        </li>
                    </ul>
                    <!-- Navbar BG -->
                </div>
                <div class="p-15 border-bottom">
                    <!-- Logo BG -->
                    <h5 class="font-medium m-b-10 m-t-10">Sidebar Backgrounds</h5>
                    <ul class="theme-color">
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin1"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin2"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin3"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin4"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin5"></a>
                        </li>
                        <li class="theme-item">
                            <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin6"></a>
                        </li>
                    </ul>
                    <!-- Logo BG -->
                </div>
            </div>
            <!-- End Tab 1 -->
            <!-- Tab 2 -->
            <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="pills-profile-tab">
                <ul class="mailbox list-style-none m-t-20">
                    <li>
                        <div class="message-center chat-scroll">
                            <a href="javascript:void(0)" class="message-item" id='chat_user_1' data-user-id='1'>
                                    <span class="user-img">
                                        <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle">
                                        <span class="profile-status online pull-right"></span>
                                    </span>
                                <div class="mail-contnet">
                                    <h5 class="message-title">Pavan kumar</h5>
                                    <span class="mail-desc">Just see the my admin!</span>
                                    <span class="time">9:30 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="javascript:void(0)" class="message-item" id='chat_user_2' data-user-id='2'>
                                    <span class="user-img">
                                        <img src="../../assets/images/users/2.jpg" alt="user" class="rounded-circle">
                                        <span class="profile-status busy pull-right"></span>
                                    </span>
                                <div class="mail-contnet">
                                    <h5 class="message-title">Sonu Nigam</h5>
                                    <span class="mail-desc">I've sung a song! See you at</span>
                                    <span class="time">9:10 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="javascript:void(0)" class="message-item" id='chat_user_3' data-user-id='3'>
                                    <span class="user-img">
                                        <img src="../../assets/images/users/3.jpg" alt="user" class="rounded-circle">
                                        <span class="profile-status away pull-right"></span>
                                    </span>
                                <div class="mail-contnet">
                                    <h5 class="message-title">Arijit Sinh</h5>
                                    <span class="mail-desc">I am a singer!</span>
                                    <span class="time">9:08 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="javascript:void(0)" class="message-item" id='chat_user_4' data-user-id='4'>
                                    <span class="user-img">
                                        <img src="../../assets/images/users/4.jpg" alt="user" class="rounded-circle">
                                        <span class="profile-status offline pull-right"></span>
                                    </span>
                                <div class="mail-contnet">
                                    <h5 class="message-title">Nirav Joshi</h5>
                                    <span class="mail-desc">Just see the my admin!</span>
                                    <span class="time">9:02 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <!-- Message -->
                            <a href="javascript:void(0)" class="message-item" id='chat_user_5' data-user-id='5'>
                                    <span class="user-img">
                                        <img src="../../assets/images/users/5.jpg" alt="user" class="rounded-circle">
                                        <span class="profile-status offline pull-right"></span>
                                    </span>
                                <div class="mail-contnet">
                                    <h5 class="message-title">Sunil Joshi</h5>
                                    <span class="mail-desc">Just see the my admin!</span>
                                    <span class="time">9:02 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <!-- Message -->
                            <a href="javascript:void(0)" class="message-item" id='chat_user_6' data-user-id='6'>
                                    <span class="user-img">
                                        <img src="../../assets/images/users/6.jpg" alt="user" class="rounded-circle">
                                        <span class="profile-status offline pull-right"></span>
                                    </span>
                                <div class="mail-contnet">
                                    <h5 class="message-title">Akshay Kumar</h5>
                                    <span class="mail-desc">Just see the my admin!</span>
                                    <span class="time">9:02 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <!-- Message -->
                            <a href="javascript:void(0)" class="message-item" id='chat_user_7' data-user-id='7'>
                                    <span class="user-img">
                                        <img src="../../assets/images/users/7.jpg" alt="user" class="rounded-circle">
                                        <span class="profile-status offline pull-right"></span>
                                    </span>
                                <div class="mail-contnet">
                                    <h5 class="message-title">Pavan kumar</h5>
                                    <span class="mail-desc">Just see the my admin!</span>
                                    <span class="time">9:02 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <!-- Message -->
                            <a href="javascript:void(0)" class="message-item" id='chat_user_8' data-user-id='8'>
                                    <span class="user-img">
                                        <img src="../../assets/images/users/8.jpg" alt="user" class="rounded-circle">
                                        <span class="profile-status offline pull-right"></span>
                                    </span>
                                <div class="mail-contnet">
                                    <h5 class="message-title">Varun Dhavan</h5>
                                    <span class="mail-desc">Just see the my admin!</span>
                                    <span class="time">9:02 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End Tab 2 -->
            <!-- Tab 3 -->
            <div class="tab-pane fade p-15" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <h6 class="m-t-20 m-b-20">Activity Timeline</h6>
                <div class="steamline">
                    <div class="sl-item">
                        <div class="sl-left bg-success">
                            <i class="ti-user"></i>
                        </div>
                        <div class="sl-right">
                            <div class="font-medium">Meeting today
                                <span class="sl-date"> 5pm</span>
                            </div>
                            <div class="desc">you can write anything </div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left bg-info">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="sl-right">
                            <div class="font-medium">Send documents to Clark</div>
                            <div class="desc">Lorem Ipsum is simply </div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left">
                            <img class="rounded-circle" alt="user" src="../../assets/images/users/2.jpg"> </div>
                        <div class="sl-right">
                            <div class="font-medium">Go to the Doctor
                                <span class="sl-date">5 minutes ago</span>
                            </div>
                            <div class="desc">Contrary to popular belief</div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left">
                            <img class="rounded-circle" alt="user" src="../../assets/images/users/1.jpg"> </div>
                        <div class="sl-right">
                            <div>
                                <a href="javascript:void(0)">Stephen</a>
                                <span class="sl-date">5 minutes ago</span>
                            </div>
                            <div class="desc">Approve meeting with tiger</div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left bg-primary">
                            <i class="ti-user"></i>
                        </div>
                        <div class="sl-right">
                            <div class="font-medium">Meeting today
                                <span class="sl-date"> 5pm</span>
                            </div>
                            <div class="desc">you can write anything </div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left bg-info">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="sl-right">
                            <div class="font-medium">Send documents to Clark</div>
                            <div class="desc">Lorem Ipsum is simply </div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left">
                            <img class="rounded-circle" alt="user" src="../../assets/images/users/4.jpg"> </div>
                        <div class="sl-right">
                            <div class="font-medium">Go to the Doctor
                                <span class="sl-date">5 minutes ago</span>
                            </div>
                            <div class="desc">Contrary to popular belief</div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left">
                            <img class="rounded-circle" alt="user" src="../../assets/images/users/6.jpg"> </div>
                        <div class="sl-right">
                            <div>
                                <a href="javascript:void(0)">Stephen</a>
                                <span class="sl-date">5 minutes ago</span>
                            </div>
                            <div class="desc">Approve meeting with tiger</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab 3 -->
        </div>
    </div>
</aside>
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
<!--chartis chart-->
<script src="../../assets/libs/chartist/dist/chartist.min.js"></script>
<script src="../../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<!--c3 charts -->
<script src="../../assets/extra-libs/c3/d3.min.js"></script>
<script src="../../assets/extra-libs/c3/c3.min.js"></script>
<!--chartjs -->
<script src="../../assets/libs/raphael/raphael.min.js"></script>
<script src="../../assets/libs/morris.js/morris.min.js"></script>

<script src="../../dist/js/pages/dashboards/dashboard1.js"></script>
<script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="../../dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>

</html>