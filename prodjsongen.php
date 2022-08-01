<?php 
include_once('application_top.php'); 
              $stmt = "";
              $rows = [];
              if (isset($_GET["query"])) {
                    $queryvalue = $_GET["query"];
                    $sql = "SELECT * FROM product
                            INNER JOIN category ON product.category_id = category.category_id
                            WHERE Prod_Desc LIKE '%$queryvalue%'
                            OR category.category_name LIKE '%$queryvalue%'";
                    $stmt = $conn -> prepare($sql);
              }
              else {
                $stmt = $conn -> prepare("SELECT * FROM product");
              }

              $stmt -> execute();
              $result = $stmt -> get_result();
              while($row = $result->fetch_assoc())
              {
                
$rows[] = $row;

              }
//echo json_encode($rows);
              file_put_contents("products.json",json_encode($rows));

              ?>