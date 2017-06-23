<?php
$config = [
		'basePath' => 'bds', // Thư mục lưu code
		'rootDir' => dirname(dirname(__FILE__)), // lấy path
		'lang' => 'vi', // ngôn ngữ
		'debug' => false, // bật tắt báo lỗi (false,true)
		'timezone' => 'Asia/Ho_Chi_Minh', // múi giờ 
		'theme_index' => 'home',
		'theme_admin' => 'creative',
		'db' => [
			'enable' => true, // bật tắt kết nối sql (false,true)
			'host' => 'localhost',
			'user' => 'root',
			'password' => '',
			'dbname' => 'bds'
		]
	];

// $GLOBALS['config']['basePath']; biến toàn cục

?>
