<?php
/**
 * Created by PhpStorm.
 * User: LN-T
 * Date: 28/11/2017
 * Time: 16:22
 */

namespace Tea\Controllers;


use Tea\Model\Repository\UserManager;

class UserController extends Controller
{
    public function addAction (){

        $firstname = 'plop';
        $lastname = 'plopi';
        $address = 'plopa';
        $email = 'plopou';
        $phone = 'plop';
        $login = 'plop';
        $password = 'plop';
        $roles_idroles = 1;

//        $firstname = htmlspecialchars($_POST['firstname']);
//        $lastname = htmlspecialchars($_POST['lastname']);
//        $address = htmlspecialchars($_POST['address']);
//        $email = htmlspecialchars($_POST['email']);
//        $phone = htmlspecialchars($_POST['phone']);
//        $login = htmlspecialchars($_POST['login']);
//        $password = htmlspecialchars($_POST['password']);

        $manager = new UserManager();
        $manager->add($firstname, $lastname, $address, $email, $phone, $login, $password, $roles_idroles);

        header('Location: index.php?section=admin&page=tables');
    }

    public function updateAction (){

        $idusers = 5;
        $firstname = 'yo';
        $lastname = 'diana';
        $address = 'jenny';
        $email = 'ln';
        $phone = 'plop';
        $login = 'plop';
        $password = 'plop';

//        $idusers = $_GET['idusers'];
//        $firstname = htmlspecialchars($_POST['firstname']);
//        $lastname = htmlspecialchars($_POST['lastname']);
//        $address = htmlspecialchars($_POST['address']);
//        $email = htmlspecialchars($_POST['email']);
//        $phone = htmlspecialchars($_POST['phone']);
//        $login = htmlspecialchars($_POST['login']);
//        $password = htmlspecialchars($_POST['password']);

        $manager = new UserManager();
        $manager->update($idusers, $firstname, $lastname, $address, $email, $phone, $login, $password);

        header('Location: index.php?section=admin&page=tables');
    }

    public function deleteAction (){
//        $idusers = $_GET['idusers'];
        $idusers = 8;
        $manager = new UserManager();
        $manager->delete($idusers);

        header('Location: index.php?section=admin&page=tables');
    }

}