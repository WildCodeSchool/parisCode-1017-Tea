<?php

namespace Tea\Model\Entity;

/**
 * Class Category
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
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $images_idimages;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImagesIdimages()
    {
        return $this->images_idimages;
    }

}



