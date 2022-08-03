<div >
  <h3>Category Items</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Category Name</th>
      </tr>
    </thead>
    <?php
      include_once "./config/dbconnect.php";
      $sql="SELECT * from category";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
          $categoryID = $row["category_id"];
          $categoryName = $row["category_name"];

        echo "<tr>
          <td>$count</td>
          <td>$categoryName</td>
        </tr>";
            $count=$count+1;
            
          }
        }
      ?>
      
  </table>
  <td><button class="btn btn-secondary" style="height:40px">Add category</button></td>
</div>
