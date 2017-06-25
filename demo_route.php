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
?>
<style type="text/css">
	code, code {
		display:block;
		font: 1em 'Courier New', Fixed, monospace;
		font-size : 100%;
		color: #666666;
		background : #f1f1f1;
		overflow : auto;
		text-align:left;
		border : 1px solid #99cc66;
		padding : 0px 20px 0 30px;
		margin:1em 0 1em 0;
		line-height:17px;
		}
</style>
<?php
//link : http://localhost/WebPanel/admin2.php?view=action-method/page
// kết quả : action.php
echo "Link : <b>".$core->url_route('admin',$view)."</b>"; ?><br> <code>url_route('admin',$view)</code> <?php
echo "<hr>";
echo "Path Controller : <b>".$core->path_route_controller($view,"admin")."</b>"; ?> <code>path_route_controller($view,"admin")</code> <?php
echo "<hr>";
echo "Path Controller/method : <b>".$core->path_route_controller_method($view,"admin")."</b>"; ?> <code>path_route_controller_method($view,"admin")</code> <?php
echo "<hr>";
echo "Path View : <b>".$core->path_route_view($view,"admin")."</b>"; ?> <code>path_route_view($view,"admin")</code> <?php


echo "<hr>";
/*
echo $core->path_route_controller($view,"index");
echo "<hr>";
echo "index :";
echo $core->url_route('index',$view)."/10/bai-viet-hay/haha";
echo "<hr>";
echo "admin :";
echo $core->url_route('admin',$view)."/10/bai-viet-hay/haha";
*/

?>
<hr>
<?=md5(md5("Ssvtd16041995ss!"))?>