<?php
include_once('application_top.php');
    //Remove all session variables
    session_unset();

    //Destroy the session
    session_destroy();
    
    header("Location:".PROJECT_ROOT_DIR."login.php");
    exit();
?>
