<?php
include 'system/autoload.php';
$array = array('about','contact','carts','categorie-single','faqs','login','news','new-single','pages','page-single','payment','products','product-single','profile','profile-change','register','search');
if ($view && ($key = array_search($view, $array)) !== false && file_exists('themes/'.$config_theme.'/' . $array[$key] . '.php')) {
	include 'themes/'.$config_theme.'/' . $array[$key] . '.php';
} else {
	include 'themes/'.$config_theme.'/index.php';
}
?>