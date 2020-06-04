<?php

include_once 'header.php';

?>
    <!-- End Header Box -->
    <!-- Content Box -->
    <div class="relative full-width">
        <!-- Breadcrumb -->
        <div class="container-web relative">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb-web">
                        <ul class="clear-margin">
                            <li class="animate-default title-hover-red"><a href="#">Home</a></li>
                            <li class="animate-default title-hover-red"><a href="#">All Products</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->
        <!-- Content Category -->
        <div class="relative container-web">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 relative overfollow-hidden clear-padding button-show-sidebar">
                        <p onclick="showSideBar()"><span class="ti-filter"></span> Sidebar</p>
                    </div>
                    <div class="banner-top-category-page bottom-margin-default effect-bubba zoom-image-hover overfollow-hidden relative full-width">
                        <img src="img/category/<?php echo $row[''] ?>" alt=""/>
                        <a href="#"></a>
                    </div>
                </div>
                <div class="row ">
                    <!-- Content Category -->
                    <div class="col-md-12 relative clear-padding">

                        <div class="bar-category bottom-margin-default border no-border-r no-border-l no-border-t">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 col-xs-4">

                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-8 right-category-bar float-right relative">

                                    <a href="#" class=" float-left active-view-bar"><span class="icon-bar-category border ti-layout-grid3"></span></a>
                                    <a href="#" class=" float-left"><span class="icon-bar-category border ti-layout-list-thumb"></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content Category -->
                        <div class="row">
                            <?php
                            if (isset($_GET['pageno'])) {
                                $pageno = $_GET['pageno'];
                            } else {
                                $pageno = 1;
                            }
                            $no_of_records_per_page = 9;
                            $offset = ($pageno-1) * $no_of_records_per_page;

                            if (isset($_GET['cat']) AND isset($_GET['name']))  {

                                if ($_GET['name'] == ''){


                                    $cat = mysqli_real_escape_string($con,$_GET['cat']);


                                    $total_pages_sql = "SELECT COUNT(*) FROM product WHERE parent_category = '$cat' OR category = '$cat'";


                                }
                                else {

                                    $name = mysqli_real_escape_string($con, $_GET['name']);
                                    $cat = mysqli_real_escape_string($con, $_GET['cat']);


                                    $total_pages_sql = "SELECT COUNT(*) FROM product WHERE parent_category = '$cat' OR category = '$cat' OR name like  '%$name%' OR urduname like  '%$name%'";
                                }

                            }


                            else if (isset($_GET['cat']))  {

                                $cat = mysqli_real_escape_string($con,$_GET['cat']);


                                $total_pages_sql = "SELECT COUNT(*) FROM product WHERE parent_category = '$cat' OR category = '$cat'";

                            }
                            $result = mysqli_query($con,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);

                            if (isset($_GET['cat']) AND isset($_GET['name']))  {

                                if ($_GET['name'] == '') {

                                    $cat = mysqli_real_escape_string($con, $_GET['cat']);


                                    $query = "SELECT * FROM product WHERE parent_category = '$cat' OR category = '$cat'  LIMIT $offset, $no_of_records_per_page";


                                }

                                else {
                                    $name = mysqli_real_escape_string($con, $_GET['name']);
                                    $cat = mysqli_real_escape_string($con, $_GET['cat']);


                                    $query = "SELECT * FROM product WHERE parent_category = '$cat' OR category = '$cat' OR name like  '%$name%' OR urduname like  '%$name%'  LIMIT $offset, $no_of_records_per_page";


                                }
                            }


                            else if (isset($_GET['cat']))  {

                                $cat = mysqli_real_escape_string($con,$_GET['cat']);


                                $query = "SELECT * FROM product WHERE parent_category = '$cat' OR category = '$cat'  LIMIT $offset, $no_of_records_per_page";
                            }

                            $result = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($result)) {

                            if ($row > 0){ ?>

                            <div class="col-md-3 col-sm-4 col-xs-12 product-category relative effect-hover-boxshadow animate-default">
                                <div class="image-product relative overfollow-hidden">
                                    <div class="center-vertical-image">
                                        <img src="img/product/<?php echo $row['image'] ?>" alt="Product" style="width: 270px;height: 270px;">
                                    </div>
                                    <a href="product_detail.php?id=<?php echo $row['id'] ?>"></a>
                                    <ul class="option-product animate-default">
                                        <li class="relative"><a href="product_detail.php?id=<?php echo $row['id'] ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                        <li class="relative"><a href="product_detail.php?id=<?php echo $row['id'] ?>"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i>Details</a></li>

                                        <li class="relative"><a href="product_detail.php?id=<?php echo $row['id'] ?>" ><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <h3 class="title-product clearfix full-width title-hover-black"><a href="product_detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?> <?php echo $row['urduname'] ?></a></h3>
                                <p class="clearfix price-product"><span class="price-old">

                                <p class="clearfix price-product">
                                            <span class="price-old">
                                             <?php

                                             if ($row['sellprice'] != ''){



                                                 ?>

                                                 Rs <?php echo $row[3]; } ?></span>

                                               <span id="newprice">
                                            Rs <?php

                                                   if ($row['sellprice'] != ''){

                                                       $totalprice = $row['sellprice'] ;
                                                       echo $row['sellprice'];}

                                                   else {

                                                       $totalprice = $row[3];
                                                       echo $row[3];

                                                   }


                                                   ?>
</span>
                                </p>


                                <div class="clearfix ranking-product-category ranking-color">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                            </div>
                             <?php } }?>
                        </div>
                        <div class="row">
                            <div class="pagging relative">
                                <?php

                                if (isset($_GET['cat'])){

                                    $cat = $_GET['cat']

                                ?>
                                <ul>
                                    <?php if($pageno <= 1){ ?>

                                    <li style="display: none"><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</a></li>
                                    <?php } else { ?>
                                    <li><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1)."&cat=".($cat); } ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</a></li>
                                    <?php } ?>
                                    <?php for ($i=1; $i<=$total_pages; $i++) {

                                    if($pageno == $i){

                                    ?>

                                    <li class="active-pagging"><a href="search_category.php?pageno=<?php echo $i ?>&cat=<?php echo $cat ?>"><?php echo $pageno ?></a></li>
                                    <?php } else { ?>

                                    <li><a href="search_category.php?pageno=<?php echo $i ?>&cat=<?php echo $cat ?>"><?php echo $i ?></a></li>
                                    <?php }}

                                    if ($pageno == $total_pages){
                                    ?>
                                    <li style="display: none"><a href="?pageno=<?php echo $total_pages; ?>&cat=<?php echo $cat ?>">Last <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                    <?php } else { ?>

                                    <li><a href="?pageno=<?php echo $total_pages; ?>&cat=<?php echo $cat ?>">Last <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                                    <?php } ?>
                                </ul>
                                <?php } elseif(isset($_GET['name'])){

                                    $name = $_GET['name'];

                                    ?>
                                <ul>
                                    <?php if($pageno <= 1){ ?>

                                        <li style="display: none"><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</a></li>
                                    <?php } else { ?>
                                        <li><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1)."&name=".($name); } ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</a></li>
                                    <?php } ?>
                                    <?php for ($i=1; $i<=$total_pages; $i++) {

                                        if($pageno == $i){

                                            ?>

                                            <li class="active-pagging"><a href="search_category.php?pageno=<?php echo $i ?>&name=<?php echo $name ?>"><?php echo $pageno ?></a></li>
                                        <?php } else { ?>

                                            <li><a href="search_category.php?pageno=<?php echo $i ?>&name=<?php echo $name ?>"><?php echo $i ?></a></li>
                                        <?php }}

                                    if ($pageno == $total_pages){
                                        ?>
                                        <li style="display: none"><a href="?pageno=<?php echo $total_pages; ?>&name=<?php echo $name ?>">Last <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                    <?php } else { ?>

                                        <li><a href="?pageno=<?php echo $total_pages; ?>&name=<?php echo $name ?>">Last <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                                    <?php } ?>
                                </ul>


                                <?php } elseif(isset($_GET['name'])&&isset($_GET['cat'])){

                                    $name = $_GET['name'];
                                    $cat = $_GET['cat'];
                                    ?>
                                    <ul>
                                        <?php if($pageno <= 1){ ?>

                                            <li style="display: none"><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</a></li>
                                        <?php } else { ?>
                                            <li><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1)."&name=".($name)."&cat=".($cat); } ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</a></li>
                                        <?php } ?>
                                        <?php for ($i=1; $i<=$total_pages; $i++) {

                                            if($pageno == $i){

                                                ?>

                                                <li class="active-pagging"><a href="search_category.php?pageno=<?php echo $i ?>&name=<?php echo $name ?>&cat<?php echo $cat ?>"><?php echo $pageno ?></a></li>
                                            <?php } else { ?>

                                                <li><a href="search_category.php?pageno=<?php echo $i ?>&name=<?php echo $name ?>&cat<?php echo $cat ?>"><?php echo $i ?></a></li>
                                            <?php }}

                                        if ($pageno == $total_pages){
                                            ?>
                                            <li style="display: none"><a href="?pageno=<?php echo $total_pages; ?>&name=<?php echo $name ?>&cat<?php echo $cat ?>">Last <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                        <?php } else { ?>

                                            <li><a href="?pageno=<?php echo $total_pages; ?>&name=<?php echo $name ?>&cat<?php echo $cat ?>">Last <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                                        <?php } ?>
                                    </ul>
                                <?php } ?>

                            </div>
                        </div>
                        <!-- End Product Content Category -->
                    </div>
                    <!-- Sider Bar -->

                    <!-- End Sider Bar Box -->
                </div>
            </div>
        </div>
        <!-- End Sider Bar -->
    </div>
    <!-- End Content Box -->
    <!-- Support -->
    <div class=" support-box full-width bg-red support_box_v2">
        <div class="container-web">
            <div class=" container">
                <div class="row">
                    <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                        <img src="img/icon_free_ship_white-min.png" alt="Icon Free Ship" class="absolute" />
                        <p>free shipping</p>
                        <p>on order over $500</p>
                    </div>
                    <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                        <img src="img/icon_support_white-min.png" alt="Icon Supports" class="absolute">
                        <p>support</p>
                        <p>life time support 24/7</p>
                    </div>
                    <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                        <img src="img/icon_patner_white-min.png" alt="Icon partner" class="absolute">
                        <p>help partner</p>
                        <p>help all aspects</p>
                    </div>
                    <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                        <img src="img/icon_phone_table_white-min.png" alt="Icon Phone Tablet" class="absolute">
                        <p>contact with us</p>
                        <p>+07 (0) 7782 9137</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Box -->
    <!-- Footer Box -->
  <?php

  include_once 'footer.php'

  ?>
</div>
<!-- End Footer Box -->
<script src="js/jquery-3.3.1.min.js" defer=""></script>
<script src="js/bootstrap.min.js" defer=""></script>
<script src="js/multirange.js" defer=""></script>
<script src="js/owl.carousel.min.js" defer=""></script>
<script src="js/sync_owl_carousel.js" defer=""></script>
<script src="js/scripts.js" defer=""></script>
</body>
</html>