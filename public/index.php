<?php

// Get Vendor autoload
require_once '../vendor/autoload.php';
require_once '../app/config.php';

use Tea\Controllers\DefaultController;
use Tea\Controllers\AdminController;
use Tea\Controllers\UserController;
use Tea\Controllers\ContentController;
use Tea\Controllers\RoleController;

$adminController = new AdminController();
$userController = new UserController();
$contentController = new ContentController();
$roleController = new RoleController();

/**
 * USER
 */
    if (empty($_GET) && empty($_POST)){
        $defaultController = new DefaultController();
        echo $defaultController->indexAction();
    } elseif($_GET['section']=='home'){
        $defaultController = new DefaultController();
        echo $defaultController->homeAction();
    } elseif($_GET['section']=='concept'){
        $defaultController = new DefaultController();
        echo $defaultController->conceptAction();
    } elseif($_GET['section']=='shop'){
        $defaultController = new DefaultController();
        echo $defaultController->shopAction();
    } elseif($_GET['section']=='contact'){
        $defaultController = new DefaultController();
        echo $defaultController->contactAction();
    }

/**
 * ADMIN
 */
    elseif ( ($_GET['section'] === 'admin') && ($_GET['page'] === 'login') ) {
        echo $adminController->adminLoginAction();
    } elseif ( ($_GET['section'] === 'admin') && ($_GET['page'] === 'home') ){
        echo $adminController->adminHomeAction();
    }

    /**
     * TABLES
     */
        elseif ( ($_GET['section'] === 'admin') && ($_GET['page'] === 'tables') ) {
            if (!isset($_GET['action'])) {
                echo $adminController->adminTablesAction();
            }
            /**
             * TABLE USERS
             */
            elseif (($_GET['table'] === 'users') && ($_GET['action'] === 'get')) {
                echo $userController->getAction();
            } elseif (($_GET['table'] === 'users') && ($_GET['action'] === 'add')) {
                echo $userController->addAction();
            } elseif (($_GET['table'] === 'users') && ($_GET['action'] === 'update') && isset($_GET['idusers'])) {
                echo $userController->updateAction();
            } elseif (($_GET['table'] === 'users') && ($_GET['action'] === 'delete') && isset($_GET['idusers'])) {
                echo $userController->deleteAction();
            }
            /**
             * TABLE PRODUCTS
             */
            elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'get')) {
                echo $userController->getAction();
            } elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'add')) {
                echo $userController->addAction();
            } elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'update') && isset($_GET['idproducts'])) {
                echo $userController->updateAction();
            } elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'delete') && isset($_GET['idproducts'])) {
                echo $userController->deleteAction();
            }
            /**
             * TABLE CATEGORIES
             */
            elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'get')) {
                echo $userController->getAction();
            } elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'add')) {
                echo $userController->addAction();
            } elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'update') && isset($_GET['idcategories'])) {
                echo $userController->updateAction();
            } elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'delete') && isset($_GET['idcategories'])) {
                echo $userController->deleteAction();
            }
            /**
             * TABLE IMAGES
             */
            elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'get')) {
                echo $userController->getAction();
            } elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'add')) {
                echo $userController->addAction();
            } elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'update') && isset($_GET['idimages'])) {
                echo $userController->updateAction();
            } elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'delete') && isset($_GET['idimages'])) {
                echo $userController->deleteAction();
            }
            /**
             * TABLE CONTENTS
             */
            elseif (($_GET['table'] === 'contents') && ($_GET['action'] === 'get')) {
                echo $contentController->getAction();
            } elseif (($_GET['table'] === 'contents') && ($_GET['action'] === 'add')) {
                echo $contentController->addAction();
            } elseif (($_GET['table'] === 'contents') && ($_GET['action'] === 'update') && isset($_GET['idcontents'])) {
                echo $contentController->updateAction();
            } elseif (($_GET['table'] === 'contents') && ($_GET['action'] === 'delete') && isset($_GET['idcontents'])) {
                echo $contentController->deleteAction();
            }
        }

    /**
     * FORMS
     */
    elseif ( ($_GET['section'] === 'admin') && ($_GET['page'] === 'forms') ){
        if (!isset($_GET['action'])) {
            echo $adminController->adminFormsAction();
        }
        /**
         * FORM USERS
         */
        elseif (($_GET['table'] === 'users') && ($_GET['action'] === 'add')) {
            echo $userController->addAction();
        } elseif (($_GET['table'] === 'users') && ($_GET['action'] === 'update') && isset($_GET['idusers'])) {
            echo $userController->updateAction();
        } elseif (($_GET['table'] === 'users') && ($_GET['action'] === 'delete') && isset($_GET['idusers'])) {
            echo $userController->deleteAction();
        }
        /**
         * FORM PRODUCTS
         */
        elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'add')) {
            echo $userController->addAction();
        } elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'update') && isset($_GET['idproducts'])) {
            echo $userController->updateAction();
        } elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'delete') && isset($_GET['idproducts'])) {
            echo $userController->deleteAction();
        }
        /**
         * FORM CATEGORIES
         */
        elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'add')) {
            echo $userController->addAction();
        } elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'update') && isset($_GET['idcategories'])) {
            echo $userController->updateAction();
        } elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'delete') && isset($_GET['idcategories'])) {
            echo $userController->deleteAction();
        }
        /**
         * FORM IMAGES
         */
        elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'add')) {
            echo $userController->addAction();
        } elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'update') && isset($_GET['idimages'])) {
            echo $userController->updateAction();
        } elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'delete') && isset($_GET['idimages'])) {
            echo $userController->deleteAction();
        }
        /**
         * FORM CONTENTS
         */
        elseif (($_GET['table'] === 'contents') && ($_GET['action'] === 'add')) {
            echo $contentController->addAction();
        } elseif (($_GET['table'] === 'contents') && ($_GET['action'] === 'update') && isset($_GET['idcontents'])) {
            echo $contentController->updateAction();
        } elseif (($_GET['table'] === 'contents') && ($_GET['action'] === 'delete') && isset($_GET['idcontents'])) {
            echo $contentController->deleteAction();
        }
    }