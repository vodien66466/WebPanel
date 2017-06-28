<?php
class VTD_system
{
	public function path () {
        $path_full=dirname(dirname(__FILE__));
        $path=str_replace("\VTD_system","",$path_full);
        return $path;
    }
    public function base_url() {
        return "".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$GLOBALS['config']['basePath'];
    }
    public function get($url=null) {
        if (isset($url)) {
            $url=$url;
        } else {
            $url=$this->get_view();
        }
        if ($url!=null) {
            $array=explode("/",$url);
            if (count($array) > 0) {
                $array_route=explode("-",$array['0']);
                if (count($array_route)==1) {
                    return $array_route['0'];
                } else if (count($array_route)==2) {

                    if ($array_route['0']!=null && $array_route['1']!=null) {
                        return $array_route['0']."-".$array_route['1'];
                    } else if ($array_route['0']!="" && $array_route['1']==null) {
                        return $array_route['0'];
                    } else {
                        return "error";
                    }

                } else {
                    return "error";
                }
            } else {
                return "index";
            }
        } else {
            return "index";
        }
    }
    public function array_file_method ($theme,$folder,$view = null) {
        // hàm mục đích tự động nhận method ở file controller
        // hàm này dùng để lấy danh sách link cũng dc
        $path_full=$this->path_route($theme,"action",$folder,$view);
        $path_cut=str_replace($this->action($view).".php","",$path_full);
        $path=$path_cut."main/".$this->action($view)."/*.php";
        $array=glob($path);
        $values = '';
        foreach ($array as $key => $value) {
            $file=str_replace($this->path_theme($theme)."/".$folder."/".$this->action($view)."/","",$value);
            $file_cut=str_replace(".php","",$file);
            $values.=$file_cut.",";
        }
        $values = trim($values, ',');
        $array_file=explode(",",$values);
        return $array_file;
    }
    public function action($url=null) {
        $view=$this->get($url);
        $array=explode("-",$view);
        if (count($array)==1) {
            return $array['0'];
        } else {
            return $array['0'];
        }
    }
    public function method($url=null) {
        $view=$this->get($url);
        $array=explode("-",$view);
        if (count($array)==1) {
            return "index";
        } else {
            return $array['1'];
        }
    }


