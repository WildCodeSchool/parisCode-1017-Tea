<?php
/**
 * Created by PhpStorm.
 * User: LN-T
 * Date: 28/11/2017
 * Time: 16:22
 */

namespace Tea\Controllers;

use Tea\Model\Repository\ImageManager;
use Tea\Services\UploadedFile;
use Tea\Services\Uploads;

class ImageController extends Controller
{
    public function getAction(){

        $manager = new ImageManager();
        $images = $manager->getAll();
        return $this->twig->render('admin/tables/adminTablesImage.html.twig', array(
            'images' => $images
        ));
    }

    public function addAction (){

        if (empty($_POST)) {
            return $this->twig->render('admin/forms/adminFormsImage.html.twig');
        } else {
            if (
                empty($_POST['url']) ||
                empty($_POST['alt'])

            ) {
                $error = "🔴 Please complete all required fields 🔴";
                return $this->twig->render('admin/forms/adminFormsImage.html.twig', array(
                    'errors' => $error,
                    'images' => $_POST
                ));
            } else {
                $url = htmlspecialchars($_POST['url']);
                $alt = htmlspecialchars($_POST['alt']);

                // Appel du modele ==> execution de la requete d'enregistrement en base de donné (addCitation())

                $manager = new ImageManager();
                $manager1 = $manager->getAll();

                $manager->add($url, $alt);

                // Redirection vers le Controllers frontal index.php
                header('Location: index.php?section=admin&page=tables&table=images&action=get');
            }
        }
    }

    public function newAction(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Récupérer du tableau d'image envoyé par le formulaire
            $files = $_FILES['images'];

            $upload = new Uploads();
            $cardManager = new CardManager();

            // Parcourir le tableau d'image
            foreach ($files['name'] as $position => $file_name) {

                // Pour chaque image, vérifier s'il n'y a pas d'erreur lié à php ($_FILES['files']['error']
                $error = $files['error'][$position];
                if ($error != 0) {
                    // S'il il y a une erreur php, stocker le message d'erreur dans une variable
                    $error[$file_name] = "erreur PHP";

                    // Sinon on upload
                } else {

                    // Récupération et stockage du name, tmp_name, size du fichier
                    $size = $files['size'][$position];
                    $tmp_name = $files['tmp_name'][$position];

                    // Instanciation d'une objet UploadedFile
                    $uploadedFile = new UploadedFile($file_name, $tmp_name, $size);

                    // Upload du fichier via la méthode défini dans le service
                    $result = $upload->upload($uploadedFile);

                    // Traitement du resultat, si pas d'erreur, on enregitre en BDD, sinon, on ajout un message en session
                    if ($result == null){
                        $cardManager->addImage($uploadedFile->getFileName());
                    }
                }
            }

            // On redirige vers la page d'acceuil
            header("Location: index.php");
        }
        else{
            return $this->twig->render('card/new.html.twig');
        }
    }

    public function updateAction (){

        $idimages = $_GET['idimages'];

        if ((is_numeric($idimages))  ) {
            if (!empty($_POST)){
                $url = htmlspecialchars($_POST['url']);
                $alt = htmlspecialchars($_POST['alt']);
                // On les ajoute à la base de donnée grace à la fonction définit dans notre modèle (updateImage())

                $manager = new ImageManager();
                $manager1 = $manager->getAll();
                $manager->update($idimages, $url, $alt);

                // On redirige vers la page d'accueil
                header('Location: index.php?section=admin&page=tables&table=images&action=get');
            } else {
                $manager = new ImageManager();
                $images = $manager->getOne($idimages);
                return $this->twig->render('admin/forms/adminFormsImage.html.twig', array(
                    'images' => $images,
                    'post' => $_POST
                ));
            }
        } else {
            return $this->twig->render('404.html.twig');
        }
    }

    public function deleteAction (){

        $idimages = $_GET['idimages'];

        $manager = new ImageManager();
        $manager->delete($idimages);

        header('Location: index.php?section=admin&page=tables&table=images&action=get');
    }

}