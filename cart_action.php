<?php

session_start();
if (isset($_POST["product_id"])) {

    if ($_POST["action"] == "add") {
        if (isset($_SESSION["shoping_cart"])) {
            $is_available = 0;
            $state=0;

            foreach ($_SESSION["shoping_cart"] as $keys => $values) {
                if($_SESSION["shoping_cart"][$keys]['product_size'] == $_POST["product_size"] && $_SESSION["shoping_cart"][$keys]['product_state'] == $_POST["product_state"]){
                       
               
                if ($_SESSION["shoping_cart"][$keys]['product_id'] == $_POST["product_id"]) {
                    
                  
                    $is_available++;
                    $_SESSION["shoping_cart"][$keys]['product_quantity'] = $_SESSION["shoping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
                }
                }
            
            }
            if ($is_available < 1) {
                $item_array = array(
          
                    'product_id' => $_POST["product_id"],
                    'product_image' => $_POST["product_image"],
                    'product_name' => $_POST["product_name"],
                    'product_price' => $_POST["product_price"],
                    'product_size' => $_POST["product_size"],
                    'product_state' => $_POST["product_state"],
                    // 'product_category' => $_POST["product_category"],
                    'product_size' => $_POST["product_size"],
                    'product_sellprice' => $_POST["product_sellprice"],
                    'product_parentcategory' => $_POST["product_parentcategory"],
                    'product_stock'=>$_POST['product_stock'],
                    'product_quantity' => $_POST["product_quantity"]
                );
                $_SESSION["shoping_cart"][] = $item_array;
            }
        } else {
            $item_array = array(
          
                    'product_id' => $_POST["product_id"],
                    'product_image' => $_POST["product_image"],
          'product_name' => $_POST["product_name"],
        //   'product_category' => $_POST["product_category"],
          'product_parentcategory' => $_POST["product_parentcategory"],
          'product_size' => $_POST["product_size"],
          'product_state' => $_POST["product_state"],
                    'product_price' => $_POST["product_price"],
                    'product_sellprice' => $_POST["product_sellprice"],
                    'product_size' => $_POST["product_size"],
                'product_stock'=>$_POST['product_stock'],
                    'product_quantity' => $_POST["product_quantity"]
            );
            $_SESSION["shoping_cart"][] = $item_array;
        }
    }
  
  if ($_POST["action"] == "remove") {
        foreach ($_SESSION["shoping_cart"] as $keys => $values) {
            if ($values["product_id"] == $_POST["product_id"] && $values["product_state"] == $_POST["state"] && $values["product_size"] == $_POST["size"]) {
                unset($_SESSION["shoping_cart"][$keys]);
            }
        }
    
    }
  
    if ($_POST["action"] == "clearall"){
        unset($_SESSION["shoping_cart"]);  
        }
    
  
  
  
    $output = array(
        
        'cart_item' => count($_SESSION["shoping_cart"])
    );
    echo json_encode($output);
  }
  
?>