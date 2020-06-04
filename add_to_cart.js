$(document).on('click','.add_to_cart_btn',function(e){
   
 
    var product_id = $(this).attr("id");
    var product_size = $('#size'+product_id).val();
    var product_state = $('#state'+product_id).val();

    var product_image = $('#image'+product_id).val();
    var product_stock = $('#stock'+product_id).val();
    var product_name = $('#name'+product_id).val();
    var product_price = $('#price'+product_id).val();
    // var product_category = $('#category'+product_id).val();
    var product_parentcategory = $('#parentcategory'+product_id).val();
    var product_quantity = $('#quantity'+product_id).val();
    
    
    var product_sellprice = $('#sellprice'+product_id).val();
    var action = "add";
    var iNum = parseInt(product_stock);
    var iNum2 = parseInt(product_quantity);
    var cartquantity=$('#cartquantity'+product_id).val();
    var numcart=parseInt(cartquantity);
    console.log(product_quantity);
    console.log(product_stock);
    //alert(numcart);
    var nwevalue=numcart+iNum2;
    $('#cartquantity'+product_id).val(nwevalue);
    //alert(nwevalue);
    if(iNum2  > iNum || nwevalue>iNum){
        $("#stockalert").show();
     $("#stockalert").val("Product Quantity out of Stock Range!");
     setTimeout(function() { $("#stockalert").hide(); }, 5000);

    }
   else {
        if (product_quantity > 0) {

            $.ajax({

                url: "cart_action.php",
                method: "POST",
                dataType: "json",

                data: {
                    product_image: product_image,
                    product_id: product_id,
                    product_size: product_size,
                    product_state: product_state,
                    product_name: product_name,
                    product_price: product_price,
                    // product_category: product_category,
                    product_parentcategory: product_parentcategory,
                    product_quantity: product_quantity,
                    product_sellprice: product_sellprice,
                    product_stock:product_stock,
                    action: action

                },
                success: function (data) {
                    $("#cartquantity").val(nwevalue);
                    $("#cartalert").show();
                    setTimeout(function() { $("#cartalert").hide(); }, 5000);
                 
                    load_cart_data();

                  
                }
            });


        }
        else {
            alert("Please Enter Number of Quantity")
        }
    }
});
$(document).on('click', '.delete', function(){
    
    var product_id = $(this).attr("id");
    
    var state = $(this).attr("data-state");
    var size = $(this).attr("data-size");
    var quantity=$(this).attr("data-id");
    var action = "remove";
   
    if(confirm("Are you sure you want to remove this product?"))
    {
        $.ajax({
			  async: false,
            url:"cart_action.php",
            method:"POST",
            dataType:"json",
            data:{product_id:product_id,size:size,state:state, action:action},
            success:function(data){
            $('#shop_table').html(data);
            }
        });
        location.reload(true);
    }
    else
    {
        return false;
    }
});