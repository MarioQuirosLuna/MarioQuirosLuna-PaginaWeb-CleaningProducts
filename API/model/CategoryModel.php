<?php

    class CategoryModel {
        
        protected $db;
        
        public function __construct() {
            require 'libs/SPDO.php';
            $this->db= SPDO::singleton();
        }

        public function addCategory($nameCategory){
            $consult = $this->db->prepare("CALL addCategory('".$nameCategory."')");
            $consult->execute();
            $consult->closeCursor();
        }
        public function getCategories(){
            $consult = $this->db->prepare("CALL getCategories()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
    }

?>