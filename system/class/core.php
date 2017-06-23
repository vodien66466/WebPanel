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
	public function path_admin () {
		$path_full=dirname(dirname(__FILE__));
		$path=str_replace("\system","",$path_full);
		return $path."/admin/views";
	}
	// url_home
	public function base_url () {
		return "".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$GLOBALS['config']['basePath']."";
	}
	public function theme_index () {
		if (is_dir($this->path()."/themes/".$GLOBALS['config']['theme']."")) {
			return $GLOBALS['config']['theme'];
		} else {
			throw new Exception('Giao diện này không tồn tại');
		}
	}
	public function theme_admin () {
		$array=explode("/",$this->theme_index());
		if (is_dir($this->path()."/admin/".$array['0'])) {
			return $array['0'];
		} else {
			throw new Exception('Tính năng admin của theme này chưa được cập nhật');
		}
	}

}
?>