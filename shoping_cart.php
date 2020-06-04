<?php include 'header.php';


?>
<style>
    .button{
        background: #eb1a21;
        border: none;
        text-transform: uppercase;
        cursor: pointer;
        color: #fff;
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: bold;
        width: 130px;
        font-size: 18px;
        line-height: 35px;
        letter-spacing: 2px;
        outline: none;
        text-align: center;
        transition: 0.5s ease;
        -o-transition: 0.5s ease;
        -moz-transition: 0.5s ease;
        -webkit-transition: 0.5s ease;
    }
</style>
    <!--breadcrumbs area start-->
    <div class="relative full-width">
        <!-- Breadcrumb -->
        <div class="container-web relative">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb-web">
                        <ul class="clear-margin">
                            <li class="animate-default title-hover-red"><a href="#">Home</a></li>
                            <li class="animate-default title-hover-red"><a href="#">Shopping Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative container-web" style="padding:2% 0">
    <div class="container">
        <?php
        if (isset($_GET['msg'])){

            $msg = $_GET['msg'];

        ?>

        <div class="alert alert-success" role="alert">
            Order Place Successfully! Your Order # is PK<?php  echo $msg ?>
        </div>

        <?php } ?>
                <form method="post" action="#" class="text-right">

                    <?php


                    if(!empty($_SESSION["shoping_cart"]))
                    { ?>

                    <?php
                    if (isset($_SESSION['user'])){

                        ?>




                        <a class="button" style="margin:2% 0;padding:1%" href="checkout.php">Proceed  to  Checkout</a>
                    <?php } else { ?>

                        <a class="button" style="margin:2% 0;padding:1%" href="" data-toggle="modal" data-target="#exampleModal" >Proceed  to  Checkout</a>
                        <?php } ?>

                    <?php } ?>
            
    <hr>
                   
                        <table class="table table-bordered text-center" id="shop_table" style="border-radius:5px;" >

                            <thead >
                                <tr style="background-color:#e3171b;">
                                <th style="color:white;text-align:center">S.No</th>    
                                <th style="color:white;text-align:center" class="product-thumbnail">Image</th>
                                    <th style="color:white;text-align:center" class="product-name">Product Name</th>
                                    <th style="color:white;text-align:center" class="product-price">Price</th>
                                    
                                    <th style="color:white;text-align:center" class="product-color">Sell Price</th>
                                   <th style="color:white;text-align:center" class="product-origin">Parent Category</th>
                                    
                                    <th style="color:white;text-align:center" class="product-subtotal">Size</th>
                                    <th style="color:white;text-align:center" class="product-remove">State</th>
                                    <th style="color:white;text-align:center" class="product-quantity">Quantity</th>
                                    <th style="color:white;text-align:center" class="product-subtotal">Subtotal</th>
                                    <th style="color:white;text-align:center" class="product-remove">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php  
                                        if(!empty($_SESSION["shoping_cart"]))  
                                        {  
                                            $i=0;
                                            $total = 0;  
                                            foreach($_SESSION["shoping_cart"] as $keys => $values)  
                                            {            
                                        $i++;
                                        ?>  
                                    <tr>

                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                    <td class="product-thumbnail" data-title="">
                                        <a href="product_detail.php?id=<?php echo $values['id'] ?>"><img height="120" width="100" alt="s_c" class="attachment-shop_thumbnail wp-post-image" src="img/product/<?php echo $values["product_image"]; ?>"></a>
                                    </td>
                                    <td class="product-name" data-title="Product Name" >
                                        <a href="product_detail.php?id=<?php echo $values['id'] ?>" style="text-transform:uppercase;"><?php echo $values["product_name"]; ?></a>
                                    </td>
                                
                                    <td class="product-price" data-title="Unit Price">
                                        <span class="amount">Rs.<?php echo $values["product_price"]; ?></span>
                                    </td>
                                    <td class="product-category" data-title="category">
                                        <span class="category">Rs. <?php echo $values["product_sellprice"]; ?></span>
                                    </td>
                                   <td class="product-color" data-title="color" style="text-transform:uppercase">
                                        <span class="color"><?php echo $values["product_parentcategory"]; ?></span>
                                    </td>
                                  
                                    <td class="product-origin" data-title="origin" style="text-transform:uppercase">
                                        <span class="origin"><?php echo $values["product_size"]; ?></span>
                                    </td>
                                    <td class="product-color" data-title="color" style="text-transform:uppercase">
                                        <span class="color"><?php echo $values["product_state"]; ?></span>
                                    </td>

                                    <td class="product-quantity" data-title="Qty">
                                        <div class="quantity buttons_added">
                                            <span style="padding: 0 8px;" class="input-text qty text" name="quantity[]"><?php echo $values["product_quantity"]; ?></span>
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Subtotal">
                                        <span class="amount">Rs.<?php echo number_format($values["product_price"] * $values["product_quantity"], 2);?></span>
                                    </td>
                                    <td class="product-remove" data-title="Remove">
                                    <button name="delete" class="btn btn-danger btn-xs delete" data-size="<?php echo $values["product_size"]; ?>" data-state="<?php echo $values["product_state"]; ?>" id="<?php echo $values["product_id"]; ?>"><i style="padding:10px 8px;" class="fa fa-trash"></i></button>   
                                    </td>
                                </tr>
                                <?php	
                        $total = $total + ($values["product_quantity"] * $values["product_price"]);
                    }
                ?>
                    <tr>
                        <td colspan="8" align="right"><b>Total<b></td>
                        <td colspan="3" align="right"><b>Rs. <?php echo number_format($total, 2); ?><b></td>
                        
                    </tr>
                
                <?php
                }
                
                else
                    {
                    ?>
                    <td colspan="11">

                    <h4 style="padding:2% 0">No item in Cart! Add By clicking on the Cart Icon</h4 >

                </td>

                <?php
                                }
                ?>
                                        </tbody>
                                    </table>

                                    <div class=" text-right">
                                    
                                    
                                            <a class="button text-right"  style="margin:2% 0;padding:1%" href="shop.php">Continue Shoping</a>
                                        
                                    </div>
                            

                            </form>
         
        </div>

    </div>
                            </div>
                            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="add_to_cart.js" defer=""></script>
</body>


</html>