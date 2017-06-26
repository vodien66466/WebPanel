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
	
	public function is_folder ($path) {
		if (is_dir($this->path()."/".$path)) {
			return true;
		} else {
			return false;
		}
	}
	public function is_file ($path) {
		if (file_exists($this->path()."/".$path)) {
			return true;
		} else {
			return false;
		}
	}

	public function theme ($theme) {
		$string=$GLOBALS['config']['theme'];
		if ($string!="") {
			$array=explode("/",$string);
			if (count($array)==2) {
				if ($theme=="admin") {
					if ($this->is_folder("admin/".$array['0'])) {
						return $array['0'];
					} else {
						throw new Exception("Thư mục theme admin : <s>".$array['0']."</s> không tồn tại");
					}
				} else {
					if ($this->is_folder("admin/".$array['0']."/".$array['1'])) {
						return $array['0']."/".$array['0'];
					} else {
						throw new Exception("Thư mục theme home : <s>".$array['0']."/".$array['1']."</s> không tồn tại");
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
			return $this->path()."/".$this->theme($theme);
		} else {
			return $this->path()."/".$this->theme($theme);
		}
	}

























































	public function path_view ($type) {
		if ($type=="admin") {
			return $this->path()."/admin/".$this->theme_admin()."/views";
		} else {
			return $this->path()."/theme/".$this->theme_index()."/views";
		}
		
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
	// hàm lấy $_GET[''] từ link
	public function get_data ($view,$key) {
		// http://localhost/WebPanel/admin.php?view=carts-edit/a/b/c
		$keys=$key+1;
		$array_view=explode("/",$view);
		if (count($array_view) > 1) {
			$c_data=count($array_view)-2;
			if ($key<=$c_data) {
				return $array_view[$keys];
			}
		}
	}
	// hàm lấy action từ link
	public function get_action ($view,$type) {
		if ($view !="") {
			$array_view=explode("/",$view);
			if (count($array_view) > 0) {
				$array_route=$array_view['0'];
				if (count($array_route) == 1) {
					return $array_route['0'];
				} else if (count($array_route) == 2) {
					if ($array_route['0']!="") {
						if (file_exists($this->path_route_controller ($view,$type))) {
							return $array_route['0'];
						} else {
							throw new Exception("action không tồn tại");
						}
						
					} else {
						throw new Exception("action không tồn tại");
					}
				} else {
					throw new Exception("lỗi cấu trúc file");
				}
			} else {
				return "index";
			}
		} else {
			return "index";
		}
	}
	// hàm lấy method từ link
	public function get_method ($view,$type) {
		if ($view!="") {
			$array_view=explode("/",$view);
			if (count($array_view) > 0) {
				$array_route=explode("-",$array_view['0']);
				if (count($array_route) == 1) {
					return "index";
				} else if (count($array_route) == 2) {
					if (file_exists($this->path_route_controller_method ($view,$type))) {
						return $array_route['1'];
					} else {
						throw new Exception("method không tồn tại");
					}
				} else {
					throw new Exception("lỗi cấu trúc file");
				}
			} else {
				return "index";
			}
		} else {
			return "index";
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





	public function url_route ($view,$type) {
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
	

}
?>