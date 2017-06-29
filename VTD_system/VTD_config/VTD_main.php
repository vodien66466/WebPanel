<?php
$config = [
		'basePath' => 'WebPanel', // Thư mục lưu code
		'rootDir' => dirname(dirname(__FILE__)), // lấy path
		'lang' => 'vi', // ngôn ngữ
		'image_error' => 'public/images/ERROR.PNG',
		'debug' => true, // bật tắt báo lỗi (false,true)
		'timezone' => 'Asia/Ho_Chi_Minh', // múi giờ 
		'theme' => 'real-estates/John',
		'url_rewrite' => true,
		'db' => [
			'enable' => false, // bật tắt kết nối sql (false,true)
			'host' => 'localhost',
			'user' => 'root',
			'password' => '',
			'dbname' => ''
		]
	];
?>
