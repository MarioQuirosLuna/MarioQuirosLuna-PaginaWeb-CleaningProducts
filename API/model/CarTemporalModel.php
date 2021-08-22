<?php

    class CarTemporalModel {
        
        protected $db;
        
        public function __construct() {
            require 'libs/SPDO.php';
            $this->db= SPDO::singleton();
        }

        public function addItemTemporalCar($nameClient, $nameProduct){
            $consult = $this->db->prepare("CALL addItemTemporalCar('".$nameClient."','".$nameProduct."')");
            $consult->execute();
            $consult->closeCursor();
        }
        public function deleteItemTemporalCar($nameClient, $nameProduct){
            $consult = $this->db->prepare("CALL deleteItemCartShop('".$nameClient."','".$nameProduct."')");
            $consult->execute();
            $consult->closeCursor();
        }
        public function getTemporalCar($nameClient){
            $consult = $this->db->prepare("CALL getTemporalCar('".$nameClient."')");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function getTotalPricePurchaseNameClient($nameClient){
            $consult = $this->db->prepare("CALL getDataTotalPricePurchase('".$nameClient."')");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function getCantCartShop($nameClient){
            $consult = $this->db->prepare("CALL getCantCartShop('".$nameClient."')");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function getDiscountClient($nameClient){
            $consult = $this->db->prepare("CALL getDiscountClient('".$nameClient."')");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
    }

?>