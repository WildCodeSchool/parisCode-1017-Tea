<?php

namespace Tea\Controllers;

use Tea\Model\Repository\CategoryManager;
use Tea\Model\Repository\ProductManager;

/**
 * Class DefaultController
 *
 * @package Tea\Controllers
 */
class DefaultController extends Controller
{
    /**
     * Render index
     */
    public function indexAction(){
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->getAll();
        $productManager = new ProductManager();
        $products = $productManager->getAll();
        return $this->twig->render('user/home.html.twig', array(
            'products' => $products,
            'categories' => $categories
        ));
    }

    public function cssAction(){
        return $this->twig->render('user/contact/contactMailAdmin.html.twig');
    }

    public function homeAction(){
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->getAll();
        $productManager = new ProductManager();
        $products = $productManager->getAll();
        return $this->twig->render('user/home.html.twig', array(
            'products' => $products,
            'categories' => $categories
        ));
    }

    public function conceptAction(){
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->getAll();
        return $this->twig->render('user/concept.html.twig', array(
            'categories' => $categories
        ));
    }

    /**
     * Render product page shop
     */
    public function shopAction(){
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->getAll();
        $productManager = new ProductManager();
        $products = $productManager->getAll();
        return $this->twig->render('user/shop.html.twig', array(
            'products' => $products,
            'categories' => $categories
        ));
    }

    public function productAction(){
        $id= $_GET['id'];
        $productManager = new ProductManager();
        $product = $productManager->getOne($id);

        return $this->twig->render('user/product.html.twig', array(
            'product' => $product,
        ) );


    }

}