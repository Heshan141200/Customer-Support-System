<?php
    session_start();
    
    session_unset();
    session_destroy();
    
    
    header("Location: \GP SLIIT\HTML\login.php");
    exit();
?>
