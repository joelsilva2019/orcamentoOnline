<?php

class AboutController extends Controller{
    
    function index(){
        $data = [];
        
    
        $this->loadTemplate("About", $data);
    }
    
}