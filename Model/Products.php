<?php

class Products extends Model
{

    public function getProducts($category_value = null)
    {
        $array = [];

        if (!empty($category_value)) {

            $sql = $this->db->prepare('SELECT products.id, products.id_category, products.name, products.description, products.price, products.image, products.unity, company.name as company, company.image as company_image '
                . 'FROM products LEFT JOIN company ON company.id = products.id_company WHERE id_category = :id_category ORDER BY RAND()');
            $sql->bindValue(':id_category', $category_value);
        } else {

            $sql = $this->db->prepare('SELECT products.id, products.id_category, products.name, products.description, products.price, products.image, products.unity, company.name as company, company.image as company_image '
                . 'FROM products LEFT JOIN company ON company.id = products.id_company ORDER BY RAND()');
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}
