<?php

namespace Tea\Model\Repository;

use PDO;
use Tea\Model\Entity\Product;

/**
 * Class ProductManager
 * @package Tea\Repository
 */
class ProductManager extends EntityManager
{
	/**
	 * Get all product
	 * @return array
	 */
	public function getAll(){
		$statement = $this->db->query('SELECT * FROM products');
		return $statement->fetchAll(PDO::FETCH_CLASS, Product::class);
	}

	/**
	 * Get one product
	 * @param $id int
	 * @return mixed
	 */
//SELECT * FROM products WHERE idproducts = :idproducts
//        SELECT products.idproducts, categories.categoriesname, images.imagesalt
//        FROM products
//        INNER JOIN categories, images ON products.id_categories=categories.name, products.id_images=alt;

	public function getOne($idproducts){
		$statement = $this->db->prepare("SELECT * FROM products WHERE idproducts = :idproducts;");
		$statement->execute([
			':idproducts' => $idproducts
		]);
		return $statement->fetch();
	}

    /**
     * Add one product
     */
    public function add($name, $description, $quantity, $price, $images_idimages, $categories_idcategories){
        $statement = $this->db->prepare("INSERT INTO products (name, description, quantity, price, images_idimages, categories_idcategories) VALUES (:name, :description, :quantity, :price, :images_idimages, :categories_idcategories)");
        $statement->execute([
            ':name' => $name,
            ':description' => $description,
            ':quantity' => $quantity,
            ':price' => $price,
            ':images_idimages' => $images_idimages,
            ':categories_idcategories' => $categories_idcategories
        ]);
    }

	/**
	 * Update one product
	 */
	public function update($idproducts, $name, $description, $quantity, $price, $images_idimages, $categories_idcategories){
        $statement = $this->db->prepare("UPDATE products SET name = :name, description = :description, quantity = :quantity, price = :price, images_idimages = :images_idimages, categories_idcategories = :categories_idcategories WHERE idproducts = :idproducts");
        $statement->execute([
            ':idproducts' => $idproducts,
            ':name' => $name,
            ':description' => $description,
            ':quantity' => $quantity,
            ':price' => $price,
            ':images_idimages' => $images_idimages,
            ':categories_idcategories' => $categories_idcategories
        ]);
	}

	/**
	 * Delete one product
	 */
	public function delete($idproducts){
        $statement = $this->db->prepare("DELETE FROM products WHERE idproducts = :idproducts");
        $statement->execute([
            ':idproducts' => $idproducts
        ]);
	}

}