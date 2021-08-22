<?php

    class UserModel {
        
        protected $db;
        
        public function __construct() {
            require 'libs/SPDO.php';
            $this->db= SPDO::singleton();
        }
        
        public function getUsers() {
            $consult = $this->db->prepare("CALL getUsers();");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }

        public function getCantUsers() {
            $consult = $this->db->prepare("CALL getCantUsers();");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }

        public function getUser($name, $password){
            $consult = $this->db->prepare("CALL getUser('".$name."','".$password."')");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }

        public function addUserClient($name, $lastname, $privilege,  $password, $age, $gender, $address){
            $consult = $this->db->prepare("CALL addUserClient('".$name."','".$lastname."',".$privilege.",'".$password."',".$age.",'".$gender."','".$address."')");
            $consult->execute();
            $consult->closeCursor();
        }

        public function addUserAdmin($name, $password, $privilege){
            $consult = $this->db->prepare("CALL addUser('".$name."','".$password."',".$privilege.")");
            $consult->execute();
            $consult->closeCursor();
        }
        
    }

?>