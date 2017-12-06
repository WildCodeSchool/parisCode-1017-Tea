<?php
/**
 * Created by PhpStorm.
 * User: jennyviannay
 * Date: 06/12/2017
 * Time: 11:31
 */

namespace Tea\Model\Repository;


use Tea\Model\Entity\Admin;

class AdminManager extends EntityManager
{

    /**
     * Verify one admin
     */
    public function getAdmin($login){
        $statement = $this->db->prepare('SELECT password FROM admin WHERE login=:login');
        $statement->execute(array(
            ':login' => $login
        ));
        return $statement->fetchObject(Admin::class);
    }
}