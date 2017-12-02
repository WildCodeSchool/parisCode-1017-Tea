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
            'images' => $images,
        ));
    }

    public function addAction ()
    {

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

                // Appel du modele ==> execution de la requete d'enregistrement en base de données)

                $manager = new ImageManager();

                $manager->add($url, $alt);

                // Récupérer du tableau d'image envoyé par le formulaire
                $files = $_FILES['images'];

                $upload = new Uploads();

                // Parcourir le tableau d'image
                foreach ($files['name'] as $position => $file_name) {

                    // Pour chaque image, vérifier s'il n'y a pas d'erreur lié à php ($_FILES['files']['error']
                    $error = $files['error'][$position];
                    if ($error != 0) {
                        // S'il y a une erreur php, stocker le message d'erreur dans une variable
                        echo "erreur PHP dans la fonction add image et upload";

                        // Sinon on upload
                    } else {

                        // Récupération et stockage du name, tmp_name, size du fichier
                        $size = $files['size'][$position];
                        $tmp_name = $files['tmp_name'][$position];

                        // Instanciation d'une objet UploadedFile
                        $uploadedFile = new UploadedFile($file_name, $tmp_name, $size);

                        // Upload du fichier via la méthode défini dans le service
                        $upload->upload($uploadedFile);

                        // Redirection vers le Controllers frontal index.php
                        header('Location: index.php?section=admin&page=tables&table=images&action=get');

                    }
                }
            }
        }
    }








    public function updateAction ()
    {

        $idimages = $_GET['idimages'];

        if ((is_numeric($idimages))) {
            if (!empty($_POST)) {
                $url = htmlspecialchars($_POST['url']);
                $alt = htmlspecialchars($_POST['alt']);
                // On les ajoute à la base de données grace à la fonction définit dans notre modèle (updateImage())

                $manager = new ImageManager();

                $manager->update($idimages, $url, $alt);

                $files = $_FILES['images'];
                    // Récupérer du tableau d'image envoyé par le formulaire
                    $files = $_FILES['images'];

                    $upload = new Uploads();

                    // Parcourir le tableau d'image
                    foreach ($files['name'] as $position => $file_name) {

                        // Pour chaque image, vérifier s'il n'y a pas d'erreur lié à php ($_FILES['files']['error']
                        $error = $files['error'][$position];
                        if ($error != 0) {
                            // S'il y a une erreur php, stocker le message d'erreur dans une variable
                            echo "erreur PHP dans la fonction add image et upload";

                            // Sinon on upload
                        } else {

                            // Récupération et stockage du name, tmp_name, size du fichier
                            $size = $files['size'][$position];
                            $tmp_name = $files['tmp_name'][$position];

                            // Instanciation d'une objet UploadedFile
                            $uploadedFile = new UploadedFile($file_name, $tmp_name, $size);

                            // Upload du fichier via la méthode défini dans le service
                            $upload->upload($uploadedFile);

                            // Redirection vers le Controllers frontal index.php
                            header('Location: index.php?section=admin&page=tables&table=images&action=get');

                        }
                    }

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