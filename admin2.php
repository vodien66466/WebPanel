<?php
include 'system/autoload.php';
// admin2.php?view=action-method/page/$array_parama



/*
if ($view==true) { // view tồn tại
	if (count($array_route) == 1) {
		// trường hợp chỉ có action
		echo $array_route['0'];
	} else if (count($array_route) == 2) {
		// trường hợp có action && method
		if ($array_route['0']!="") { // trường hợp action không có giá trị
			if ($array_route['1']!="") { 
				// chạy đến trang action/method
				echo $array_route['0']."/".$array_route['1'];
			} else { 
				// chạy đến trang action
				echo $array_route['0'];
			}
		} else {
			// action không tồn tại báo lỗi
			echo "lỗi action không tồn tại";
		}
	} else {
		//báo lỗi 
		echo "lỗi action không tồn tại";
	}
} else {
	// truong hop nay không có view chay den trng chinh cua trang web
	echo "index";
}
*/

//link : http://localhost/WebPanel/admin2.php?view=action-method/page
// kết quả : action.php

echo $core->path_route_controller($view,"admin");
echo "<hr>";
echo $core->path_route_controller($view,"index");
echo "<hr>";
echo "index :";
echo $core->url_route('index',$view)."/10/bai-viet-hay/haha";
echo "<hr>";
echo "admin :";
echo $core->url_route('admin',$view)."/10/bai-viet-hay/haha";
?>
