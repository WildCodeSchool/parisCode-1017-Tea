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
    public function add($name, $description, $image){
        $insertImg = $this->db->prepare("INSERT INTO images (url) VALUES (:url)");
        $insertImg->execute([
            ':url'=> $image
        ]);
        $idImage = $this->db->lastInsertId();

        $statement = $this->db->prepare("INSERT INTO categories (name, description, images_idimages) VALUES (:name, :description, :image)");
        $statement->execute([
            ':name' => $name,
            ':description' => $description,
            ':image' => $idImage
        ]);
    }

	/**
	 * Update one category
	 */
	public function update($idcategories, $name, $description, $image){

        $statement = $this->db->prepare("UPDATE categories SET name = :name, description = :description, images_idimages = :images_idimages WHERE idcategories = :idcategories");
        $statement->execute([
            ':idcategories' => $idcategories,
            ':name' => $name,
            ':description' => $description,
            ':image' => $image
        ]);

        $insertImg = $this->db->prepare("UPDATE images SET url = :url WHERE idcategories = :idcategories");
        $insertImg->execute([
            ':url'=> $image
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