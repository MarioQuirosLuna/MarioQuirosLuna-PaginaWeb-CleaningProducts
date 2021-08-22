<?php

    class ProductFavModel {
        
        protected $db;
        
        public function __construct() {
            require 'libs/SPDO.php';
            $this->db= SPDO::singleton();
        }

        public function addProductFav($nameClient, $nameProduct){
            $consultCant = $this->db->prepare("CALL getItemFav('".$nameClient."','".$nameProduct."')");
            $consultCant->execute();
            $result = $consultCant->fetchAll();
            $consultCant->closeCursor();
            if($result == []){
                $consult = $this->db->prepare("CALL addItemFav('".$nameClient."','".$nameProduct."')");
                $consult->execute();
                $consult->closeCursor();
                return 'ADD';
            }else{
                return $result;
            }
        }

        public function deleteItemFav($nameClient, $nameProduct){
            $consult = $this->db->prepare("CALL deleteItemFav('".$nameClient."','".$nameProduct."')");
            $consult->execute();
            $consult->closeCursor();
        }

    }

?>