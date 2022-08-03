<div >
  <h2>Product Items</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Product Image</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Product Description</th>
        <th class="text-center">Category Name</th>
        <th class="text-center">Price</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "./config/dbconnect.php";
      $sql="SELECT * from product, category WHERE product.category_id=category.category_id AND product.DELETED_FLAG = 0";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
          $prod_id = $row["ProductID"];
          $prod_brand = $row["Prod_Brand"];
          $prod_img = $row["imgpath"];
          $prod_desc = $row["Prod_Desc"];
          $prod_category = $row["category_name"];
          $prod_price = $row["ListPrice"];
    echo "
    <tr>
      <td>$count</td>
      <td><img height='100px' src='$prod_img'></td>
      <td>$prod_brand</td>
      <td>$prod_desc</td>
      <td>$prod_category</td>
      <td>$prod_price</td>
      <td><button class='btn btn-danger' style='height:40px' onclick='deleteProduct($prod_id);'>Delete</button></td>
      </tr>
      ";
            $count=$count+1;
          }
        }
      ?>
  </table>
</div>
