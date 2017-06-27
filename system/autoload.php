<?php
//file config website
include 'config/main.php';
// xử lý bất tắt báo lỗi
if ($GLOBALS['config']['debug']==true) {
	error_reporting(0);
}
// thiết lặp múi giờ cho hệ thống (PHP 5 >= 5.1.0).
date_default_timezone_set($GLOBALS['config']['timezone']);
//sission
session_start();
//để hàm header() hoạt động không lỗi
ob_start();
// Khởi tạo Object 
include('class/TD_system.php');
$td = new TD_system;
include('class/database.php');
$d = new database;
$view = isset($_GET['view']) ? trim($_GET['view']) : '';

// xử lý nhận diện lỗi hệ thống và dừng toàn bộ hoạt động
function exception_handler($exception) {
	echo "Báo lỗi: " , $exception->getMessage(), "\n";
}
set_exception_handler('exception_handler');

?>