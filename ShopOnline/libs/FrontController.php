<?php
    class FrontController{
        static function main(){
            require 'libs/View.php';
            require 'libs/Configuration.php';
            
            if(!empty($_GET['controller'])){
                $controllerName=$_GET['controller'].'Controller';
            }else{ 
                $controllerName='LoginController';
            }

            if(!empty($_GET['action'])){
                $actionName=$_GET['action'];
            }else{ 
                $actionName='showLogin';
            }
            
            $controllerPath=$config->get('controllerFolder').$controllerName.'.php';
            
            if(is_file($controllerPath)){
                require $controllerPath;
            }else{
                die ('Controller - 404 Not found');
            }
            if(is_callable(array($controllerName, $actionName))==FALSE){
                trigger_error($controllerName.'->'.$actionName.' - 404 not found', E_USER_NOTICE);
                return FALSE;
            }
            $controller=new $controllerName();
            $controller->$actionName();
        }
    }
?>