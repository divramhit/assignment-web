<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "mll2";

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}

?>
