<?php
if (isset($_POST['add'])) {
	$name=rw($_POST['name']);
	if (strlen($name) > 2) {
		//kiểm tra xem thư mục tồn tại hay chưa
		if (is_dir($core->path()."/admin/".$name) && is_dir($core->path()."/themes/".$name)) {
			throw new Exception('thư mục '.$name.' đã tồn tại trên hệ thống');
		} else {
			if (is_dir($core->path()."/admin/".$name)) {
				throw new Exception('admin/'.$name.' đã tồn tại trên hệ thống');
			} else {
				//tạo controller
				mkdir($core->path()."/admin/".$name);
				mkdir($core->path()."/admin/".$name."/controller");
				//tao file controller
				$fp=@fopen($core->path()."/admin/".$name."/controller/index.php","a+");
				//ghi file
$code_conttroller_action ="<?php
/*
**		@author     	Võ Tiến Diễn							**
**		@version    	1.0										**
**		@email			vodien66466@gmail.com					**
**		@copyright  	Copyright (C) 06/2017					**
*/
";
    			fwrite($fp, $data);
				mkdir($core->path()."/admin/".$name."/controller/main");
				mkdir($core->path()."/admin/".$name."/controller/main/index");
				fopen($core->path()."/admin/".$name."/controller/main/index/index.php","w+");
				//tạo view
				mkdir($core->path()."/admin/".$name."/views");
				fopen($core->path()."/admin/".$name."/views/index.php","w+");
				mkdir($core->path()."/admin/".$name."/views/main");
				mkdir($core->path()."/admin/".$name."/views/main/index");
				fopen($core->path()."/admin/".$name."/views/main/index/index.php","w+");
			}
			if (is_dir($core->path()."/themes/".$name)) {
				throw new Exception('themes/'.$name.' đã tồn tại trên hệ thống');
			} else {
				mkdir($core->path()."/themes/".$name);
			}
		}
	} else {
		throw new Exception('độ dài của tên không hợp lệ');
	}

}


?>