<?php
/**
 * Created by PhpStorm.
 * User: jennyviannay
 * Date: 06/12/2017
 * Time: 11:37
 */

namespace Tea\Model\Entity;


/**
 * Class Admin
 * @package Tea\Model\Entity
 */

class Admin
{
    /**
     * @var string
     */
    private $idadmin;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @return string
     */
    public function getIdadmin()
    {
        return $this->idadmin;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

}