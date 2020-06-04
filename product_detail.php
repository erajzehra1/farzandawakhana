<?php

include_once 'header.php';
$id = $_GET['id'];
$query = "SELECT * from product p inner join parent_cat pcat on p.parent_category=pcat.id WHERE p.id = '$id'";
$result = mysqli_query($con, $query);
$row=mysqli_fetch_array($result);

?>
<link rel="stylesheet" type="text/css" href="css/multirange.css">
<link rel="stylesheet" type="text/css" href="css/slick.css">
<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/product.css">
<link rel="stylesheet" type="text/css" href="css/category.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<style>
    .checkmark {

        background-image: linear-gradient(to bottom right, #ca0029, #990913) !important;

    }
    .product-code p:nth-of-type(1):before {
        width: 1px;
        height: 13px;
        background: #ffffff;
        content: "";
        position: absolute;
        top: 2px;
        right: 0;
    }
    .button-product-list ul li a {
    background: #ff0000!important;
    color: #fff!important;
   
    width: 140px;
    
}
</style>
    <!-- End Header Box -->
    <!-- Content Box -->
    <div class="relative full-width">
        <!-- Breadcrumb -->
        <div class="container-web relative">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb-web">
                        <ul class="clear-margin">
                            <li class="animate-default title-hover-red"><a href="index.php">Home</a></li>
                            <li class="animate-default title-hover-red"><a href="shop.php">All Products</a></li>
                            <li class="animate-default title-hover-red"><a href="#"> <?php echo $row['name'] ?>  <?php echo $row['urduname'] ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->
        <!-- Content Category -->
        <div class="relative container-web">
            <div class="container">
                <div class="row ">
                    <!-- Content Category -->
                    <div class="col-md-9 relative clear-padding">
                        <div class="col-sm-12 col-xs-12 col-md-1 relative overfollow-hidden clear-padding button-show-sidebar clearfix">
                            <p onclick="showSideBar()"><span class="ti-filter"></span> Sidebar</p>
                        </div>
                        <!-- Product Content Detail -->
                        <div class="top-product-detail relative ">
                            <div class="row">
                                <!-- Slide Product Detail -->
                                <br><br>
                                <div class="col-md-7 relative col-sm-12 col-xs-12">
                                    <div id="owl-big-slide" class="relative sync-owl-big-image">
                                        <div class="item center-vertical-image">
                                            <img src="img/product/<?php echo $row[7] ?>" alt="<?php echo $row[1] ?>" style="width: 400px;height: 400px;">
                                        </div>

                                    </div>

                                </div>
                                <!-- Info Top Product -->
                                <div class="col-md-5 col-sm-12 col-xs-12">
                                    <div class="name-ranking-product relative bottom-padding-15-default bottom-margin-15-default border no-border-r no-border-t no-border-l">
                                        <h1 class="name-product"><?php echo $row[1] ?> <?php echo $row[2] ?></h1>
                                        <div class=" ranking-color ">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </div>
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
                                        <div class="product-code clearfix full-width">

                                            <p class="float-left clear-margin">Availability:
                                              <?php

                                              if ($row['stock'] != '' OR $row['stock'] != '0'  OR $row['stock'] != 0)
                                              {
                                              ?>
                                                <span class="text-green">In stock</span>

                                                <?php } else { ?>

                                                <span class="text-red">Out Of stock</span>

                                                <?php } ?>

                                            </p>

                                        </div>
                                    </div>
                                    <div class="relative intro-product-detail bottom-margin-15-default bottom-padding-15-default border no-border-r no-border-t no-border-l">

                                    </div>
                                    <?php


                                    $cquery = "SELECT * FROM variableproducts WHERE product_id = '$id' order by attribute asc";
                                    $cresult = mysqli_query($con, $cquery);
                                    $check=mysqli_fetch_array($cresult);
                                   
                                    if ($row[0] == $check['product_id']){


                                    ?>
                                    
                                    <div class="relative option-product-detail bottom-padding-15-default border no-border-r no-border-t no-border-l">

                                        <p class="bold clear-margin bottom-margin-15-default">Available Options:</p>

                                        <div class="relative option-product-1 bottom-margin-15-default">



                                            <ul class="check-box-custom list-color clearfix clear-margin">
                                                <?php
                                                $querys = "SELECT * FROM variableproducts WHERE product_id = '$id' order by attribute asc";
                                                $results = mysqli_query($con, $querys);
                                                while($rows=mysqli_fetch_array($results)) {
                                                ?>
                                                <li style="margin-right: 30px;">
                                                    <label>
                                                        <input type="radio" name="variation" class="variation" productid="<?php echo $rows['product_id'] ?>"  variationid="<?php echo $rows['id'] ?>" >
                                                        <span class="checkmark state" name="variations"  style="color: white   ;width: 50px;text-align: center; padding-top: 7px;height: 33px;border-radius: 5px;"><?php echo $rows['attribute'] ?></span>
                                                    </label>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                            <hr>


                                            <ul class="check-box-custom list-color clearfix clear-margin" id="totalprice">

                                            </ul>

                                        </div>
                                        <br>
                                        <div class="relative option-product-2 clearfix">
                                            <div class="option-product-son float-left right-margin-default">
                                                <p class="float-left">Qty:</p>
                                                <input type="number" id="quantityinput" class="left-margin-15-default" min="01" step="1" max="<?php echo $row['stock'];?>" value="1" name="num">
                                            </div>

                                        </div>
                                    </div>
                                    <?php } ?>
                                   
                                    <div class="relative button-product-list clearfix full-width clear-margin">

                                        <input type="hidden" class="cartprice" name="totalprice" value="<?php echo $totalprice ?>">
                                        <input type="hidden" id="cartatt" name="cartatt" value="">

                                        <ul class="clear-margin top-margin-default clearfix bottom-margin-default">
                                                    <?php
                                                     if(isset($_SESSION['shoping_cart'])){
                                                        for($i=0;$i<sizeof($_SESSION['shoping_cart']);$i++){
                                                           if( $_SESSION['shoping_cart'][$i]['product_id']==$row[0]){
                                                               
                                                    echo '<input type="hidden" value="'.$_SESSION['shoping_cart'][$i]['product_quantity'].'" id="cartquantity'.$row[0].'"> ';
                                                           }
                                                        }
                                                    }
                                                    ?>
                                        <input type="hidden" name="image" id="image<?php echo $row[0]?>" class="form-control" value="<?php echo $row[7]?>" />
                                            <input type="hidden" name="quantity" id="quantity<?php echo  $row[0] ?>" class="quantitynumber"  value="1" />
                                            <input type="hidden" name="hidden_name" id="name<?php echo  $row[0] ?>" value="<?php echo  $row[1] ?>" />
                                            <input type="hidden" class="cartprice" name="hidden_price" id="price<?php echo  $row[0] ?>" value="<?php echo  $totalprice ?>" />
                                            <input type="hidden" name="state" id="state<?php echo  $row[0] ?>" class="stateinput" />
                                            <input type="hidden" name="size" id="size<?php echo  $row[0] ?>" class="sizeinput" />
                                           
                                            <input type="hidden" name="hidden_sellprice" id="sellprice<?php echo  $row[0] ?>" value="<?php echo  $row[10] ?>" />
                                            
                                            <input type="hidden" name="hidden_parentcategory" id="parentcategory<?php echo  $row[0] ?>" value="<?php echo  $row[12] ?>" />

                                            <input type="hidden" name="hidden_stock" id="stock<?php echo  $row[0] ?>" value="<?php echo  $row['stock'] ?>" />
                                            <li class="button-hover-red"><a href="javascript:void(0);" id="<?php echo  $row[0]?>" class="add_to_cart_btn animate-default">Add to Cart</a></li>
                                         </ul>
                                        <div class="btn-print clearfix">
                                       
                                        <div class="alert alert-success" id="cartalert">

Product has Been Added to Cart

</div>
<div class="alert alert-danger" id="stockalert">
Error While Adding Product
</div> <br><hr>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-product-detail bottom-margin-default relative">
                            <div class="row">
                                <div class="col-md-12 relative overfollow-hidden">
                                    <ul class="title-tabs clearfix relative">
                                        <li onclick="changeTabsProductDetail(1)" class="title-tabs-product-detail title-tabs-1 border no-border-b active-title-tabs bold uppercase">Product Details</li>

                                       </ul>
                                    <div class="content-tabs-product-detail relative content-tab-1 border active-tabs-product-detail bottom-padding-default top-padding-default left-padding-default right-padding-default">
                                         <?php echo $row['description'] ?>
                                    </div>

                                          </div>
                            </div>
                        </div>
                        <div class="slide-product-bottom relative">

                        </div>
                        <!-- End Product Content Category -->
                    </div>
                    <!-- Sider Bar -->
                    <div class="col-md-3 relative left-padding-default clear-padding" id="slide-bar-category">
                        <div class="col-md-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
                            <p class="title-siderbar bold">CATEGORIES</p>
                            <ul class="clear-margin list-siderbar">
                                <?php
                                $query = "SELECT * FROM parent_cat ORDER by id limit 6";
                                $result = mysqli_query($con, $query);
                                while($row=mysqli_fetch_array($result)) {
                                ?>
                                <li><a href="search_category.php?cat=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></li>
                                <?php } ?>
                                <?php
                                $query = "SELECT * FROM categories ORDER by id limit 4";
                                $result = mysqli_query($con, $query);
                                while($row=mysqli_fetch_array($result)) {
                                    ?>
                                    <li><a href="search_category.php?cat=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></li>

                                <?php } ?>

                            </ul>
                        </div>
                        <!-- Element Best Sellers -->
                        <div class="col-sm-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
                            <p class="title-siderbar bold bottom-margin-15-default">Related Products</p>
                            <?php
                            $query = "SELECT * FROM product ORDER BY RAND() LIMIT 3;";
                            $result = mysqli_query($con, $query);
                            while($row=mysqli_fetch_array($result)) {
                            ?>
                            <div class="clearfix relative best-sellers-product">
                                <div class="image-product-sellers-sidebar float-left">
                                    <a href="product_detail.php?id=<?php echo $row['id'] ?>"><img src="img/product/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>" style="width: 270px;height: 270px;"></a>
                                </div>
                                <div class="info-product-sellers-sidebar float-left">
                                    <p class="title-product-sellers-sidebar title-hover-black"><a class="animate-default" href="product_detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></p>
                                    <div class="clearfix ranking-product-sidebar ranking-color">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-half" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </div>
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
                            </div>
                            <?php }  ?>

                        </div>
                        <!-- End Element Best Sale -->

                    </div>
                    <!-- End Sider Bar Box -->
                </div>
            </div>
        </div>
        <!-- End Sider Bar -->
        <!-- Support -->
      
    </div>
    <!-- End Content Box -->
    <!-- Footer Box -->

  <?php

  include_once 'footer.php';

  ?>
</div>

<script src="add_to_cart.js" defer=""></script>
<script>

    $(document ).ready(function(){

        $("#stockalert").hide();
        $("#cartalert").hide();
        $(document).on('change', '.variation2', function(){





            var productid;
            var variationid;
            var entityname;
            var price;
            var attributid;
            productid = $(this).attr('productid');
            variationid = $(this).attr('variationid');
            entityname = $(this).attr('entityname');
            price = $(this).attr('price');
            attributid = $(this).attr('attributid');

            $.ajax( {
                type: "POST",
                url: "attribute_prices.php",
                data:{productid:productid,variationid:variationid,price:price,entityname:entityname,attributid:attributid},
                success:function(data){
                    //var myJSON = JSON.stringify(data);



                    $('#newprice').html(data.price2);
                    $('.cartprice').val(data.price);
                    $('#cartatt').val(data.attributid);


                }
            });

        }); });
</script>
<script>

    $(document ).ready(function(){
       
        $("#quantityinput").on('change',function(){
            $(".quantitynumber").val($(this).val());
        });

        $(".state").on('click',function(){
          
            $(".stateinput").val($(this).text());
        });

     
        $(".variation").on('change', function(e){



            var productid;
            var variationid;

            productid = $(this).attr('productid');
            variationid = $(this).attr('variationid');


            $.ajax( {
                type: "POST",
                url: "varation_products.php",
                data:{productid:productid,variationid:variationid},
                success: function(response) {

                    $('#totalprice').html(response);


                }
            });

        }); });
</script>


<script src="js/scripts.js" defer=""></script>
<!-- End Footer Box -->
<script src="js/jquery-3.3.1.min.js" defer=""></script>

<script src="js/bootstrap.min.js" defer=""></script>
<script src="js/multirange.js" defer=""></script>
<script src="js/slick.min.js" defer=""></script>
<script src="js/owl.carousel.min.js" defer=""></script>


</body>
</html>