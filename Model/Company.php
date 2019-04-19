<?php

class Company extends Model {
    
    public function login_company($email, $password){
        $sql = $this->db->prepare('SELECT id FROM company WHERE email = :email AND password = :password');
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $row = $sql->fetch();
            $_SESSION['company_login'] = $row['id'];
            return true;
        } else {
            return false; 
        }
    }
    
    
}
