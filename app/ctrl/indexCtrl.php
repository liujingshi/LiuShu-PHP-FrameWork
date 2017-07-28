<?php 

namespace app\ctrl;

use core\lib\model;

class indexCtrl extends \core\liushu {
	/**
	 * 主页
	 */
	public function index() {
		$this->sendData('data1',"欢迎使用刘叔PHP框架");
		$this->sendData('data2',"Welcome to LiuShu PHP FrameWork");
		$this->sendData('data3',"当您看到这个页面是说明您已经成功安装了刘叔PHP框架");
		$this->show('index.html');
	}
	/**
	 * 日志页
	 */
	public function log() {
		$model = new model();	
		$this->sendData('model', $model);
		$this->show('log.html');
	}
}