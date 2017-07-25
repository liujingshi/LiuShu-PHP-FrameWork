<?php

namespace core\lib;

class conf {
	
	public static $conf = array();
	/**
	 * 加载配置文件指定配置项
	 */
	public static function get($name, $file) {
		if (isset(self::$conf[$file])) {
			return self::$conf[$file][$name];
		} else {
			$path = LIUSHUROOT.'/core/config/'.$file.'.php';
			if (is_file($path)) {
				$conf = include $path;
				if (isset($conf[$name])) {
					self::$conf[$file] = $conf;
					return self::$conf[$file][$name];
				} else {
					outputError("配置不存在：".$name);
				}
			} else {
				outputError("配置文件不存在：".$file);
			}
		}
	}
	/**
	 * 加载配置文件全部配置
	 */
	public static function all($file) {
		if (isset(self::$conf[$file])) {
			return self::$conf[$file];
		} else {
			$path = LIUSHUROOT.'/core/config/'.$file.'.php';
			if (is_file($path)) {
				$conf = include $path;
					self::$conf[$file] = $conf;
					return self::$conf[$file];
			} else {
				outputError("配置文件不存在：".$file);
			}
		}
	}
}
