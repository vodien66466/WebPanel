<?php
/*
$data=$td_system->array_file_method ($theme,"controller");
$method=$td_system->method();
if ($method && ($key = array_search($method, $data)) !== false && file_exists($td_system->path_route($theme,"method","controller"))) {
	
} else {
	include ($td_system->path_route($theme,"method","controller","error"));
}
*/
include ($td_system->path_route($theme,"method","controller"));
?>