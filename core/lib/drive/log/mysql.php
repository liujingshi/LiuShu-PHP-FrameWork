<?php

namespace core\lib\drive\log;

use core\lib\model;
use core\lib\conf;

class mysql {
	
	private $model;
	/**
	 * 构造函数 判断表log是否存在 不存在则创建
	 */
	public function __construct() {
		
		$this->model = new model();
		$rst = $this->model->query("SHOW TABLES");
		$tables = $this->model->fetchAll($rst);
		$log = array(
				'Tables_in_'.conf::get('DBNAME', 'database') => 'log'
		);
		if (!in_array($log, $tables)) {
			$sql = "CREATE TABLE `log` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `date` text NOT NULL,
				  `ctrl` text NOT NULL,
				  `action` text NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
			$this->model->query($sql);
		}
	}
	/**
	 * 向数据库写入数据
	 */
	public function log($ctrlName, $actionName) {
		$date = date("Y-m-d H:i:s");
		$sql = "insert into log(date,ctrl,action) values('{$date}','{$ctrlName}','{$actionName}')";
		$this->model->query($sql);
	}
}
