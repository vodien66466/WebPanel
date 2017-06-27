# Cấu trúc link của code
* 1 : Link Trang quản lý : admin : http://domain/admin.php?view=action-method/page/param1/param2/param3/param..../paramN
* 2 :Link Trang giao diện : home : http://domain/index.php?view=action-method/page/param1/param2/param3/param..../paramN
* Trong đó $_GET['view'] là biến xử lý link chính chủa website
```
#!php
<?php
	/* 
	link : ?view=action-method/page/param1/param2/param3/param..../paramN
	*/
?>
```
* action-method/ : là các xử lý file include, action là controller và method là method
```
#!php
<?php
// code xử gọi path của action và method
$r->path_route($theme,$type,$folder,$view = null)
/* trong đó 
	$view = null : nếu $view tồn tại thì lấy dữ liệu view , nếu không tồn tại thì lấy mặc đinh trên link
	--------------
	$theme=admin : thì lấy path từ root/admin
	$theme=home : thì lấy path từ root/home
	--------------
	$folder : là path thư mục tính từ $theme/
	--------------
	$type=action : thì lấy path tới $theme/$folder/action
	$type=method : thì lấy path tới $theme/$folder/main/action/method
*/

// hàm gọi url ra
$h->url($theme,$url = null);
/* trong đó


*/
?>
```

* /page/ : là xử lý phân trang
```
#!php
<?php
// cách lấy gọi page trên link xuỗng
$h->param_paging();

/* trong đó 
	
*/
?>
```
* /param1/param2/param3/param..../paramN : là các biến truyền dữ liệu 

