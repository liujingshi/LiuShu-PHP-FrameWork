<?php

namespace core\lib;

class route {
	
	public $ctrl;
	public $action;
	
	public function __construct() {
		if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
			$path = $_SERVER['REQUEST_URI'];
			$patharr = explode('/', trim($path,'/'));
			if (isset($patharr[0])) {
				$this->ctrl = $patharr[0];
			}
			unset($patharr[0]);
			if (isset($patharr[1])) {
				$this->action = $patharr[1];
			} else {
				$this->action = conf::get('ACTION', 'route');
			}
			unset($patharr[1]);
			$count = count($patharr) + 2;
			for ($i = 2; $i < $count; $i+=2) {
				if (isset($patharr[$i+1])) {
					$_GET[$patharr[$i]] = $patharr[$i+1];
				}
			}
		} else {
			$this->ctrl = conf::get('CTRL', 'route');
			$this->action = conf::get('ACTION', 'route');
		}
	}
}
