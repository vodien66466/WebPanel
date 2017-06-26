<?php
include 'system/autoload.php';
$view=$core->get_view();
echo $view;
?>
<hr>
<?php
$url=$route->get($view);
echo $url;
?>
<hr>
<?php
echo $route->path_controller("admin","action","controller","");
?>
<hr>
<?php
echo $route->set_url("-cat","home");
