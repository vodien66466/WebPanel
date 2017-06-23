<?php
include 'system/autoload.php';
$array = array('about','ban_ip','carts','categories','contact','database','faqs','guide','login','menu','news','pages','profile','settings','users');
if ($view && ($key = array_search($view, $array)) !== false && file_exists('admin/'.$core->theme_admin().'/views/' . $array[$key] . '.php')) {
	include 'admin/'.$core->theme_admin().'/views/' . $array[$key] . '.php';
} else {
	include 'admin/'.$core->theme_admin().'/views/index.php';
}
?>