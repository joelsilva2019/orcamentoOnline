<?php

/**
 * Description of CompanyController
 *
 * @author Joel Silva
 */

class CompanyController extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['company_login'])) {
            header("Location: " . BASE_URL . "/Login/company");
        }
    }

    public function index()
    {
        $data = [];
        $company = new Company();
        $company->setCompany();
        $products = new Products();
        $category = new Category();

        if (isset($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);

            $company->edit($name, $email, $password, $company->getId());
            header('Location: ' . BASE_URL . '/Company');
        }

        if (isset($_POST['name_prod']) && !empty($_POST['name_prod'])) {

            $name_prod = addslashes($_POST['name_prod']);
            $category_prod = addslashes($_POST['category_prod']);
            $price_prod = addslashes($_POST['price_prod']);
            $unity_prod = addslashes($_POST['unity_prod']);
            $code_prod = addslashes($_POST['code_prod']);
            $description_prod = addslashes($_POST['description_prod']);
            $image_prod = $_FILES['image_prod'];

            $productId = $products->addProds($name_prod, $category_prod, $price_prod, $unity_prod, $code_prod, $description_prod, $company->getId());

            if (isset($image_prod) && !empty($image_prod['tmp_name'])) {
                $permissions = ['image/jpg', 'image/jpeg', 'image/png'];

                if (in_array($image_prod['type'], $permissions)) {
                    $md5Name = md5(time() * rand(0, 9999));
                    $ext = explode('/', $image_prod['type']);
                    $ext = $ext[1];
                    move_uploaded_file($image_prod['tmp_name'], 'Assets/images/prods/' . $md5Name . '.' . $ext);
                    $products->addImageProd($md5Name . '.' . $ext, $productId);
                }
            }

            header('Location: ' . BASE_URL . "/Company");
        }
        $data['company_prods'] = $products->getProductsCompany($company->getId());
        $data['category_info'] = $category->getCategory();
        $data['company_info'] = $company->getInfo();
        $this->loadTemplate("Company", $data);
    }

    public function editProd($id)
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

    public function deleteProd($id)
    {
        $company = new Company();
        $company->setCompany();
        $products = new Products();

        if (!empty($id)) {
            $products->delete($id, $company->getId());
            header('Location: ' . BASE_URL . '/Company');
        }
    }


    public function logOut()
    {
        unset($_SESSION['company_login']);
        header("Location: " . BASE_URL . '/Company');
    }
}
