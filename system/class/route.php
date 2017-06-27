<?php
/**
* 
*/
class route extends helper
{
	

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

}