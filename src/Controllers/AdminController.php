<?php

namespace Tea\Controllers;
use Tea\Model\Repository\AdminManager;


/**
 * Class AdminController
 *
 * @package Tea\Controllers
 */
class AdminController extends Controller
{
    /**
     * function 'loginAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/adminLogin.html.twig' page
     *
     * @return string
     */


    /**
     * function 'homeAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/adminHome.html.twig' page
     *
     * @return string
     */
    public function adminHomeAction()
    {
        return $this->twig->render('admin/adminHome.html.twig');
    }

    /**
     * function 'tablesAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/adminTables.html.twig.twig' page
     *
     * @return string
     */
    public function adminTablesAction()
    {
        return $this->twig->render('admin/adminTables.html.twig');
    }

    /**
     * function 'formsAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/adminForms.html.twig.twig' page
     *
     * @return string
     */
    public function adminFormsAction()
    {
        return $this->twig->render('admin/adminForms.html.twig');
    }

    /**
     * function 'formsAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/adminForms.html.twig.twig' page
     *
     * @return string
     */
    public function adminFormsProductAction()
    {
        return $this->twig->render('admin/forms/adminFormsProduct.html.twig');
    }

    /**
     * function 'formsAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/adminForms.html.twig.twig' page
     *
     * @return string
     */
    public function adminTablesProductAction()
    {
        return $this->twig->render('admin/tables/adminTablesProduct.html.twig');
    }

    /**
     * function 'connect'
     *
     */

    public function loginAction()
    {
        if (empty($_POST)) {
            return $this->twig->render('admin/adminLogin.html.twig');
        } else {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $adminManager = new AdminManager();
            $passwordAdmin = $adminManager->getAdmin($login);
            if ($passwordAdmin==false) {
                return $this->twig->render('admin/adminLogin.html.twig', array(
                    "error"=>"Les informations saisies sont erronées"
                ));

            }
            if (password_verify($password, $passwordAdmin->getPassword())) {
                $_SESSION['connect'] = $login;
                return $this->twig->render('admin/adminHome.html.twig', array(
                    'session' => $_SESSION
                ));
            } else {
                return $this->twig->render('admin/adminLogin.html.twig');
            }

        }
    }

    /**
     * function 'disconnect'
     *
     */

    public function logoutAction()
    {
        session_unset();
        session_destroy();
        return $this->twig->render('admin/adminLogin.html.twig');
    }

}