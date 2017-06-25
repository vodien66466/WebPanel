<?php
$config = [
		'basePath' => 'WebPanel', // Thư mục lưu code
		'rootDir' => dirname(dirname(__FILE__)), // lấy path
		'lang' => 'vi', // ngôn ngữ
		'debug' => false, // bật tắt báo lỗi (false,true)
		'timezone' => 'Asia/Ho_Chi_Minh', // múi giờ 
		'theme' => 'real-estates/home',
		'url_rewrite' => false,
		'db' => [
			'enable' => false, // bật tắt kết nối sql (false,true)
			'host' => 'localhost',
			'user' => 'root',
			'password' => '',
			'dbname' => ''
		]
	];

// $GLOBALS['config']['basePath']; biến toàn cục

?>
