<?php
define('VTD_System_Route',1);
include 'VTD_system/VTD_load.php';
$theme="admin";
if (isset($_SESSION["ad_password"])) {
	include ($s->path_incl($theme,"controller/index"));
} else {
	include ($s->path_route($theme,"method","controller","user-login"));
}

?>