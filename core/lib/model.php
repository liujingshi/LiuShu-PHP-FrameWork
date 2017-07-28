<?php

namespace core\lib;

class model {
	/**
	 * 连接数据库
	 */
	private function connect() {
		$db = conf::all('database');
		$link = mysqli_connect($db['HOST'],$db['USERNAME'],$db['PASSWORD'],$db['DBNAME']);
		if ($link) {
			return $link;
		} else {
			outputError("数据库连接失败");
		}
	}
	/**
	 * 执行SQL语句 返回结果集
	 */
	public function query($sql) {
		$link = $this->connect();
		$rst = mysqli_query($link, $sql);
		if ($rst) {
			return $rst;
		} else {
			outputError("SQL语句执行失败");
		}
	}
	/**
	 * 根据结果得到一条记录
	 */
	public function fetch($rst) {
		if ($row = mysqli_fetch_assoc($rst)) {
			return $row;
		} else {
			return false;
		}
	}
	/**
	 * 根据结果得到全部记录
	 */
	public function fetchAll($rst) {
		$rows = array();
		while ($row = mysqli_fetch_assoc($rst)) {
			$rows[] = $row;
		}
		return $rows;
	}
	/**
	 * 根据结果得到记录条数
	 */
	public function exec($rst) {
		return mysqli_num_rows($rst);
	}
	/**
	 * 分页函数
	 */
	public function page($rst, $num, $nowPage, $ctrl, $action) {
		$sumRow = $this->exec($rst);
		$pageNum = ceil($sumRow/$num);
		$ans = "";
		$pageRows = array();
		$lastPage = $nowPage - 1;
		$nextPage = $nowPage + 1;
		if ($nowPage != 1) {
			$ans .= '<a href="/'.$ctrl.'/'.$action.'/page/'.$lastPage.'"><上一页</a>&nbsp';
		}
		for ($i = 1; $i <= $pageNum; $i++) {
			$ans .= "<a href='/".$ctrl."/".$action."/page/".$i."'>".$i."</a>&nbsp";
		}
		if ($nowPage != $pageNum) {
			$ans .= "<a href='/".$ctrl."/".$action."/page/".$nextPage."'>下一页></a>&nbsp";
		}
		for ($i = 1; $i <= $pageNum; $i++) {
			for ($j = 1; $j <= $num; $j++) {
				$pageRows[$i][] = mysqli_fetch_assoc($rst);
			}
		}
		$pageAns = array(
				'ans' => $ans,
				'pageRows' => $pageRows[$nowPage],
		);
		return $pageAns;
	}
}
