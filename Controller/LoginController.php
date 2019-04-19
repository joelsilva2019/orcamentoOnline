<?php

class LoginController extends Controller {
    
   public function user(){
       
    $data = [];
    
    $user = new User();
    
    if(isset($_POST['email']) && !empty($_POST['email'])){
        
        $email = addslashes($_POST['email']);
        $password = md5($_POST['password']);
       
        if($user->login_user($email, $password)){
            header('Location: '.BASE_URL.'/User');
        } else {
           $data['erro'] = 'E-mail ou senha incorretos !!';   
        }       
        
    }
    
    $this->loadTemplate('Login_user', $data);
  }
  
  public function company(){
      
    $data = [];
    
    $company = new Company();
    
    if(isset($_POST['email_company']) && !empty($_POST['email_company'])){
        
        $email = addslashes($_POST['email_company']);
        $password = md5($_POST['password_company']);
       
        if($company->login_company($email, $password)){
            header('Location: '.BASE_URL.'/Company');
        } else {
           $data['erro'] = 'E-mail ou senha incorretos !!';   
        }       
        
    }
      
    $this->loadTemplate('Login_company', $data); 
  }
  
  public function add_user(){
     $data = [];
     
     $user = new User();
     
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $name = addslashes($_POST['name']);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        
        if(!$user->verifyEmail($email)){
            
        $user->add_user($name, $email, $password);
        
        } else {
          $data['erro'] = "Já possui um usuário com esse email !!";    
        }
    } 
     
     $this->loadTemplate("Add_user", $data);
  }
    
  
  public function add_company(){
    $data = [];
      
     
     $this->loadTemplate("Add_company", $data);
  }
  
}
