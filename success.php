<?php

include_once 'header.php';

if (isset($_GET['orderid'])){

    $orderid=$_GET['orderid'];

}



?>

<!-- /.header -->
<!-- page-header -->
<link rel="stylesheet" href="css/invoice.css">
<style>
    .i-am-centered { margin: auto; max-width: 300px;}
</style>
<!-- /.page-header -->
<div class="content" style="padding:5% 4%">
    <?php if (isset($_GET['orderid']))
    {
        ?>
        <div class="alert alert-success" role="alert">
            Thank-You for Order Your Order NO is FH<?php echo $orderid ?>

        </div>

    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
            Payment Is not Succesfully! Please Try Again
        </div>
    <?php } ?>

    <?php

    if ((isset($_GET['orderid']))) {

        ?>
        <div class="toolbar hidden-print">
            <div class="text-right">
                <button  value='Print' onclick='printDiv();' class="btn btn-info"><i class="fa fa-print"></i> Print</button>

            </div>
            <hr>
        </div>
        <div class="i-am-centered">
        <div class="row expanded">
            <main class="columns">
                <div class="inner-container">
                    <section class="row" style="margin-left: 0px;" id="DivIdToPrint">
                        <div class="col-md-12 callout large invoice-container">
                            <table class="invoice">
                                <tr class="header">
                                    <td class="">
                                        <img src="img/WhatsApp Image 2019-12-25 at 10.47.23 AM.jpeg" style="width: 120px;height: 120px;">
                                    </td>
                                    <td class="align-right">
                                        <h2>Invoice</h2>
                                    </td>
                                </tr>
                                <tr class="intro">
                                    <?php

                                    $query ="SELECT * FROM order_table where id = '$orderid'";
                                    $result = mysqli_query($con, $query);
                                    $row= mysqli_fetch_array($result);


                                    ?>
                                    <td class="">
                                        <?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?>  .<br>
                                        <?php echo $row['email'] ?>                                        <br>
                                        Thank you for your order.
                                    </td>
                                    <td class="text-right">
                                        <span class="num">Inv Num #: Fh<?php echo $row['id'] ?></span><br>
                                        <span class="num">Inv Date: <?php echo $row['date'] ?></span><br>
                                        <span class="num">Mob No :<?php echo $row['mobile'] ?></span><br>
                                    </td>
                                </tr>
                                <tr class="details">
                                    <td colspan="2">
                                        <table class="table table-responsive">
                                            <thead>
                                            <tr>
                                                <th class="desc">Item Name</th>
                                                <th class="unp">Item Form</th>
                                                <th class="qty">Quantity</th>
                                                <th class="amt">Price Per Item</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            $query2222 ="SELECT * FROM order_product where order_id = '$orderid'";
                                            $result222 = mysqli_query($con, $query2222);
                                            while($row22=mysqli_fetch_array($result222)){


                                            ?>
                                            <tr class="item">
                                                <td class="desc"><?php echo $row22['name'] ?> </td>
                                                <td class="unp"><?php echo $row22['form'] ?><?php echo $row22['size'] ?></td>
                                                <td class="qty"><?php echo $row22['quantity'] ?></td>
                                                <td class="amt">Rs: <?php echo $row22['price'] ?></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr class="totals">
                                    <td></td>
                                    <td>
                                        <table>
                                            <?php
                                            $shipid = $row['shipping_id'];
                                            $queryship ="SELECT * FROM shipping where id = '$shipid'";
                                            $resultship = mysqli_query($con, $queryship);
                                            $rowship=mysqli_fetch_array($resultship);


                                            $subtotal = $row['total']-$rowship['rate']

                                            ?>
                                            <tr class="subtotal">
                                                <td class="num">Subtotal</td>
                                                <td class="num">Rs <?php echo $subtotal  ?></td>
                                            </tr>
                                            <tr class="fees">
                                                <td class="num">Delivery Company</td>
                                                <td class="num"><?php echo $rowship['name'] ?></td>
                                            </tr>
                                            <tr class="fees">
                                                <td class="num">Delivery Fees</td>
                                                <td class="num">Rs <?php echo $rowship['rate'] ?></td>
                                            </tr>

                                            <tr class="total">
                                                <td>Total</td>
                                                <td>Rs <?php echo $row['total'] ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>


                        </div>
                    </section>
                </div>
            </main>
        </div>
        </div>






    <?php } ?>
</div>
<!-- social-media-section -->

<!-- /.social-media-section -->
<!-- footer-section -->
<?php



include_once 'footer.php'

?>
<script>
    function printDiv()
    {

        var divToPrint=document.getElementById('DivIdToPrint');

        var newWin=window.open('','Print-Window');

        newWin.document.open();

        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

        newWin.document.close();

        setTimeout(function(){newWin.close();},10);

    }
</script>

<script src="js/jquery-3.3.1.min.js" defer=""></script>
<script src="js/bootstrap.min.js" defer=""></script>
<script src="js/multirange.js" defer=""></script>
<script src="js/owl.carousel.min.js" defer=""></script>
<script src="js/sync_owl_carousel.js" defer=""></script>
<script src="js/scripts.js" defer=""></script>
</body>

</html>