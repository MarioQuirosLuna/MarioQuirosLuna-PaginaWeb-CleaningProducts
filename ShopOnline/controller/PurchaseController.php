<?php

    class PurchaseController {
        public function __construct() {
            include_once 'model/PurchaseModel.php';
            $this->view = new View();
        }

        public function getHistoryClient(){
            $model = new PurchaseModel();
            session_start();
            $data['data'] = $model->getHistoryClient($_SESSION['userName']);
            $this->view->convert($data['data']);
            
            $modeling = '';

            if($data['data']){
                foreach($data['data'] as $item){
                    $modeling .='<tr>
                                    <th scope="row">'.$item[2].'</th>
                                        <td>'.$item[3].'</td>
                                        <td><span><img src="./public/assets/icons/tag.svg" alt="card" width="16" height="16" /></span> $'.$item[4].'</td>
                                        <td>'.$item[5].'</td>
                                </tr>'; 
                }
            }else{
                $modeling = '<h5>500 Internal Server Error - Error establishing a database connection</h5>';
            }

            echo $modeling;
        }

        public function getHistory(){
            $model = new PurchaseModel();

            $data['data'] = $model->getPurchaseHistory();
            $this->view->convert($data['data']);
            
            $modeling = '';

            if($data['data']){
                foreach($data['data'] as $item){
                    $modeling .='<tr>
                                    <td>'.$item[1].'</td>
                                    <td>'.$item[3].'</td>
                                    <td>$'.$item[4].'</td>
                                    <td>'.$item[5].'</td>
                                </tr>'; 
                }
            }else{
                $modeling = '<h5>500 Internal Server Error - Error establishing a database connection</h5>';
            }

            echo $modeling;
        }

        public function getPurchaseAscendant(){
            $model = new PurchaseModel();

            $data['data'] = $model->getPurchaseHistoryAscendant();
            $this->view->convert($data['data']);
            
            $modeling = '';

            if($data['data']){
                foreach($data['data'] as $item){
                    $modeling .='<tr>
                                    <td>'.$item[1].'</td>
                                    <td>'.$item[3].'</td>
                                    <td>$'.$item[4].'</td>
                                    <td>'.$item[5].'</td>
                                </tr>'; 
                }
            }else{
                $modeling = '<h5>500 Internal Server Error - Error establishing a database connection</h5>';
            }

            echo $modeling;
        }

        public function getPurchaseDescendant(){
            $model = new PurchaseModel();

            $data['data'] = $model->getPurchaseHistoryDescendant();
            $this->view->convert($data['data']);
            
            $modeling = '';

            if($data['data']){
                foreach($data['data'] as $item){
                    $modeling .='<tr>
                                    <td>'.$item[1].'</td>
                                    <td>'.$item[3].'</td>
                                    <td>$'.$item[4].'</td>
                                    <td>'.$item[5].'</td>
                                </tr>'; 
                }
            }else{
                $modeling = '<h5>500 Internal Server Error - Error establishing a database connection</h5>';
            }

            echo $modeling;
        }
        public function getCountCantPurchases(){
            $model = new PurchaseModel();

            $data['data'] = $model->getCountCantPurchases();
            $this->view->convert($data['data']);

            $list = 0;
            if($data['data']){
                foreach($data['data'] as $item){
                    $list = $item[0];
                }
            }
            
            echo $list;
        }
        public function getProfitsSales(){
            $model = new PurchaseModel();

            $data['data'] = $model->getProfitsSales();
            $this->view->convert($data['data']);

            $list = 0;
            if($data['data']){
                foreach($data['data'] as $item){
                    $list = '$'.$item[0];
                }
            }
            
            echo $list;
        }

        public function getMonthsPurchases(){
            $model = new PurchaseModel();

            $data['data'] = $model->getMonthsPurchases();
            $this->view->convert($data['data']);

            $list = '<option selected>Select Month</option>';
            if($data['data']){
                foreach($data['data'] as $item){
                    switch($item[0]){
                        case "1":
                            $list .= '<option value="'.$item[0].'">January</option>';
                            break;
                        case "2":
                            $list .= '<option value="'.$item[0].'">February</option>';
                            break;
                        case "3":
                            $list .= '<option value="'.$item[0].'">March</option>';
                            break;
                        case "4":
                            $list .= '<option value="'.$item[0].'">April</option>';
                            break;
                        case "5":
                            $list .= '<option value="'.$item[0].'">May</option>';
                            break;
                        case "6":
                            $list .= '<option value="'.$item[0].'">June</option>';
                            break;
                        case "7":
                            $list .= '<option value="'.$item[0].'">July</option>';
                            break;
                        case "8":
                            $list .= '<option value="'.$item[0].'">August</option>';
                            break;
                        case "9":
                            $list .= '<option value="'.$item[0].'">September</option>';
                            break;
                        case "10":
                            $list .= '<option value="'.$item[0].'">October</option>';
                            break;
                        case "11":
                            $list .= '<option value="'.$item[0].'">November</option>';
                            break;
                        case "12":
                            $list .= '<option value="'.$item[0].'">December</option>';
                            break;        
                    }
                    
                }
            }
            
            echo $list;
        }

        public function getDaysPurchases(){
            $model = new PurchaseModel();

            $data['data'] = $model->getDaysPurchases();
            $this->view->convert($data['data']);

            $list = '<option selected>Select Day</option>';
            if($data['data']){
                foreach($data['data'] as $item){
                    $list .= '<option value="'.$item[0].'">'.$item[0].'</option>';     
                }
            }
            
            echo $list;
        }

        public function getPurchaseHistoryMonth(){
            $model = new PurchaseModel();

            $data['data'] = $model->getPurchaseHistoryMonth($_GET['getPurchaseHistoryMonth']);
            $this->view->convert($data['data']);

            $modeling = '';

            if($data['data']){
                foreach($data['data'] as $item){
                    $modeling .='<tr>
                                    <td>'.$item[1].'</td>
                                    <td>'.$item[3].'</td>
                                    <td>$'.$item[4].'</td>
                                    <td>'.$item[5].'</td>
                                </tr>'; 
                }
            }

            echo $modeling;
        }

        public function getPurchaseHistoryDay(){
            $model = new PurchaseModel();

            $data['data'] = $model->getPurchaseHistoryDay($_GET['getPurchaseHistoryDay']);
            $this->view->convert($data['data']);

            $modeling = '';

            if($data['data']){
                foreach($data['data'] as $item){
                    $modeling .='<tr>
                                    <td>'.$item[1].'</td>
                                    <td>'.$item[3].'</td>
                                    <td>$'.$item[4].'</td>
                                    <td>'.$item[5].'</td>
                                </tr>'; 
                }
            }

            echo $modeling;
        }
    }
?>