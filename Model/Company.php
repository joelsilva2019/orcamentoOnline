<?php

class Company extends Model
{
    private $company;

    public function setCompany()
    {

        $sql = $this->db->prepare('SELECT * FROM company WHERE id = :id');
        $sql->bindValue(':id', $_SESSION['company_login']);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $this->company = $sql->fetch();
        }
    }

    public function login_company($email, $password)
    {
        $sql = $this->db->prepare('SELECT id FROM company WHERE email = :email AND password = :password');
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $_SESSION['company_login'] = $row['id'];
            return true;
        } else {
            return false;
        }
    }

    public function verifyEmail($email)
    {

        $sql = $this->db->prepare('SELECT id FROM company WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_company($name, $email, $password, $address, $address_number, $address_complement, $phone, $address_neigbor, $address_city)
    {

        $sql = $this->db->prepare('INSERT INTO company SET name = :name, email = :email, password = :password, phone = :phone, address = :address, address_number = :address_number, address_neigbor = :address_neigbor, address_city = :address_city, address_complement = :address_complement');
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
        $sql->bindValue(':phone', $phone);
        $sql->bindValue(':address', $address);
        $sql->bindValue(':address_number', $address_number);
        $sql->bindValue(':address_neigbor', $address_neigbor);
        $sql->bindValue(':address_city', $address_city);
        $sql->bindValue(':address_complement', $address_complement);
        $sql->execute();

        $id_insert = $this->db->lastInsertId();
        $_SESSION['company_login'] = $id_insert;

        return $id_insert;
    }

    public function add_img($image, $id_company)
    {
        $sql = $this->db->prepare('UPDATE company SET image = :image WHERE id = :id');
        $sql->bindValue(':image', $image);
        $sql->bindValue(':id', $id_company);
        $sql->execute();
    }

    public function getInfo()
    {
        if (!empty($this->company)) {
            return $this->company;
        } else {
            return [];
        }
    }

    public function getId()
    {
        if (!empty($this->company['id'])) {
            return $this->company['id'];
        } else {
            return [];
        }
    }

    public function edit($name, $email, $password, $id)
    {
        $sql = $this->db->prepare('UPDATE company SET name = :name, email = :email WHERE id = :id');
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if (!empty($password) && $password != '') {
            $sql = $this->db->prepare('UPDATE company SET password = :password WHERE id = :id');
            $sql->bindValue(':password', md5($password));
            $sql->bindValue(':id', $id);
            $sql->execute();
        }
    }
}
