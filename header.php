<?php
ob_start();
include_once 'admin/html/admin/inlcudes/dbconnect.php';
session_start();

$querycontact = "SELECT * FROM `company` WHERE id = '1'";
$resultcontact = mysqli_query($con,$querycontact);
$rowcontact = mysqli_fetch_array($resultcontact);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Farzana Dawakhana</title>
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="img/WhatsApp Image 2019-12-25 at 10.47.23 AM.jpeg" type="image/jpeg" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:100,300,400,500,700,900%7CRoboto+Condensed:100,300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/icon-font-linea.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/effect.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/headerresponsive.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
<!-- push menu-->
<div class="pushmenu menu-home5">
    <div class="menu-push">
        <span class="close-left js-close"><i class="fa fa-times f-20"></i></span>
        <div class="clearfix"></div>
        <form role="search" method="get" id="searchform" class="searchform" action="/search">
            <div>
                <img src="img/<?php echo $rowcontact['logo']  ?>" alt="" style="width: 120px;height: 100px;">
            </div>
        </form>
        <ul class="nav-home5 js-menubar">
            <li class="level1 active dropdown">
                <a href="index.php">Home</a>


            </li>
            <li class="level1 active dropdown"><a href="about.php">About Us</a>


            </li>
            <li class="level1 active dropdown"><a href="shop.php">Shop</a>


            </li>
            <li class="level1 active dropdown"><a href="contact.php">Contact Us</a>


            </li>

        </ul>
    </div>
</div>
<!-- end push menu-->
<!-- Menu Mobile -->
<div class="menu-mobile-left-content menu-bg-white">
    <ul>
        <?php
        $query = "SELECT * FROM parent_cat ORDER by name limit 13";
        $result = mysqli_query($con, $query);
        while($row=mysqli_fetch_array($result)) {
        ?>
        <li><a href="search_category.php?cat=<?php echo $row['id'] ?>"><img src="img/vitamins.png" alt="<?php echo $row['name'] ?>" style="width: 20px;height: 20px;"> <p><?php echo $row['name'] ?></p></a></li>

        <?php } ?>

    </ul>
