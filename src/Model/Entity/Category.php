<?php

namespace Tea\Model\Entity;

/**
 * Class Category
 *
 * @package Tea\Model\Entity
 */
class Category
{
    /**
     * @var string
     */
    private $idcategories;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $desccat;

    /**
     * @var string
     */
    private $idimages;

    /**
     * @return string
     */
    public function getIdcategories()
    {
        return $this->idcategories;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getDesccat()
    {
        return $this->desccat;
    }

    /**
     * @param string $desccat
     */
    public function setDesccat($desccat)
    {
        $this->desccat = $desccat;
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

}