<?php 
    if(!headers_sent() && !isset($_SESSION['userName'])){
        header("Location: index.php");
        die();
    }
?>