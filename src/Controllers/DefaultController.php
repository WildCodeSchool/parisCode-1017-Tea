<?php

namespace Tea\Controllers;

//use Tea\Model\Repository\UserManager;
use Tea\Model\Repository\ImageManager;
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
		return $this->twig->render('user/home.html.twig');
	}

  public function homeAction(){
      return $this->twig->render('user/home.html.twig');
  }
  public function conceptAction(){
      return $this->twig->render('user/concept.html.twig');=
  }

  /**
   * Render product page shop
   */
  public function shopAction(){
          $imageManager = new ImageManager();
          $images = $imageManager->getAll();
          $productManager = new ProductManager();
          $products = $productManager->getAll();
      return $this->twig->render('user/shop.html.twig', array(
              'products' => $products,
              'images' => $images
          ));
  }
  
  public function productAction(){
      return $this->twig->render('user/product.html.twig');
  }

}