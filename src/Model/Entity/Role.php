<?php

namespace Tea\Model\Entity;

/**
 * Class Role
 *
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
    private $role;

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
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

}