<?php




include_once 'header.php';
$_SESSION['admin']['username'];
$username = $_SESSION['admin']['username'];
$id = $_GET['id'];
$query = "SELECT * FROM `product` WHERE id = '$id'";
$result = mysqli_query($con,$query);
$rows = mysqli_fetch_array($result)


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

    .form-control {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: .875rem;
        line-height: 1.5;
        color: #4f5467;
        background-color: #fff;
        border: 1px solid #050505;
        border-radius: 2px;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    select.form-control.form-control-sm {
        padding: 3px;
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
                            <h4 style="margin-top: -35px;">Add Product Variation</h4>
                        </div>
                        <br>
                        <hr>
                        <div class="table-responsive" style="overflow-x: hidden">
                            <form class="form-horizontal form-material" method="post" action="inlcudes/productatt.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 m-b-20">
                                            <label for="">  Variation  Name</label>
                                            <input type="text"  class="form-control" name="name" value="">
                                            <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">


                                        </div>

                                        <div class="form-group col-md-4 m-b-20">
                                            <div class="field_wrapper1">

                                                <label for="example-text-input" class="col-sm-12 col-form-label">Add Size</label>
                                                <input  type="text" class="form-control pp" name="size[]" value=""/>
                                                <br>

                                            </div>
                                            <a href="javascript:void(0);" class="add_button1" title="Add field"><img src="http://demos.codexworld.com/add-remove-input-fields-dynamically-using-jquery/add-icon.png"/></a>
                                            <script type="text/javascript">
                                                $(document).ready(function(){
//                                                    var maxField = 20; //Input fields increment limitation
//                                                    var addButton1 = $('.add_button1'); //Add button selector
                                                   var wrapper = $('.field_wrapper1'); //Input field wrapper
//                                                    var fieldHTML = '<div><input type="text" class="form-control pp1" name="size[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="http://demos.codexworld.com/add-remove-input-fields-dynamically-using-jquery/remove-icon.png"/></a></div>'; //New input field html
//                                                    var x = 1; //Initial field counter is 1
//
//                                                    //Once add button is clicked
//                                                    $(addButton1).click(function(){
//                                                        //Check maximum number of input fields
//                                                        if(x < maxField){
//                                                            x++; //Increment field counter
//                                                            $(wrapper).append(fieldHTML); //Add field html
//                                                        }
//                                                    });
//
//                                                    //Once remove button is clicked
//                                                    $(wrapper).on('click', '.remove_button', function(e){
//                                                        e.preventDefault();
//                                                        $(this).parent('div').remove(); //Remove field html
//                                                        x--; //Decrement field counter
//                                                    });
var check = 0;
                                                    $('.add_button1').click(function(){

                                                        var inputttsize = '<div class="div_'+check+'"><input id="size" type="text" class="form-control pp1" name="size[]" value=""/><a href="javascript:void(0);" class="remove_button" data-did="div_'+check+'" ><img src="http://demos.codexworld.com/add-remove-input-fields-dynamically-using-jquery/remove-icon.png"/></a></div>';
                                                        var inputttprice = '<div class="div_'+check+'"><input type="text" class="form-control pp1" name="price[]" value=""/><a href="javascript:void(0);" class="remove_button" data-did="div_'+check+'"><img src="http://demos.codexworld.com/add-remove-input-fields-dynamically-using-jquery/remove-icon.png"/></a></div>';

                                                        $('.field_wrapper1').append(inputttsize);
                                                        $('.field_wrapper2').append(inputttprice);
                                                        check++;
                                                    });
                                                     $(wrapper).on('click', '.remove_button', function(e){
                                                       e.preventDefault();

console.log('#'+$(this).attr('data-did'),$('.'+$(this).attr('data-did')));
document.querySelectorAll('.'+$(this).attr('data-did')).forEach(function(a) {
  a.remove()
})

                                                       $('.'+$(this).attr('data-did')).remove();                                                   
                                                   });
                                                });
                                            </script>

                                        </div>
                                        <div class="form-group col-md-4 m-b-20">
                                            <div class="field_wrapper2">

                                                <label for="example-text-input" class="col-sm-12 col-form-label">Add Price</label>
                                                <input  type="text" class="form-control pp" name="price[]" value=""/>
                                                <br>
                                            </div>

                                            <script type="text/javascript">
                                                // $(document).ready(function(){
                                                //     var maxField = 20; //Input fields increment limitation
                                                //     var addButton1 = $('.add_button1'); //Add button selector
                                                //     var wrapper = $('.field_wrapper1'); //Input field wrapper
                                                //     var fieldHTML = '<div><input type="text" class="form-control pp1" name="price[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="http://demos.codexworld.com/add-remove-input-fields-dynamically-using-jquery/remove-icon.png"/></a></div>'; //New input field html
                                                //     var x = 1; //Initial field counter is 1

                                                //     //Once add button is clicked
                                                //     $(addButton1).click(function(){
                                                //         //Check maximum number of input fields
                                                //         if(x < maxField){
                                                //             x++; //Increment field counter
                                                //             $(wrapper).append(fieldHTML); //Add field html
                                                //         }
                                                //     });

                                                //     //Once remove button is clicked
                                                //     $(wrapper).on('click', '.remove_button', function(e){
                                                //         e.preventDefault();
                                                //         $(this).parent('div').remove(); //Remove field html
                                                //         x--; //Decrement field counter
                                                //     });
                                                // });
                                            </script>

                                        </div>
                                    </div>
                                    <div class=formter" style="float: right">
                                        <button type="submit" class="btn btn-info waves-effect">Save</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                    </div>


                            </form>

                            <hr>
                            <hr>
                            <hr>
                            <table id="zero_config" class="table m-t-30  table-hover contact-list table-striped  table-bordered" data-page-size="10">
                                <thead>
                                <tr>
                                    <th>id</th>

                                    <th> Variations Name</th>



                                    <th>Attributes</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                $query = "SELECT * FROM `variableproducts` WHERE product_id = '$id' ";
                                $result = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($result)) {
                                    ?>

                                    <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['attribute']?></td>



                                        <td>

                                            <?php
                                            $entity_id = $row['id'];
                                            $query22 = "SELECT * FROM `product_attribute` WHERE product_id = '$id' AND entity_id = '$entity_id'";
                                            $result22 = mysqli_query($con,$query22);
                                            while($row2 = mysqli_fetch_array($result22)) {
                                            ?>


                                                <div class="row">


                                                    <div class="col-md-3">

                                              Size:  <?php echo $row2['size'] ?>
                                                    </div>
                                                    <div class="col-md-3">

                                                    Price:  <?php echo $row2['price'] ?>
                                                        </div>

                                                <div class="col-md-6">
                                                <button type="button"   class="openBtn btn btn-info" data-toggle="modal" data-target="#myModal" data-id="<?php echo  $row2[0] ?>"><div><i class="fa fa-edit"></i></div></button>
                                                    <a class="delete"  href="inlcudes/dlt_proatt.php?id=<?php echo $row2['id'] ?>&pro_id=<?php echo $id ?>" class="delete" data-confirm="Are you sure to delete this item?"><button class="btn btn-danger"><div><i class="fa fa-trash"></i></div></button>
                                                    </a>
                                                </div>
                                                </div>
                                                <hr>


                                             <?php } ?>



                                        </td>

                                        <td style="display: inline-flex;">
                                            <button type="button"   class="openBtn btn btn-info" data-toggle="modal" data-target="#addmore" data-id="<?php echo  $row[0] ?>"><div><i class="fa fa-plus"></i></div></button>


                                            <button type="button"   class="openBtn btn btn-info" data-toggle="modal" data-target="#myModal2" data-id="<?php echo  $row[0] ?>"><div><i class="fa fa-edit"></i></div></button>
                                            <a class="delete"  href="inlcudes/dlt_provariable.php?id=<?php echo $row['id'] ?>&pro_id=<?php echo $id ?>" class="delete" data-confirm="Are you sure to delete this item?"><button class="btn btn-danger"><div><i class="fa fa-trash"></i></div></button>
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
                            <div id="addmore" class="modal fade" role="dialog">
                                <div class="modal-dialog">
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
                                    $('#addmore').on('show.bs.modal', function (e) {
                                        var rowid = $(e.relatedTarget).data('id');
                                        $.ajax({
                                            type : 'post',
                                            url : 'addmoreattri.php', //Here you will fetch records
                                            data :  'rowid='+ rowid, //Pass $id
                                            success : function(data){
                                                $('.fetched-data').html(data);//Show fetched data from database
                                            }
                                        });
                                    });
                                });
                            </script>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
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
                                    $('#myModal2').on('show.bs.modal', function (e) {
                                        var rowid = $(e.relatedTarget).data('id');
                                        $.ajax({
                                            type : 'post',
                                            url : 'fetch_variable.php', //Here you will fetch records
                                            data :  'rowid='+ rowid, //Pass $id
                                            success : function(data){
                                                $('.fetched-data').html(data);//Show fetched data from database
                                            }
                                        });
                                    });
                                });
                            </script>
                            <div id="myModal2" class="modal fade" role="dialog">
                                <div class="modal-dialog">
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
                                            url : 'fetch_variations.php', //Here you will fetch records
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
                </div>
            </div>
        </div>


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