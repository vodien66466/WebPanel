<?php 

if ($core->get_method($view,"admin")=="index") 
{
	echo "index - controller";
}
if ($core->get_method($view,"admin")=="view") 
{
	echo "view - controller";
}
if ($core->get_method($view,"admin")=="edit") 
{
	echo "edit - controller";
} 
//include ($core->path_route_controller_method($view,"admin"));

