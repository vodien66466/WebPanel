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
function rw($text) {
    $text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
    $text=str_replace(urldecode('%CC%A3'),"", $text);
    $text=str_replace(urldecode('%CC%83'),"", $text);
    $text=str_replace(urldecode('%CC%89'),"", $text);
    $text=str_replace(urldecode('%CC%80'),"", $text);
    $text=str_replace(urldecode('%CC%81'),"", $text);
    $text=str_replace("--","", $text);
    $text=str_replace(" ","", $text);
    $text=str_replace("@","",$text);
    $text=str_replace("/","",$text);
    $text=str_replace("\\","",$text);
    $text=str_replace(":","",$text);
    $text=str_replace("\"","",$text);
    $text=str_replace("'","",$text);
    $text=str_replace("<","",$text);
    $text=str_replace(">","",$text);
    $text=str_replace(",","",$text);
    $text=str_replace("?","",$text);
    $text=str_replace("%20","",$text);
    $text=str_replace(";","",$text);
    $text=str_replace("[","",$text);
    $text=str_replace("]","",$text);
    $text=str_replace("(","",$text);
    $text=str_replace(")","",$text);
    $text=str_replace("́","", $text);
    $text=str_replace("̀","", $text);
    $text=str_replace("̃","", $text);
    $text=str_replace("̣","", $text);
    $text=str_replace("̉","", $text);
    $text=str_replace("*","",$text);
    $text=str_replace("!","",$text);
    $text=str_replace("$","",$text);
    $text=str_replace("&","-and-",$text);
    $text=str_replace("%","",$text);
    $text=str_replace("#","",$text);
    $text=str_replace("^","",$text);
    $text=str_replace("=","",$text);
    $text=str_replace("+","",$text);
    $text=str_replace("~","",$text);
    $text=str_replace("`","",$text);
    $text=str_replace("--","",$text);
    $text=str_replace(".","",$text);
    $text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
    $text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
    $text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
    $text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
    $text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
    $text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
    $text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
    $text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
    $text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
    $text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
    $text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
    $text = preg_replace("/(đ)/", 'd', $text);
    $text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
    $text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
    $text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
    $text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
    $text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
    $text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
    $text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
    $text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
    $text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
    $text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
    $text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
    $text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
    $text = preg_replace("/(Đ)/", 'D', $text);
    $text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
    $text = preg_replace("/(Đ)/", 'D', $text);

    return strtolower($text);
}
$home=$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$GLOBALS['config']['basePath']."/command/";
?>