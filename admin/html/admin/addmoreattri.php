<?php
include_once 'inlcudes/dbconnect.php';
session_start();
$_SESSION['admin']['username'];
$username = $_SESSION['admin']['username'];

$id = $_POST['rowid'];

$query1 = "SELECT * FROM `variableproducts` WHERE id= '$id'";
$result1 = mysqli_query($con,$query1);
$rows = mysqli_fetch_array($result1);




?>
<form class="form-horizontal form-material" method="post" action="inlcudes/addmoreattri.php" enctype="multipart/form-data">
    <div class="form-group">
        <div class="row">

            <input type="hidden" name="product_id" value="<?php echo $rows['product_id'] ?>">
            <input type="hidden" name="entityid" value="<?php echo $id ?>">
            <div class="col-md-6 m-b-20">
                <label for="">Size</label>
                <input type="text" class="form-control" name="size" value="" placeholder="Add Size" required> </div>
            <div class="col-md-6 m-b-20">
                <label for="">Price</label>
                <input type="text" class="form-control" name="price" value="" placeholder="Add Price" required> </div>
        </div>

        <div class=formter" style="float: right">
            <button type="submit" class="btn btn-info waves-effect">Save</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
        </div>


</form>
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