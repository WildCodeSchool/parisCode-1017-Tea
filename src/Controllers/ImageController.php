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
    public function getAction()
    {
        $manager = new ImageManager();
        $images = $manager->getAll();
        return $this->twig->render('admin/tables/adminTablesImage.html.twig', array(
            'images' => $images,
            )
        );
    }

    public function addAction()
    {
        if (empty($_POST)) {
            return $this->twig->render('admin/forms/adminFormsImage.html.twig');
        }
        if (!empty($_POST)) {

            if (empty($_POST['alt'])){
                $error = "🔴 Please complete all required fields 🔴";
                return $this->twig->render(
                    'admin/forms/adminFormsImage.html.twig', array(
                        'errors' => $error,
                        'images' => $_POST
                    )
                );
            }
            if (empty($_POST['url'])) {
                // On les stocke dans la variable $files
                $files = $_FILES['images'];

                $upload = new Uploads();

                foreach ($files['name'] as $key => $file_name) {
                    // Récupération et stockage du name, tmp_name, size du fichier
                    $size = $files['size'][$key];
                    $tmp_name = $files['tmp_name'][$key];
                    // Instanciation d'une objet UploadedFile
                    $uploadedFile = new UploadedFile($file_name, $tmp_name, $size);

                    $error = $upload->upload($uploadedFile);
                    if (isset($error)){
                        return $this->twig->render(
                            'admin/forms/adminFormsImage.html.twig', array(
                                'errors' => $error,
                                'images' => $_POST
                            )
                        );
                    }
                    else {
                        // On récupère le chemin du fichier uploadé pour l'ajouter en BDD
                        $upload->upload($uploadedFile);
                        $url = $uploadedFile->getURL();
                    }
                }
            }
            else {
                $url = htmlspecialchars($_POST['url']);
            }
            $alt = htmlspecialchars($_POST['alt']);

            // Appel du modele ==> execution de la requete d'enregistrement en base de donné (addCitation())
            $manager = new ImageManager();
            $manager1 = $manager->getAll();
            $manager->add($url, $alt);

            // Redirection vers le Controllers frontal index.php
            header('Location: index.php?section=admin&page=tables&table=images&action=get');
        }

    }

    public function deleteAction()
    {
        $idimages = $_GET['idimages'];

        $manager = new ImageManager();
        $manager->delete($idimages);

        header('Location: index.php?section=admin&page=tables&table=images&action=get');
    }

}