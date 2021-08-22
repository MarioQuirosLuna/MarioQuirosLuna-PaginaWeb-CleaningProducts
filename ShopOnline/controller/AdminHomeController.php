<?php

    class AdminHomeController {
        public function __construct() {
            require 'model/AdminHomeModel.php';
            $this->view = new View();
        }
        
        public function showAdminHome(){
            $this->view->show("adminHomeView.php", null);
        }
        public function showAddAdmin(){
            $model = new AdminHomeModel();
            $data['data'] = $model->getAdmins();
            $this->view->show("adminAddNewAdminView.php", $data);
        }
        public function deleteAdmin(){
            if($_POST['DELETE'] == 'DELETE'){
                $idAdmin = $_POST['idAdmin'];

                $model = new AdminHomeModel();
                $model->deleteAdmin($idAdmin);
                $data['data'] = $model->getAdmins();
                $this->view->show("adminAddNewAdminView.php", $data);
            }
        }
        public function getCantUsersAdminDB(){
            $model = new AdminHomeModel();

            $data['data'] = $model->getCantUsersAdminDBQuery();
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