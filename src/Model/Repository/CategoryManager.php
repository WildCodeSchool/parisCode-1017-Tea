<?php

namespace Tea\Model\Repository;

use PDO;
use Tea\Model\Entity\Category;

/**
 * Class CategoryManager
 * @package Tea\Repository
 */
class CategoryManager extends EntityManager
{
	/**
	 * Get all categories
	 * @return array
	 */
	public function getAll(){
		$statement = $this->db->query('SELECT * FROM categories');
		return $statement->fetchAll(PDO::FETCH_CLASS, Category::class);
	}


	/**
	 * Get one category
	 * @param id int
	 * @return mixed
	 */
	public function getOne($idcategories){
		$statement = $this->db->prepare("SELECT * FROM categories WHERE idcategories = :idcategories");
		$statement->execute([
			':idcategories' => $idcategories
		]);
		return $statement->fetch();
	}

    /**
     * Add one category
     */
    public function add($name, $description, $images_idimages){
        $statement = $this->db->prepare("INSERT INTO categories (name, description, images_idimages) VALUES (:name, :description, :images_idimages)");
        $statement->execute([
            ':name' => $name,
            ':description' => $description,
            ':images_idimages' => $images_idimages
        ]);
    }

	/**
	 * Update one category
	 */
    public function update($idcategories, $name, $description, $images_idimages){
        $statement = $this->db->prepare("UPDATE categories SET name = :name, description = :description, images_idimages = :images_idimages WHERE idcategories = :idcategories");
        $statement->execute([
            ':idcategories' => $idcategories,
            ':name' => $name,
            ':description' => $description,
            ':images_idimages' => $images_idimages
        ]);
    }

	/**
	 * Delete one category
	 */
	public function delete($idcategories){
        $statement = $this->db->prepare("DELETE FROM categories WHERE idcategories = :idcategories");
        $statement->execute([
            ':idcategories' => $idcategories
        ]);
	}

}