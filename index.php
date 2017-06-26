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
echo $route->path_route("admin","method","controller");
?>
<hr>
<?php
echo $route->get_view();
?>
<hr>
<?php
echo $route->param(2);
