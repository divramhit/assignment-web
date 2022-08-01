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
                    include_once("db.php");
                    $stmt = "";
                    if (isset($_SESSION["user"])){
                        $id = $_SESSION["user"]["ClientID"];
                    }
                    $stmt = $conn -> prepare("SELECT * FROM order_details INNER JOIN ordertable ON order_details.order_id = ordertable.order_id INNER JOIN product ON order_details.product_id = product.ProductID WHERE ordertable.clientID = $id");
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
                                                <input id = 'remove-item-$detailId' class='item-remove-btn' type='button' value='Remove'>
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
                            <div class="subtotal-display">
                            <?php
                                include_once("db.php");
                                $stmt = "";
                                if (isset($_SESSION["user"])){
                                    $id = $_SESSION["user"]["ClientID"];
                                }
                                $stmt = $conn -> prepare("SELECT * FROM order_details INNER JOIN ordertable ON order_details.order_id = ordertable.order_id INNER JOIN product ON order_details.product_id = product.ProductID WHERE ordertable.clientID = $id");
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
                                <input type="button" value="Remove All">
                            </div>
                        </li>
                        <li>
                            <div class="checkout-btn">
                                <input type="button" value="Checkout">
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
            // let request = new XMLHttpRequest();

            // request.onload = () => {
            //     if (request.status === 200) {
            //         let responseData = request.responseText;
            //         //alert(responseData)
            //         location.replace("cart.php");
            //     }
            //     else {
            //         alert(request.responseText);
            //     }
            // };

            // request.open("POST", "updateCartHandler.php");
            // request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // request.send("cartid=" + cartid + "&quantity=" + quantity + "&action=" + "update");
            action = "update";
            $.ajax({
              type: "POST",
              url: 'updateCartHandler.php',
              data: {"detailID": detailID, "quantity": quantity, "action": action},
              success: function(response)
              {
                  // var jsonData = JSON.parse(response);
                //   var jsonData = response;
                //   alert(response.quantity);

                $.each(JSON.stringify(response), function(i, element){
                    // var $itemTotal = $("#cart-item-card-price-" + element.detailID);
                    console.log(element.detailID);
                    // $itemTotal.replaceWith('Rs ' + element.quantity);
                });

                
                    
              },
              error: function(response)
              {
                alert("Invalid Credentials");
              }
            });

        }
</script>
</html>