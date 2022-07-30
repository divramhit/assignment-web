<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Username </th>
        <th class="text-center">Address </th>
        <th class="text-center">Email</th>
        <th class="text-center">Joining Date</th>
      </tr>
    </thead>
    <?php
      include_once "./config/dbconnect.php";
      $sql="SELECT * from client";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {

    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["fname"]?> <?=$row["lname"]?></td>
      <td><?=$row["city"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["date_joined"]?></td>
    </tr>
    <?php
            $count=$count+1;

        }
    }
    ?>
  </table>
