<?php

namespace Tea\Model\Entity;

/**
 * Class Content
 *
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
    private $content;

    /**
     * @var string
     */
    private $desccon;

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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getDesccon()
    {
        return $this->desccon;
    }

    /**
     * @param string $desccon
     */
    public function setDesccon($desccon)
    {
        $this->desccon = $desccon;
    }

}