<?php

class Products extends Model
{

    public function getProductsCompany($id_company)
    {
        $array = [];
        $sql = $this->db->prepare('SELECT id, name, price FROM products WHERE id_company = :id_company');
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getProducts($category_value = null)
    {
        $array = [];
        //PESQUISAR POR CATEGORIA DE PRODUTOS
        if (!empty($category_value)) {

            $sql = $this->db->prepare('SELECT products.id, products.id_category, products.name, products.description, products.price, products.image, products.unity, company.name as company, company.image as company_image '
                . 'FROM products LEFT JOIN company ON company.id = products.id_company WHERE id_category = :id_category ORDER BY RAND()');
            $sql->bindValue(':id_category', $category_value);
        } else {
            //PESQUISAR TODOS OS PRODUTOS
            $sql = $this->db->prepare('SELECT products.id, products.id_category, products.name, products.description, products.price, products.image, products.unity, company.name as company, company.image as company_image '
                . 'FROM products LEFT JOIN company ON company.id = products.id_company ORDER BY RAND()');
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getProduct($id)
    {
        $array = [];

        $sql = $this->db->prepare('SELECT products.name, products.description, products.price, products.image, products.unity, products.code, products.date,
        company.name as company, company.email, company.image image_company, company.phone, company.address, company.address_number, company.address_neigbor, company.address_city, company.address_complement, category.name as category
        FROM products LEFT JOIN company ON company.id = products.id_company LEFT JOIN category ON category.id = products.id_category WHERE products.id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function search_prod($q)
    {
        $array = [];
        $sql = $this->db->prepare('SELECT id, name FROM products WHERE name LIKE :name LIMIT 10');
        $sql->bindValue(':name', '%' . $q . '%');
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function addProds($name_prod, $category_prod, $price_prod, $unity_prod, $code_prod, $description_prod, $idCompany)
    {
        $sql = $this->db->prepare('INSERT INTO products SET id_company = :id_company, id_category = :id_category, name = :name, description = :description, price = :price, unity = :unity, code = :code, date = NOW()');
        $sql->bindValue(':id_company', $idCompany);
        $sql->bindValue(':id_category', $category_prod);
        $sql->bindValue(':name', $name_prod);
        $sql->bindValue(':description', $description_prod);
        $sql->bindValue(':price', $price_prod);
        $sql->bindValue(':unity', $unity_prod);
        $sql->bindValue(':code', $code_prod);
        $sql->execute();

        return $this->db->lastInsertId();
    }

    public function addImageProd($image_prod, $idProd)
    {
        $sql = $this->db->prepare('UPDATE products SET image = :image WHERE id = :id');
        $sql->bindValue(':image', $image_prod);
        $sql->bindValue(':id', $idProd);
        $sql->execute();
    }

    public function edit($name, $price, $category_name, $unity, $code, $description, $id, $company_id)
    {
        $sql = $this->db->prepare('UPDATE products SET id_category = :id_category, name = :name, description = :description, price = :price, unity = :unity, code = :code WHERE id = :id AND id_company = :id_company');
        $sql->bindValue(':id_category', $category_name);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':description', $description);
        $sql->bindValue(':price', $price);
        $sql->bindValue(':unity', $unity);
        $sql->bindValue(':code', $code);
        $sql->bindValue(':id_company', $company_id);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function editImageProd($image_prod, $idProd)
    {
        $sql = $this->db->prepare('UPDATE products SET image = :image WHERE id = :id');
        $sql->bindValue(':image', $image_prod);
        $sql->bindValue(':id', $idProd);
        $sql->execute();
    }

    public function delete($id, $id_company){
        $sql = $this->db->prepare('DELETE FROM products WHERE id = :id AND id_company = :id_company');
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
    }
}
