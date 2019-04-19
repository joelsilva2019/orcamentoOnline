<?php

/**
 * Description of User
 *
 * @author Joel Silva
 */
class User extends Model{
    
    public function login_user($email, $password){
        $sql = $this->db->prepare('SELECT id FROM user WHERE email = :email AND password = :password');
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $row = $sql->fetch();
            $_SESSION['user_login'] = $row['id'];
            return true;
        } else {
            return false; 
        }
    }
    
}
