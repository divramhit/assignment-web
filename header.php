<?php
function commonHead($title, $pageName) {
  echo '<meta charset="UTF-8">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
  echo '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
  echo '<link rel="stylesheet" href="style.css">';
  if ($pageName != "none"){
    $pN = $pageName . ".css";
    echo "<link rel='stylesheet' href='$pN'>";
  }
  echo "<title>$title</title>";
  echo '<script src= "index.js" defer></script>';
  echo '<script src= "utility.js" defer></script>';
  echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>';
}
echo '';
echo '';
echo '<!-- Primary Header -->';
echo '<header class = "primary-header">';
echo '<ul class = "logo-and-name">';
echo '<li>';
echo '<div class="logo">';
echo '<a href="index.php">';
echo '<img src="assets/logo-without-letters.svg" alt="">';
echo '</a>';
echo '</div>';
echo '</li>';
echo '<li>';
echo '<a href="index.php"><h4>MICRO LOGICS LTD</h4></a>';
echo '</li>';
echo '</ul>';
echo '';
echo '<input type="text" id="searchbar_input" class="searchbar_input" placeholder="Search products" name="search" onkeypress="handle(event)">';
echo '';
echo '<button class = "mobile-nav-toggle" aria-controls = "nav-links" aria-expanded = "false">';
echo '<span class="sr-only">Menu</span>';
echo '</button>';
echo '';
echo '<nav class="upper-navigation">';
echo '<ul id = "nav-links" data-visible = "false" class = "nav-links">';
if (isset($_SESSION["user"])){
  $fname = $_SESSION["user"]["fname"];
  $username = "Hi " . $fname . " !";
  echo '<li>';
  echo "<a href='#'><div>$username</div></a>";
  echo '</li>';
  echo '<li>';
  echo '<a href="logout.php"><div>Log Out</div></a>';
  echo '</li>';
  echo '<li>';
  echo '<a href="cart.php"><div><div class="cart-icon"></div></div></a>';
}
else{
  echo '<li>';
  echo '<a href="login.php"><div>Login</div></a>';
  echo '</li>';
  echo '<li>';
  echo '<a href="signup.php"><div>Sign Up</div></a>';
  echo '</li>';
  echo '<li>';
  echo '<a href="#"><div><div class="cart-icon"></div></div></a>';
}
echo '</li>';
echo '</ul>';
echo '</nav>';
echo '</header>';
echo '<!-- End of Primary Header -->';
echo '';
echo '<!-- Secondary Header -->';
echo '<header class= "secondary_header">';
echo '<nav class="lower-navigation">';
echo '<ul id = "sub-nav-links" data-visible = "false" class = "sub-nav-links">';
echo '<li>';
echo '<a id="index.php" href="index.php"><div class="sub-nav-links-active" >Home</div></a>';
echo '</li>';
echo '<li>';
echo '<a id="products.php" href="products.php"><div aria-expanded="false">Products<span class="dropdown_icon"></span></div></a>';
echo '</li>';
// echo '<li>';
// echo '<a id="about.php" href="about.php"><div>About</div></a>';
// echo '</li>';
// echo '<li>';
// echo '<a id="favourites.php" href="favourites.php"><div>Favourites</div></a>';
// echo '</li>';
// echo '<li>';
// echo '<a id="contact.php" href="contact.php"><div>Contact</div></a>';
// echo '</li>';
echo '</ul>';
echo '</header>';
echo '<!-- End of Secondary Header -->';
echo '<!-- Side Bar -->';
echo '<nav class= "side-bar-nav">';
echo '<ul id="side-nav-links" class="side-nav-links" data-visible="false">';
echo '<li>';
echo '<a href="login.php"><div>Login</div></a>';
echo '</li>';
echo '<li>';
echo '<a href="signup.php"><div>Sign Up</div></a>';
echo '</li>';
echo '<li>';
echo '<a href="index.php"><div>Home</div></a>';
echo '</li>';
echo '<li>';
echo '<a href="products.php"><div aria-expanded="false">Products<span class="dropdown_icon"></span></div></a>';
echo '</li>';
echo '<li>';
echo '<a href="#"><div>About</div></a>';
echo '</li>';
echo '<li>';
echo '<a href="#"><div>Favourites</div></a>';
echo '</li>';
echo '<li>';
echo '<a href="#"><div>Contact</div></a>';
echo '</li>';
echo '</ul>';
echo '</nav>';
echo '<!-- End of Side Bar -->';
echo '<!-- End of Header -->';
echo '';
?>
