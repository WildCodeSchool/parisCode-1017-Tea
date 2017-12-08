<?php

namespace Tea\Model\Repository;

use PDO;
use Tea\Model\Entity\Content;

/**
 * Class ContentManager
 *
 * @package Tea\Repository
 */
class ContentManager extends EntityManager
{
    /**
     * Get all content
     *
     * @return array
     */
    public function getAll()
    {
        $statement = $this->db->query("SELECT * FROM contents");
        return $statement->fetchAll(PDO::FETCH_CLASS, Content::class);
    }

    /**
     * Get one content
     *
     * @param  $id int
     * @return mixed
     */
    public function getOne($idcontents)
    {
        $statement = $this->db->prepare("SELECT * FROM contents WHERE idcontents = :idcontents");
        $statement->execute(
            [
            ':idcontents' => $idcontents
            ]
        );
        return $statement->fetch();
    }

    /**
     * Add one content
     */
    public function add($content, $desccon)
    {
        $statement = $this->db->prepare("INSERT INTO contents (content, desccon) VALUES (:content, :desccon)");
        $statement->execute(
            [
            ':content' => $content,
            ':desccon' => $desccon
            ]
        );
    }

    /**
     * Update one content
     */
    public function update($idcontents, $content, $desccon)
    {
        $statement = $this->db->prepare("UPDATE contents SET content = :content, desccon = :desccon WHERE idcontents = :idcontents");
        $statement->execute(
            [
            ':idcontents' => $idcontents,
            ':content' => $content,
            ':desccon' => $desccon
            ]
        );
    }

    /**
     * Delete one content
     */
    public function delete($idcontents)
    {
        $statement = $this->db->prepare("DELETE FROM contents WHERE idcontents = :idcontents");
        $statement->execute(
            [
            ':idcontents' => $idcontents
            ]
        );
    }

}