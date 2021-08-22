<?php
    
    if($_SERVER['REQUEST_METHOD']=='GET'){
        
        if(isset($_GET['getCantCartShop'])){
            require 'libs/Configuration.php';
            require 'model/CarTemporalModel.php';

            $model = new CarTemporalModel();
            $data = $model->getCantCartShop($_GET['getCantCartShop']);
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['getCantStock'])){
            require 'libs/Configuration.php';
            require 'model/ProductModel.php';

            $model = new ProductModel();
            $data = $model->getCantStock($_GET['getCantStock']);
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['nameClient'])){
            require 'libs/Configuration.php';
            require 'model/CarTemporalModel.php';

            $model = new CarTemporalModel();
            $data = $model->getTemporalCar($_GET['nameClient']);
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['getTotalPricePurchaseNameClient'])){
            require 'libs/Configuration.php';
            require 'model/CarTemporalModel.php';

            $model = new CarTemporalModel();
            $data = $model->getTotalPricePurchaseNameClient($_GET['getTotalPricePurchaseNameClient']);
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['getProducts'])){
            require 'libs/Configuration.php';
            require 'model/ProductModel.php';

            $model = new ProductModel();
            $data = $model->getProducts();
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['order'])){
            require 'libs/Configuration.php';
            require 'model/ProductModel.php';

            $model = new ProductModel();
            if($_GET['order'] == 'ascendant'){
                $data = $model->getProductsAscendant();
            }else if($_GET['order'] == 'descendant'){
                $data = $model->getProductsDescendant();
            }
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['getCategories'])){
            require 'libs/Configuration.php';
            require 'model/CategoryModel.php';

            $model = new CategoryModel();
            $data = $model->getCategories();
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }  

        if(isset($_GET['nameCategory'])){
            require 'libs/Configuration.php';
            require 'model/CategoryModel.php';

            $model = new CategoryModel();
            $model->addCategory($_GET['nameCategory']);
            header("HTTP/1.1 200 OK");
            exit();
        }

        if(isset($_GET['getPurchaseHistoryClient'])){
            require 'libs/Configuration.php';
            require 'model/PurchasesModel.php';

            $user = new PurchasesModel();
            $data = $user->getPurchaseHistoryClient($_GET['getPurchaseHistoryClient']);
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['getPurchaseHistory'])){
            require 'libs/Configuration.php';
            require 'model/PurchasesModel.php';

            $user = new PurchasesModel();
            $data = $user->getPurchaseHistory();
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['getPurchaseHistoryAscendant'])){
            require 'libs/Configuration.php';
            require 'model/PurchasesModel.php';

            $user = new PurchasesModel();
            $data = $user->getPurchaseHistoryAscendant();
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['getPurchaseHistoryDescendant'])){
            require 'libs/Configuration.php';
            require 'model/PurchasesModel.php';

            $user = new PurchasesModel();
            $data = $user->getPurchaseHistoryDescendant();
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['getCantUsers'])){
            require 'libs/Configuration.php';
            require 'model/UserModel.php';

            $user = new UserModel();
            $data = $user->getCantUsers();
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['getCountCantPurchases'])){
            require 'libs/Configuration.php';
            require 'model/PurchasesModel.php';

            $user = new PurchasesModel();
            $data = $user->getCountCantPurchases();
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        if(isset($_GET['getProfitsSales'])){
            require 'libs/Configuration.php';
            require 'model/PurchasesModel.php';

            $user = new PurchasesModel();
            $data = $user->getProfitsSales();
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
        
        if(isset($_GET['getMonthsPurchases'])){
            require 'libs/Configuration.php';
            require 'model/PurchasesModel.php';

            $user = new PurchasesModel();
            $data = $user->getMonthsPurchases();
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }

        if(isset($_GET['getDaysPurchases'])){
            require 'libs/Configuration.php';
            require 'model/PurchasesModel.php';

            $user = new PurchasesModel();
            $data = $user->getDaysPurchases();
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }

        if(isset($_GET['getPurchaseHistoryMonth'])){
            require 'libs/Configuration.php';
            require 'model/PurchasesModel.php';

            $user = new PurchasesModel();
            $data = $user->getPurchaseHistoryMonth($_GET['getPurchaseHistoryMonth']);
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }

        if(isset($_GET['getPurchaseHistoryDay'])){
            require 'libs/Configuration.php';
            require 'model/PurchasesModel.php';

            $user = new PurchasesModel();
            $data = $user->getPurchaseHistoryDay($_GET['getPurchaseHistoryDay']);
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }

        if(isset($_GET['getDiscountClient'])){
            require 'libs/Configuration.php';
            require 'model/CarTemporalModel.php';

            $model = new CarTemporalModel();
            $data = $model->getDiscountClient($_GET['getDiscountClient']);
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }
    }
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(isset($_POST['nameClient']) && $_POST['nameProduct']){
            require 'libs/Configuration.php';
            require 'model/CarTemporalModel.php';

            $model = new CarTemporalModel();
            $model->addItemTemporalCar($_POST['nameClient'], $_POST['nameProduct']);
            header("HTTP/1.1 200 OK");
            exit();
        }

        if(isset($_POST['nameClientFav']) && isset($_POST['nameProductFav'])){
            require 'libs/Configuration.php';
            require 'model/ProductFavModel.php';

            $model = new ProductFavModel();
            $data = $model->addProductFav($_POST['nameClientFav'], $_POST['nameProductFav']);
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }

        if(isset($_POST['name']) && isset($_POST['password'])){    
            require 'libs/Configuration.php';
            require 'model/UserModel.php';

            $user = new UserModel();
            $data = $user->getUser($_POST['name'],$_POST['password']);
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        } 
        
        if(isset($_POST['newName'])&& isset($_POST['lastname'])&& isset($_POST['privilege'])&& isset($_POST['password'])&& isset($_POST['age'])&& isset($_POST['gender'])&& isset($_POST['address'])){
            require 'libs/Configuration.php';
            require 'model/UserModel.php';

            $user = new UserModel();
            $user->addUserClient($_POST['newName'], $_POST['lastname'], $_POST['privilege'],  $_POST['password'], $_POST['age'], $_POST['gender'], $_POST['address']);
            header("HTTP/1.1 200 OK");
            exit();
        }
        
        if(isset($_POST['newName']) && isset($_POST['password']) && isset($_POST['privilege'])){
            require 'libs/Configuration.php';
            require 'model/UserModel.php';

            $user = new UserModel();
            $user->addUserAdmin($_POST['newName'], $_POST['password'], $_POST['privilege']);
            header("HTTP/1.1 200 OK");
            exit();
        }

        if(isset($_POST['addPurchaseMade'])){
            require 'libs/Configuration.php';
            require 'model/PurchasesModel.php';

            $user = new PurchasesModel();
            $data = $user->addPurchaseMade($_POST['addPurchaseMade']);
            header("HTTP/1.1 200 OK");
            echo json_encode($data);
            exit();
        }

        if(isset($_POST['nameProduct']) && isset($_POST['discount']) && isset($_POST['dateStart']) && isset($_POST['dateEnd'])){
            require 'libs/Configuration.php';
            require 'model/ProductModel.php';

            $user = new ProductModel();
            $user->addPromotion($_POST['nameProduct'], $_POST['discount'], $_POST['dateStart'], $_POST['dateEnd']);
            header("HTTP/1.1 200 OK");
            exit();
        }
        
    }

    if($_SERVER['REQUEST_METHOD'] == "DELETE" || $_SERVER['REQUEST_METHOD']=='GET'){

        if(isset($_GET['nameClientDeleteFav']) && isset($_GET['nameProductDeleteFav'])){
            require 'libs/Configuration.php';
            require 'model/ProductFavModel.php';

            $model = new ProductFavModel();
            $model->deleteItemFav($_GET['nameClientDeleteFav'], $_GET['nameProductDeleteFav']);
            header("HTTP/1.1 200 OK");
            echo json_encode($_GET);
            exit();
        }

        if(isset($_GET['nameClientDelete']) && isset($_GET['nameProductDelete'])){
            require 'libs/Configuration.php';
            require 'model/CarTemporalModel.php';

            $model = new CarTemporalModel();
            $model->deleteItemTemporalCar($_GET['nameClientDelete'], $_GET['nameProductDelete']);
            header("HTTP/1.1 200 OK");
            echo json_encode($_GET);
            exit();
        }
    }

?>