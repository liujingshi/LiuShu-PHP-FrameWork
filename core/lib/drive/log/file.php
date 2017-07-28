<?php

namespace core\lib\drive\log;

class file {
	//linux服务器中无权限 该功能停用
	/*public $path;
	public $datePath;
	
	public function __construct() {
		$conf = conf::get('OPTION', 'log');
		$this->path = $conf['PATH'];
	}*/
	
	public function log($message, $file = 'log') {
		/*$this->datePath = $this->path.date('YmdH').'/';
		if (!is_dir($this->datePath)) {
			mkdir($this->datePath, '0777', true);
		}
		$fileName = $this->datePath.$file.'.php';
		$message = date('Y-m-d H:i:s').' - '.json_encode($message);
		$data = "<h3>".$message."</h3>";
		if (!is_file($fileName)) {
			file_put_contents($fileName, "<head><title>日志文件</title></head>".PHP_EOL,FILE_APPEND);
		}
		return file_put_contents($fileName, $data.PHP_EOL,FILE_APPEND);*/
		
	}
}
