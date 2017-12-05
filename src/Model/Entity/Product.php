<?php

namespace Tea\Model\Entity;

/**
 * Class Product
 *
 * @package Tea\Model\Entity
 */
class Product
{
    /**
     * @var string
     */
    private $idproducts;

    /**
     * @var string
     */
    private $product;

    /**
     * @var string
     */
    private $descpro;

    /**
     * @var string
     */
    private $quantity;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $idimages;

    /**
     * @var string
     */
    private $idcategories;

    /**
     * @return string
     */
    public function getIdproducts()
    {
        return $this->idproducts;
    }

    /**
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param string $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function getDescpro()
    {
        return $this->descpro;
    }

    /**
     * @param string $descpro
     */
    public function setDescpro($descpro)
    {
        $this->descpro = $descpro;
    }

    /**
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getIdimages()
    {
        return $this->idimages;
    }

    /**
     * @param string $idimages
     */
    public function setIdimages($idimages)
    {
        $this->idimages = $idimages;
    }

    /**
     * @return string
     */
    public function getIdcategories()
    {
        return $this->idcategories;
    }

    /**
     * @param string $idcategories
     */
    public function setIdcategories($idcategories)
    {
        $this->idcategories = $idcategories;
    }

}