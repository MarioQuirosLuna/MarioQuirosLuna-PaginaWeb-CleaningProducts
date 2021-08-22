<?php

    class ProductModel {
        
        protected $db;
        
        public function __construct() {
            require 'libs/SPDO.php';
            $this->db= SPDO::singleton();
        }

        public function addPromotion($nameProduct, $discount, $dateStart, $dateEnd){
            $consult = $this->db->prepare("CALL addPromotion('".$nameProduct."',".$discount.",'".$dateStart."','".$dateEnd."')");
            $consult->execute();
            $consult->closeCursor();    
        }

        public function addProduct($name,$price,$description,$img,$category){
            $consult = $this->db->prepare("CALL addProduct('".$name."',".$price.",'".$description."','".$img."','".$category."')");
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

        public function getCantStock($name){
            $consult = $this->db->prepare("CALL getCantProductoStock('".$name."')");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }

        public function getProductsAscendant(){
            $consult = $this->db->prepare("CALL getProductsAscendant()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function getProductsDescendant(){
            $consult = $this->db->prepare("CALL getProductsDescendant()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
    }

?>