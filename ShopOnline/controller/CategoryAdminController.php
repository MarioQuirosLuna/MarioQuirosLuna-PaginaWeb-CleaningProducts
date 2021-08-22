<?php

    class CategoryAdminController {
        public function __construct() {
            require 'model/CategoriesAdminModel.php';
            $this->view = new View();
        }
        public function showAdminAddCategory(){
            $model = new CategoriesAdminModel();
            $data['data'] = $model->getCategories();
            $this->view->show("adminAddCategoryView.php", $data);
        }
        public function addNewCategory(){
            $name = $_POST['categoryName'];

            $model = new CategoriesAdminModel();
            $model->addNewCategory($name);
            $data['data'] = $model->getCategories();
            $this->view->show("adminAddCategoryView.php", $data);
        }
        public function deleteCategory(){
            if($_POST['DELETE'] == 'DELETE'){
                $idCategory = $_POST['idCategory'];

                $model = new CategoriesAdminModel();
                $model->deleteCategory($idCategory);
                $data['data'] = $model->getCategories();
                $this->view->show("adminAddCategoryView.php", $data);
            }
        }
    } 
?>