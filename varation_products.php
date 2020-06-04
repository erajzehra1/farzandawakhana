
<?php

include_once 'admin/html/admin/inlcudes/dbconnect.php';

$productid = mysqli_real_escape_string($con,$_POST['productid']);
$variationid = mysqli_real_escape_string($con,$_POST['variationid']);


$querys = "SELECT * FROM product_attribute WHERE entity_id = '$variationid' AND product_id = '$productid' order by size asc";
$results = mysqli_query($con, $querys);
while($rows=mysqli_fetch_array($results)) {


   $output = '


    <li style="margin-right: 60px;">
            <label>
  <input type="radio" name="price" value="'.$rows['price'].'" class="variation2" id="attriprice" price="'.$rows['price'].'" entityname="'.$rows['size'].'"  productid="'.$rows['product_id'].'" attributid="'.$rows['id'].'"  variationid="'.$rows['entity_id'].'" >
    <span class="checkmark size" name="variations"  style="color: white  ;width: 70px;text-align: center; padding-top: 9px;height: 39px;border-radius: 5px;">'.$rows['size'].'</span>
                            </label>
               </li>




   ';


    echo $output;

}
?>
<script>
   $(".size").on('click',function(){
        
            $(".sizeinput").val($(this).text());
        });
</script>




