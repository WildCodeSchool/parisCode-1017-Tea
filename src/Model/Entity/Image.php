<?php

namespace Tea\Model\Entity;

/**
 * Class Image
 * @package Tea\Model\Entity
 */
class Image
{
	/**
	 * @var int
	 */
	private $idimages;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $alt;

    /**
     * @return int
     */
    public function getIdImage()
    {
        return $this->idimages;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    }




}