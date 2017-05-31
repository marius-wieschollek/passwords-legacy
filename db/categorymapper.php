<?php
namespace OCA\Passwords\Db;

use \OCP\IDBConnection;
use \OCP\AppFramework\Db\Mapper;

class CategoryMapper extends Mapper {

	public function __construct(IDBConnection $db) {
		parent::__construct($db, 'passwords_categories', '\OCA\Passwords\Db\Category');
	}

	public function find($id, $userId) {
		$sql = 'SELECT * FROM *PREFIX*passwords_categories WHERE id = ? AND user_id = ?';
		return $this->findEntity($sql, [$id, $userId]);
	}

	public function findAll($userId) {
		$dbtype = \OC::$server->getConfig()->getSystemValue('dbtype', 'sqlite3');
		if ($dbtype == 'mysql') {
			$sql = 'SELECT * FROM *PREFIX*passwords_categories WHERE user_id = ? ORDER BY LOWER(category_name) COLLATE utf8mb4_general_ci ASC';
		} else if ($dbtype == 'sqlite' OR $dbtype == 'sqlite3') {
			$sql = 'SELECT * FROM *PREFIX*passwords_categories WHERE user_id = ? ORDER BY category_name COLLATE NOCASE';
		} else {
			$sql = 'SELECT * FROM *PREFIX*passwords_categories WHERE user_id = ? ORDER BY LOWER(category_name) ASC';
		}
		return $this->findEntities($sql, [$userId]);
	}
}
