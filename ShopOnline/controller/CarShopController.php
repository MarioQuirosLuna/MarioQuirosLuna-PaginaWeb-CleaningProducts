<?php

    class CarShopController {
        public function __construct() {
            require 'model/CarShopModel.php';
            $this->view = new View();
        }

        public function showShopCar(){
            $this->view->show("carShopView.php", null);
        }

        
        public function getCantCartShop(){
            $model = new CarShopModel();
            session_start();

            $data['data'] = $model->getCantCartShop($_SESSION['userName']);
            $this->view->convert($data['data']);

            $list = 0;
            if($data['data']){
                foreach($data['data'] as $item){
                    $list = $item[0];
                }
            }
            
            echo $list;
        }

        public function loadTemporalCar(){
            $model = new CarShopModel();
            session_start();
            $data['data'] = $model->getTemporalCar($_SESSION['userName']);
            $this->view->convert($data['data']);

            $modeling='';
            if($data['data']){
                foreach($data['data'] as $item){
                    if($item[5] == null){
                        $discount = 0;
                    }else{
                        $discount = $item[5];
                    }
                    $modeling .='<tr class="text-white">
                                    <th scope="row">'.$item[2].'</th>
                                        <td>'.$item[3].'</td>
                                        <td><span><img src="./public/assets/icons/tag.svg" alt="card" width="16" height="16" /></span> $'.$item[4].'</td>
                                        <td>'.$discount.'%</td>
                                        <td><a class="btn"><img class="deleteItemCarShop" nameItem="'.$item[3].'"src="./public/assets/icons/trash-fill.svg" alt="trash" width="16" height="16" /></a></td>
                                </tr>';
                }
            }
            echo $modeling;
        }

        public function loadDataTotalPricePurchase(){
            $model = new CarShopModel();
            session_start();
            
            $data['data'] = $model->getDataTotalPricePurchase($_SESSION['userName']);
            $this->view->convert($data['data']);

            $list = 0;

            if($data['data']){
                foreach($data['data'] as $item){
                    $list = $item[0];
                }
            }
            
            echo $list;
        }

        public function getDiscountClient(){
            $model = new CarShopModel();
            session_start();
            
            $data['data'] = $model->getDiscountClient($_SESSION['userName']);
            $this->view->convert($data['data']);

            $list = 0;

            if($data['data']){
                foreach($data['data'] as $item){
                    $list = $item[0];
                }
            }
            
            echo $list;
        }

    } 
?>