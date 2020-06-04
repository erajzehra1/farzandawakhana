<?php
include_once 'admin/html/admin/inlcudes/dbconnect.php';
if  ($_SERVER['REQUEST_METHOD'] === 'POST') {


$firstname=$_POST["r_firstname"];
$lastname=$_POST["r_lastname"];
$email=$_POST["r_email"];
$mobile=$_POST["r_mobile"];
    $address=$_POST["r_address"];
$city=$_POST["city"];



$password = mysqli_real_escape_string($con, $_POST["r_password"]);
$password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM user WHERE email= '$email'";
    $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    $row = mysqli_fetch_assoc($resultset);
    if($row['email']) {


        echo '1';



    }
else{
    $query = "INSERT INTO `user`(`firstname`, `lastname`, `mobile`, `email`, `address`, `city`, `password`) VALUES ('$firstname','$lastname', '$mobile', '$email', '$address', '$city', '$password')";
if ($con->query($query)) {

    require_once "phpmailer/class.phpmailer.php";


    $name = $firstname.$lastname;
    $email2 = $email;
    $subject = 'User Registration';
    $message ='<!--Download - https://github.com/lime7/responsive-html-template.git-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Farzana Herbs</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<style>
		.ReadMsgBody {width: 100%; background-color: #ffffff;}
		.ExternalClass {width: 100%; background-color: #ffffff;}

				/* Windows Phone Viewport Fix */
		@-ms-viewport {
		    width: device-width;
		}
	</style>

	<!--[if (gte mso 9)|(IE)]>
	    <style type="text/css">
	        table {border-collapse: collapse;}
	        .mso {display:block !important;}
	    </style>
	<![endif]-->

</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background: #e7e7e7; width: 100%; height: 100%; margin: 0; padding: 0;">
	<!-- Mail.ru Wrapper -->
	<div id="mailsub">
		<!-- Wrapper -->
		<center class="wrapper" style="table-layout: fixed; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; padding: 0; margin: 0 auto; width: 100%; max-width: 960px;">
			<!-- Old wrap -->
	        <div class="webkit">
				<table cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" style="padding: 0; margin: 0 auto; width: 100%; max-width: 960px;">
					<tbody>
						<tr>
							<td align="center">
								<!-- Start Section (1 column) -->
								<table id="intro" cellpadding="0" cellspacing="0" border="0" bgcolor="#4F6331" align="center" style="width: 100%; padding: 0; margin: 0; background-image: url(https://github.com/lime7/responsive-html-template/blob/master/index/intro__bg.png?raw=true); background-size: auto 102%; background-position: center center; background-repeat: no-repeat; background-color: #080e02">
									<tbody >
										<tr><td colspan="3" height="20"></td></tr>
										<tr>
											<td width="330" style="width: 33%;"></td>
											<!-- Logo -->
											<td width="300" style="width: 30%;" align="center">
												<a href="#" target="_blank" border="0" style="border: none; display: block; outline: none; text-decoration: none; line-height: 60px; height: 60px; color: #ffffff; font-family: Verdana, Geneva, sans-serif;  -webkit-text-size-adjust:none;">
													<img src="farzanaherbs.com/WhatsApp Image 2019-12-25 at 10.47.23 AM.jpeg" alt="One Letter" width="193" height="43" border="0" style="border: none; display: block; -ms-interpolation-mode: bicubic;">
												</a>
											</td>
											<!-- Social Button -->
											<td width="330" style="width: 33%;" align="right">
												<div style="text-align: center; max-width: 150px; width: 100%;">
													<span>&nbsp;</span>
													<a href="#" target="_blank" border="0" style="border: none; outline: none; text-decoration: none; line-height: 60px; color: #ffffff; font-family: Verdana, Geneva, sans-serif;  -webkit-text-size-adjust:none">
														<img src="https://github.com/lime7/responsive-html-template/blob/master/index/f.png?raw=true" alt="facebook.com" border="0" width="11" height="23" style="border: none; outline: none; -ms-interpolation-mode: bicubic;">
													</a>

													<span>&nbsp;</span>
													<a href="#" target="_blank" border="0" style="border: none; outline: none; text-decoration: none; line-height: 60px; color: #ffffff; font-family: Verdana, Geneva, sans-serif; -webkit-text-size-adjust:none;">
														<img src="https://github.com/lime7/responsive-html-template/blob/master/index/g+.png?raw=true" alt="google.com" border="0" width="23" height="23" style="border: none; outline: none; -ms-interpolation-mode: bicubic;">
													</a>
													<span>&nbsp;</span>
												</div>
											</td>
										</tr>
										<tr><td colspan="3" height="100"></td></tr>
										<!-- Main Title -->
										<tr>
											<td colspan="3" height="60" align="center">
												<div border="0" style="border: none; line-height: 60px; color: #ffffff; font-family: Verdana, Geneva, sans-serif; font-size: 52px; text-transform: uppercase; font-weight: bolder;">HELLO, '.$firstname.$lastname.'!</div>
											</td>
										</tr>
										<!-- Line 1 -->
										<tr>
											<td colspan="3" height="20" valign="bottom" align="center">
												<img src="https://github.com/lime7/responsive-html-template/blob/master/index/line-1.png?raw=true" alt="line" border="0" width="464" height="5" style="border: none; outline: none; max-width: 464px; width: 100%; -ms-interpolation-mode: bicubic;" >
											</td>
										</tr>
										<!-- Meta title -->
										<tr>
											<td colspan="3">
												<table cellpadding="0" cellspacing="0" border="0" align="center" style="padding: 0; margin: 0; width: 100%;">
													<tbody>
														<tr>
															<td width="90" style="width: 9%;"></td>
															<td align="center">
																<div border="0" style="border: none; height: 60px;">
																	<p style="font-size: 18px; line-height: 24px; font-family: Verdana, Geneva, sans-serif; color: #ffffff; text-align: center; mso-table-lspace:0;mso-table-rspace:0;">
																        Thank-You For Registration!
																	</p>
																</div>
															</td>
															<td width="90" style="width: 9%;"></td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr><td colspan="3" height="160"></td></tr>
										<tr>
											<td width="330"></td>
											<!-- Button Start -->
											<td width="300" align="center" height="52">
												<div style="background-image: url(https://github.com/lime7/responsive-html-template/blob/master/index/intro__btn.png?raw=true); background-size: 100% 100%; background-position: center center; width: 225px;">
													<a href="farzanaherbs.com" target="_blank" width="160" height="52" border="0" bgcolor="#009789" style="border: none; outline: none; display: block; width:160px; height: 52px; text-transform: uppercase; text-decoration: none; font-size: 17px; line-height: 52px; color: #ffffff; font-family: Verdana, Geneva, sans-serif; text-align: center; background-color: #009789;  -webkit-text-size-adjust:none;">
														Get it now
													</a>
												</div>
											</td>
											<td width="330"></td>
										</tr>
										<tr><td colspan="3" height="85"></td></tr>
									</tbody>
								</table><!-- End Start Section -->
								<!-- Icon articles (4 columns) -->
						<!-- One art (2 columns) -->
								<!-- Footer -->
								<table id="news__article" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="center" style="width: 100%; padding: 0; margin: 0; background-color: #ffffff">
									<tbody>
										<tr><td colspan="3" height="23"></td></tr>
										<tr>
											<td align="center">
												<div border="0" style="border: none; line-height: 14px; color: #727272; font-family: Verdana, Geneva, sans-serif; font-size: 16px;">
													'. date("Y") .' © <a href="https://semenchenkov.github.io/" target="_blank" border="0" style="border: none; outline: none; text-decoration: none; line-height: 14px; font-size: 16px; color: #727272; font-family: Verdana, Geneva, sans-serif; -webkit-text-size-adjust:none;">All Right Reserved Farzanaherbs.com </a>
												</div>
											</td>
										</tr>
										<tr><td colspan="3" height="23"></td></tr>
									</tbody>
								</table> <!-- End Footer -->
							</td>
						</tr>
					</tbody>
				</table>
			</div> <!-- End Old wrap -->
		</center> <!-- End Wrapper -->
	</div> <!-- End Mail.ru Wrapper -->
</body>

</html>';
    $mail = new PHPMailer(true);
    $mail ->IsSmtp();
    $mail ->SMTPAuth = true;
    $mail ->SMTPSecure = 'ssl';
    $mail ->Host = "mail.farzanaherbs.com";
    $mail ->Port = 465; // or 587
    $mail ->IsHTML(true);
    $mail ->Username = "info@farzanaherbs.com";
    $mail ->Password = "Karachi@123";
    $mail ->SetFrom("info@farzanaherbs.com");
    $mail ->Subject = $subject;
    $mail ->Body = $message;
    $mail ->AddAddress($email2);


if ($mail->send()) {


}


    echo "registered Successfully!";



}else{

    echo $query;

}




}}
?>