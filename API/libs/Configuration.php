<?php
    require 'libs/Config.php';
    $config= Config::singleton();
    $config->set('controllerFolder','controller/');
    $config->set('modelFolder', 'model/');
    $config->set('viewFolder', 'view/');
    
    $config->set('dbhost', '127.0.0.1:3306');
    $config->set('dbname', 'if4001_proyecto2_b76090');
    $config->set('dbuser', 'root');
    $config->set('dbpass', '********');
    
?>