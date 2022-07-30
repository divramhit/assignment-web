<div >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No.</th>
        <th>Product Image</th>
        <th>Brand</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Customer</th>
        <th>Order Date</th>
        <th>Payment Method</th>
        <th>Order Status</th>
        <th>Payment Status</th>

     </tr>
    </thead>
     <?php
      include_once "./config/dbconnect.php";
      $sql="SELECT * from ordertable,client,order_details,product WHERE ordertable.clientID=client.clientID AND
      product.ProductID=order_details.product_id";
    //  $sql="SELECT * from product v, order_details d where v.ProductID=d.product_id AND
      //d.order_id=$ID";
      $result=$conn-> query($sql);

      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["order_id"]?></td>
          <td><img height='100px' src='<?=$row["imgpath"]?>'></td>
          <td><?=$row["Prod_Brand"]?></td>
          <td><?=$row["quantity"]?></td>
          <td><?=$row["price"]?></td>
          <td><?=$row["fname"]?> <?=$row["lname"]?></td>
          <td><?=$row["order_date"]?></td>
          <td><?=$row["pay_method"]?></td>
           <?php
                if($row["order_status"]==0){

            ?>
                <td><button class="btn btn-danger" >Cancel </button></td>
            <?php

                }else{
            ?>
                <td><button class="btn btn-success" >Confirm</button></td>

            <?php
            }
                if($row["pay_status"]==0){
            ?>
                <td><button class="btn btn-danger"  >Unpaid</button></td>
            <?php

            }else if($row["pay_status"]==1){
            ?>
                <td><button class="btn btn-success" >Paid </button></td>
            <?php
                }
            ?>
        </tr>
    <?php

        }
      }
    ?>

  </table>

</div>
