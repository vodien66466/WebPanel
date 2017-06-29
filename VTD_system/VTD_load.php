<?php
defined('VTD_System_Route') or die();
//file config website
include 'VTD_config/VTD_main.php';
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
include('VTD_class/VTD_system.php');
$s = new VTD_system;
include('VTD_class/VTD_data.php');
$d = new VTD_data;

/*
spl_autoload_register('autoload');
function autoload($name)
{
    $file ='VTD_class/' . $name . '.php';
    if (file_exists($file))
        require_once($file);
}
new VTD_system;
*/
$view = isset($_GET['VTD_view']) ? trim($_GET['VTD_view']) : '';

// xử lý nhận diện lỗi hệ thống và dừng toàn bộ hoạt động
function exception_handler($exception) {
	echo "Báo lỗi: " , $exception->getMessage(), "\n";
}
set_exception_handler('exception_handler');

?>