<?php

namespace Tea\Controllers;

use Tea\Model\Repository\UserManager;

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


		return $this->twig->render('user/home.html.twig'
		);
	}

	/**
	 * @return string
	 */
	public function showOneAction(){
		$id = $_GET['id'];

		if (is_numeric($id)){
			$userManager = new UserManager();
			$user = $userManager->getOne($id);

			return $this->twig->render('user/showOne.html.twig', array(
				'user' => $user
			));
		}
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

    public function contactAction(){
        if ($_POST) {
            // errors array
            $errors = array();
            //start validation
            if (empty($_POST['fn'])) {
                $errors['fn']="Votre nom ne peut pas être vide";
            }
            if (empty($_POST['ln'])) {
                $errors['ln']="Votre prenom ne peut pas être vide";
            }
            if (empty($_POST['phone'])) {
                $errors['phone']="Votre tel ne peut pas être vide";
            }
            if (empty($_POST['email'])) {
                $errors['email']="Votre mail ne peut pas être vide";
            }
            if (empty($_POST['message'])) {
                $errors['message']="Votre message ne peut pas être vide";
            }
            else {
                return $this->twig->render('user/success_contact.html.twig');
            }


        }

        return $this->twig->render('user/contact.html.twig');

    }
}