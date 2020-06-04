
<?php

include_once 'header.php';

$about = "SELECT * FROM `about` WHERE id = '1'";
$resultabout = mysqli_query($con,$about);
$rowabout = mysqli_fetch_array($resultabout);

?>
<link rel="stylesheet" type="text/css" href="css/about.css">
<link rel="stylesheet" type="text/css" href="css/multirange.css">
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
							<li class="animate-default title-hover-red"><a href="#">About Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumb -->
		<!-- Content About Us -->
		<div class="relative container-web">
			<div class="container">
				<div class="row ">
					<div class="full-width banner-about relative center-vertical-image bottom-margin-default overfollow-hidden">
						<img src="img/<?php echo $rowabout['image'] ?>" alt="" style="width: 1170px;height: 500px;">
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 text-intro relative top-margin-default bottom-margin-default">
						<p><?php echo $rowabout['content'] ?> .</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 relative">
						<div class="col-md-3 col-sm-3 col-xs-6 relative total-number-about">
							<p class="Count">3900</p>
							<p>THERE ANYONE</p>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 relative total-number-about">
							<p class="Count">33100</p>
							<p>HAPPY CLIENTS</p>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 relative total-number-about">
							<p class="Count">1339</p>
							<p>AWARD WINNING</p>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 relative total-number-about">
							<p class="Count">3000</p>
							<p>TEAM MEMBERS</p>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- End Content About Us -->
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
							<p><?php echo $rowcontact['mobile'] ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Content Box -->
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
</body>
</html>