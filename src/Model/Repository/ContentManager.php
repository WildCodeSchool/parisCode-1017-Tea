<?php

namespace Tea\Model\Repository;

use PDO;
use Tea\Model\Entity\Content;

/**
 * Class ContentManager
 * @package Tea\Repository
 */
class ContentManager extends EntityManager
{
	/**
	 * Get all content
	 * @return array
	 */
	public function getAll(){
		$statement = $this->db->query('SELECT * FROM contents');
		return $statement->fetchAll(PDO::FETCH_CLASS, Content::class);
	}

	/**
	 * Get one content
	 * @param $id int
	 * @return mixed
	 */
	public function getOne($idcontents){
		$statement = $this->db->prepare("SELECT * FROM contents WHERE idcontents = :idcontents");
		$statement->execute([
			':idcontents' => $idcontents
		]);
		return $statement->fetch();
	}

    /**
     * Add one content
     */
    public function add($title, $description){
        $statement = $this->db->prepare("INSERT INTO contents (title, description) VALUES (:title, :description)");
        $statement->execute([
            ':title' => $title,
            ':description' => $description
        ]);
    }

	/**
	 * Update one content
	 */
	public function update($idcontents, $title, $description){
        $statement = $this->db->prepare("UPDATE contents SET title = :title, description = :description WHERE idcontents = :idcontents");
        $statement->execute([
            ':idcontents' => $idcontents,
            ':title' => $title,
            ':description' => $description
        ]);
	}

	/**
	 * Delete one content
	 */
	public function delete($idcontents){
        $statement = $this->db->prepare("DELETE FROM contents WHERE idcontents = :idcontents");
        $statement->execute([
            ':idcontents' => $idcontents
        ]);
	}

}