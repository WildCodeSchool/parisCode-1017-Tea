<?php

namespace Tea\Model\Entity;

/**
 * Class User
 * @package Tea\Model\Entity
 */
class User
{
	/**
	 * @var string
	 */
	private $idusers;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $address;

	/**
	 * @var string
	 */
	private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $login;

    /**
     * @return string
     */
    public function getIdusers()
    {
        return $this->idusers;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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

    /**
     * @return string
     */
    public function getRolesIdroles()
    {
        return $this->roles_idroles;
    }

    /**
     * @param string $roles_idroles
     */
    public function setRolesIdroles($roles_idroles)
    {
        $this->roles_idroles = $roles_idroles;
    }

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $roles_idroles;

}