</div>
<!-- Header Box -->
<div class="wrappage">
    <header class="relative full-width">
        <div class=" container-web relative">
            <div class=" container">
                <div class="row">
                    <div class=" header-top">
                        <p class="contact_us_header col-md-4 col-xs-12 col-sm-3 clear-margin">
                            <img src="img/call.png" alt="Icon Phone Top Header" style="width: 20px;height: 20px;">Call us <span class="text-red bold"><?php echo $rowcontact['phone'] ?></span>
                            <a href="https://api.whatsapp.com/send?phone=+923363226865" target="_blank" style="color: black">  <img src="img/whatsapp.png" alt="" style="width: 20px;height: 20px;">Whatsapp us <span class="text-red bold"><?php echo $rowcontact['mobile'] ?></span></a>


                        </p>
                        <div class="menu-header-top text-right col-md-8 col-xs-12 col-sm-6 clear-padding">
                            <ul class="clear-margin">

                                <li class="relative">
                                     <a href="#"><img src="img/account.png" alt="" style="width: 20px;height: 20px"> <span style="font-size: 14px;font-weight: bold;font-family: inherit;font-variant: stacked-fractions;padding-top: -2px;">My Account</span></a>

                                    <ul>
                                        <?php
                                        if (isset($_SESSION['user'])){

                                        ?>

                                            <li class="relative"><a href="user.php" ><img src="img/user (1).png" alt=""  style="width: 20px;height: 20px"><span style="font-weight: bold;font-family: sans-serif;"><?php echo $_SESSION['user']['firstname'] ?><?php echo  $_SESSION['user']['lastname'] ?></span></a></li>
                                            <li class="relative"><a href="logout.php" ><img src="img/logout%20(1).png" alt=""  style="width: 20px;height: 20px"><span style="font-weight: bold;font-family: sans-serif;">LogOut</span></a></li>


                                        <?php } else { ?>
                                        <li class="relative"><a href="#" data-toggle="modal" data-target="#exampleModal"><img src="img/user (1).png" alt=""  style="width: 20px;height: 20px"><span style="font-weight: bold;font-family: sans-serif;">Login</span></a></li>
                                        <li class="relative" data-toggle="modal" data-target="#signup"><a href="#"><img src="img/account%20(1).png" alt=""  style="width: 20px;height: 20px"><span style="font-weight: bold;font-family: sans-serif;">SignUp</span></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
<!--     main header -->
                <div class="row">
                    <div class="clearfix header-content full-width relative">
                        <div class="clearfix icon-menu-bar">
                            <i class="data-icon data-icon-arrows icon-arrows-hamburger-2 icon-pushmenu js-push-menu"></i>
                        </div>
                        <div class="clearfix logo">
                            <a href="#"><img src="img/<?php  echo $rowcontact['logo']?>" alt="" style="width: 120px;height: 120px;"></a>
                        </div>
                        <div class="clearfix search-box relative float-left">
                            <form method="GET" action="search_category.php" class="">
                                <div class="clearfix category-box relative">
                                    <select  name="cat">
                                        <option>All Category</option>
                                        <?php

                                        $query2 = "SELECT * FROM parent_cat ORDER by name ASC";
                                        $result2 = mysqli_query($con, $query2);
                                        while($row2=mysqli_fetch_array($result2)) {
                                        ?>
                                        <option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
                                        <?php
                                      $pid = $row2['id'];
                                        $query = "SELECT * FROM categories WHERE parent_id = '$pid' ORDER by name ASC";
                                        $result = mysqli_query($con, $query);
                                        while($row=mysqli_fetch_array($result)) {
                                            ?>
                                            <option  value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php } ?>
                                        <?php } ?>




                                    </select>
                                </div>
                                <input type="text" name="name" placeholder="Enter keyword here . . .">
                                <button type="submit" class="animate-default button-hover-red">Search</button>
                            </form>
                        </div>
                        <div class="clearfix icon-search-mobile absolute">
                            <i onclick="showBoxSearchMobile()" class="data-icon data-icon-basic icon-basic-magnifier"></i>
                        </div>
                        <div class="clearfix cart-website absolute" onclick="showCartBoxDetail()">
                            <img alt="Icon Cart" src="img/icon_cart.png" />
                            <p class="count-total-shopping absolute cart_count"></p>
                        </div>
                        <div class="clearfix cart-website absolute" onclick="showCartBoxDetail()">
                            <img alt="Icon Cart" src="img/icon_cart.png" />
                            <p class="count-total-shopping absolute cart_count"></p>
                        </div>

    <script>
        load_cart_data();
        function load_cart_data()
	    {
            $.ajax({
                url:"fetchcart.php",
                method:"POST",
                dataType:"json",
                success:function(data)
                {
                    $('.cart_holder').html(data.cart_details);
                    $('.cart_price').text(data.total_price);
                    $('.cart_count').text(data.total_item);
                }
            });
	    }
    </script>
                        <div class="cart-detail-header border">
                            <div class="relative cart_holder">
                                <div class="product-cart-son clearfix">
                                    <div class="image-product-cart float-left center-vertical-image ">
                                        <a href="#"><img src="img/product_image_6-min.png" alt="" /></a>
                                    </div>
                                    <div class="info-product-cart float-left">
                                        <p class="title-product title-hover-black"><a class="animate-default" href="#">MH02-Black09</a></p>
                                        <p class="clearfix price-product">$350 <span class="total-product-cart-son">(x1)</span></p>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="relative border no-border-l no-border-r total-cart-header">
                                <p class="bold clear-margin">Subtotal:</p>
                                <p class=" clear-margin bold cart_price"></p>
                            </div>
                            <div class="relative btn-cart-header">
                                <a href="shoping_cart.php" class="uppercase bold animate-default">view cart</a>
                                <?php


                                if(!empty($_SESSION["shoping_cart"]))
                                { ?>

                                    <?php
                                    if (isset($_SESSION['user'])){

                                    ?>

                                <a href="checkout.php" class="uppercase bold button-hover-red animate-default">checkout</a>

                                        <?php } else { ?>

                                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="uppercase bold button-hover-red animate-default">checkout</a>
                                     <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="mask-search absolute clearfix" onclick="hiddenBoxSearchMobile()"></div>
                        <div class="clearfix box-search-mobile">
                        </div>
                    </div>
                </div>
                <!--     upper  header -->
                <div class="row">
                    <a class="menu-vertical hidden-md hidden-lg" onclick="showMenuMobie()">
                        <span class="animate-default"><i class="fa fa-list" aria-hidden="true"></i> all categories</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="menu-header-v3 hidden-ipx">
            <div class="container">
                <div class="row">
                    <!-- Menu Page -->
                    <div class="menu-header full-width">
                        <ul class="clear-margin">
                            <li onclick="showMenuHomeV3()"><a class="animate-default" href="#"><i class="fa fa-list" aria-hidden="true"></i> all categories</a></li>
                            <li class="title-hover-red">
                                <a class="animate-default" href="index.php">home</a>

                            </li>
                            <li class="title-hover-red">
                                <a class="animate-default" href="about.php">About Us</a>

                            </li>

                            <li class="title-hover-red">
                                <a class="animate-default" href="shop.php">shop</a>

                            </li>

                            <li class="title-hover-red">
                                <a class="animate-default" href="contact.php">Contact Us</a>

                            </li>




                        </ul>
                    </div>
                    <!-- End Menu Page -->
                </div>
            </div>
        </div>
        <div class="clearfix menu_more_header menu-web menu-bg-white">
            <ul>
                <?php
                $query = "SELECT * FROM parent_cat ORDER by id limit 10";
                $result = mysqli_query($con, $query);
                while($row=mysqli_fetch_array($result)) {
                ?>
                <li><a href="search_category.php?cat=<?php echo $row['id'] ?>"><img src="img/vitamins.png" alt="<?php echo $row['name'] ?>" style="width: 20px;height: 20px;"> <p><?php echo $row['name'] ?></p></a></li>

                <?php } ?>
            </ul>
        </div>
        <div class="header-ontop">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="clearfix logo">
                            <a href="index.php"><img alt="Logo" src="img/<?php echo $rowcontact['logo'] ?>" style="width: 120px;height: 100px;"></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="menu-header">
                            <ul class="main__menu clear-margin" style="margin: 23px !important;">
                                <li class="title-hover-red">
                                    <a class="animate-default" href="index.php">home</a>

                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="about.php">About Us</a>

                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="shop.php">Shop</a>

                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="contact.php">Contact Us</a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
