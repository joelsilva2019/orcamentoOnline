<?php

/**
 * Description of CompanyController
 *
 * @author Joel Silva
 */
class CompanyController extends Controller{
    
    public function __construct() {
        if(!isset($_SESSION['company_login'])){
            header("Location: ".BASE_URL."/Login/company");
        }
    }

    public function index(){
        $data = [];
        
        $this->loadTemplate("Company", $data);
    }
    
    public function logOut(){
        unset($_SESSION['company_login']);
        header("Location: ".BASE_URL);
    }
      
}

