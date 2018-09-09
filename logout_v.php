<?php
    //to ensure you are using same session
    session_start(); 
    //destroy the session
    session_destroy(); 
    //to redirect back to "index.php" after logging out
    unset($_SESSION['username']);
    header("location:/SPM_Proj/index.html"); 
    exit();
?>