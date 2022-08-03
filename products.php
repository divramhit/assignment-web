<?php include_once('application_top.php'); ?>

<?php


              // generate json file
              $query  = '';
              if(array_key_exists('query',$_GET)){
                $query = urlencode($_GET['query']);
              }
              $urlGen = WEBSITE_URL_HOST.PROJECT_ROOT_DIR.'prodjsongen.php?query='.$query;//.;
              
              $ch = curl_init();
              // set URL and other appropriate options
              curl_setopt($ch, CURLOPT_URL, $urlGen);
              curl_setopt($ch, CURLOPT_HEADER, 0);
              // grab URL and pass it to the browser
              curl_exec($ch);
              // close cURL resource, and free up system resources
              curl_close($ch);
              ////////////////
              
?>

<!DOCTYPE html>
<?php include_once("header.php"); ?>

<html lang="en">
  <head>
    <?php commonHead("Products", "products") ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
                <li><a href="products.php?query=TV & Sound">TV & Sound</a></li>
              </ul>
            </div>
          </div>
          <div class="products-display">
            <ul class="products-display-container">
              <?php


              $prodData = file_get_contents ('products.json');
              $allProducts = json_decode($prodData,1);

              if(!empty( $allProducts)){
                foreach( $allProducts as $k=>$row){
                  $imgpath = $row["imgpath"];
                  $ProductID = $row["ProductID"];
                  echo "<li class='product-card' style='display: flex; flex-direction: column; align-items: center;'><img src='$imgpath'><div style='display: flex; justify-content: center;'><input class = 'add-to-cart-btn' type='button' value='Add to cart' onclick='addCart($ProductID);' /></div></li>";
                }

              }

              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type='text/javascript'>
  const addCart = (productId) => {          
            action = "add_cart";
            $.ajax({
              type: "POST",
              url: 'updateCartHandler.php',
              data: {"productId": productId, "quantity": 1, "action": action},
              dataType: 'json',
              success: function(response)
              {

                if(response.status == 'added'){
                  alert('The product has been added successfully.');
                }   
              },
              error: function(response)
              {
                alert("Invalid Credentials");
              }
            });

        }

        </script>


</body>

<?php include_once("footer.php"); ?>
</html>
