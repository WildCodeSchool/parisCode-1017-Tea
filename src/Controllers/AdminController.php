<?php

namespace Tea\Controllers;

use Tea\Model\ModelManager;


/**
 * Class AdminController
 * @package Tea\Controllers
 */
class AdminController extends Controller
{
    /**
     * function 'loginAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/loginAdmin.html.twig' page
     * @return string
     */
    public function loginAdminAction(){
        return $this->twig->render('admin/loginAdmin.html.twig');
    }

    /**
     * function 'homeAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/homeAdmin.html.twig' page
     * @return string
     */
    public function homeAdminAction(){
        return $this->twig->render('admin/homeAdmin.html.twig');
    }


    /**
     * function 'tablesAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/tablesAdmin.html.twig.twig' page
     * @return string
     */
    public function tablesAdminAction(){
        $manager = new ModelManager();
        $all = $manager->getallCitations();
        return $this->twig->render('/admin/tablesAdmin.html.twig', array(
            'alls' => $all
        ));
    }

    /**
     * function 'formsAdminAction'
     * Get SQLfunction 'getAllCitations' then go to 'admin/formsAdmin.html.twig.twig' page
     * @return string
     */
    public function formsAdminAction(){
        return $this->twig->render('/admin/formsAdmin.html.twig');
    }

}