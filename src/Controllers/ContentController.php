<?php
/**
 * Created by PhpStorm.
 * User: LN-T
 * Date: 28/11/2017
 * Time: 16:22
 */

namespace Tea\Controllers;

use Tea\Model\Repository\ContentManager;

class ContentController extends Controller
{
    public function getAction(){
        $manager = new ContentManager();
        $contents = $manager->getAll();
        return $this->twig->render('admin/tables/adminTablesContent.html.twig', array(
            'contents' => $contents
        ));
    }

    public function addAction (){

        if (empty($_POST)) {
            return $this->twig->render('admin/forms/adminFormsContent.html.twig');
        } else {
            if (
                empty($_POST['title']) ||
                empty($_POST['description'])
            ) {
                $error = "🔴 Please complete all required fields 🔴";
                return $this->twig->render('admin/forms/adminFormsContent.html.twig', array(
                    'errors' => $error,
                    'contents' => $_POST
                ));
            } else {
                $title = htmlspecialchars($_POST['title']);
                $description = htmlspecialchars($_POST['description']);

                // Appel du modele ==> execution de la requete d'enregistrement en base de donné (addCitation())

                $manager = new ContentManager();
                $manager1 = $manager->getAll();

                $manager->add($title, $description);

                // Redirection vers le Controllers frontal index.php
                header('Location: index.php?section=admin&page=tables&table=contents&action=get');
            }
        }
    }

    public function updateAction (){

        $idcontents = $_GET['idcontents'];

        if ((is_numeric($idcontents))  ) {
            if (!empty($_POST)){
                $title = htmlspecialchars($_POST['title']);
                $description = htmlspecialchars($_POST['description']);
                // On les ajoute à la base de donnée grace à la fonction définit dans notre modèle (updateCitation())

                $manager = new ContentManager();
                $manager1 = $manager->getAll();
                $manager->update($idcontents, $title, $description);

                // On redirige vers la page d'accueil
                header('Location: index.php?section=admin&page=tables&table=contents&action=get');
            } else {
                $manager = new ContentManager();
                $contents = $manager->getOne($idcontents);
                return $this->twig->render('admin/forms/adminFormsContent.html.twig', array(
                    'contents' => $contents,
                    'post' => $_POST
                ));
            }
        } else {
            return $this->twig->render('404.html.twig');
        }
    }

    public function deleteAction (){

        $idcontents = $_GET['idcontents'];

        $manager = new ContentManager();
        $manager->delete($idcontents);

        header('Location: index.php?section=admin&page=tables&table=contents&action=get');
    }

}