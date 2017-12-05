<?php

namespace Tea\Model\Repository;

use PDO;
use Tea\Model\Entity\Product;

/**
 * Class ProductManager
 *
 * @package Tea\Repository
 */
class ProductManager extends EntityManager
{
    /**
     * Get all product
     *
     * @return array
     */
    public function getAll()
    {
        $statement = $this->db->query("SELECT products.idproducts, products.product, products.descpro, products.quantity, products.price, products.idimages, products.idcategories, images.alt, images.url, categories.category FROM products JOIN images ON products.idimages = images.idimages JOIN categories ON products.idcategories = categories.idcategories");
        return $statement->fetchAll(PDO::FETCH_CLASS, Product::class);
    }

    /**
     * Get one product
     *
     * @param  $id int
     * @return mixed
     */
    public function getOne($idproducts)
    {
        $statement = $this->db->prepare("SELECT products.idproducts, products.product, products.descpro, products.quantity, products.price, products.idimages, products.idcategories, images.alt, images.url, categories.category FROM products JOIN images ON products.idimages = images.idimages JOIN categories ON products.idcategories = categories.idcategories WHERE idproducts = :idproducts;");
        $statement->execute(
            [
            ':idproducts' => $idproducts
            ]
        );
        return $statement->fetch();
    }

    /**
     * Add one product
     */
    public function add($product, $descpro, $quantity, $price, $idimages, $idcategories)
    {
        $statement = $this->db->prepare("INSERT INTO products (product, descpro, quantity, price, idimages, idcategories) VALUES (:product, :descpro, :quantity, :price, :idimages, :idcategories)");
        $statement->execute(
            [
            ':product' => $product,
            ':descpro' => $descpro,
            ':quantity' => $quantity,
            ':price' => $price,
            ':idimages' => $idimages,
            ':idcategories' => $idcategories
            ]
        );
    }

    /**
     * Update one product
     */
    public function update($idproducts, $product, $descpro, $quantity, $price, $idimages, $idcategories)
    {
        $statement = $this->db->prepare("UPDATE products SET product = :product, descpro = :descpro, quantity = :quantity, price = :price, idimages = :idimages, idcategories = :idcategories WHERE idproducts = :idproducts");
        $statement->execute(
            [
            ':idproducts' => $idproducts,
            ':product' => $product,
            ':descpro' => $descpro,
            ':quantity' => $quantity,
            ':price' => $price,
            ':idimages' => $idimages,
            ':idcategories' => $idcategories
            ]
        );
    }

    /**
     * Delete one product
     */
    public function delete($idproducts)
    {
        $statement = $this->db->prepare("DELETE FROM products WHERE idproducts = :idproducts");
        $statement->execute(
            [
            ':idproducts' => $idproducts
            ]
        );
    }

}