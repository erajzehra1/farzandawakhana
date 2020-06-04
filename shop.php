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
                    <div class="col-md-12 relative clear-padding">
                        <div class="col-sm-12 col-xs-12 relative overfollow-hidden clear-padding button-show-sidebar">
                            <p onclick="showSideBar()"><span class="ti-filter"></span> Sidebar</p>
                        </div>
                        <div class="banner-top-category-page bottom-margin-default effect-bubba zoom-image-hover overfollow-hidden relative full-width">
                            <img src="img/slides/mob_banner.jpg" alt="" style="width: 1170px;height: 385px;">
                            <a href="#"></a>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <!-- Sider Bar -->
                    <div class="col-md-3 relative right-padding-default clear-padding" id="slide-bar-category">

                        <div class="col-sm-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
                            <p class="title-siderbar bold">Categories</p>
                            <ul class="check-box-custom clear-margin clear-margin">
                                <?php
                                $query = "SELECT * FROM parent_cat ORDER by name ASC ";
                                $result = mysqli_query($con, $query);
                                while($row=mysqli_fetch_array($result)) {
                                ?>

                                <li>
                                    <label><?php echo $row['name'] ?>
                                        <input type="checkbox"  id="<?php echo $row[0]; ?>" value="<?php echo $row[0]; ?>" class="filter-item common_selector pacategory">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>

                                <?php } ?>

                            </ul>
                        </div>
                        <div class="col-sm-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
                            <p class="title-siderbar bold">Sub Categories</p>
                            <ul class="check-box-custom clear-margin clear-margin">
                                <?php
                                $query = "SELECT * FROM categories ORDER by  name ASC ";
                                $result = mysqli_query($con, $query);
                                while($row=mysqli_fetch_array($result)) {
                                    ?>

                                    <li>
                                        <label><?php echo $row['name'] ?>
                                            <input type="checkbox" id="<?php echo $row[0]; ?>" value="<?php echo $row[0]; ?>" class="filter-item common_selector category">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>

                                <?php } ?>

                            </ul>
                        </div>

                        <div class="bottom-margin-default banner-siderbar col-md-12 col-sm-12 col-xs-12 clear-padding clearfix">
                            <div class="overfollow-hidden banners-effect5 relative center-vertical-image">

                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Sider Bar Box -->
                    <!-- Content Category -->
                    <div class="col-md-9 relative clear-padding">
                        <!-- Product Content Category -->
                        <div class="relative clearfix shop_wrapper">
                           
                          
                            
                      
                        <!-- End Product Content Category -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sider Bar -->
    </div>
    <!-- End Content Box -->
   
    <!-- End Content Box -->
    <!-- Footer Box -->
  <?php

  include_once 'footer.php';

  ?>
 
</div>
<!-- End Footer Box -->

<script src="js/jquery-3.3.1.min.js" defer=""></script>
<script src="js/bootstrap.min.js" defer=""></script>
<script src="js/multirange.js" defer=""></script>
<script src="js/owl.carousel.min.js" defer=""></script>
<script src="js/sync_owl_carousel.js" defer=""></script>
<script src="js/scripts.js" defer=""></script>

<script src="add_to_cart.js" defer=""></script>
<script>
    $(document).ready(function(){


        $("#head-form").on('submit', function(e){
            e.preventDefault();
            e.stopPropagation();

            filter_data();

            return false;
        });

        filter_data();

        function filter_data(page,search,minprice,maxprice)
        {
            var action = 'fetch_data';

            var pacategory = get_filter('pacategory');
            var category = get_filter('category');

            $.ajax({
                url:"shop_action.php",
                method:"POST",
                data:{action:action, category:category,pacategory:pacategory},
                success:function(data){
                    $('.shop_wrapper').html(data);
                }
            });
        }

        function get_filter(class_name)
        {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }


        $('.common_selector').click(function(){
            filter_data();
        });

        $(document).on('click', '.pagination_link', function(){
            $('html,body').animate({
                scrollTop: 0
            }, 900);
            $(this).addClass("page_active");
            var page = $(this).attr("id");
            filter_data(page,"");
        });

        $(document).on('input', '.search_input', function(){

            var search = $(".search_input").val();
            filter_data(1,search);
        });





    });




</script>
</body>
</html>