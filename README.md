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

