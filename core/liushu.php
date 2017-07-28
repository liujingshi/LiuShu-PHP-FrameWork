<?php

namespace core;

class liushu {
	public static $classMap = array();
	public $sendData;
	/**
	 * 启动框架
	 */
	public static function start() {
		lib\log::init();
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $mctrlClass = '\\'.MODULE.'\\ctrl\\'.$ctrlClass.'Ctrl';
        if (is_file($ctrlFile)) {
        	include $ctrlFile;
        	$ctrl = new $mctrlClass;
        	$ctrl->$action();
        } else {
        	lib\log::log($ctrlClass, $action);
        	outputError("找不到控制器：".$ctrlClass);
        }
        lib\log::log($ctrlClass, $action);
    }
    /**
     * 自动加载类库
     */
    public static function load($class) {
    	if (isset($classMap[$class])) {
    		return true;
    	} else {
    		$class = str_replace('\\', '/', $class);
    		$fileName = LIUSHUROOT.'/'.$class.'.php';
    		if (is_file($fileName)) {
    			include $fileName;
    			self::$classMap[$class] = $class;
    		} else {
    			return false;
    		}
    	}
    }
    /**
     * 向视图层传送数据
     */
    public function sendData($name, $data) {
    	$this->sendData[$name] = $data;
    }
    /**
     * 显示视图文件
     */
    public function show($file) {
    	$viewFile = APP.'/view/'.$file;
    	if (is_file($viewFile)) {
    		extract($this->sendData);
    		include $viewFile;
    	} else {
    		outputError("找不到视图文件：".$file);
    	}
    }
}
