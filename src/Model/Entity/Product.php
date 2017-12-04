<?php

namespace Tea\Model\Entity;

/**
 * Class Product
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
	private $name;

    /**
     * @var string
     */
    private $description;

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
    private $images_idimages;

    /**
     * @return mixed
     */
    public function getImagesIdimages()
    {
        return $this->images_idimages;
    }

    /**
     * @param mixed $images_idimages
     */
    public function setImagesIdimages($images_idimages)
    {
        $this->images_idimages = $images_idimages;
    }

    /**
     * @return string
     */
    public function getIdproducts(): string
    {
        return $this->idproducts;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getQuantity(): string
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     */
    public function setQuantity(string $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice(string $price)
    {
        $this->price = $price;
    }

}