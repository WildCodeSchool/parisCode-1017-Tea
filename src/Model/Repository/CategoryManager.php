<?php

namespace Tea\Model\Repository;

use PDO;
use Tea\Model\Entity\Category;

/**
 * Class CategoryManager
 *
 * @package Tea\Repository
 */
class CategoryManager extends EntityManager
{
    /**
     * Get all categories
     *
     * @return array
     */
    public function getAll()
    {
        $statement = $this->db->query("SELECT categories.idcategories, categories.category, categories.desccat, categories.idimages, images.url, images.alt FROM categories JOIN images ON categories.idimages = images.idimages");
        return $statement->fetchAll(PDO::FETCH_CLASS, Category::class);
    }


    /**
     * Get one category
     *
     * @param  id int
     * @return mixed
     */
    public function getOne($idcategories)
    {
        $statement = $this->db->prepare("SELECT categories.idcategories, categories.category, categories.desccat, categories.idimages, images.url, images.alt FROM categories JOIN images ON categories.idimages = images.idimages WHERE idcategories = :idcategories");
        $statement->execute(
            [
            ':idcategories' => $idcategories
            ]
        );
        return $statement->fetch();
    }

    /**
     * Add one category
     */
    public function add($category, $desccat, $idimages)
    {
        $statement = $this->db->prepare("INSERT INTO categories (category, desccat, idimages) VALUES (:category, :desccat, :idimages)");
        $statement->execute(
            [
            ':category' => $category,
            ':desccat' => $desccat,
            ':idimages' => $idimages
            ]
        );
    }

    /**
     * Update one category
     */
    public function update($idcategories, $category, $desccat, $idimages)
    {
        $statement = $this->db->prepare("UPDATE categories SET category = :category, desccat = :desccat, idimages = :idimages WHERE idcategories = :idcategories");
        $statement->execute(
            [
            ':idcategories' => $idcategories,
            ':category' => $category,
            ':desccat' => $desccat,
            ':idimages' => $idimages
            ]
        );
    }

    /**
     * Delete one category
     */
    public function delete($idcategories)
    {
        $statement = $this->db->prepare("DELETE FROM categories WHERE idcategories = :idcategories");
        $statement->execute(
            [
            ':idcategories' => $idcategories
            ]
        );
    }

}