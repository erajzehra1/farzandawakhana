<?php

include_once 'header.php';

if(!isset($_SESSION['user']))
{
	echo "<script>alert('Please Login First')</script> ";
	echo "<script> window.location.href=' index.php#exampleModal'</script> ";

}

?>

<link rel="stylesheet" type="text/css" href="css/cartpage.css">
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
							<li class="animate-default title-hover-red"><a href="checkout.php">Checkout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumb -->
		<!-- Content Checkout -->
		<div class="relative container-web">
			<div class="container">
				<div class="row relative">

					<form action="checkoutscript.php" method="post" enctype="multipart/form-data">

					<!-- Content Shoping Cart -->
					<div class="col-md-8 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
						<p class="title-shoping-cart">Billing Details</p>
						<div class="relative clearfix full-width">
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
								<label>First Name *</label>
								<input class="full-width" type="text" name="firstname" value="<?php echo $_SESSION['user']['firstname'] ?>">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
								<label>Last Name *</label>
								<input class="full-width" type="text" name="lastname" value="<?php echo $_SESSION['user']['lastname'] ?>">
							</div>
						</div>

						<div class="relative clearfix full-width">
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
								<label>Email Address *</label>
								<input class="full-width" type="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
								<label>Phone *</label>
								<input class="full-width" type="number" name="mobile" value="<?php echo $_SESSION['user']['mobile'] ?>">
							</div>
						</div>

						<div class="form-input full-width clearfix relative">
							<label>Address *</label>
							<input class="full-width" type="text" name="address" value="<?php echo $_SESSION['user']['address'] ?>">
						</div>
						<div class="form-input relative full-width clearfix">
								<label>Town / City *</label>
								<input class="full-width" type="text" name="city" value="<?php echo $_SESSION['user']['city'] ?>">

						</div>
							<div class="form-input clearfix full-width relative">
							<label>Order Note</label>
							<textarea placeholder="Notes about your order, e.g. special notes for delivery." class="full-width" name="ordernote" rows="4"></textarea>
						</div>
					</div>
					<!-- End Content Shoping Cart -->
					<!-- Content Right -->
					<div class="col-md-4 col-sm-12 col-xs-12 right-content-shoping relative clear-padding-right">
						<p class="title-shoping-cart">Your Order</p>
						<div class="full-width relative overfollow-hidden">
							<?php
							if(!empty($_SESSION["shoping_cart"]))
							{
							$i=0;
							$total = 0;
							foreach($_SESSION["shoping_cart"] as $keys => $values)
							{
							$i++;
							?>
							<div class="relative clearfix full-width product-order-sidebar border no-border-t no-border-r no-border-l">
								<div class="image-product-order-sidebar center-vertical-image">
									<img src="img/product/<?php echo $values['product_image'] ?>" alt="" style="width: 270px;height: 270px;">
								</div>
								<div class="relative info-product-order-sidebar">
									<p class="title-product top-margin-15-default animate-default title-hover-black"><a href="#"> <?php echo $values["product_name"]; ?></a></p>
									<p class="price-product"> Rs. <?php echo $values["product_price"] ?> X <?php echo $values["product_quantity"].'/-'; ?></p>
								</div>
							</div>
								<?php
								$total = $total + ($values["product_quantity"] * $values["product_price"]);
							}
							}
							?>

											</div>
						<p class="title-shoping-cart">Cart Total</p>
						<div class="full-width relative cart-total bg-gray  clearfix">
							<div class="relative justify-content bottom-padding-15-default border no-border-t no-border-r no-border-l">
								<p>Subtotal</p>
								<p class="text-red price-shoping-cart">Rs. <?php echo $total.'/-'?></p>
							</div>
							<div class="relative border top-margin-15-default bottom-padding-15-default no-border-t no-border-r no-border-l">
								<p class="bottom-margin-15-default">Delivery Type</p>

								<?php


								$cquery = "SELECT * FROM shipping order by name asc";
								$cresult = mysqli_query($con, $cquery);
								while ($check=mysqli_fetch_array($cresult)){




								?>
								<div class="relative justify-content">
									<ul class="check-box-custom title-check-box-black clear-margin clear-margin">

										<li>
											<label><?php echo $check['name'] ?>
												<input type="radio" class="shiipingchange" shipid="<?php echo $check['id'] ?>" totalbill="<?php echo $total ?>"  name="shipingorder" checked="" value="<?php echo $check['id'] ?>">
												<input type="text" class="shppingname" name="shippingname" value="<?php echo $check['name'] ?>">
			  										<span class="checkmark"></span>
			  								</label>
										</li>

									</ul>
									<p class="price-gray-sidebar">Rs<?php echo $check['rate'] ?></p>
								</div>

									<p id="shipratelist" style=""><?php $ratelist = $check['rate'] ?></p>

								<?php  $shippingtoal =$ratelist +$total; }?>

							</div>
							<div class="relative justify-content top-margin-15-default">
								<p class="bold">Total</p>
								<input type="hidden" name="totalbillwithship" id="totalshippigbilllast" value="<?php echo $shippingtoal ?>">
								<input type="hidden" name="userid"  value="<?php echo $_SESSION['user']['id'] ?>">

								<p class="text-red price-shoping-cart totalbillshipping">Rs. <?php echo $shippingtoal.'/-' ?></p>
							</div>
						</div>

						<button class="btn-proceed-checkout full-width top-margin-15-default">Proceed to Checkout</button>
					</div>
					<!-- End Content Right -->
				</div>
			</div>
		</div>
		<!-- End Content Checkout -->
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
		</form>
	</div>
	<!-- End Content Box -->
	<!-- Footer Box -->
	<?php

    include_once 'footer.php';
    ?>
<script>

	$(document ).ready(function(){


		$(document).on('change', '.shiipingchange', function(){





			var shipid;
			var totalbill;


			shipid = $(this).attr('shipid');
			totalbill = $(this).attr('totalbill');
			$.ajax( {
				type: "POST",
				url: "shipchange.php",
				data:{shipid:shipid,totalbill:totalbill},
				success:function(data){
					//var myJSON = JSON.stringify(data);




					$('.shppingname').val(data.name);
					$('.totalbillshipping').html(data.total);
					$('#totalshippigbilllast').val(data.totalbill);



				}
			});

		}); });
</script>
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