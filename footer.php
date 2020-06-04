
<footer class=" bg-gray full-width border no-border-r no-border-l footer-v3 no-border-b">
    <div class="clearfix container-web relative">
        <div class=" container clear-padding">
            <div class="row">
                <!-- Support -->
                <div class="clearfix support-box support-box-v3 full-width">
                    <div class="container-web clearfix">
                        <div class=" container ">
                            <div class="row">
                                <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                    <img src="img/icon_free_ship.png" alt="Icon Free Ship" class="float-left" />
                                    <p class="float-left">free shipping</p>
                                    <p class="float-left">on order over $500</p>
                                </div>
                                <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                    <img src="img/icon_support.png" alt="Icon Supports" class="float-left">
                                    <p class="float-left">support</p>
                                    <p class="float-left">life time support 24/7</p>
                                </div>
                                <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                    <img src="img/icon_patner.png" alt="Icon partner" class="float-left">
                                    <p class="float-left">help partner</p>
                                    <p class="float-left">help all aspects</p>
                                </div>
                                <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                    <img src="img/icon_phone_big.png" alt="Icon Phone Tablet" class="float-left">
                                    <p class="float-left">contact with us</p>
                                    <p class="float-left"><?php echo $rowcontact['mobile'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Support Box -->
            </div>
            <div class="row">
                <div class="clearfix col-md-3 col-sm-6 col-xs-12 text-footer">
                    <img src="img/<?php echo $rowcontact['logo']  ?>" alt="" style="width: 200px;height: 200px;">
                </div>
                <div class="clearfix col-md-3 col-sm-6 col-xs-12 text-footer">
                    <p>Categories</p>
                    <ul class="list-footer">
                        <?php
                        $query = "SELECT * FROM parent_cat  ORDER BY RAND() limit 5";
                        $result = mysqli_query($con, $query);
                        while($row=mysqli_fetch_array($result)) {
                            ?>
                            <li><a href="search_category.php?cat=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a></li>
                        <?php } ?>




                    </ul>
                </div>
                <div class="clearfix col-md-3 col-sm-6 col-xs-12 text-footer">
                    <p>information</p>
                    <ul class="list-footer">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="shoping_cart.php">Cart</a></li>
                    </ul>
                </div>

                <div class="clearfix col-md-3 col-sm-6 col-xs-12 text-footer">
                    <p>contact us</p>
                    <ul class="icon-footer">
                        <li><i class="fa fa-home" aria-hidden="true" style="top: 17px;"></i> <?php echo $rowcontact['address'] ?></li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $rowcontact['email'] ?></li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i><?php echo $rowcontact['mobile'] ?></li>
                        <li><i class="fa fa-fax" aria-hidden="true"></i> <?php echo $rowcontact['phone'] ?></li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> 09:00 AM - 18:00 PM</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Box Social -->

    <!-- End Box Social -->
    <div class=" bottom-footer full-width">
        <div class="clearfix container-web">
            <div class=" container">
                <div class="row">
                    <div class="clearfix col-md-11 clear-padding copyright">
                        <p style="text-align: center">Copyright © <?php echo date("Y") ?> by FarzanaHerbs. All Rights Reserved.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <h2 class="modal-title" id="exampleModalLabel" style="text-align: center">Login </h2>
                <div id="error2"></div>
                <div id="error3"></div>
                <div id="successsingup"></div>
                <form class="form-group" method="post" action="loginscript.php" id="login">

                    <div class="form-group-row">
                        <div class="col-md-12">


                            <label for="email"> Email</label>


                            <input type="text" name="email" id="loginemail" class="form-control" placeholder="Enter Email...">


                        </div>


                    </div>

                    <div class="form-group-row">
                        <div class="col-md-12">


                            <label for="pass"> Password</label>


                            <input type="password" name="pass" id="loginpassword" class="form-control" placeholder="Enter Password...">


                        </div>


                    </div>
                    <hr>
                    <br>
                    <div class="form-group" style="padding-top: 53px">
                        <br><br>

                        <button type="submit" class="btn btn-danger" name="btn-save" id="btn-submit1" style="margin-left: 80%">
                            <span class="glyphicon glyphicon-log-in"></span>   Login
                        </button>


                        <br><br>
                        <a id="forgotbtn" href="#forgot"  style="margin-left: 40%;margin-top: 39px;color: red">Forgot Password?</a>



                    </div>
                </form>
                <form class="form-group" method="post" action="fotgotpass.php" id="forgot" style="display: none">

                    <div class="form-group-row">
                        <div class="col-md-12">


                            <label for="email"> Email</label>


                            <input type="text" name="email" id="forgotemail" class="form-control" placeholder="Enter Email...">


                        </div>


                    </div>


                    <hr>
                    <br>
                    <div class="form-group" style="padding-top: 53px">
                        <br><br>

                        <button type="submit" class="btn btn-danger" name="btn-save" id="btn-forgot" style="margin-left: 80%">
                            <span class="glyphicon glyphicon-log-in"></span>   Send Email
                        </button>
                        <br><br>
                        <a id="backlogin" href="#login"  class="btn btn-danger" name="btn-save" id="btn-submit33" style="margin-left: 80%">
                            <span class="glyphicon glyphicon-log-in"></span>   Back
                        </a>


                        <br><br>




                    </div>
                </form>
            </div>
            <br>
            <hr>

        </div>

    </div>
</div>
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <h2 class="modal-title" id="exampleModalLabel" style="text-align: center">SignUp </h2>
                <br>
                <div id="error"></div>
                <div id="successsingup"></div>
                <form class="form-group form-signin" method="post" action="singupscript.php" id="my_form">

                    <div class="form-group-row">
                        <div class="col-md-6">


                            <label for="fname"> First Name</label>


                            <input type="text" name="r_firstname" id="fname" class="form-control" placeholder="Enter  First Name..." required>


                        </div>
                        <div class="col-md-6">


                            <label for="lname"> Last Name</label>


                            <input type="text" name="r_lastname" id="lname" class="form-control" placeholder="Enter Last Name..." required>


                        </div>
                        <div class="col-md-6">


                            <label for="no"> Mobile No</label>


                            <input type="number" name="r_mobile" id="no" class="form-control" placeholder="Enter Mobile No..." required>


                        </div>
                        <div class="col-md-6">


                            <label for="email"> Email</label>


                            <input type="email" name="r_email" id="useremail" class="form-control" placeholder="Enter Email..." required>



                        </div>

                        <div class="col-md-6">


                            <label for="pass"> Password</label>


                            <input type="password" name="r_password" id="pass" class="form-control" placeholder="Enter Password..." required>


                        </div>
                        <div class="col-md-6">


                            <label for="city"> City</label>


                            <input type="text" name="city" id="city" class="form-control" placeholder="Enter City..." required>


                        </div>
                        <div class="col-md-12">


                            <label for="add"> Address</label>


                            <input type="text" name="r_address" id="add" class="form-control" placeholder="Enter Adress..." required>




                        </div>



                    </div>


                    <div class="form-group" >

                        <button type="submit" class="btn btn-danger" name="btn-save" id="btn-submit">
                            <span class="glyphicon glyphicon-log-in"></span>   Create Account
                        </button>

                        <br><br>
                        <a href="" style="display: none">Forgot Password?</a>


                    </div>



            </div>

            <br>
            <hr>

        </div>
        </form>
    </div>
</div>
<script>
    $("#my_form").submit(function(event){
        event.preventDefault(); //prevent default action
        var post_url = $(this).attr("action"); //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission
        console.log(form_data);

        $.ajax({
            url : post_url,
            type: request_method,
            data : form_data,
            beforeSend: function() {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
            },
        }).done(function(response){ //

            if (response == '1'){

                $("#error").fadeIn(1000, function(){
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   Sorry email already taken !</div>');
                    $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account');
                });

            }
            else{

                $("#btn-submit").html('<img src="ajax-loader.gif">   Signing Up ...');
                setTimeout('$(".form-signin").fadeOut(500, function(){ $("#successsingup").html(response); }); ',3000);
                $("#successsingup").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span>   User Registered Succesfully !</div>');
                setTimeout(function(){
                    window.location.reload(1);
                }, 1000);



            }

        });
    });
</script>
<script>
    $("#login").submit(function(event){
        event.preventDefault(); //prevent default action
        var post_url = $(this).attr("action"); //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission
        console.log(form_data);

        $.ajax({
            url : post_url,
            type: request_method,
            data : form_data,
            beforeSend: function() {
                $("#error2").fadeOut();
                $("#btn-submit1").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
            },
        }).done(function(response){ //

            if (response == '1'){

                $("#error2").fadeIn(1000, function(){
                    $("#error2").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   Email/Password Wrong !</div>');
                    $("#btn-submit1").html('<span class="glyphicon glyphicon-log-in"></span>   Login In..');
                });

            }
            else if (response == '2'){

                $("#error2").fadeIn(1000, function(){
                    $("#error2").html('<div class="alert alert-warning"> <span class="glyphicon glyphicon-info-sign"></span> User Is not Registered !</div>');
                    $("#btn-submit1").html('<span class="glyphicon glyphicon-log-in"></span>   Login In..');
                });

            }
            else{

                $("#btn-submit1").html('<img src="ajax-loader.gif">   Signing In ...');
                setTimeout('$("#login").fadeOut(500, function(){ $("#successsingup").html(response); }); ',3000);
                $("#successsingup").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span>   User  Succesfully Login!</div>');
                setTimeout(function(){
                    window.location.reload(1);
                }, 1000);



            }

        });
    });
</script>

<script src="js/forgot.js"></script>
<?php
ob_end_flush();
?>