<?php

namespace Tea\Model\Entity;

/**
 * Class Content
 * @package Tea\Model\Entity
 */
class Content
{
	/**
	 * @var string
	 */
	private $idcontents;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @return string
     */
    public function getIdcontents()
    {
        return $this->idcontents;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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

}