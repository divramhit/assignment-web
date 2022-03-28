<?php
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $db = "mll";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $db);

    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
        return false;
    }
?>
