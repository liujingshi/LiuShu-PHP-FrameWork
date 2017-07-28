<?php
/**
 * 日志记录方式 请使用mysql方式
 * file方法无法获取Linux服务器的777权限
 */
return array(
		'DRIVE' => 'mysql',
		'OPTION' => array(
				'PATH' => LIUSHUROOT.'/log/',
		),
);