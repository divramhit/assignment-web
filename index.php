<!DOCTYPE html>
<?php include_once("header.php"); ?>

<html lang="en">
  <head>
    <?php commonHead("Micro Logic Ltd", "index") ?>
    <link rel="stylesheet"  href="src/css/lightslider.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="src/js/lightslider.js"></script>
  </head>
  <body class = "home">
    <div class="home-container">
      <div id="banners" class="banners">

        <ul id="banner-slider" class="banner-slider">
                <li>
                    <div><img src="assets/banner1.jpeg" alt="Image cannot be displayed"></div>
                </li>
                <li>
                    <div><img src="assets/banner2.jpg" alt="Image cannot be displayed"></div>
                </li>
                <li>
                    <div><img src="assets/banner3.jpg" alt="Image cannot be displayed"></div>
                </li>
                <li>
                    <div><img src="assets/banner4.jpg" alt="Image cannot be displayed"></div>
                </li>
                <li>
                    <div><img src="assets/banner5.webp" alt="Image cannot be displayed"></div>
                </li>
                <li>
                    <div><img src="assets/banner6.jpg" alt="Image cannot be displayed"></div>
                </li>
                <li>
                  <div><video src="assets/bannervid1.mp4" muted autoplay loop>Doesn't Support Video</video></div>
                </li>
            </ul>
      </div>

      <div id="brands" class="brands">
        <div>
          Our Brands
        </div>
        <ul id="content-slider" class="content-slider">
                <li>
                    <div><img src="assets/banner1.jpeg" alt="Image cannot be displayed"></div>
                </li>
                <li>
                    <div><img src="assets/banner1.jpeg" alt="Image cannot be displayed"></div>
                </li>
                <li>
                    <div><img src="assets/banner1.jpeg" alt="Image cannot be displayed"></div>
                </li>
                <li>
                    <div><img src="assets/banner1.jpeg" alt="Image cannot be displayed"></div>
                </li>
                <li>
                    <div><img src="assets/banner1.jpeg" alt="Image cannot be displayed"></div>
                </li>
                <li>
                    <div><img src="assets/banner1.jpeg" alt="Image cannot be displayed"></div>
                </li>
            </ul>
      </div>
      <!-- <div class="item">
            <ul id="content-slider" class="content-slider">
                <li>
                    <h3>1</h3>
                </li>
                <li>
                    <h3>2</h3>
                </li>
                <li>
                    <h3>3</h3>
                </li>
                <li>
                    <h3>4</h3>
                </li>
                <li>
                    <h3>5</h3>
                </li>
                <li>
                    <h3>6</h3>
                </li>
            </ul>
        </div> -->
      <div id="product-sales" class="product-sales">product-sales</div>
      <div id="recommended-products" class="recommended-products">recommended-products</div>
    </div>

  </body>
  <!-- End Home Page --->
  <?php include_once("footer.php"); ?>
  <script>
     $(document).ready(function() {
          $("#banner-slider").lightSlider({
              loop:true,
              mode: 'slide',
              speed: 1000,
              keyPress:true,
              auto: true,
              item: 1,
              pause: 10000,
              // pager: false,
              pauseOnHover: true,
              slideMargin: 0
          });

          $("#content-slider").lightSlider({
              loop:true,
              mode: 'slide',
              speed: 1000,
              keyPress:true,
              auto: true,
              item: 1,
              pause: 10000,
              pager: false
          });
    });
  </script>
</html>
