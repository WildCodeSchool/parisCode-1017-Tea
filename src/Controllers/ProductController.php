<?php
namespace Tea\Controllers;

use Tea\Model\Repository\ProductManager;
use Tea\Model\Repository\CategoryManager;
use Tea\Model\Repository\ImageManager;

class ProductController extends Controller
{
    public function getAction(){
        $manager = new ProductManager();
        $products = $manager->getAll();
        return $this->twig->render('admin/tables/adminTablesProduct.html.twig', array('products' => $products));
    }

    public function addAction (){
        $manager = new CategoryManager();
        $categories = $manager->getAll();
        $manager = new ImageManager();
        $images = $manager->getAll();

        if (empty($_POST)) {
            return $this->twig->render('admin/forms/adminFormsProduct.html.twig', array (
                    'categories' => $categories,
                    'images' => $images
                ));
        } else {
            if (
                empty($_POST['name']) ||
                empty($_POST['description']) ||
                empty($_POST['quantity']) ||
                empty($_POST['price']) ||
                empty($_POST['images_idimages']) ||
                empty($_POST['categories_idcategories'])
            ) {
                $error = " 💩 Please complete all required fields ";
                return $this->twig->render('admin/forms/adminFormsProduct.html.twig', array(
                    'errors' => $error,
                    'products' => $_POST,
                    'categories' => $categories,
                    'images' => $images
                ));
            } else {
                $name = htmlspecialchars($_POST['name']);
                $description = htmlspecialchars($_POST['description']);
                $quantity = htmlspecialchars($_POST['quantity']);
                $price = htmlspecialchars($_POST['price']);
                $images_idimages = htmlspecialchars($_POST['images_idimages']);
                $categories_idcategories = htmlspecialchars($_POST['categories_idcategories']);


                // Appel du modele ==> execution de la requete d'enregistrement en base de donnée (addProducts())

                $manager = new ProductManager();
                $manager1 = $manager->getAll();

                $manager->add($name, $description, $quantity, $price, $images_idimages, $categories_idcategories);

                // Redirection vers le Controllers frontal index.php
                header('Location: index.php?section=admin&page=tables&table=products&action=get');
            }
        }
    }

    public function updateAction (){

        $idproducts = $_GET['idproducts'];
        $manager = new CategoryManager();
        $categories = $manager->getAll();
        $manager = new ImageManager();
        $images = $manager->getAll();

        if ((is_numeric($idproducts))  ) {
            if (!empty($_POST)){
                $name = htmlspecialchars($_POST['name']);
                $description = htmlspecialchars($_POST['description']);
                $quantity = htmlspecialchars($_POST['quantity']);
                $price = htmlspecialchars($_POST['price']);
                $images_idimages = htmlspecialchars($_POST['images_idimages']);
                $categories_idcategories = htmlspecialchars($_POST['categories_idcategories']);

                // On les ajoute à la base de donnée grace à la fonction définit dans notre modèle (updateProducts())

                $manager = new ProductManager();
                $manager1 = $manager->getAll();
                $manager->update($idproducts, $name, $description, $quantity, $price, $images_idimages, $categories_idcategories);

                // On redirige vers la page d'accueil
                header('Location: index.php?section=admin&page=tables&table=products&action=get');
            } else {
                $manager = new ProductManager();
                $products = $manager->getOne($idproducts);
                return $this->twig->render('admin/forms/adminFormsProduct.html.twig', array(
                    'products' => $products,
                    'post' => $_POST,
                    'categories' => $categories,
                    'images' => $images
                ));
            }
        } else {
            return $this->twig->render('404.html.twig');
        }
    }

    public function deleteAction (){

        $idproducts = $_GET['idproducts'];

        $manager = new ProductManager();
        $manager->delete($idproducts);

        header('Location: index.php?section=admin&page=tables&table=products&action=get');
    }

}