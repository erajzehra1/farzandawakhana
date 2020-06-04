<?php

include_once'header.php';

?>
    <!-- End Header Box -->
    <!-- Content Box -->
    <div class="relative clearfix full-width">
        <!-- Menu & Slide -->
        <div class="clearfix container-web relative">
            <div class=" container relative">
                <div class="row">
                    <div class=" relative menu-slide col-lg-12 clear-padding bottom-margin-15-default">
                        <!-- Menu -->
                        <div class=" menu-web relative menu-bg-white border no-border-t">
                            <ul>
                                <?php
                                $query = "SELECT * FROM parent_cat ORDER by id ASC limit 13";
                                $result = mysqli_query($con, $query);
                                while($row=mysqli_fetch_array($result)) {
                                ?>
                                <li><a href="search_category.php?cat=<?php echo $row['id'] ?>"><img src="img/vitamins.png" alt="<?php echo $row['name'] ?>" style="width: 20px;height: 20px;"> <p><?php  echo $row['name']?></p></a></li>
                               <?php } ?>
                                <li style="background: red;"><a href="shop.php"  style="text-align: center;color: white;left: 10px;margin-left: -20px;"> <p>   View All</p></a></li>

                            </ul>
                        </div>
                        <!-- Slide -->
                        <div class="clearfix slide-box-home slide-v3 relative top-margin-15-default left-margin-15-default">
                            <div class="clearfix slide-home owl-carousel owl-theme">
                                <?php
                                $query = "SELECT * FROM slides ORDER by id DESC limit 3";
                                $result = mysqli_query($con, $query);
                                while($row=mysqli_fetch_array($result)) {
                                ?>
                                <div class="item"><a href="shop.php"><img src="img/slides/<?php echo $row['image'] ?>" alt="Farzana Pansari" style="width: 685px;height: 385px;"></a></div>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="category-image top-margin-15-default left-margin-15-default float-left border">
                            <div class="owl-carousel owl-theme">
                                <?php
                                $query = "SELECT * FROM parent_cat ORDER by name";
                                $result = mysqli_query($con, $query);
                                while($row=mysqli_fetch_array($result)) {
                                ?>
                                <div class=" category-image-slide relative full-width">
                                    <div class="clearfix effect-hover-zoom overfollow-hidden img-categorys-slide center-vertical-image relative">
                                        <img class="animate-default" src="img/category/<?php echo $row['pic'] ?>" alt="<?php echo $row['name'] ?>" style="width: 120px;height: 120px;">
                                        <a href="search_category.php?cat=<?php echo $row['id'] ?>"></a>
                                    </div>
                                    <a href="search_category.php?cat=<?php echo $row['id'] ?>">
                                        <p class="uppercase bold"><?php echo $row['name'] ?>/<?php echo $row['urduname'] ?></p>

                                    </a>
                                </div>

                                <?php } ?>

                                <?php
                                $query = "SELECT * FROM categories ORDER by name";
                                $result = mysqli_query($con, $query);
                                while($row=mysqli_fetch_array($result)) {
                                    ?>
                                    <div class=" category-image-slide relative full-width">
                                        <div class="clearfix effect-hover-zoom overfollow-hidden img-categorys-slide center-vertical-image relative">
                                            <img class="animate-default" src="img/category/<?php echo $row['pic'] ?>" alt="<?php echo $row['name'] ?>" style="width: 120px;height: 120px;">
                                            <a href="search_category.php?cat=<?php echo $row['id'] ?>"></a>
                                        </div>
                                        <a href="search_category.php?cat=<?php echo $row['id'] ?>">
                                            <p class="uppercase bold"><?php echo $row['name'] ?>/ <?php echo $row['urduname'] ?></p>
                                        </a>
                                    </div>

                                <?php } ?>


                            </div>
                        </div>
                        <?php
                        $profrquery = "SELECT * FROM product ORDER BY RAND() LIMIT 1";
                        $profrqueryresult = mysqli_query($con, $profrquery);
                        $profrqueryresultrow=mysqli_fetch_array($profrqueryresult);
                        $profrquery2 = "SELECT * FROM product ORDER BY RAND() LIMIT 1";
                        $profrqueryresult2 = mysqli_query($con, $profrquery2);
                        $profrqueryresultrow2=mysqli_fetch_array($profrqueryresult2);

                        ?>
                        <div class="clearfix box-banner-small-v3 top-margin-15-default left-margin-15-default box-banner-small">
                            <div class="effect-layla banner-v3-home center-vertical-image zoom-image-hover relative bottom-margin-15-default">
                                <img src="img/product/<?php echo $profrqueryresultrow['image'] ?>" alt="" style="width: 185px;height: 280px">
                                <a href="product_detail.php?id=<?php echo $profrqueryresultrow['id'] ?>"></a>
                            </div>
                            <div class="effect-layla banner-v3-home center-vertical-image zoom-image-hover relative">
                                <img src="img/product/<?php echo $profrqueryresultrow2['image'] ?>" alt=""  style="width: 185px;height: 280px">
                                <a href="product_detail.php?id=<?php echo $profrqueryresultrow['id'] ?>"></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Menu & Slide -->
                </div>
            </div>
        </div>
        <!-- Box Banner Percent 3 -->
        <div class=" banner-percent-3 container-web">
            <div class=" container">
                <div class="row">
                    <div class="banner-pecent-3-top bottom-margin-15-default display-table">
                        <?php
                        $queryupperbanner1 = "SELECT * FROM `banners` WHERE name = 'upperbanner'  ORDER by id DESC limit 1";
                        $resultupperbanner1 = mysqli_query($con,$queryupperbanner1);
                        $upperbanner1 =mysqli_fetch_array($resultupperbanner1);
                        $queryupperbanner2 = "SELECT * FROM `banners` WHERE name = 'upperbanner'  ORDER by id DESC limit 1,1";
                        $resultupperbanner2 = mysqli_query($con,$queryupperbanner2);
                        $upperbanner2 =mysqli_fetch_array($resultupperbanner2);
                        $queryupperbanner3 = "SELECT * FROM `banners` WHERE name = 'upperbanner'  ORDER by id DESC limit 2,1";
                        $resultupperbanner3 = mysqli_query($con,$queryupperbanner3);
                        $upperbanner3 =mysqli_fetch_array($resultupperbanner3);



                        ?>
                        <div class="effect-bubba zoom-image-hover overfollow-hidden float-left relative right-margin-15-default ">
                            <img src="img/banners/<?php echo $upperbanner1['image'] ?>" class="" alt="Banner Percent" style="width: 380px;height: 280px;">
                            <a href="#"></a>
                        </div>
                        <div class="effect-bubba zoom-image-hover overfollow-hidden float-left relative">
                            <img src="img/banners/<?php echo $upperbanner2['image'] ?>" class="" alt="Banner Percent"  style="width: 380px;height: 280px;">
                            <a href="#"></a>
                        </div>
                        <div class="effect-bubba zoom-image-hover overfollow-hidden float-left relative left-margin-15-default">
                            <img src="img/banners/<?php echo $upperbanner3['image'] ?>" class="" alt="Banner Percent"  style="width: 380px;height: 280px;">
                            <a href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Percent 3 -->
        <!-- List Logo Top -->

        <!-- End List Logo Top -->
        <!-- Product Box -->
        <div class="top-margin-default container-web">
            <div class=" container">
                <div class="row">
                    <div class="clearfix title-box title-box-v3 full-width">
                        <div class="clearfix name-title-box title-category title-green-bd relative">
                            <img src="img/icon_food_color.png" alt="Icon Food" class="absolute">
                            <p class="text-default-color">Latest Products</p>
                        </div>
                        <div class="clearfix menu-title-box capitalize">
                            <ul>
                                <li><a href="shop.php"class="btn btn-success" style="color: white" >View All</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class=" bottom-margin-default full-width">
                        <?php

                        $latestproquery = "SELECT * FROM `banners` WHERE name = 'latespro'  ORDER by id DESC limit 1";
                        $resultlatestproquery = mysqli_query($con,$latestproquery);
                        $latespro =mysqli_fetch_array($resultlatestproquery);

                        ?>
                        <!-- Banner Home V3 -->
                        <div class="effect-bubba zoom-image-hover overfollow-hidden banner-category banner-category-v3 float-left relative border no-border-t no-border-l no-border-r">
                            <img src="img/banners/<?php echo $latespro['image'] ?>" alt="Banner Home V3" style="width: 293px;height: 585px;">
                            <a href="#"></a>
                        </div>
                        <!-- List Product V3 -->
                        <div class="clearfix box-content-product-home-v3 float-left relative">
                            <div class="box-food-content relative animate-default active-box-category hidden-content-box border-collapsed-box" id="confectionery">
                                <?php
                                $query = "SELECT * FROM product ORDER by id DESC limit 6";
                                $result = mysqli_query($con, $query);
                                while($row=mysqli_fetch_array($result)) {
                                ?>

                                <div class="clearfix border-collapsed-element relative product-no-ranking percent-content-3">
                                    <div class="effect-hover-zoom center-vertical-image">
                                        <img src="img/product/<?php echo $row['image'] ?>" alt="<?php ?>" style="width: 270px;height: 270px;">
                                        <a href="product_detail.php?id=<?php echo $row['id'] ?>"></a>
                                    </div>
                                    <div class="clearfix absolute name-product-no-ranking">


                                    </div>
                                </div>

                                <?php } ?>

                            </div>


                        </div>
                        <!-- List Logo V3 -->
                        <div class=" clear-padding list-logo-category-v2 list-logo-category full-width border no-border-t">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Box -->
        <!-- Banner Full With -->

        <!-- End Banner Full With -->
        <!-- Product Box -->


        <div class="clearfix box-product full-width top-padding-default bg-gray">
            <div class="clearfix container-web">
                <div class=" container">
                    <div class="row">
                        <!-- Title Product -->
                        <div class="clearfix title-box full-width bottom-margin-default border bg-white">
                            <div class="clearfix name-title-box title-hot-bg relative">
                                <img src="img/icon_percent.png" class="absolute" alt="Icon Hot Deals" />
                                <p>Top Products</p>
                            </div>
                            <div class="clearfix menu-title-box bold uppercase">

                            </div>
                        </div>
                    </div>
                    <div class="clearfix content-product-box bottom-margin-default full-width">
                        <div class="row">
                            <div class="relative">
                                <div class="good-deal-product animate-default active-box-category hidden-content-box" id="mobile-tablet">
                                    <!-- Product Son -->
                                    <div class="owl-carousel owl-theme">
                                        <?php
                                        $query = "SELECT * FROM product";
                                        $result = mysqli_query($con, $query);
                                        while($row=mysqli_fetch_array($result)) {
                                        ?>

                                        <div class=" product-son ">
                                            <div class="clearfix image-product relative animate-default">
                                                <div class="center-vertical-image">
                                                    <img src="img/product/<?php echo $row['image'] ?>" alt="<?Php echo $row['name'] ?>" style="width: 270px;height: 270px;">
                                                </div>
                                                <ul class="option-product animate-default">
                                                    <li class="relative"><a href="product_detail.php?id=<?php echo $row['id'] ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                                    <li class="relative"><a href="product_detail.php?id=<?php echo $row['id'] ?>"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i>Details</a></li>

                                                    <li class="relative"><a href="product_detail.php?id=<?php echo $row['id'] ?>" ><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix ranking">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </div>
                                            <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="product_detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?>  <?php echo $row['urduname'] ?></a></p>
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

                                        </div>

                                        <?php } ?>

                                        <!-- End Product Son -->
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Product Box -->
        <!-- Banner Full With -->

        <!-- End Banner Full With -->
        <!-- Product Box -->

        <!-- End Product Box -->
        <!-- Banner Half Website -->
        <div class=" relative banner-half-web full-width bottom-margin-default">
            <div class="clearfix container-web">
                <div class=" container">
                    <div class="row">

                        <?php
                        $lowerbanquery1 = "SELECT * FROM `banners` WHERE name = 'lowerban'  ORDER by id DESC limit 1";
                        $resultlowerban1 = mysqli_query($con,$lowerbanquery1);
                        $lowerban1 =mysqli_fetch_array($resultlowerban1);
                        $lowerbanquery2 = "SELECT * FROM `banners` WHERE name = 'lowerban'  ORDER by id DESC limit 1,1";
                        $resultlowerban2 = mysqli_query($con,$lowerbanquery2);
                        $lowerban2 =mysqli_fetch_array($resultlowerban2);



                        ?>
                        <div class="clearfix content-left col-md-6 col-sm-6 col-xs-12 zoom-image-hover overfollow-hidden">
                            <div class="overfollow-hidden effect-oscar relative">
                                <img class="max-width" src="img/banners/<?php echo $lowerban1['image'] ?>" alt="Banner . . ." style="width:570px;height: 400px">
                                <a href="#"></a>
                            </div>
                        </div>
                        <div class="clearfix content-right col-md-6 col-sm-6 col-xs-12 zoom-image-hover overfollow-hidden">
                            <div class="overfollow-hidden effect-oscar relative">
                                <img class="max-width" src="img/banners/<?php echo $lowerban2['image'] ?>" alt="Banner . . ." style="width:570px;height: 400px">
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Category Percent 2 -->
        <div class=" full-width category-percent-two bottom-margin-default">
            <div class="clearfix container-web">
                <div class=" container">
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM parent_cat ORDER by id DESC LIMIT 4";
                        $result = mysqli_query($con, $query);
                        while($row=mysqli_fetch_array($result)) {
                        ?>

                        <div class=" clearfix content-left col-md-6 col-sm-6">
                            <!-- Title Product -->
                            <div class="clearfix title-box full-width border">
                                <div class="clearfix name-title-box title-category title-gold-bg relative">
                                    <img src="img/icon_fashion.png" alt="Icon Fashion" class="absolute" />
                                    <p><?php echo $row['name'] ?></p>
                                </div>
                                <div class="clearfix menu-title-box">
                                    <p class="view-all-product-category title-hover-red"><a href="shop.php" class="animate-default">view all</a></p>
                                </div>
                            </div>
                            <div class=" banner-percent-product zoom-image-hover overfollow-hidden effect-oscar relative">
                                <img src="img/category/<?php echo $row['pic'] ?>" class="max-width" alt="<?php echo $row['name'] ?>" style="width: 570px;height: 150px;">
                                <a href="product_detail.php?id=<?php echo $row['id'] ?>"></a>
                            </div>
                            <!-- Content Product Box -->
                            <div class="clearfix product-percent-content border-collapsed-box full-width">
                                <?php
                                $pid = $row['id'];
                                $query2 = "SELECT * FROM product WHERE parent_category = '$pid' ORDER by id DESC LIMIT 6";
                                $result2 = mysqli_query($con, $query2);
                                while($row2=mysqli_fetch_array($result2)) {
                                ?>
                                <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3"  style="height: 311px;">
                                    <div class="effect-hover-zoom center-vertical-image">
                                        <img src="img/product/<?php echo $row2['image'] ?>" alt="<?php echo $row2['name'] ?>" style="width: 380px;height: 300px;">
                                        <a href="product_detail.php?id=<?php echo $row['id'] ?>"></a>
                                    </div>

                                </div>

                                <?php } ?>

                            </div>
                        </div>

                        <?php } ?>


                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Category Percent 2 -->
        <!-- Product Category Percent 2 -->

        <!-- End Product Category Percent 2 -->
        <!-- Banner Full With -->
        <div class=" relative full-width bottom-margin-default">
            <div class="clearfix container-web">
                <div class=" container banner_full_width">
                    <div class="row overfollow-hidden banners-effect5 relative">
                        <?php

                        $query = "SELECT * FROM `banners` WHERE name = 'footer'  ORDER by id DESC  limit 1";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) {


                        ?>
                        <img src="img/banners/<?php echo $row['image'] ?>" alt="Banner Full Width . . ." style="width: 1170px;height: 270px;">

                        <?php } ?>
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Full With -->
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
<script src="js/owl.carousel.min.js" defer=""></script>
<script src="js/scripts.js" defer=""></script>
</body>

</html>