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
include('class/core.php');
$core = new core;
include('class/database.php');
$data = new database;
include('class/helper.php');
$helper = new helper;
include('class/pagin.php');
$pagin = new pagin;

// xử lý nhận diện lỗi hệ thống và dừng toàn bộ hoạt động
function exception_handler($exception) {
	echo "Báo lỗi: " , $exception->getMessage(), "\n";
}
set_exception_handler('exception_handler');
$view = isset($_GET['view']) ? trim($_GET['view']) : '';
?>