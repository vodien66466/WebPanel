<?php
$command=[
	"code" => "VNZWeb",
	"path" => dirname(dirname(__FILE__))."/command",
	"enable" => false,
	"password" => "16041995",
	"view" => "list_route,create_route_action,delete_route_action,create_route_method,delete_route_method,create_route,create_route_theme,logout",
	"avatar" => "style/images/avatar.jpg"
];

function asset($path) {
	return "".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$GLOBALS['config']['basePath']."/command/style/".$path."";
}
$home=$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$GLOBALS['config']['basePath']."/command/";
?>