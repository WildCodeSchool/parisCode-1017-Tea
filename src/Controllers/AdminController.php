<?php

namespace Tea\Controllers;

/**
 * Class AdminController
 * @package Tea\Controllers
 */
class AdminController extends Controller
{
    /**
     * function 'loginAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/adminLogin.html.twig' page
     * @return string
     */
    public function adminLoginAction(){
        return $this->twig->render('admin/adminLogin.html.twig');
    }

    /**
     * function 'homeAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/adminHome.html.twig' page
     * @return string
     */
    public function adminHomeAction(){
        return $this->twig->render('admin/adminHome.html.twig');
    }

    /**
     * function 'tablesAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/adminTables.html.twig.twig' page
     * @return string
     */
    public function adminTablesAction(){
        return $this->twig->render('admin/adminTables.html.twig');
    }

    /**
     * function 'formsAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/adminForms.html.twig.twig' page
     * @return string
     */
    public function adminFormsAction(){
        return $this->twig->render('admin/adminForms.html.twig');
    }

}