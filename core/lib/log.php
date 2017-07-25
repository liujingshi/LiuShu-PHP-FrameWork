<?php

namespace core\lib;

class log {
	
	public static $class;
	
	public static function init() {
		$drive = conf::get('DRIVE', 'log');
		$class = '\core\lib\drive\log\\'.$drive;
		self::$class = new $class;
	}
	
	public static function log($name) {
		self::$class->log($name);
	}
}
