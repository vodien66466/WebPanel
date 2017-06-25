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
	public function path_view ($type) {
		if ($type=="admin") {
			return $this->path()."/admin/".$this->theme_admin()."/views";
		} else {
			return $this->path()."/theme/".$this->theme_index()."/views";
		}
		
	}
	public function asset ($path,$type) {
		if ($type=="admin") {
			return "".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$GLOBALS['config']['basePath']."/admin/".$this->theme_admin()."/".$path."";
		} else {
			return "".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$GLOBALS['config']['basePath']."/themes/".$this->theme_index()."/".$path."";
		}
		
	}

	public function path_route_controller ($view,$type) {
		// $view=action-method
		// path_route("views","action-method/page","admin"); : admin//views/action.php
		$array_view=explode("/",$view);
		$array_route=explode("-",$array_view['0']);
		if ($type=="admin") {
			$file=$this->path()."/admin/".$this->theme_admin()."";
		} else {
			$file=$this->path()."/themes/".$this->theme_index()."";
		}
		if (file_exists($file."/controller/".$array_route['0'].".php")) {
			if ($view!="") { // view tồn tại
				if (count($array_route) == 1) {
					// trường hợp chỉ có action
					return $file."/controller/".$array_route['0'].".php";
				} else if (count($array_route) == 2) {
					// trường hợp có action && method
					if ($array_route['0']!="") { // trường hợp action không có giá trị
						if ($array_route['1']!="") { 
							// chạy đến trang action/method
							// $array_route['0']."/".$array_route['1'];
							return $file."/controller/".$array_route['0'].".php";
						} else { 
							// chạy đến trang action
							return $file."/controller/".$array_route['0'].".php";
						}
					} else {
						// action không tồn tại báo lỗi
						throw new Exception('action không tồn tại');
					}
				} else {
					//báo lỗi 
					throw new Exception('action không tồn tại');
				}
			} else {
				// truong hop nay không có view chay den trng chinh cua trang web
				return $file."/controller/index.php";
			}
		} else {
			if (file_exists($file."/controller/index.php")) {
				return $file."/controller/index.php";
			} else {
				throw new Exception('Action /controller/index.php không tồn tại');
			}
		}
	}

	
	public function path_route_controller_method ($view,$type) {
		// $view=action-method
		// path_route("views","action-method/page","admin"); : admin//controller/action.php
		$array_view=explode("/",$view);
		$array_route=explode("-",$array_view['0']);
		if ($type=="admin") {
			$file=$this->path()."/admin/".$this->theme_admin()."";
		} else {
			$file=$this->path()."/themes/".$this->theme_index()."";
		}
		
		if ($view!="") { // view tồn tại
			if (count($array_route) == 1) {
				// trường hợp chỉ có action
				if (file_exists($file."/controller/main/".$array_route['0']."/index.php")) {
					return $file."/controller/main/".$array_route['0']."/index.php";
				} else {
					throw new Exception("file /controller/main/".$array_route['0']."/index.php Không tồn tại");
				}
				
			} else if (count($array_route) == 2) {
				// trường hợp có action && method
				if ($array_route['0']!="") { // trường hợp action không có giá trị
					if ($array_route['1']!="") { 
						// chạy đến trang action/method
						// $array_route['0']."/".$array_route['1'];
						if (file_exists($file."/controller/main/".$array_route['0']."/".$array_route['1'].".php")) {
							return $file."/controller/main/".$array_route['0']."/".$array_route['1'].".php";
						} else {
							throw new Exception("file /controller/main/".$array_route['0']."/index.php Không tồn tại");
						}
						
					} else { 
						// chạy đến trang action
						if (file_exists($file."/controller/main/".$array_route['0']."/index.php")) {
							return $file."/controller/main/".$array_route['0']."/index.php";
						} else {
							throw new Exception("file /controller/main/".$array_route['0']."/".$array_route['1'].".php Không tồn tại");
						}
						
					}
				} else {
					// action không tồn tại báo lỗi
					throw new Exception('action không tồn tại');
				}
			} else {
				//báo lỗi 
				throw new Exception('action không tồn tại');
			}
		} else {
			// truong hop nay không có view chay den trng chinh cua trang web
			if (file_exists($file."/controller/main/index/index.php")) {
				return $file."/controller/main/index/index.php";
			} else {
				throw new Exception('file /controller/main/index/index.php không tồn tại');
			}
			
		}
		
	}

	public function path_route_view ($view,$type) {
		// $view=action-method
		// path_route("views","action-method/page","admin"); : admin//views/action.php
		$array_view=explode("/",$view);
		$array_route=explode("-",$array_view['0']);
		if ($type=="admin") {
			$file=$this->path()."/admin/".$this->theme_admin()."";
		} else {
			$file=$this->path()."/themes/".$this->theme_index()."";
		}
		
		if ($view!="") { // view tồn tại
			if (count($array_route) == 1) {
				// trường hợp chỉ có action
				if (file_exists($file."/views/main/".$array_route['0']."/index.php")) {
					return $file."/views/main/".$array_route['0']."/index.php";
				} else {
					throw new Exception("file /views/main/".$array_route['0']."/index.php Không tồn tại");
				}
				
			} else if (count($array_route) == 2) {
				// trường hợp có action && method
				if ($array_route['0']!="") { // trường hợp action không có giá trị
					if ($array_route['1']!="") { 
						// chạy đến trang action/method
						// $array_route['0']."/".$array_route['1'];
						if (file_exists($file."/views/main/".$array_route['0']."/".$array_route['1'].".php")) {
							return $file."/views/main/".$array_route['0']."/".$array_route['1'].".php";
						} else {
							throw new Exception("file /views/main/".$array_route['0']."/index.php Không tồn tại");
						}
						
					} else { 
						// chạy đến trang action
						if (file_exists($file."/views/main/".$array_route['0']."/index.php")) {
							return $file."/views/main/".$array_route['0']."/index.php";
						} else {
							throw new Exception("file /views/main/".$array_route['0']."/".$array_route['1'].".php Không tồn tại");
						}
						
					}
				} else {
					// action không tồn tại báo lỗi
					throw new Exception('action không tồn tại');
				}
			} else {
				//báo lỗi 
				throw new Exception('action không tồn tại');
			}
		} else {
			// truong hop nay không có view chay den trng chinh cua trang web
			if (file_exists($file."/views/main/index/index.php")) {
				return $file."/views/main/index/index.php";
			} else {
				throw new Exception('file /views/main/index/index.php không tồn tại');
			}
			
		}
		
	}





	public function url_route ($type,$view) {
		// $view=action-method/page
		// path_route("views","action-method/page","admin"); : admin//views/action.php
		if ($type=="admin") {
			$file="admin";
		} else {
			if ($GLOBALS['config']['url_rewrite']==false) {
				$file="index";
			} else {
				$file="home";
			}
		}
		if ($GLOBALS['config']['url_rewrite']==false) {
			$url=$this->url()."/".$file.".php?view=";
		} else {
			$url=$this->url()."/".$file."/";
		}
		
		if ($view!="") { // view tồn tại
			$array_view=explode("/",$view);
			$array_route=explode("-",$array_view['0']);
			if (count($array_route) == 1) {
				// trường hợp chỉ có action
				return $url."".$array_route['0'];
			} else if (count($array_route) == 2) {
				// trường hợp có action && method
				if ($array_route['0']!="") { // trường hợp action không có giá trị
					if ($array_route['1']!="") { 
						// chạy đến trang action/method
						// $array_route['0']."/".$array_route['1'];
						return $url."".$array_route['0']."-".$array_route['1']."";
					} else { 
						// chạy đến trang action
						return $url."".$array_route['0'];
					}
				} else {
					// action không tồn tại báo lỗi
					throw new Exception('action không tồn tại');
				}
			} else {
				//báo lỗi 
				throw new Exception('action không tồn tại');
			}
		} else {
			// truong hop nay không có view chay den trng chinh cua trang web
			return $this->url()."/".$file.".php";
		}
	}
	// url_home
	public function url () {
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