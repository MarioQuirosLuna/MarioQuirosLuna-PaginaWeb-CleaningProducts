<?php

    class CategoriesAdminModel {

        protected $db;
        
        public function __construct() {
            require 'libs/SPDO.php';
            $this->db= SPDO::singleton();
        }
        public function addNewCategory($nameCategory){
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
        public function updateCategory(){

        }
        public function deleteCategory($idCategory){
            $consult = $this->db->prepare("CALL deleteCategory(".$idCategory.")");
            $consult->execute();
            $consult->closeCursor();
        }
    }
?>