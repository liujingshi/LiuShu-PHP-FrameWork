<?php

namespace core\lib;

class model extends \PDO {
	public function __construct() {
		$db = conf::all('database');
		try {
			parent::__construct($db['DSN'],$db['USERNAME'],$db['PASSWD']);
		} catch (\PDOException $e) {
			outputError($e->getMessage());
		}
	}
}
