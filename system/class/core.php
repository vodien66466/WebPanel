<?php
/**
* 
*/
class core {
	public function path () {
		$path_full=dirname(dirname(__FILE__));
		$path=str_replace("\system","",$path_full);
		return $path;
	}
	// trang chủ
	public function base_url () {
		return "".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$GLOBALS['config']['basePath']."";
	}
	public function theme ($type) {
		if ($type=="index") {
			if (file_exists($this->path()."/themes/".$GLOBALS['config']['theme_index']."/index.php")) {
				return $GLOBALS['config']['theme_index'];
			} else {
				return "default";
			}
		} else {
			if (file_exists($this->path()."/admin/".$GLOBALS['config']['theme_admin']."/index.php")) {
				return $GLOBALS['config']['theme_index'];
			} else {
				return "default";
			}
		}
	}
}
?>