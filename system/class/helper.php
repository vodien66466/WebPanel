<?php
/*
**		@author     	Võ Tiến Diễn							**
**		@version    	1.0										**
**		@phone			01699.768.750							**
**		@Facebook		http://fb.com/votiendien95				**
**		@email			tiendien95@gmail.com					**
**		@copyright  	Copyright (C) 2016						**
*/


class helper {

    //hàm thêm dấu chấm vào chuổi string số : vd : 15000000 =1.50000
    function adddotstring($strNum) {
 
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


	//hàm bảo mật chống hack sql
	public function security_string($str) {
        $str = htmlentities(trim($str), ENT_QUOTES, 'utf-8');
        $str = mysql_real_escape_string($str);
        return $str;
    }
    //hàm bảo mật chống hack sql
	public function security_number($str) {
        $str = mysql_real_escape_string(intval(abs($str)));
        return $str;
    }

	//hàm tạo ngẩu nhiên string 
	//$length : số kí tự muốn tạo 
	public function rand_string($length) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*-+";
		$size = strlen($chars);
		for($i=0; $i<$length; $i++) {
			$str .= $chars[rand(0,$size-1)];
		}
		return $str;
	}

	//phân tràng
	/*
	vd: 	
			$helper->paging('index.php?', $start, $total, $kmess);
			$start là biết bắt đầu đếm  vd: limit $start,$kmess
			$kmess là biết hiển thị số bài viết mỗi trang
			$total là đếm tổng số 
	*/
	public function paging($url, $start, $total, $kmess)
    {
        $neighbors = 2;
        if ($start >= $total)
            $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
        else
            $start = max(0, (int)$start - ((int)$start % (int)$kmess));
        $base_link = '<li><a href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
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

    ///hàm hiển thị
    /*
	VD:		$kmess=10; số bài viết hiển thị mỗi trang là 10
			$start=$helper->get_paging($kmess);
			kết hợp với hàm pagin: 
			- $helper->paging('index.php?', $start, $total, $kmess);
    */
    public function get_paging ($kmess) {
    	$page=intval($_GET['page']);
		$start = isset($_GET['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);
		return $start;
    }

    






    
    /*
    -------------------------------------------------------------------------
    Hàm loại nỏ các kí tự không cần thiết trên link
    -------------------------------------------------------------------------
    */
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
    /*
    -------------------------------------------------------------------------
    Hàm hiển thị thời gian gồm (giây- phút - giờ) - ngày - tháng - năm
    -------------------------------------------------------------------------
    */
    public function times ($var) {
        //$hq='Hôm qua';
        $date = date("H:i - d.m.Y", $var );
        /*
        $day = time()-$var;
        $h = ceil($day/3600);
        $p = ceil($day/60);
        $s = $day;
        if (date('Y', $var) == date('Y', time())) {
            if (date('z', $var ) == date('z', time())) {
                $date = $h . ' giờ trước';
                if (date('H', $var) == date('H', time())) {
                    $date = $p.' phút trước';
                    if (date('i', $var) == date('i', time())) {
                        $date = $s.' giây trước';
                    }
                }
            }
            if (date('z', $var) == date('z', time()) - 1) {
                $date =  $hq.','.date("H:i", $var);
            }
        }
        */
        return $date;
    }
    

    //hàm xử lý post
    public function post ($name,$type) {
        if ($type=="html") {
            return $_POST[$name];
        } else {
            return $this->security_string($_POST[$name]);
        }
    }

    //hàm xử lý get
    public function get ($name,$type) {
        if ($type=="html") {
            return $_GET[$name];
        } else {
            return $this->security_string($_GET[$name]);
        }
    }
    //hàm hiển thị nội dung
    public function view ($text,$type) {
        if ($type=="html") {
            return $text;
        } else {
            return $this->security_string($text);
        }
    }

    //đếm kí tự trong 1 chuỗi string
    public function count_string ($str) {
        return mb_strlen($str);
    }
    /// kiểm tra chuỗi có hợp lệ hay không
    ///$str=1234 : là hợp lệ
    /// VD: $helper->check_str("[0-9]", "",$str); 
    /// **************chưa hoàn thiện lắm cần nâng cấp hàm nay********************
    public function check_str($type,$str){
        $check = eregi_replace("(".$type.")", "", $str);
        if(empty($check)){
            return true;
        } else {
            return false;
        }
    }



    // xử lý chuổi 
    //$type là loại xự lý
    //$str là chuổi xửlys

    /*
    * $ype=cut xử lý tìm và cắt $str
    ***************CHƯA CÓ Ý TƯỞNG HAY => CHƯA VIẾT ***************
    */



}
?>