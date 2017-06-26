<?php
/**
* 
*/
class route extends core
{
	public function get($url) {
		if ($url!="") {
			$array=explode("/",$url);
			if (count($array) > 0) {
				$array_route=explode("-",$array['0']);
				if (count($array_route)==1) {
					return $array_route['0'];
				} else if (count($array_route)==2) {
					if ($array_route['0']!="" && $array_route['1']!="") {
						return $array_route['0']."-".$array_route['1'];
					} else if ($array_route['0']!="" && $array_route['1']=="") {
						return $array_route['0'];
					} else {
						return "";
					}
				} else {
					throw new Exception("Không tìm thấy link");
				}
			} else {
				return "";
			}
		} else {
			return "";
		}
	}

	public function path_route($theme,$type,$folder,$view = null) {
		// nếu $view tồn tại thì set_route và ngược lại tự get_route
		// theme là home hoặc admin
		// folder là truyền tới bắt đầu từ thư mục theme
		// type là action hoặc method
		if (isset($view)) {
			$view=$view;
		} else {
			$view=$this->get_view();
		}
		$url=$this->get($view);
		$array=explode("-",$url);
		if ($type=="action") {
			if ($url!="") {
				$action=$array['0'];
			} else {
				$action="index";
			}
			//return $action;
			$path=$this->path_theme($theme)."/".$folder."/".$action.".php";
		} else {
			if ($url!="") { 
				if (count($array)==1) {
					$action="index";
					$method="index";
				} else {
					$action=$array['0'];
					$method=$array['1'];
				}
			} else {
				$action="index";
				$method="index";
			}
			//return $method;
			$path=$this->path_theme($theme)."/".$folder."/main/".$action."/".$method.".php";
		}

		if (file_exists($path)) {
			return $path;
		} else {
			throw new Exception("File không tồn tại");
		}
	}

	public function url($theme,$url = null) {
		// nếu tồn tại $url thì set_url còn ngược lại thì get_url
		if (isset($url)) {
			$route=$this->get($url);
		} else {
			$route=$this->get($this->get_view());
		}
		return $this->base_url()."/".$this->url_rewrite($theme)."".$route;
	}




}