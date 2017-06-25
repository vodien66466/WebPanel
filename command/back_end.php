<?php
include '../system/autoload.php';
include 'config.php';
$title="Command";
$array = explode(",",$command['view']);
if (isset($_SESSION["password"])) {
	$password_ad=$_SESSION["password"];
} else {
	$password_ad="";
}
if ($password_ad==$command['password']) {
	if ($view && ($key = array_search($view, $array)) !== false && file_exists('back_end/' . $array[$key] . '.php')) {
		include 'back_end/' . $array[$key] . '.php';
	} else {
		include 'back_end/index.php';
	}
}
?>