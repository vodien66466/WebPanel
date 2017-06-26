<?php
/**
* 
*/
class core {
	public function base_url() {
		return "".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$GLOBALS['config']['basePath'];
	}
	public function url_rewrite($theme) {
		if ($theme=="admin") {
			$file="admin";
		} else {
			if ($GLOBALS['config']['url_rewrite']==true) {
				$file="home";
			} else {
				$file="index";
			}
		}
		if ($GLOBALS['config']['url_rewrite']==true) {
			return $file."/";
		} else {
			return $file.".php?view=";
		}
	}
	public function path () {
		$path_full=dirname(dirname(__FILE__));
		$path=str_replace("\system","",$path_full);
		return $path;
	}
	public function get_view () {
		if (isset($GLOBALS['_GET']['view'])) {
			return $GLOBALS['_GET']['view'];
		} else {
			return "";
		}
	}
	
	public function path_folder ($path) {
		if (is_dir($this->path()."".$path)) {
			return $this->path()."".$path;
		} else {
			throw new Exception("Thư mục không tồn tại");
		}
	}
	public function path_file ($path) {
		if (file_exists($this->path()."".$path)) {
			return $this->path()."".$path;
		} else {
			throw new Exception("file không tồn tại");
		}
	}

	public function theme ($theme) {
		$string=$GLOBALS['config']['theme'];
		if ($string!="") {
			$array=explode("/",$string);
			if (count($array)==2) {
				if ($theme=="admin") {
					if (is_dir($this->path()."/admin/".$array['0'])) {
						return $array['0'];
					} else {
						throw new Exception("Theme admin không tồn tại");
					}
				} else {
					if (is_dir($this->path()."/home/".$array['0']."/".$array['1'])) {
						return $array['0']."/".$array['1'];
					} else {
						throw new Exception("Theme home không tồn tại");
					}
				}
			} else {
				throw new Exception("Cấu hình theme bị sai");
			}
		} else {
			throw new Exception("Cấu hình theme bị sai");
		}
	}
	public function path_theme ($theme) {
		if ($theme=="admin") {
			return $this->path()."/admin/".$this->theme($theme);
		} else {
			return $this->path()."/home/".$this->theme($theme);
		}
	}
}
?>