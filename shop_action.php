
<?php

include_once 'admin/html/admin/inlcudes/dbconnect.php';
session_start();
$record_per_page = 15;
$page = '';
$output = '';
if(isset($_POST["page"]))
{
    $page = $_POST["page"];
}
else
{
    $page = 1;
}
$start_from = ($page - 1)*$record_per_page;
$query = "SELECT * from product p  inner join parent_cat pcat on p.parent_category=pcat.id  where p.stock>0";


if (isset($_POST["category"])) {
    $category = implode("','", $_POST["category"]);
    $query .= "
		 AND p.category IN('" . $category . "')
		";
}

if (isset($_POST["pacategory"])) {
    $pacategory = implode("','", $_POST["pacategory"]);
    $query .= "
		 AND p.parent_category IN('" .$pacategory. "')
		";
}






$query .= "
		 order by p.id desc LIMIT $start_from, $record_per_page
		";

$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result))
{
  
    if(isset($_SESSION['shoping_cart'])){
        for($i=0;$i<sizeof($_SESSION['shoping_cart']);$i++){
           if( $_SESSION['shoping_cart'][$i]['product_id']==$row[0]){
               
    $output .= '<input type="hidden" value="'.$_SESSION['shoping_cart'][$i]['product_quantity'].'" id="cartquantity'.$row[0].'"> ';
           }
        }
    }
         if($row['10'] !=''){

             $currectprice = $row[10];

         }
    else{

        $currectprice = $row[3];

    }

    if($row['10'] !=''){

        $oldprice = 'Rs'. $row[3];

    }
    else{

        $oldprice = $row[10];

    }





    $output .= '
    <div class="col-md-4 col-sm-4 col-xs-12 product-category relative effect-hover-boxshadow animate-default">
    <div class="image-product relative overfollow-hidden">
        <div class="center-vertical-image">
            <img src="img/product/'.$row[7].'" alt="Product" style="width:100%;height:270px;">
        </div>
        <a href="#"></a>
        <ul class="option-product animate-default">

            <input type="hidden" name="image" id="image\'.$row[0].\'" class="form-control" value="\'.$row[7].\'" />
            <input type="hidden" name="quantity" id="quantity\' . $row[0] . \'"  value="1" />
            <input type="hidden" name="hidden_name" id="name\' . $row[0] . \'" value="\' . $row[1] . \'" />
            <input type="hidden" name="hidden_price" id="price\' . $row[0] . \'" value="\' . $row[3] . \'" />

            <input type="hidden" name="hidden_sellprice" id="sellprice\' . $row[0] . \'" value="\' . $row[10] . \'" />
            <input type="hidden" name="hidden_category" id="category\' . $row[0] . \'" value="\' . $row[13] . \'" />


            <input type="hidden" name="hidden_stock" id="stock\' . $row[0] . \'" value="\' . $row[\'stock\'] . \'" />
            <input type="hidden" name="hidden_sellprice" id="sellprice\' . $row[0] . \'" value="\' . $row[10] . \'" />

            <li class="relative"><a href="product_detail.php?id='.$row[0] .'>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
            <li class="relative"><a href="product_detail.php?id='.$row[0] .'"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i>Details</a></li>

     <li class="relative"><a href="product_detail.php?id='.$row[0] .'" ><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>


        
            </ul>
    </div>
    <h3 class="title-product clearfix full-width title-hover-black"><a href="product_detail.php?id='. $row[0] .'">'.$row[1].'</a></h3>
    <p class="clearfix price-product"><span class="price-old">

     '.$oldprice.'</span> Rs. '.$currectprice.'</p>
  
</div>

      ';
}

$page_query = "SELECT * FROM product WHERE stock>0";

if (isset($_POST["category"])) {
    $category = implode("','", $_POST["category"]);
    $page_query .= "
    AND category IN('" . $category . "')
		";
}

if (isset($_POST["pacategory"])) {
    $pacategory = implode("','", $_POST["pacategory"]);
    $page_query .= "
    AND parent_category IN('" .$pacategory. "')
		";
}


$page_result = mysqli_query($con, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record_per_page);

$output .= "   </div>

<div class='col-md-12 row'>
    <div class='pagging relative'>
        <ul>
  ";
$first=1;
$output .= "
 <li class='page-item pagination_link' id='".$first."'>
 <a class='page-link page-numbers' href='#' aria-label='Next'>
     <i class='fa fa-angle-left'></i>
 </a>
</li>  
               
	  ";

for($i=1; $i<=$total_pages; $i++)
{
    $output .= "
      <li class='page-item pagination_link' id='".$i."'><a class='page-link'  page-numbers href='#'>".$i."</a></li>";

}
$output .= "
  <li class='page-item pagination_link' id='".$total_pages."'>
  <a class='page-link page-numbers' href='#' aria-label='Next'>
      <i class='fa fa-angle-right'></i>
  </a>
</li>
   " ;

$output .= "           </ul>
  </div>
</div>";

echo $output;

?>