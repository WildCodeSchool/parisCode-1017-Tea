<?php
/**
 * Created by PhpStorm.
 * User: LN-T
 * Date: 28/11/2017
 * Time: 16:22
 */

namespace Tea\Controllers;

use Tea\Model\Repository\UserManager;
use Tea\Model\Repository\RoleManager;

class UserController extends Controller
{
    public function getAction(){
        $manager = new UserManager();
        $users = $manager->getAll();
        return $this->twig->render('admin/tables/adminTablesUser.html.twig', array(
            'users' => $users
        ));
    }

    public function addAction (){

        $manager = new RoleManager();
        $roles = $manager->getAll();

        if (empty($_POST)) {
            return $this->twig->render('admin/forms/adminFormsUser.html.twig', array(
                'roles' => $roles
            ));
        } else {
            if (
                empty($_POST['firstname']) ||
                empty($_POST['lastname']) ||
                empty($_POST['address']) ||
                empty($_POST['email']) ||
                empty($_POST['phone']) ||
                empty($_POST['login']) ||
                empty($_POST['password']) ||
                empty($_POST['roles_idroles'])
            ) {
                $error = "🔴 Please complete all required fields 🔴";
                return $this->twig->render('admin/forms/adminFormsUser.html.twig', array(
                    'roles' => $roles,
                    'errors' => $error,
                    'users' => $_POST
                ));
            } else {
                $firstname = htmlspecialchars($_POST['firstname']);
                $lastname = htmlspecialchars($_POST['lastname']);
                $address = htmlspecialchars($_POST['address']);
                $email = htmlspecialchars($_POST['email']);
                $phone = htmlspecialchars($_POST['phone']);
                $login = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars($_POST['password']);
                $roles_idroles = htmlspecialchars($_POST['roles_idroles']);

                // Appel du modele ==> execution de la requete d'enregistrement en base de donné (addCitation())

                $manager = new UserManager();
                $manager1 = $manager->getAll();

                $manager->add($firstname, $lastname, $address, $email, $phone, $login, $password, $roles_idroles);

                // Redirection vers le Controllers frontal index.php
                header('Location: index.php?section=admin&page=tables&table=users&action=get');
            }
        }
    }

    public function updateAction (){

        $manager = new RoleManager();
        $roles = $manager->getAll();

        $idusers = $_GET['idusers'];

        if ((is_numeric($idusers))  ) {
            if (!empty($_POST)){
                $firstname = htmlspecialchars($_POST['firstname']);
                $lastname = htmlspecialchars($_POST['lastname']);
                $address = htmlspecialchars($_POST['address']);
                $email = htmlspecialchars($_POST['email']);
                $phone = htmlspecialchars($_POST['phone']);
                $login = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars($_POST['password']);
                $roles_idroles = htmlspecialchars($_POST['roles_idroles']);
                // On les ajoute à la base de donnée grace à la fonction définit dans notre modèle (updateCitation())

                $manager = new UserManager();
                $manager1 = $manager->getAll();
                $manager->update($idusers, $firstname, $lastname, $address, $email, $phone, $login, $password, $roles_idroles);

                // On redirige vers la page d'accueil
                header('Location: index.php?section=admin&page=tables&table=users&action=get');
            } else {
                $manager = new UserManager();
                $users = $manager->getOne($idusers);
                return $this->twig->render('admin/forms/adminFormsUser.html.twig', array(
                    'roles' => $roles,
                    'users' => $users,
                    'post' => $_POST
                ));
            }
        } else {
            return $this->twig->render('404.html.twig');
        }
    }

    public function deleteAction (){

        $idusers = $_GET['idusers'];

        $manager = new UserManager();
        $manager->delete($idusers);

        header('Location: index.php?section=admin&page=tables&table=users&action=get');
    }

}