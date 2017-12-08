<?php

namespace Tea\Model\Repository;

use PDO;
use Tea\Model\Entity\Image;

/**
 * Class ImageManager
 *
 * @package Tea\Repository
 */
class ImageManager extends EntityManager
{
    /**
     * Get all image
     *
     * @return array
     */
    public function getAll()
    {
        $statement = $this->db->query("SELECT * FROM images");
        return $statement->fetchAll(PDO::FETCH_CLASS, Image::class);
    }

    /**
     * Get one image
     *
     * @param  id int
     * @return mixed
     */
    public function getOne($idimages)
    {
        $statement = $this->db->prepare("SELECT * FROM images WHERE idimages = :idimages");
        $statement->execute(
            [
            ':idimages' => $idimages
            ]
        );
        return $statement->fetch();
    }

    /**
     * Add one image
     */
    public function add($url, $alt)
    {
        $statement = $this->db->prepare("INSERT INTO images (url, alt) VALUES (:url, :alt)");
        $statement->execute(
            [
            ':url' => $url,
            ':alt' => $alt,
            ]
        );
    }

    /**
     * Update one image
     */
    public function update($idimages, $url, $alt)
    {
        $statement = $this->db->prepare("UPDATE images SET url = :url, alt = :alt WHERE idimages = :idimages");
        $statement->execute(
            [
            ':idimages' => $idimages,
            ':url' => $url,
            ':alt' => $alt,
            ]
        );
    }

    /**
     * Delete one image
     */
    public function delete($idimages)
    {
        $statement = $this->db->prepare("DELETE FROM images WHERE idimages = :idimages");
        $statement->execute(
            [
            ':idimages' => $idimages
            ]
        );
    }

}