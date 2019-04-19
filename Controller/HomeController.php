<?php

class HomeController extends Controller{
    
    function index(){
        $data = [];
        
        $products = new Products();
        $category = new Category();
        
        if(isset($_POST['category']) && !empty($_POST['category'])){
           
            $category_value = addslashes($_POST['category']);
            
            $data['get_products'] = $products->getProducts($category_value);
            
        } else {
            $data['get_products'] = $products->getProducts();
        }

        $data['get_category'] = $category->getCategory();
        $this->loadTemplate("Home", $data);
    }
    
}