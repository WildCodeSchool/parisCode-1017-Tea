<?php

namespace Tea\Controllers;

//use Tea\Model\Repository\UserManager;

/**
 * Class DefaultController
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
        return $this->twig->render('user/concept.html.twig');

    }

    public function shopAction(){
        return $this->twig->render('user/shop.html.twig');

    }

//    public function contactAction(){
//        if ($_POST) {
//            // errors array
//            $errors = array();
//            //start validation
//            if (empty($_POST['fn'])) {
//                $errors['fn']="Merci de bien vouloir saisir votre nom";
//            }
//            if (empty($_POST['ln'])) {
//                $errors['ln']="Merci de bien vouloir saisir votre prénom";
//            }
//            if (empty($_POST['phone'])) {
//                $errors['phone']="Merci de bien vouloir saisir votre numéro de téléphone";
//            }
//            if (empty($_POST['email'])) {
//                $errors['email']="Merci de bien vouloir saisir votre adresse email";
//            }
//            if (empty($_POST['message'])) {
//                $errors['message']="Merci de bien vouloir saisir votre message";
//            }
//            if (count($errors) > 0){
//                return $this->twig->render('user/contact.html.twig', array(
//                    'errors' => $errors,
//                    'post' => $_POST
//                ));
//            }
//            else {
//                return $this->sendEmail($_POST);
//            }
//
//        }
//
//        return $this->twig->render('user/contact.html.twig');
//    }

    public function productAction(){
        return $this->twig->render('user/product.html.twig');

    }



}












