<?php                                   
session_start();
                                  
                                            $i=0;
                                            $total = 0;
                                            $total_pro=0;


                                            $output='   <div class="mini_cart_inner">';
                                            foreach ($_SESSION["shoping_cart"] as $keys => $values) {
                                                $i++; 
                                   $output.=' <div class="product-cart-son clearfix">
                                   <div class="image-product-cart float-left center-vertical-image ">
                                       <a href="#"><img src="img/product/'.$values['product_image'].'" alt="" /></a>
                                   </div>
                                   <div class="info-product-cart float-left">
                                       <p class="title-product title-hover-black"><a class="animate-default" href="#">'.$values['product_name'].'</a></p>
                                       <p class="clearfix price-product">Rs. '.$values['product_price'].' <span class="total-product-cart-son">(x'.$values['product_quantity'].')</span></p>
                                   </div>
                               </div>';
                                        $total = $total + ($values["product_quantity"] * $values["product_price"]);
                                        $total_pro=$total_pro+$values["product_quantity"];
                                            }
                                         
                                       
                                  
                                        $data = array(
                                            'cart_details'		=>	$output,
                                            'total_price'		=>	'Rs.' . number_format($total, 2),
                                            'total_item'		=>	$total_pro
                                        );	
                                        
                                        echo json_encode($data);
?>