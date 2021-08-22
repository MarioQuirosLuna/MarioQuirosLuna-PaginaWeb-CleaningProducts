<?php

    class AdminHomeModel {

        protected $db;
        
        public function __construct() {
            require 'libs/SPDO.php';
            $this->db= SPDO::singleton();
        }
        public function addNewAdmin($name,$password){
            $consult = $this->db->prepare("CALL addUser('".$name."','".$password."',1)");
            $consult->execute();
            $consult->closeCursor();
        }
        public function getAdmins(){
            $consult = $this->db->prepare("CALL getAdmins()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function deleteAdmin($idAdmin){
            $consult = $this->db->prepare("CALL deleteAdmin(".$idAdmin.")");
            $consult->execute();
            $consult->closeCursor();
        }
        public function getCantUsersAdminDBQuery(){
            $consult = $this->db->prepare("CALL getCantUsers()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
    }
?>