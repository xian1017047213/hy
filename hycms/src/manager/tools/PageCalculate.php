<?php

namespace hybase\Tools;

require_once __DIR__.'/SystemParameter.php';

/**
 *
 * @name SystemParameter
 * @author Baron
 *         系统关键参数管理
 */
class PageCalculate {
	function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function calPageNum($operPage, $pageNum, $maxPageNum) {
		if (!is_numeric($pageNum)||!is_numeric($maxPageNum)) {
			return false;
		}
		if ($operPage == SystemParameter::$pageOfFirst) {
			return 1;
		}
		if ($operPage == SystemParameter::$pageOfPrev) {
			return --$pageNum;
		}
		if ($operPage == SystemParameter::$pageOfNext) {
			return ++$pageNum;
		}
		if ($operPage == SystemParameter::$pageOfLast) {
			return $maxPageNum;
		}
		return $pageNum;
	}
}
?>