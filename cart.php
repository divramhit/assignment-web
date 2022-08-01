<?php include_once('application_top.php'); ?>
<?php 

if (!isset($_SESSION["user"])){
    header("Location:".PROJECT_ROOT_DIR."login.php");
}

?>
<!DOCTYPE html>
<?php include_once("header.php"); ?>

<html lang="en">
  <head>
    <?php commonHead("Cart", "cart") ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </head>
  <body>
    <div class ="cart-main-container">
        <div class="cart-details-container">
            <div class="cart-items-container">
                <ul class="cart-items-list">
                    <?php
                    $stmt = "";#
                    $id = 0;
                    if (isset($_SESSION["user"])){
                        $id = $_SESSION["user"]["ClientID"];
                    }


                    $orderId  = 0;
                    if( !empty($_SESSION["order"]["order_id"])){
                        $orderId = $_SESSION["order"]["order_id"];
                    }

                    $stmt = $conn -> prepare("SELECT * FROM order_details INNER JOIN ordertable ON order_details.order_id = ordertable.order_id INNER JOIN product ON order_details.product_id = product.ProductID WHERE ordertable.clientID = $id AND ordertable.order_id = ".$orderId);
                    $stmt -> execute();
                    $result = $stmt -> get_result();
                    while($row = $result->fetch_assoc())
                    {
                        $detailId = $row["detail_id"];
                        $productName = $row["Prod_Desc"];
                        $productQuantity = $row["quantity"];
                        $productListPrice = $row["ListPrice"];
                        $imgpath = $row["imgpath"];
                        $itemSubTotal = $productListPrice * $productQuantity;

                        $order_id = $row["order_id"];

                        echo"<li>
                            <div class='cart-item-card'>
                                <div class ='cart-item-image'>
                                    <img src = '$imgpath'>
                                </div>
                                <div class='cart-item-card-details'>
                                    <div class='item-details'>
                                        $productName
                                    </div>
                                    <div class='buttons-container'>
                                        <div class='increment-container'>
                                            <input id='increment-btn-$detailId' class='quantity-btn inc-btn' type='button' value='+'><input id='quantity-display-$detailId' onchange='updateCart($detailId, this.value);' class='quantity-display' type='number' value='$productQuantity'><input id='decrement-btn-$detailId' class='quantity-btn dec-btn' type='button' value='-'>
                                        </div>
                                        <div class='remove-btn-container'>
                                            <div id='remove-btn' class='remove-btn'>
                                                <input id = 'remove-item-$detailId' class='item-remove-btn' type='button' value='Remove' onclick='removeOne($detailId);'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id = 'cart-item-card-price-$detailId' class='cart-item-card-price'>
                                    Rs $itemSubTotal
                                </div>
                            </div>
                        </li>";
                    }   
                    ?>
                </ul>
            </div>
        </div>
        <div class="subtotal-container">
            <div class="subtotal-details-container">
                <h2>Sub Total</h2>
                <div class="subtotal-details">
                    <ul class="subtotal-details-list">
                        <li>
                            <div class="subtotal-display" id='js-subtotal-display' >
                            <?php
                                
                                $stmt = "";
                                if (isset($_SESSION["user"])){
                                    $id = $_SESSION["user"]["ClientID"];
                                }
                                $stmt = $conn -> prepare("SELECT * FROM order_details INNER JOIN ordertable ON order_details.order_id = ordertable.order_id INNER JOIN product ON order_details.product_id = product.ProductID WHERE ordertable.clientID = $id AND order_details.order_id = ".$orderId);
                                $stmt -> execute();
                                $result = $stmt -> get_result();
                                $subtotal = 0;
                                while($row = $result->fetch_assoc())
                                {
                                    $productQuantity = $row["quantity"];
                                    $productListPrice = $row["ListPrice"];
                                    $itemSubTotal = $productListPrice * $productQuantity;
                                    $subtotal = $subtotal + $itemSubTotal;
                                }
                                echo 'Rs '.$subtotal
                            ?>
                            </div>
                        </li>
                        <li>
                            <div id="remove-all-btn" class="remove-all-btn">
                                <input type="button" value="Remove All" onclick='removeAll("<?php echo $order_id; ?>");'>
                            </div>
                        </li>
                        <li>
                            <div class="checkout-btn">
                                <input type="button" value="Checkout">
                                <input type='hidden'  name='order_id' id='js_order_id' value='<?php echo $order_id; ?>' />
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </body>
<script>
    const updateCart = (detailID, quantity) => {          
            action = "update";
            $.ajax({
              type: "POST",
              url: 'updateCartHandler.php',
              data: {"detailID": detailID, "quantity": quantity, "action": action},
              dataType: 'json',
              success: function(response)
              {
                   $('#cart-item-card-price-'+response.detailID).html(response.total_price_display);
                   $('#js-subtotal-display').html(response.cart_total_price_display);                       
                    
              },
              error: function(response)
              {
                alert("Invalid Credentials");
              }
            });

        }


        const removeOne = (detailID) => {      
           
            action = "remove_one";
            $.ajax({
              type: "POST",
              url: 'updateCartHandler.php',
              data: {"detailID": detailID, "action": action},
              dataType: 'json',
              success: function(response)
              {
                     //$('#js-subtotal-display').html(response.cart_total_price_display);   
                     window.location.reload();                       
                    
              },
              error: function(response)
              {
                alert("Invalid Credentials");
              }
            });

        }


        

        const removeAll = (orderId) => {      
           
            action = "remove_all";
            $.ajax({
              type: "POST",
              url: 'updateCartHandler.php',
              data: {"orderId": orderId, "action": action},
              dataType: 'json',
              success: function(response)
              {
                     window.location.reload();           
                    
              },
              error: function(response)
              {
                alert("Invalid Credentials");
              }
            });

        }


</script>
</html>