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
                            <h4 style="margin-top: -35px;">All Products</h4>

                            <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">Add New</button>
                        </div>
                        <br>
                        <hr>
                        <div class="table-responsive">
                            <table id="zero_config" class="table m-t-30  table-hover contact-list table-striped  table-bordered" data-page-size="10">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Product Name</th>
                                    <th> Category</th>

                                    <th> Parent Category</th>
                                    <th> Price</th>
                                    <th>Thumbnail</th>

                                    <th>Add Variations</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                $query = "SELECT * FROM `product`  p INNER JOIN parent_cat t on p.parent_category=t.id";
                                $result = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($result)) {
                                    ?>

                                    <tr>
                                        <td><?php echo $row[0]?></td>
                                        <td><?php echo $row[1]?></td>
                                        <?php
                                        $category = $row['category'];
                                        if ($category > 0) {
                                            $querycat = "SELECT * FROM `categories` WHERE id = '$category'";
                                            $resultcat = mysqli_query($con, $querycat);
                                            $rowcat = mysqli_fetch_array($resultcat);

                                        }

                                      else {

                                          $rowcat['name'] = 'null';

                                      }



                                        ?>
                                        <td><?php echo $rowcat['name'] ?></td>

                                        <td><?php echo $row[10] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                        <td><img class="img img-thumbnail" src="../../../img/product/<?php echo $row['image'] ?>" alt="" style="width: 150px;height: 150px"></td>



                                       <td>



                                            <a  class="btn btn-info" href="addvariations.php?id=<?php echo $row[0] ?>"><div><i class="fa fa-plus"></i></div></a>








                                       </td>

                                        <td style="display: inline-flex;">

                                            <a  class="btn btn-info" href="fetchproduct.php?id=<?php echo $row[0] ?>"><div><i class="fa fa-edit"></i></div></a>
                                            <a class="delete"  href="inlcudes/dlt_product.php?id=<?php echo $row[0] ?>" class="delete" data-confirm="Are you sure to delete this item?"><button class="btn btn-danger"><div><i class="fa fa-trash"></i></div></button>
                                            </a>







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


    </div>

</div>


<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="post" action="inlcudes/add_product.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-3 m-b-20">
                            <label for="">  product Name</label>
                            <input type="text"  class="form-control" name="name">


                        </div>
                            <div class="col-md-3 m-b-20">
                                <label for="">  product Urdu Name</label>
                                <input type="text"  class="form-control" name="uname">


                            </div>
                            <div class="col-md-3 m-b-20">
                                <label for="">  product Price</label>
                                <input type="number" class="form-control" name="price" min="0">


                            </div>

                            <div class="col-md-3 m-b-20">
                                <label for="">  Sell Price</label>
                                <input type="number" class="form-control" name="sprice" min="0">


                            </div>
                            <div class="col-md-4 m-b-20">
                                <label for="">  product Stock</label>
                                <input type="number" class="form-control" name="stock" min="0" required>

                            </div>
                            <div class="col-md-3 m-b-20">
                                <label for="">  Parent Category</label>

                                <select class="form-control" name="pcat" id="">


                                    <?php
                                    $query = "SELECT *  FROM `parent_cat`";
                                    $result = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                    <?php } ?>
                                </select>


                            </div>
                            <div class="col-md-3  m-b-20">
                                <label for="">  Category</label>
                                <select class="form-control" name="cat" id=""  >

                                    <option value="">Select  Category</option>
                                    <?php
                                    $query = "SELECT * FROM `categories`";
                                    $result = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                    <?php } ?>

                                </select>

                            </div>
                                   <div class="col-md-4  m-b-20">

                                <label for="">Add Picture</label>
                                <div class="box">
                                    <div class="js--image-preview"></div>
                                    <div class="upload-options">
                                        <label>

                                            <input type="file" name="pic" class="image-upload" accept="image/*"  required>
                                        </label>
                                    </div>

                                </div>


                            </div>
                            <div class="col-md-12 m-b-20">
                                <label for="">  product Description</label>
                                <textarea id="ckeditor" class="ckeditor" name="ckeditor" cols="30" rows="10"  required>


                                    </textarea>

                            </div>

                        </div>
                        <div class=formter" style="float: right">
                            <button type="submit" class="btn btn-info waves-effect">Save</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                        </div>


                </form>
            </div>


            <!-- /.modal-content -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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