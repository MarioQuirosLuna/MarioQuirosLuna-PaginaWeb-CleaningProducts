<?php

    class PurchasesModel {
        
        protected $db;
        
        public function __construct() {
            require 'libs/SPDO.php';
            $this->db= SPDO::singleton();
        }
        
        public function addPurchaseMade($name){
            $consult = $this->db->prepare("CALL addPurchaseMade('".$name."')");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function getPurchaseHistoryClient($name){
            $consult = $this->db->prepare("CALL getPurchaseHistoryClient('".$name."')");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function getPurchaseHistory(){
            $consult = $this->db->prepare("CALL getPurchaseHistory()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function getPurchaseHistoryAscendant(){
            $consult = $this->db->prepare("CALL getPurchaseHistoryAscendant()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function getPurchaseHistoryDescendant(){
            $consult = $this->db->prepare("CALL getPurchaseHistoryDescendant()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function getCountCantPurchases(){
            $consult = $this->db->prepare("CALL getCountCantPurchases()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function getProfitsSales(){
            $consult = $this->db->prepare("CALL getProfitsSales()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
        public function getMonthsPurchases(){
            $consult = $this->db->prepare("CALL getMonthsPurchases()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }

        public function getDaysPurchases(){
            $consult = $this->db->prepare("CALL getDaysPurchases()");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }

        public function getPurchaseHistoryMonth($month){
            $consult = $this->db->prepare("CALL getPurchaseHistoryMonth(".$month.")");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }

        public function getPurchaseHistoryDay($day){
            $consult = $this->db->prepare("CALL getPurchaseHistoryDay(".$day.")");
            $consult->execute();
            $result = $consult->fetchAll();
            $consult->closeCursor();
            return $result;
        }
    }

?>