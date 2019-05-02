<?php

class ProductsController extends Controller
{
    function index()
    { }

    public function page($id)
    {

        $data = [];
        $products = new Products();
        $data['prod_info'] = $products->getProduct($id);
        $this->loadTemplate('Product', $data);
    }
}
