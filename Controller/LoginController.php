<?php

class LoginController extends Controller
{

  public function user()
  {

    $data = [];

    $user = new User();

    if (isset($_POST['email']) && !empty($_POST['email'])) {

      $email = addslashes($_POST['email']);
      $password = md5($_POST['password']);

      if ($user->login_user($email, $password)) {
        header('Location: ' . BASE_URL . '/User');
      } else {
        $data['erro'] = 'E-mail ou senha incorretos !!';
      }
    }

    $this->loadTemplate('Login_user', $data);
  }

  public function company()
  {

    $data = [];

    $company = new Company();

    if (isset($_POST['email_company']) && !empty($_POST['email_company'])) {

      $email = addslashes($_POST['email_company']);
      $password = md5($_POST['password_company']);

      if ($company->login_company($email, $password)) {
        header('Location: ' . BASE_URL . '/Company');
      } else {
        $data['erro'] = 'E-mail ou senha incorretos !!';
      }
    }

    $this->loadTemplate('Login_company', $data);
  }

  public function add_user()
  {
    $data = [];

    $user = new User();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
      $name = addslashes($_POST['name']);
      $email = addslashes($_POST['email']);
      $password = md5($_POST['password']);

      if (!$user->verifyEmail($email)) {

        $user->add_user($name, $email, $password);
        header('Location: ' . BASE_URL . "/User");
      } else {
        $data['erro'] = "Já possui um usuário com esse email !!";
      }
    }

    $this->loadTemplate("Add_user", $data);
  }


  public function add_company()
  {
    $data = [];
    $company = new Company();

    if (isset($_POST['name']) && !empty($_POST['name'])) {

      $name = addslashes($_POST['name']);
      $email = addslashes($_POST['email']);
      $password = md5($_POST['password']);
      $address = addslashes($_POST['address']);
      $address_number = addslashes($_POST['address_number']);
      $address_complement = addslashes($_POST['address_complement']);
      $phone = addslashes($_POST['phone']);
      $address_neigbor = addslashes($_POST['address_neigbor']);
      $address_city = addslashes($_POST['address_city']);
      $image = $_FILES['image'];

      if (!$company->verifyEmail($email)) {

        $id_company = $company->add_company($name, $email, $password, $address, $address_number, $address_complement, $phone, $address_neigbor, $address_city);

        if (isset($image) && !empty($image['tmp_name'])) {
          $permissions = ['image/jpg', 'image/jpeg', 'image/png'];

          if (in_array($image['type'], $permissions)) {
            $md5Name = md5(time() * rand(0, 9999));
            $ext = explode('/', $image['type']);
            $ext = $ext[1];
            move_uploaded_file($image['tmp_name'], 'Assets/images/company/' . $md5Name . '.' . $ext);
            $company->add_img($md5Name . '.' . $ext, $id_company);
          }
        }

        header('Location: ' . BASE_URL . "/Company");
      } else {

        $data['erro'] = "Já existe uma empresa com esse email";

      }

    }

    $this->loadTemplate("Add_company", $data);
  }
}