    public function path_route($theme,$type,$folder,$url = null) {
        // nếu $view tồn tại thì set_route và ngược lại tự get_route
        // theme là home hoặc admin
        // folder là truyền tới bắt đầu từ thư mục theme
        // type là action hoặc method
        if ($type=="action") {
            $path=$this->path_theme($theme)."/".$folder."/".$this->action($url).".php";
        } else {
            $path=$this->path_theme($theme)."/".$folder."/".$this->action($url)."/".$this->method($url).".php";
        }
        if (file_exists($path)) {
            return $path;
        } else {
            throw new Exception("VTD_System Báo Lỗi: không nhận dạng được file xử lý");
        }
    }
    public function path_incl ($theme,$path) {
    	$file=$this->path_theme($theme)."/".$path.".php";
    	if (file_exists($file)) {
    		return $file;
    	} else {
    		throw new Exception("VTD_System Báo Lỗi: không nhận dạng được file xử lý");
    	}
    }
    public function url_paging($theme,$url = null) {
        // nếu tồn tại $url thì set_url còn ngược lại thì get_url
        $route=$this->get($url);
        return $this->base_url()."/".$this->url_rewrite($theme)."".$route;
    }
    public function url($theme,$url = null) {
        // nếu tồn tại $url thì set_url còn ngược lại thì get_url
        if (isset($url)) {
            $view=$url;
        } else {
            $view=$this->get_view();
        }
        $route=$this->get($url);
        $array=explode("/",$view);
        if (count($array)==1) {
            return $this->base_url()."/".$this->url_rewrite($theme)."".$route;
        } else if (count($array)==2) {
            return $this->base_url()."/".$this->url_rewrite($theme)."".$route."/".$this->param_paging($url)."";
        } else if (count($array)>=3) {
            return $this->base_url()."/".$this->url_rewrite($theme)."".$route."/".$this->param_paging($url)."/".$this->all_param($url)."";
        } else {
            return $this->base_url()."/".$this->url_rewrite($theme);
        }
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
    
    public function get_view () {
        if (isset($GLOBALS['_GET']['VTD_view'])) {
            return $GLOBALS['_GET']['VTD_view'];
        } else {
            return "";
        }
    }
    
    public function path_folder ($path) {
        if (is_dir($this->path()."".$path)) {
            return $this->path()."".$path;
        } else {
            throw new Exception("VTD_System Báo Lỗi: không nhận dạng được thư mục xử lý");
        }
    }
    public function path_file ($path) {
        if (file_exists($this->path()."".$path)) {
            return $this->path()."".$path;
        } else {
            throw new Exception("VTD_System Báo Lỗi: không nhận dạng được file xử lý");
        }
    }

    public function theme ($theme) {
        $string=$GLOBALS['config']['theme'];
        if ($string!="") {
            $array=explode("/",$string);
            if (count($array)==2) {
                if ($theme=="admin") {
                    if (is_dir($this->path()."/VTD_admin/".$array['0'])) {
                        return $array['0'];
                    } else {
                        throw new Exception("VTD_System Báo Lỗi: Không tìm thấy thư mục giao diện cho trang admin");
                    }
                } else {
                    if (is_dir($this->path()."/VTD_home/".$array['0']."/".$array['1'])) {
                        return $array['0']."/".$array['1'];
                    } else {
                        throw new Exception("VTD_System Báo Lỗi: Không tìm thấy thư mục giao diện cho trang home");
                    }
                }
            } else {
                throw new Exception("VTD_System Báo Lỗi: Cấu hình giao diện bị lỗi");
            }
        } else {
            throw new Exception("VTD_System Báo Lỗi: Cấu hình giao diện bị lỗi");
        }
    }
    public function path_theme ($theme) {
        if ($theme=="admin") {
            return $this->path()."/VTD_admin/".$this->theme($theme);
        } else {
            return $this->path()."/VTD_home/".$this->theme($theme);
        }
    }
    public function param ($key,$url = null) {
        $keys=$key+2;
        if (isset($url)) {
            $route=$url;
        } else {
            $route=$this->get_view();
        }
        $array=explode("/",$route);
        if (count($array) > 2) {
            $c_data=count($array)-3;
            if ($key<=$c_data) {
                return $this->security($array[$keys],"string");
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function param_paging ($url = null) {
        if (isset($url)) {
            $route=$url;
        } else {
            $route=$this->get_view();
        }
        $array=explode("/",$route);
        if (count($array) > 1) {
            if (is_numeric($array['1'])) {
                return $this->security($array['1'],"int");
            } else {
                return false;
            }  
        } else {
            return false;
        }
    }
    public function all_param ($view=null) {
        if (isset($view)) {
            $string=$view;
        } else {
            $string=$this->get_view();
        }
        $array=explode("/",$string);
        if (count($array) > 2) {
            unset($array['0']);
            unset($array['1']);
            $fields = '';
            $values = '';
            foreach ($array as $keys => $value) {
                $values.=$this->security($value,"string")."/";
            }
            $values = trim($values,'/');
            $link="{$values}";
            return $link;
        } else {
            return false;
        }
        
    }
    public function is_paging ($url = null) {
        if (isset($url)) {
            $route=$url;
        } else {
            $route=$this->get_view();
        }
        $array=explode("/",$route);
        if (count($array) > 1) {
            if (is_numeric($array['1'])) {
                return true;
            } else {
                return false;
            }  
        } else {
            return false;
        }
    }
    public function get_paging ($kmess,$view = null) {
        if (isset($view)) {
            $page=$this->param_paging($view);
        } else {
            $page=intval($this->param_paging());
        }
        if ($this->is_paging($view)) {
            if ($page==0) {
                return 0;
            } else {
                return $page*$kmess-$kmess;
            }
        } else {
            return 0;
        }
    }
    public function paging($theme,$total,$kmess,$view=null)
    {
        $url=$this->url_paging($theme,$view);
        $start=$this->get_paging($kmess,$view);
        $neighbors = 2;
        if ($start >= $total)
            $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
        else
            $start = max(0, (int)$start - ((int)$start % (int)$kmess));
        $base_link = '<li><a href="' . strtr($url, array('%' => '%%')) . '/%d/'.$this->all_param($view).'' . '">%s</a></li>';
        $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '&lt;&lt;');
        if ($start > $kmess * $neighbors)
            $out[] = sprintf($base_link, 1, '1');
        if ($start > $kmess * ($neighbors + 1))
            $out[] = '<li class="disabled"><a href="#">...</a></li>';
        for ($nCont = $neighbors; $nCont >= 1; $nCont--)
            if ($start >= $kmess * $nCont) {
                $tmpStart = $start - $kmess * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
            }
        $out[] = '<li class="active"><a href="#" aria-label="Previous"><span aria-hidden="true">' . ($start / $kmess + 1) . '</span></a></li>';
        $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
        for ($nCont = 1; $nCont <= $neighbors; $nCont++)
            if ($start + $kmess * $nCont <= $tmpMaxPages) {
                $tmpStart = $start + $kmess * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
            }
        if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages)
            $out[] = '<li class="disabled"><a href="#">...</a></li>';
        if ($start + $kmess * $neighbors < $tmpMaxPages)
            $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
        if ($start + $kmess < $total) {
            $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
            $out[] = ''.sprintf($base_link, $display_page, '&gt;&gt;').'';
        }

        return implode(' ', $out);
    }
    public function asset ($theme=null,$path) {
        if (isset($theme)) {
            $path_theme=$this->path_theme($theme)."/".$path;
            if (file_exists($path_theme)) {
                if ($theme=="admin") {
                    return $this->base_url()."/VTD_admin/".$this->theme($theme)."/".$path;
                } else {
                    return $this->base_url()."/VTD_home/".$this->theme($theme)."/".$path;
                }
            } else {
                return "VTD_System Báo Lỗi: File : ".$path." không tồn tại";
            }
        } else {
            $path_asset=$this->path()."/".$path;
            if (file_exists($path_asset)) {
                return $this->base_url()."/".$path;
            } else {
                return "VTD_System Báo Lỗi: File : ".$path." không tồn tại";
            }
        }
    }

    public function is_link ($url,$image=null) {
        $headers = @get_headers($url);
        if(strpos($headers[0],'404') === true) {
          return $url;
        } else {
            if (isset($image)) {
                if ($GLOBALS['config']['image_error']!="") {
                    return $this->asset(null,$GLOBALS['config']['image_error']);
                } else {
                    return "VTD_System Báo Lỗi: Cần phải cấu hình cho : image_error";
                }
            } else {
                return "VTD_System Báo Lỗi: Link : ".$url." không tồn tại";
            } 
        }
    }
    
    //hàm thêm dấu chấm vào chuổi string số : vd : 15000000 =1.50000
    public function adddotstring($strNum) {
 
        $len = strlen($strNum);
        $counter = 3;
        $result = "";
        while ($len - $counter >= 0)
        {
            $con = substr($strNum, $len - $counter , 3);
            $result = '.'.$con.$result;
            $counter+= 3;
        }
        $con = substr($strNum, 0 , 3 - ($counter - $len) );
        $result = $con.$result;
        if(substr($result,0,1)=='.'){
            $result=substr($result,1,$len+1);   
        }
        return $result;
    }
    public function security($str,$type) {
        if ($type=="int") {
            $str = mysql_real_escape_string(intval(abs($str)));
        } else {
             $str = htmlentities(trim($str), ENT_QUOTES, 'utf-8');
            $str = mysql_real_escape_string($str);
        }
        return $str;
    }
    public function rand_string($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*-+";
        $size = strlen($chars);
        for($i=0; $i<$length; $i++) {
            $str .= $chars[rand(0,$size-1)];
        }
        return $str;
    }
    public function rw($text) {
        $text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
        $text=str_replace(urldecode('%CC%A3'),"", $text);
        $text=str_replace(urldecode('%CC%83'),"", $text);
        $text=str_replace(urldecode('%CC%89'),"", $text);
        $text=str_replace(urldecode('%CC%80'),"", $text);
        $text=str_replace(urldecode('%CC%81'),"", $text);
        $text=str_replace("--","-", $text);
        $text=str_replace(" ","-", $text);
        $text=str_replace("@","-",$text);
        $text=str_replace("/","-",$text);
        $text=str_replace("\\","-",$text);
        $text=str_replace(":","-",$text);
        $text=str_replace("\"","-",$text);
        $text=str_replace("'","-",$text);
        $text=str_replace("<","-",$text);
        $text=str_replace(">","-",$text);
        $text=str_replace(",","-",$text);
        $text=str_replace("?","-",$text);
        $text=str_replace("%20","",$text);
        $text=str_replace(";","-",$text);
        $text=str_replace("[","-",$text);
        $text=str_replace("]","-",$text);
        $text=str_replace("(","-",$text);
        $text=str_replace(")","-",$text);
        $text=str_replace("́","-", $text);
        $text=str_replace("̀","-", $text);
        $text=str_replace("̃","-", $text);
        $text=str_replace("̣","-", $text);
        $text=str_replace("̉","-", $text);
        $text=str_replace("*","-",$text);
        $text=str_replace("!","-",$text);
        $text=str_replace("$","-",$text);
        $text=str_replace("&","-and-",$text);
        $text=str_replace("%","-",$text);
        $text=str_replace("#","-",$text);
        $text=str_replace("^","-",$text);
        $text=str_replace("=","-",$text);
        $text=str_replace("+","-",$text);
        $text=str_replace("~","-",$text);
        $text=str_replace("`","-",$text);
        $text=str_replace("--","-",$text);
        $text=str_replace(".","-",$text);
        $text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
        $text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
        $text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
        $text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
        $text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
        $text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
        $text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
        $text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
        $text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
        $text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
        $text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
        $text = preg_replace("/(đ)/", 'd', $text);
        $text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
        $text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
        $text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
        $text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
        $text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
        $text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
        $text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
        $text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
        $text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
        $text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
        $text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
        $text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
        $text = preg_replace("/(Đ)/", 'D', $text);
        $text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
        $text = preg_replace("/(Đ)/", 'D', $text);
        return strtolower($text);
    }
    public function times ($var) {
        return date("H:i - d.m.Y", $var );
    }
}
?>