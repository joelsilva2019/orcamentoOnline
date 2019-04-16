<?php

class HomeController extends Controller{
    
    function index(){
        $data = array();
        
        $this->loadView("Home", $data);
    }
    
}