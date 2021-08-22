<?php

    class ProductAdminModel {

        protected $db;
        
        public function __construct() {
            require 'libs/SPDO.php';
            $this->db= SPDO::singleton();
        }
        public function addProduct($name, $price, $stock, $description, $img, $category){
            $consult = $this->db->prepare("CALL addProduct('".$name."',".$price.",".$stock.",'".$description."','".$img."','".$category."')");
            $consult->execute();
            $consult->closeCursor();
        }

        public function getProducts(){
            $consult = $this->db->prepare("CALL getProducts()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function updateProduct($idProduct, $name, $price, $stock){
            $consult = $this->db->prepare("CALL updateProduct(".$idProduct.",'".$name."',".$price.",".$stock.")");
            $consult->execute();
            $consult->closeCursor();
        }
        public function deleteProduct($idProduct){
            $consult = $this->db->prepare("CALL deleteProduct(".$idProduct.")");
            $consult->execute();
            $consult->closeCursor();
        }
    }
?>