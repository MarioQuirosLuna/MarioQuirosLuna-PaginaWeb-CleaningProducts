<?php

    session_start();
    $_SESSION['userName'] = $_POST['nameUserActive'];
    $_SESSION['role'] = $_POST['role'];
   
?>