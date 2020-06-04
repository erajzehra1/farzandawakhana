<?php

include_once 'header.php'

?>
<link rel="stylesheet" type="text/css" href="css/contact.css">
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
							<li class="animate-default title-hover-red"><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumb -->
		<!-- Content Contact -->
		<div class="relative container-web">
			<div class="container">
				<div class="row bottom-margin-default">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.118671724318!2d67.09170881419102!3d24.928026884022035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f4aad0e1485%3A0xa20999f646149621!2sFarzana%20Dawakhana!5e0!3m2!1sen!2s!4v1581020482918!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
						
					</div>
				</div>

				<div class="row footer-from-address">
					<div class="col-md-6 relative contact-info col-sm-12 col-xs-12">
						<div class="row">
							<p class="title-contact bold bottom-margin-default">Contact Infomation</p>
							<div class="relative clearfix row-info-contact full-width bottom-margin-default">
								<div class="relative left-row-info-contact">
									<img src="img/icon_office-min.png" alt="" />
								</div>
								<div class="relative right-row-info-contact">
									<p class="bold name-row-contact">Main Branch</p>
									<p><?php echo $rowcontact['address'] ?></p>
									<p>Whatsapp No: <a href="tel:<?php echo $rowcontact['mobile'] ?>"><?php echo $rowcontact['mobile'] ?></a></p>
									<p>Phone No: <a href="tel:<?php echo $rowcontact['phone'] ?>"><?php echo $rowcontact['phone'] ?></a></p>
									<p>Email: <a href="<?php echo $rowcontact['email	'] ?>"><?php echo $rowcontact['email'] ?></a></p>
								</div>
							</div>

						</div>
					</div>
					<div class="col-md-6 relative contact-info col-sm-12 col-xs-12">
						<div class="row">
							<p class="title-contact bold bottom-margin-default">Submit a Message</p>
							<div class="relative full-width form-contact">
								<form method="POST" action="contactemail.php" class="form-placeholde-animate">
						            <div class="field-wrap">
							            <label>
							            	First Name<span class="req">*</span>
							            </label>
							            <input type="text" name="name" required autocomplete="off" />
						            </div>
						            <div class="field-wrap">
							            <label>
							            	Phone number<span class="req">*</span>
							            </label>
							            <input type="text" name="phone" required autocomplete="off" />
						            </div>
						            <div class="field-wrap">
							            <label>
							            	Your email<span class="req">*</span>
							            </label>
							            <input type="text" name="email" required autocomplete="off" />
						            </div>
						            <div class="field-wrap">
							            <label>
							            	Message<span class="req">*</span>
							            </label>
							            <textarea required name="message" rows="6" autocomplete="off"></textarea>
						            </div>
						            <button type="submit" name="contactsend" class="uppercase animate-default button-hover-red">send message</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Content Contact -->
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
	<script src="js/scripts.js" defer=""></script>
</body>
</html>