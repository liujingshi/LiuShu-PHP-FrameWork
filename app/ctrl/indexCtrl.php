<?php 

namespace app\ctrl;

class indexCtrl extends \core\liushu {
	public function index() {
		$this->sendData('data1',"欢迎使用刘叔PHP框架");
		$this->sendData('data2',"Welcome to LiuShu PHP FrameWork");
		$this->sendData('data3',"当您看到这个页面是说明您已经成功安装了刘叔PHP框架");
		$this->show('index.html');
	}
}