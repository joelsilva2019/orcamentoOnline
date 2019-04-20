<?php

/**
 * Description of UserController
 *
 * @author Joel Silva
 */
class UserController extends Controller{
    
    public function __construct() {
        if(!isset($_SESSION['user_login'])){
            header("Location: ".BASE_URL."/Login/user");
        }
    }

    public function index(){
        $data = [];
        
        $this->loadTemplate("User", $data);
    }
    
    public function logOut(){
        unset($_SESSION['user_login']);
        header("Location: ".BASE_URL);
    }
    
}
