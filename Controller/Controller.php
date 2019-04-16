<?php

class Controller {
    
    public function loadView($viewName, $viewData){
        extract($viewData);
        if(file_exists("View/".$viewName.".php")){
            include_once "View/".$viewName.".php";
        }
    }
    
    function loadTemplate($viewName, $viewData){
        include_once "View/Template.php";
    }
    
    function loadViewInTemplate($viewName, $viewData){
        extract($viewData);
        if(file_exists("View/".$viewName.".php")){
            include_once "View/".$viewName.".php";
        }
    }
}
