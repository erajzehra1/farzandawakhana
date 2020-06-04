<?php



include_once 'inlcudes/dbconnect.php';
session_start();

$id = $_POST['rowid'];

?>

<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Customer Details </th>
        <th>Order Details </th>
        <th>Price </th>
        <th>Delivery Type </th>


        <th>Thumbnail </th>


    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM order_product  o INNER JOIN product p on o.cart_product_id=p.id INNER JOIN order_table t on o.order_id=t.id INNER JOIN user u on t.user_id=u.id  WHERE o.order_id = '$id'";
    $result = mysqli_query($con, $query);
    while($row=mysqli_fetch_array($result)){?>

        <tr>
            <td> Customer Details :

                <hr>Customer Name: <?php echo $row['firstname'] ?>  <?php echo $row['lastname'] ?>
                <hr>

                <hr>Delivery Address: <?php echo $row['address'] ?>
                <hr>
                city: <?php echo $row['city'] ?>
                <hr>


            </td>
            <td>Product Name: <?php echo $row[1] ?>
                <hr>

                Product Form:  <?php echo $row['form'] ?>
                <hr>
                Size: <?php echo $row['size'] ?>


            </td>

            <td>Rs: <?php echo $row[2] ?>

                <?php
                $queryship = "SELECT * FROM order_table  o INNER JOIN shipping s on o.shipping_id=s.id  where  o.id = '$id'";
                $resultship = mysqli_query($con, $queryship);
                $rowship=mysqli_fetch_array($resultship);


                ?>



            <td>Shipping Company : <?php echo $rowship['name'] ?>
                <hr>
                Shipping Rate : <?php echo $rowship['rate'] ?>
            </td>




            <td><img src="../../../img/product/<?php echo $row['image'] ?>" alt="" style="width: 150px;height: 120px"></td>

        </tr>
    <?Php } ?>

</table>