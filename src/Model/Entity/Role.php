<?php

namespace Tea\Model\Entity;

/**
 * Class Role
 * @package Tea\Model\Entity
 */
class Role
{
	/**
	 * @var string
	 */
	private $idroles;

    /**
     * @var string
     */
    private $type;

    /**
     * @return string
     */
    public function getIdroles()
    {
        return $this->idroles;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

}