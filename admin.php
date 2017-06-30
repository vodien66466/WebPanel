<?php
define('VTD_System_Route',1);
include 'VTD_system/VTD_load.php';
$theme="admin";
$_SESSION["ad_password"]=1;
//session_destroy();
if (isset($_SESSION["ad_password"])) {
	if ($s->action()=="color_css") {
		include ($s->path_route($theme,"method","backend"));
		exit;
	} else {
		include ($s->path_incl($theme,"index"));
	}
} else {
	include ($s->path_route($theme,"method","fontend","user-login"));
}

?>