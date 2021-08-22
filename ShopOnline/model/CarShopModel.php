<?php
    class CarShopModel {

        private $url;
        private $url_API;
        
        public function __construct() {
            $this->url = 'http://127.0.0.1:8080/ShopOnline-MarioQuirosL-B76090-Semestre1-2021/';
            $this->url_API = 'http://127.0.0.1:8080/API-Rest-MarioQuirosL-B76090-Semestre1-2021/API-REST.php';
        }
        public function getTemporalCar($nameClient){
            $data = json_decode(file_get_contents($this->url_API.'?nameClient='.$nameClient),true);
            return $data;
        }
        public function getDataTotalPricePurchase($nameClient){
            $data = json_decode(file_get_contents($this->url_API.'?getTotalPricePurchaseNameClient='.$nameClient),true);
            return $data;
        }
        public function getCantCartShop($nameClient){
            $data = json_decode(file_get_contents($this->url_API.'?getCantCartShop='.$nameClient),true);
            return $data;
        }
        public function getDiscountClient($nameClient){
            $data = json_decode(file_get_contents($this->url_API.'?getDiscountClient='.$nameClient),true);
            return $data;
        }
    }
?>