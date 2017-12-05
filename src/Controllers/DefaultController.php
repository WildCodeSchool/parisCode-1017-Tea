<?php

namespace Tea\Controllers;

//use Tea\Model\Repository\UserManager;

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
    public function indexAction()
    {
        return $this->twig->render('user/home.html.twig');
    }

    public function homeAction()
    {
        return $this->twig->render('user/home.html.twig');
    }
    public function conceptAction()
    {
        return $this->twig->render('user/concept.html.twig');
    }

    public function shopAction()
    {
        return $this->twig->render('user/shop.html.twig');
    }

    public function productAction()
    {
        return $this->twig->render('user/product.html.twig');
    }

}