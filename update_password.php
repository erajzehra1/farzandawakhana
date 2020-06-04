<?php include 'header.php';

$email = $_GET['email'];
if(isset($_POST['register']) != "")
{

    $password = mysqli_real_escape_string($con, $_POST["pass"]);
    $password = password_hash($password, PASSWORD_DEFAULT);




    $query = "UPDATE `user` SET  password = '$password' WHERE email = '$email'";
    if ($con->query($query)) {


        echo "<script> alert('Password Change Successfully')</script> ";
        echo "<script> window.location.href=' index.php'</script> ";


    } else {




        echo "<script> alert('Password Change Unsuccessfully')</script> ";
        echo "<script> window.location.href=' index.php'</script> ";

    }






}
?>

<style>
    .account_form input {
        border: 1px solid #242424;
        height: 40px;
        max-width: 100%;
        padding: 0 20px;
        background: none;
        width: 100%;
    }

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {


    #updateformpass{


    margin-left: 0%;

    }


    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {





        #updateformpass{


            margin-left: 27%;

        }

    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {




        #updateformpass{


            margin-left: 27%;

        }

    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {




        #updateformpass{


            margin-left: 27%;

        }

    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {



        #updateformpass{


            margin-left: 27%;

        }


    }
</style>
<!--breadcrumbs area start-->

<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="login_page_bg">
    <div class="container">
        <div class="customer_login">
            <div class="row justify-content-center align-items-center">


                <!--register area start-->
                <div class="col-lg-6 col-md-12" id="updateformpass">
                    <div class="account_form register" style="text-align: center">

                        <h2>Change Password</h2>
                        <?php if(isset($msg)){
                            ?>
                            <div class="alert alert-success">
                                <?php echo $msg?>
                            </div>
                            <?php
                        }?>
                        <form class="form-group" action="" method="post" s>

                            <p>
                                <label>New Password <span>*</span></label>
                                <input class="form-control" name="pass" type="password" required>
                            </p>


                            <div class="login_submit">
                                <button class="btn btn-danger" name="register" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
</div>

<!-- customer login end -->

<?php include 'footer.php'?>

<!-- JS
============================================ -->

<script src="js/jquery-3.3.1.min.js" defer=""></script>

<script src="js/bootstrap.min.js" defer=""></script>
<script src="js/owl.carousel.min.js" defer=""></script>
<script src="js/scripts.js" defer=""></script>




</body>


<!-- Mirrored from demo.hasthemes.com/antomi-preview/antomi/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Nov 2019 18:10:00 GMT -->
</html>