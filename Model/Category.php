<?php
/**
 * Description of Category
 *
 * @author Joel Silva
 */

class Category extends Model
{

    public function getCategory()
    {
        $array = [];
        $sql = $this->db->prepare("SELECT * FROM category");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
}
