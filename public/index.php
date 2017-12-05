<?php

// Get Vendor autoload
require_once '../vendor/autoload.php';
require_once '../app/config.php';

use Tea\Controllers\DefaultController;

use Tea\Controllers\AdminController;
use Tea\Controllers\CategoryController;
use Tea\Controllers\ContentController;
use Tea\Controllers\ContactController;
use Tea\Controllers\ImageController;
use Tea\Controllers\ProductController;
use Tea\Controllers\RoleController;
use Tea\Controllers\UserController;

$adminController = new AdminController();
$categoryController = new CategoryController();
$contactController = new ContactController();
$contentController = new ContentController();
$imageController = new ImageController();
$productController = new ProductController();
$roleController = new RoleController();
$userController = new UserController();

/**
 * USER
 */
if (empty($_GET) && empty($_POST)) {
    $defaultController = new DefaultController();
    echo $defaultController->indexAction();
} elseif($_GET['section']=='home') {
    $defaultController = new DefaultController();
    echo $defaultController->homeAction();
} elseif($_GET['section']=='concept') {
    $defaultController = new DefaultController();
    echo $defaultController->conceptAction();
} elseif($_GET['section']=='shop') {
    $defaultController = new DefaultController();
    echo $defaultController->shopAction();
} elseif($_GET['section']=='contact') {
    $captchaController = new ContactController();
    echo $contactController->contactAction();
} elseif($_GET['section']=='product') {
    $defaultController = new DefaultController();
    echo $defaultController->productAction();
}

/**
* ADMIN
*/
elseif (($_GET['section'] === 'admin') && ($_GET['page'] === 'login') ) {
    echo $adminController->adminLoginAction();
} elseif (($_GET['section'] === 'admin') && ($_GET['page'] === 'home') ) {
    echo $adminController->adminHomeAction();
}

/**
 * TABLES
 */
elseif (($_GET['section'] === 'admin') && ($_GET['page'] === 'tables') ) {
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
        echo $productController->getAction();
    } elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'add')) {
        echo $productController->addAction();
    } elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'update') && isset($_GET['idproducts'])) {
        echo $productController->updateAction();
    } elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'delete') && isset($_GET['idproducts'])) {
        echo $productController->deleteAction();
    }
    /**
         * TABLE CATEGORIES
         */
    elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'get')) {
        echo $categoryController->getAction();
    } elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'add')) {
        echo $categoryController->addAction();
    } elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'update') && isset($_GET['idcategories'])) {
        echo $categoryController->updateAction();
    } elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'delete') && isset($_GET['idcategories'])) {
        echo $categoryController->deleteAction();
    }
    /**
         * TABLE IMAGES
         */
    elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'get')) {
        echo $imageController->getAction();
    } elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'add')) {
        echo $imageController->addAction();
    } elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'update') && isset($_GET['idimages'])) {
        echo $imageController->updateAction();
    } elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'delete') && isset($_GET['idimages'])) {
        echo $imageController->deleteAction();
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
elseif (($_GET['section'] === 'admin') && ($_GET['page'] === 'forms') ) {
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
        echo $productController->addAction();
    } elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'update') && isset($_GET['idproducts'])) {
        echo $productController->updateAction();
    } elseif (($_GET['table'] === 'products') && ($_GET['action'] === 'delete') && isset($_GET['idproducts'])) {
        echo $productController->deleteAction();
    }
    /**
     * FORM CATEGORIES
     */
    elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'add')) {
        echo $categoryController->addAction();
    } elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'update') && isset($_GET['idcategories'])) {
        echo $categoryController->updateAction();
    } elseif (($_GET['table'] === 'categories') && ($_GET['action'] === 'delete') && isset($_GET['idcategories'])) {
        echo $categoryController->deleteAction();
    }
    /**
     * FORM IMAGES
     */
    elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'add')) {
        echo $imageController->addAction();
    } elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'update') && isset($_GET['idimages'])) {
        echo $imageController->updateAction();
    } elseif (($_GET['table'] === 'images') && ($_GET['action'] === 'delete') && isset($_GET['idimages'])) {
        echo $imageController->deleteAction();
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