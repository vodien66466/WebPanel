<?php
class helper
{
    public function base_url() {
        return "".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$GLOBALS['config']['basePath'];
    }
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
    public function url($theme,$url = null) {
        // nếu tồn tại $url thì set_url còn ngược lại thì get_url
        if (isset($url)) {
            $route=$this->get($url);
        } else {
            $route=$this->get($this->get_view());
        }
        return $this->base_url()."/".$this->url_rewrite($theme)."".$route;
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
                return $array[$keys];
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
                return $array['1'];
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
                $values.=addslashes($value)."/";
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
    public function asset ($path,$theme) {
        if ($theme=="admin") {
            return $this->base_url."/admin/".$this->theme($theme)."/".$path."";
        } else {
            return $this->base_url."/home/".$this->theme($theme)."/".$path."";
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