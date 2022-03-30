<!DOCTYPE html>
<?php include_once("header.php"); ?>

<html lang="en">
  <head>
    <?php commonHead("Products", "products") ?>
  </head>

<body>
  <div class="products-menu">
    <div class="products-container">
      <div class="container-struct">
        <div class= "products-header-container">
          <ul>
            <li class="products-header">All Products</li>
            <li>All Your Choices in One Single Place</li>
          </ul>
        </div>
        <div class="products-categories">
          <div class="categories-container">
            <div>
              <ul >
                <li><a href="products.php?query=Laptop & PCs">Laptops</a></li>
                <li><a href="products.php?query=Computer Hardwares">Computer Parts</a></li>
                <li><a href="products.php?query=Phones">Phones</a></li>
                <li><a href="products.php?query=Games & Consoles">Games & Consoles</a></li>
                <li><a href="products.php?query=Computer Accessories">Accessories</a></li>
              </ul>
            </div>
          </div>
          <div class="products-display">
            <div class="products-display-container">
              <?php
              include_once("db.php");
              $stmt = "";
              if (isset($_GET["query"])) {
                    $queryvalue = $_GET["query"];
                    $sql = "SELECT * FROM product WHERE Prod_Desc LIKE '%$queryvalue%' OR category LIKE '%$queryvalue%'";
                    $stmt = $conn -> prepare($sql);
              }
              else {
                $stmt = $conn -> prepare("SELECT * FROM product");
              }

              $stmt -> execute();
              $result = $stmt -> get_result();
              while($row = $result->fetch_assoc())
              {
                $imgpath = $row["imgpath"];
                echo "<div class='product-card'><img src='$imgpath'></div>";
              }

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

<?php include_once("footer.php"); ?>
</html>
