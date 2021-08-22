<?php
    class HomeModel {

        private $url;
        private $url_API;
        
        public function __construct() {
            $this->url = 'http://127.0.0.1:8080/ShopOnline-MarioQuirosL-B76090-Semestre1-2021/';
            $this->url_API = 'http://127.0.0.1:8080/API-Rest-MarioQuirosL-B76090-Semestre1-2021/API-REST.php';
        }
        public function getCategories(){
            $data = json_decode(file_get_contents($this->url_API.'?getCategories'),true);
            return $data;
        }
        public function getProducts(){
            $data = json_decode(file_get_contents($this->url_API.'?getProducts'),true);
            return $data;
        }
        public function getProductsOrderPrice($order){
            $data = json_decode(file_get_contents($this->url_API.'?order='.$order),true);
            return $data;
        }
    }
?>