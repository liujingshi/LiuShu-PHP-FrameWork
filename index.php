<?php
use core\liushu;

/**
 * 入口文件
 */

define('LIUSHUROOT', realpath('./')); //定义网站根目录
define('CORE', LIUSHUROOT.'/core'); //核心代码路径
define('APP', LIUSHUROOT.'/app'); //网站代码目录
define('ERROR', LIUSHUROOT.'/error'); //错误页面目录
define('MODULE', 'app');
define('JS', '/core/js'); //js文件夹路径
define('CSS', '/core/css'); //css文件夹路径

define('DEBUG', false); //是否开启调试模式

if (DEBUG) {
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');
}

include CORE.'/common/function.php'; //加载函数库

include CORE.'/liushu.php'; //加载入口类

spl_autoload_register('\core\liushu::load'); //自动加载类库

\core\liushu::start(); //启动框架
