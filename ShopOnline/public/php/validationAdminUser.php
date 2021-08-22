<?php 
    //if not is admin redirect
    if(!headers_sent() && $_SESSION['role'] != 1){
        header("Location: index.php");
        die();
    }
?>