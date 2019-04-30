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

    public function edit($id)
    {
        $data = [];
        $products = new Products();
        $category = new Category();
        $company = new Company();
        $company->setCompany();

        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $price = addslashes($_POST['price']);
            $category_name = addslashes($_POST['category']);
            $unity = addslashes($_POST['unity']);
            $code = addslashes($_POST['code']);
            $description = addslashes($_POST['description']);
            $image = $_FILES['image'];

            $products->edit($name, $price, $category_name, $unity, $code, $description, $id, $company->getId());

            if (isset($image) && !empty($image['tmp_name'])) {
                $permissions = ['image/jpg', 'image/jpeg', 'image/png'];

                if (in_array($image['type'], $permissions)) {
                    $md5Name = md5(time() * rand(0, 9999));
                    $ext = explode('/', $image['type']);
                    $ext = $ext[1];
                    move_uploaded_file($image['tmp_name'], 'Assets/images/prods/' . $md5Name . '.' . $ext);
                    $products->editImageProd($md5Name . '.' . $ext, $id);
                }
            }

            header('Location: ' . BASE_URL . '/Company');
        }

        $data['prod_info'] = $products->getProduct($id);
        $data['category_info'] = $category->getCategory();
        $this->loadTemplate('Product_edit', $data);
    }
}
