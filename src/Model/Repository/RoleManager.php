<?php

namespace Tea\Model\Repository;

use PDO;
use Tea\Model\Entity\Role;

/**
 * Class ContentManager
 * @package Tea\Repository
 */
class RoleManager extends EntityManager
{
	/**
	 * Get all content
	 * @return array
	 */
	public function getAll(){
		$statement = $this->db->query('SELECT * FROM roles');
		return $statement->fetchAll(PDO::FETCH_CLASS, Role::class);
	}

}