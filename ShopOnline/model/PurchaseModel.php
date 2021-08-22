<?php
    class PurchaseModel {

        private $url;
        private $url_API;
        
        public function __construct() {
            $this->url = 'http://127.0.0.1:8080/ShopOnline-MarioQuirosL-B76090-Semestre1-2021/';
            $this->url_API = 'http://127.0.0.1:8080/API-Rest-MarioQuirosL-B76090-Semestre1-2021/API-REST.php';
        }

        public function getHistoryClient($nameClient){
            $data = json_decode(file_get_contents($this->url_API.'?getPurchaseHistoryClient='.$nameClient),true);
            return $data;
        }

        public function getPurchaseHistory(){
            $data = json_decode(file_get_contents($this->url_API.'?getPurchaseHistory'),true);
            return $data;
        }

        public function getPurchaseHistoryAscendant(){
            $data = json_decode(file_get_contents($this->url_API.'?getPurchaseHistoryAscendant'),true);
            return $data;
        }

        public function getPurchaseHistoryDescendant(){
            $data = json_decode(file_get_contents($this->url_API.'?getPurchaseHistoryDescendant'),true);
            return $data;
        }

        public function getCountCantPurchases(){
            $data = json_decode(file_get_contents($this->url_API.'?getCountCantPurchases'),true);
            return $data;
        }
        public function getProfitsSales(){
            $data = json_decode(file_get_contents($this->url_API.'?getProfitsSales'),true);
            return $data;
        }
        public function getMonthsPurchases(){
            $data = json_decode(file_get_contents($this->url_API.'?getMonthsPurchases'),true);
            return $data;
        }
        public function getDaysPurchases(){
            $data = json_decode(file_get_contents($this->url_API.'?getDaysPurchases'),true);
            return $data;
        }

        public function getPurchaseHistoryMonth($month){
            $data = json_decode(file_get_contents($this->url_API.'?getPurchaseHistoryMonth='.$month),true);
            return $data;
        }
        public function getPurchaseHistoryDay($day){
            $data = json_decode(file_get_contents($this->url_API.'?getPurchaseHistoryDay='.$day),true);
            return $data;
        }
    }
?>