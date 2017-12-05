<?php

namespace Tea\Model\Repository;

use PDO;
use Tea\Model\Entity\User;

/**
 * Class UserManager
 *
 * @package Tea\Repository
 */
class UserManager extends EntityManager
{
    /**
     * Get all user
     *
     * @return array
     */
    public function getAll()
    {
        $statement = $this->db->query("SELECT users.idusers, users.firstname, users.lastname, users.address, users.email, users.phone, users.login, users.password, roles.idroles, roles.role FROM users JOIN roles ON users.idroles = roles.idroles");
        return $statement->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    /**
     * Get one user
     *
     * @param  id int
     * @return mixed
     */
    public function getOne($idusers)
    {
        $statement = $this->db->prepare("SELECT users.idusers, users.firstname, users.lastname, users.address, users.email, users.phone, users.login, users.password, roles.idroles, roles.role FROM users JOIN roles ON users.idroles = roles.idroles WHERE idusers = :idusers");
        $statement->execute(
            [
            ':idusers' => $idusers
            ]
        );
        return $statement->fetch();
    }

    /**
     * Add one user
     */
    public function add($firstname, $lastname, $address, $email, $phone, $login, $password, $idroles)
    {
        $statement = $this->db->prepare("INSERT INTO users (firstname, lastname, address, email, phone, login, password, idroles) VALUES (:firstname, :lastname, :address, :email, :phone, :login, :password, :idroles)");
        $statement->execute(
            [
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':address' => $address,
            ':email' => $email,
            ':phone' => $phone,
            ':login' => $login,
            ':password' => $password,
            ':idroles' => $idroles
            ]
        );
    }

    /**
     * Update one user
     */
    public function update($idusers, $firstname, $lastname, $address, $email, $phone, $login, $password, $idroles)
    {
        $statement = $this->db->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, address = :address, email = :email, phone = :phone, login = :login, password = :password, idroles = :idroles WHERE idusers = :idusers");
        $statement->execute(
            [
            ':idusers' => $idusers,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':address' => $address,
            ':email' => $email,
            ':phone' => $phone,
            ':login' => $login,
            ':password' => $password,
            ':idroles' => $idroles
            ]
        );
    }

    /**
     * Delete one user
     */
    public function delete($idusers)
    {
        $statement = $this->db->prepare("DELETE FROM users WHERE idusers = :idusers");
        $statement->execute(
            [
            ':idusers' => $idusers
            ]
        );
    }

}