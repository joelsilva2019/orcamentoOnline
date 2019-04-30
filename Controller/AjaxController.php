<?php

class AjaxController extends Controller{

    function search_prod(){
        $data = [];

        $data['prods'] = '';

        if(isset($_POST['q']) && !empty($_POST['q'])){

            $q = addslashes($_POST['q']);
            $products = new Products();
            $data['prods'] = $products->search_prod($q);
            
        }

        echo json_encode($data);
    }


}