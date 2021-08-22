<?php

    class LoginController {
        public function __construct() {
            $this->view = new View();
        }
        
        public function showLogin(){
            $this->view->show("loginView.php", null);
        }
        public function showNewAccount(){
            $this->view->show("newAccountView.php", null);
        }
    } 
?>