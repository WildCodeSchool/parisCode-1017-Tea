<?php
/**
 * Created by PhpStorm.
 * User: Florian
 * Date: 27/11/17
 * Time: 23:48
 */

namespace Tea\Services;

class Uploads
{
    /**
     * Uploads directory
     *
     * @var string
     */
    const DIR_PATH = "../uploads/";

    /**
     * Méthode permettant de vérifier les erreurs et contraintes lié au fichier
     *
     * @param  UploadedFile $file
     * @return null|string
     */
    public function checkError(UploadedFile $file)
    {
        $errors = [];
        $allowed = array('jpg', 'png', 'gif', 'jpeg');

        if ($file->getSize() > 1047829) {
            return $errors = '🔴 Error : file size is too big 🔴';
        } elseif (!in_array($file->getExt(), $allowed)) {
            return $errors = '🔴 Error : wrong extension (only jpg, png, gif or jpeg 🔴';
        } else {
            return $errors = null;
        }
    }

    /**
     * Méthode permettant l'upload du fichier
     *
     * @param  $file
     * @return bool|null|string
     */
    public function upload(UploadedFile $file)
    {
        $error = $this->checkError($file);

        if ($error == null) {
            move_uploaded_file($file->getTmpName(), self::DIR_PATH . $file->getFileName());
        }
        return $error;
    }
}