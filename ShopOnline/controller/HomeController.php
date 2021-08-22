<?php

    class HomeController {
        public function __construct() {
            require 'model/HomeModel.php';
            $this->view = new View();
        }
        
        public function showHome(){
            $this->view->show("homeView.php", null);
        }

        public function showPurchaseHistory(){
            $this->view->show("purchaseHistoryView.php",null);
        }

        public function loadCategories(){
            $model = new HomeModel();
            $data['data'] = $model->getCategories();
            $this->view->convert($data['data']);

            $modeling=' <li class="btn category_item m-2 list-group-item d-flex justify-content-between align-items-center" category="All">
                            <div class="col text-center">All</div>
                            <span class="badge standardPurple rounded-pill">*</span>
                        </li>';
            if($data['data']){
                foreach($data['data'] as $item){
                    if(!$item[1]==""){
                        // TODO: implement count categories on db
                        $modeling .= '
                        <li class="btn category_item m-2 list-group-item d-flex justify-content-between align-items-center" category="'.$item[1].'">
                            <div class="col text-center">'.$item[1].'</div>
                            <span class="badge standardPurple rounded-pill">1</span>
                        </li>';
                    }
                }
            }else{
                $modeling='<h5>500 Internal Server Error - Error establishing a database connection</h5>';
            }
            echo $modeling;
        }

        public function loadProductsOrderPrice(){
            $order = $_GET['order'];

            $model = new HomeModel();
            $data['data'] = $model->getProductsOrderPrice($order);
            $this->view->convert($data['data']);

            $modeling='';
            if($data['data']){
                foreach($data['data'] as $item){
                    // TODO: implement count categories on db
                    if($item[9]==null){
                        $discount = 0;
                    }else{
                        $discount = $item[9];
                    }
                    $modeling .= '
                        <div class="col product_item rounded" category="'.$item[6].'">
                            <div class="card h-100">
                                <img class="w-100 rounded" style="height: 25em;" src="./public/assets/img/'.$item[4].'" class="card-img-top" alt="imgProduct">
                                <div class="card-body">
                                    <div class="row justify-content-between" style="min-height: 5em;">
                                        <div class="col">
                                            <h3 class="card-title">'.$item[1].'</h3>
                                        </div>
                                        <div class="col text-end">
                                            <span class="badge bg-success rounded-pill">$'.$item[2].'</span>
                                            <span class="badge bg-danger rounded-pill">-'.$discount.'%</span>
                                        </div>
                                    </div>
                                    <div class="row" style="min-height: 5em;">
                                        <div class="col">
                                            <h5>Category:</h5>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">'.$item[6].'</p>
                                        </div>
                                    </div>
                                    <p class="card-text">'.$item[3].'</p>
                                    <div class="row">
                                        <div class="col">
                                            <h5>Stock:</h5>
                                        </div>
                                        <div class="col text-center">
                                        <span class="badge standardPurple rounded-pill">'.$item[7].'</span>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-start">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a class="btn"><img class="btnAddItemFav" nameItemFav="'.$item[1].'" src="./public/assets/icons/star-yellow.svg" alt="Star" width="32" height="32"></a>
                                                </div>
                                                <div class="col-6">
                                                    <span class="badge bg-warning rounded-pill">'.$item[8].'</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <a class="btn"><img class="btnDeleteItemFav" nameItemNotFav="'.$item[1].'" src="./public/assets/icons/hand-thumbs-down.svg" alt="dislike" width="32" height="32"></a>
                                        </div>
                                        <div class="col text-end">
                                            <a class="btn"><img class="btnAddItemCart" nameItem="'.$item[1].'" src="./public/assets/icons/bag-plus.svg" alt="bag" width="32" height="32"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            }else{
                $modeling='<h5>500 Internal Server Error - Error establishing a database connection</h5>';
            }
            echo $modeling;
        }

        public function loadProducts(){
            $model = new HomeModel();
            $data['data'] = $model->getProducts();
            $this->view->convert($data['data']);

            $modeling='';
            if($data['data']){
                foreach($data['data'] as $item){
                    // TODO: implement count categories on db
                    if($item[9]==null){
                        $discount = 0;
                    }else{
                        $discount = $item[9];
                    }
                    $modeling .= '
                        <div class="col product_item rounded" category="'.$item[6].'">
                            <div class="card h-100">
                                <img class="w-100 rounded" style="height: 25em;" src="./public/assets/img/'.$item[4].'" class="card-img-top" alt="imgProduct">
                                <div class="card-body">
                                    <div class="row justify-content-between" style="min-height: 5em;">
                                        <div class="col">
                                            <h3 class="card-title">'.$item[1].'</h3>
                                        </div>
                                        <div class="col text-end">
                                            <span class="badge bg-success rounded-pill">$'.$item[2].'</span>
                                            <span class="badge bg-danger rounded-pill">-'.$discount.'%</span>
                                        </div>
                                    </div>
                                    <div class="row" style="min-height: 5em;">
                                        <div class="col">
                                            <h5>Category:</h5>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">'.$item[6].'</p>
                                        </div>
                                    </div>
                                    <p class="card-text">'.$item[3].'</p>
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <h5>Stock:</h5>
                                        </div>
                                        <div class="col text-start">
                                        <span class="badge standardPurple rounded-pill">'.$item[7].'</span>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-start">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a class="btn"><img class="btnAddItemFav" nameItemFav="'.$item[1].'" src="./public/assets/icons/star-yellow.svg" alt="Star" width="32" height="32"></a>
                                                </div>
                                                <div class="col-6">
                                                    <span class="badge bg-warning rounded-pill">'.$item[8].'</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <a class="btn"><img class="btnDeleteItemFav" nameItemNotFav="'.$item[1].'" src="./public/assets/icons/hand-thumbs-down.svg" alt="Star" width="32" height="32"></a>
                                        </div>
                                        <div class="col text-end">
                                            <a class="btn"><img class="btnAddItemCart" nameItem="'.$item[1].'" src="./public/assets/icons/bag-plus.svg" alt="bag" width="32" height="32"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            }else{
                $modeling='<h5>500 Internal Server Error - Error establishing a database connection</h5>';
            }
            echo $modeling;
        }
    } 
?>