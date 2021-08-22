<?php

    class ProductAdminController {
        public function __construct() {
            require 'model/ProductAdminModel.php';
            require 'model/CategoriesAdminModel.php';
            $this->view = new View();
        }
        public function showAdminAddProduct(){
            $model = new CategoriesAdminModel();
            $data['data'] = $model->getCategories();
            $this->view->show("adminAddProductView.php", $data);
            
        }
        public function showAddPromotion(){
            $model = new ProductAdminModel();
            $data['data'] = $model->getProducts();
            $this->view->show("adminAddNewPromotionView.php", $data);
        }
        public function showAdminManageProduct(){
            $model = new ProductAdminModel();
            $data['data'] = $model->getProducts();
            $this->view->show("adminManageProductsView.php", $data);
        }
        public function addProduct(){
            
            if(isset($_FILES['imgProduct']['name'])){
                if ((($_FILES["imgProduct"]["type"] == "image/pjpeg")
                    ||($_FILES["imgProduct"]["type"] == "image/jpg")
                    || ($_FILES["imgProduct"]["type"] == "image/jpeg")
                    || ($_FILES["imgProduct"]["type"] == "image/png"))
                    && ($_FILES['imgProduct']['size'] < 5000000)) {

                    if (move_uploaded_file($_FILES["imgProduct"]["tmp_name"], "./public/assets/img/".$_FILES['imgProduct']['name'])) {
                        $model = new ProductAdminModel();
                        $model->addProduct($_POST['nameProduct'], $_POST['priceProduct'], $_POST['stockProduct'], $_POST['descriptionProduct'], $_FILES['imgProduct']['name'], $_POST['categoryProduct']);
                        $this->view->show("adminAddProductView.php", null);
                    } else {
                        echo 1;
                    }
                } else {
                    echo 2;
                }
            }else{
                echo 3;
            }
        }
        public function deleteProduct(){
            if($_POST['DELETE'] == 'DELETE'){
                $idProduct = $_POST['idProduct'];

                $model = new ProductAdminModel();
                $model->deleteProduct($idProduct);
                $data['data'] = $model->getProducts();
                $this->view->show("adminManageProductsView.php", $data);
            }
        }
        public function updateProduct(){
            // TODO:
            if($_POST['PUT'] == 'PUT'){
                $idProduct = $_POST['idProduct'];
                $name = $_POST['updateName'];
                $price = $_POST['updatePrice'];
                $stock = $_POST['updateStock'];

                $model = new ProductAdminModel();
                $model->updateProduct($idProduct, $name, $price, $stock);
                $data['data'] = $model->getProducts();
                $this->view->show("adminManageProductsView.php", $data);
            }
        }
    } 
?>