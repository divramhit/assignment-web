<?php

function commonLogin($title)
{
  echo '<meta charset="UTF-8">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
  echo '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
  echo '<link rel="stylesheet" href="style.css">';
  echo '<link rel="stylesheet" href="login_signup.css">';
  echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>';
  echo "<title>$title</title>";
}

function outputHeader($name, $pagelink){
  echo '<header class="login-header">';
  echo '<ul class="login-nav">';
  $pL = $pagelink . ".php";
  echo "<li><a href='$pL'>$name</a></li>";
  echo '<li><a href="index.php">Home</a></li>';
  echo '<li><a href="admin/AdminIndex.php">Admin</a></li>';
  echo '</ul>';
  echo '</header>';
}
?>
