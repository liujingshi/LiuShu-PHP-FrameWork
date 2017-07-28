<?php

namespace core\lib;

class log {
	
	public static $class;
	/**
	 * 获取日志存储方式 并建立相应对象
	 */
	public static function init() {
		$drive = conf::get('DRIVE', 'log');
		$class = '\core\lib\drive\log\\'.$drive;
		self::$class = new $class;
	}
	/**
	 * 存储日志
	 */
	public static function log($ctrlName, $actionName) {
		self::$class->log($ctrlName, $actionName);
	}
}
