<?php




include_once 'header.php';
$_SESSION['admin']['username'];
$username = $_SESSION['admin']['username'];


?>
<script src="ckeditor2/ckeditor/ckeditor.js"></script>
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
                            <h4 style="margin-top: -35px;">Change Company Details</h4>
                            <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">Change Details</button>
                        </div>
                        <br>
                        <hr>
                        <div class="table-responsive">
                            <table id="zero_config" class="table m-t-30  table-hover contact-list table-striped  table-bordered" data-page-size="10">
                                <thead>
                                <tr>

                                    <th>Logo</th>
                                    <th>Mobile No</th>
                                    <th>Phone No</th>

                                    <th>Email</th>
                                    <th>Adress</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                $query = "SELECT * FROM `company` WHERE id = '1'";
                                $result = mysqli_query($con,$query);
                                $row = mysqli_fetch_array($result);
                                ?>

                                <tr>


                                    <td><img class="img img-thumbnail" src="../../../img/<?php echo $row['logo'] ?>" alt="" style="width: 300px;height: 200px">


                                    <td> <?php echo $row['mobile'] ?>
                                    </td>
                                    <td> <?php echo $row['phone'] ?>
                                    </td>
                                    <td> <?php echo $row['email'] ?>
                                    </td>

                                    <td> <?php echo $row['address'] ?>
                                    </td>


                                </tr>

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

        <div id="add-contact" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">



                        <form class="form-horizontal form-material" method="post" action="inlcudes/contact.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="mobile">Mobile No</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row['mobile'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone">Phone No</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="address">address</label>
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 m-b-20">
                                        <img class="img img-thumbnail" src="../../../img/<?php echo $row['logo'] ?>" alt="" style="width: 200px;height: 200px">
                                    </div>

                                    <div class="col-md-6 m-b-20">

                                        <label for="">Add Picture</label>
                                        <div class="box">
                                            <div class="js--image-preview"></div>
                                            <div class="upload-options">
                                                <label>

                                                    <input type="file" name="pic" class="image-upload" accept="image/*" />
                                                </label>
                                            </div>

                                        </div>







                                    </div>
                                </div>
                                <div class=formter" style="float: right">
                                    <button type="submit" class="btn btn-info waves-effect">Save</button>
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                </div>


                        </form>



                    </div>
                </div>
            </div>
        </div>

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

<script>
    var deleteLinks = document.querySelectorAll('.delete');

    for (var i = 0; i < deleteLinks.length; i++) {
        deleteLinks[i].addEventListener('click', function(event) {
            event.preventDefault();

            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                window.location.href = this.getAttribute('href');
            }
        });
    }


</script>
<script>
    function initImageUpload(box) {
        let uploadField = box.querySelector('.image-upload');

        uploadField.addEventListener('change', getFile);

        function getFile(e){
            let file = e.currentTarget.files[0];
            checkType(file);
        }

        function previewImage(file){
            let thumb = box.querySelector('.js--image-preview'),
                reader = new FileReader();

            reader.onload = function() {
                thumb.style.backgroundImage = 'url(' + reader.result + ')';
            }
            reader.readAsDataURL(file);
            thumb.className += ' js--no-default';
        }

        function checkType(file){
            let imageType = /image.*/;
            if (!file.type.match(imageType)) {
                throw 'Datei ist kein Bild';
            } else if (!file){
                throw 'Kein Bild gewählt';
            } else {
                previewImage(file);
            }
        }

    }

    // initialize box-scope
    var boxes = document.querySelectorAll('.box');

    for (let i = 0; i < boxes.length; i++) {
        let box = boxes[i];
        initDropEffect(box);
        initImageUpload(box);
    }



    /// drop-effect
    function initDropEffect(box){
        let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

        // get clickable area for drop effect
        area = box.querySelector('.js--image-preview');
        area.addEventListener('click', fireRipple);

        function fireRipple(e){
            area = e.currentTarget
            // create drop
            if(!drop){
                drop = document.createElement('span');
                drop.className = 'drop';
                this.appendChild(drop);
            }
            // reset animate class
            drop.className = 'drop';

            // calculate dimensions of area (longest side)
            areaWidth = getComputedStyle(this, null).getPropertyValue("width");
            areaHeight = getComputedStyle(this, null).getPropertyValue("height");
            maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

            // set drop dimensions to fill area
            drop.style.width = maxDistance + 'px';
            drop.style.height = maxDistance + 'px';

            // calculate dimensions of drop
            dropWidth = getComputedStyle(this, null).getPropertyValue("width");
            dropHeight = getComputedStyle(this, null).getPropertyValue("height");

            // calculate relative coordinates of click
            // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
            x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
            y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;

            // position drop and animate
            drop.style.top = y + 'px';
            drop.style.left = x + 'px';
            drop.className += ' animate';
            e.stopPropagation();

        }
    }

</script>

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