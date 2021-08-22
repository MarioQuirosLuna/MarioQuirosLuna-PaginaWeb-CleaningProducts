<?php
    session_start();
    if(isset($_SESSION['userName']) && isset($_GET['closeSession'])){
        unset($_SESSION['userName']);
        session_unset();
        session_destroy();
    }
?>