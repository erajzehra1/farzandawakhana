<?php

include_once 'inlcudes/dbconnect.php';
session_start();
if(!isset($_SESSION["admin"]))
{
    header("location:login.php");
}
?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/jpeg" sizes="16x16" href="../../../img/WhatsApp Image 2019-12-25 at 10.47.23 AM.jpeg">
    <title>Farzana Dawakhana -Admin</title>
    <link href="../../assets/libs/footable/css/footable.core.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                    <i class="ti-menu ti-close"></i>
                </a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="dashboard.php">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                       <img src="../../../img/WhatsApp Image 2019-12-25 at 10.47.23 AM.jpeg" alt="homepage" class="dark-logo" />

                       <img src="../../../img/WhatsApp Image 2019-12-25 at 10.47.23 AM.jpeg" alt="homepage" class="light-logo" style="width: 50px;height: 50px;">
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                        <span class="logo-text">
                         <h4 style="color: white;font-weight: bold;margin-top: 10px;">Admin-Panel</h4>
                        </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti-more"></i>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="sl-icon-menu font-20"></i>
                        </a>
                    </li>
                    <!-- ============================================================== -->
                    <!-- mega menu -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End mega menu -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->


                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                            <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                <div class="">
                                    <img src="../../assets/images/users/1.jpg" alt="user" class="img-circle" width="60">
                                </div>
                                <div class="m-l-10">
                                    <h4 class="m-b-0"><?php echo $_SESSION['admin']['username'] ?></h4>
                                    <p class=" m-b-0"><?php echo $_SESSION['admin']['name'] ?></p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="logout.php">
                                <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            <div class="dropdown-divider"></div>

                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- User Profile-->

                    <!-- User Profile-->




                    <li class="sidebar-item">
                        <a href="dashboard.php" class="sidebar-link">
                            <i class="icon-Record"></i>
                            <span class="hide-menu"> Dashboard  </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="alluser.php" class="sidebar-link">
                            <i class="icon-Record"></i>
                            <span class="hide-menu"> Users </span>
                        </a>
                    </li>

                    
                     <li class="sidebar-item" style="display:none">
                        <a href="alluser.php" class="sidebar-link">
                            <i class="icon-Record"></i>
                            <span class="hide-menu"> Users </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark active" href="javascript:void(0)" aria-expanded="false">
                            <i class="icon-Add-User"></i>
                            <span class="hide-menu">Categorires</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level in">
                            <li class="sidebar-item">
                                <a href="parent_cat.php" class="sidebar-link">
                                    <i class="mdi mdi-account-box"></i>
                                    <span class="hide-menu"> Parent Category </span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="category.php" class="sidebar-link">
                                    <i class="mdi mdi-account-network"></i>
                                    <span class="hide-menu">Child Category</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    

                    <li class="sidebar-item">
                        <a href="orderlist.php" class="sidebar-link">
                            <i class="icon-Record"></i>
                            <span class="hide-menu">  Orders </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="shipping.php" class="sidebar-link">
                            <i class="icon-Record"></i>
                            <span class="hide-menu">  Shipping </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="product.php" class="sidebar-link">
                            <i class="icon-Record"></i>
                            <span class="hide-menu"> Products  </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="Slider.php" class="sidebar-link">
                            <i class="icon-Record"></i>
                            <span class="hide-menu"> Slider  </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="about.php" class="sidebar-link">
                            <i class="icon-Record"></i>
                            <span class="hide-menu"> About  </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="contact.php" class="sidebar-link">
                            <i class="icon-Record"></i>
                            <span class="hide-menu"> Company  </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="banners.php" class="sidebar-link">
                            <i class="icon-Record"></i>
                            <span class="hide-menu"> Banners  </span>
                        </a>
                    </li>
                        <li class="sidebar-item">
                            <a href="admin.php" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> admin  </span>
                            </a>
                        </li>
                    

                    

                    
              

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->