<?php
/**
 * Created by PhpStorm.
 * User: LN-T
 * Date: 28/11/2017
 * Time: 16:22
 */

namespace Tea\Controllers;

use Tea\Model\Repository\CategoryManager;
use Tea\Model\Repository\ImageManager;

class CategoryController extends Controller
{
    public function getAction()
    {
        $manager = new CategoryManager();
        $categories = $manager->getAll();
        return $this->twig->render(
            'admin/tables/adminTablesCategory.html.twig', array(
            'categories' => $categories
            )
        );
    }

    public function addAction()
    {
        $manager = new ImageManager();
        $images = $manager->getAll();

        if (empty($_POST)) {
            return $this->twig->render(
                'admin/forms/adminFormsCategory.html.twig', array(
                    'images' => $images
                )
            );
        } else {
            if (empty($_POST['category'])
                || empty($_POST['desccat'])
                || empty($_POST['idimages'])
            ) {
                $error = "🔴 Please complete all required fields 🔴";
                return $this->twig->render(
                    'admin/forms/adminFormsCategory.html.twig', array(
                    'errors' => $error,
                    'images' => $images,
                    'categories' => $_POST
                    )
                );
            } else {
                $category = htmlspecialchars($_POST['category']);
                $desccat = htmlspecialchars($_POST['desccat']);
                $idimages = htmlspecialchars($_POST['idimages']);

                // Appel du modele ==> execution de la requete d'enregistrement en base de donnée

                $manager = new CategoryManager();
                $manager->add($category, $desccat, $idimages);

                // Redirection vers le Controllers frontal index.php
                header('Location: index.php?section=admin&page=tables&table=categories&action=get');
            }
        }
    }

    public function updateAction()
    {

        $manager = new ImageManager();
        $images = $manager->getAll();

        $idcategories = $_GET['idcategories'];

        if ((is_numeric($idcategories))  ) {
            if (!empty($_POST)) {
                $category = htmlspecialchars($_POST['category']);
                $desccat = htmlspecialchars($_POST['desccat']);
                $idimages = htmlspecialchars($_POST['idimages']);
                // On les ajoute à la base de donnée grace à la fonction définit dans notre modèle (updateCitation())
        
                $manager = new CategoryManager();
                $manager->update($idcategories, $category, $desccat, $idimages);

                // On redirige vers la page d'accueil
                header('Location: index.php?section=admin&page=tables&table=categories&action=get');
            } else {
                $manager = new CategoryManager();
                $categories = $manager->getOne($idcategories);
                return $this->twig->render(
                    'admin/forms/adminFormsCategory.html.twig', array(
                    'categories' => $categories,
                    'images' => $images,
                    'post' => $_POST
                    )
                );
            }
        } else {
            return $this->twig->render('404.html.twig');
        }
    }

    public function deleteAction()
    {

        $idcategories = $_GET['idcategories'];

        $manager = new CategoryManager();
        $manager->delete($idcategories);

        header('Location: index.php?section=admin&page=tables&table=categories&action=get');
    }

}