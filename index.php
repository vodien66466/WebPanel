<?php
include 'system/autoload.php';
$view=$h->get_view();
echo $view;
?>
<hr>
<?php
$url=$r->get($view);
echo $url;
?>
<hr>
<?php
echo $r->path_route("admin","method","controller");
?>
<hr>
<?php
echo $r->get_view();
?>
<hr>
<?php
echo $r->param(0);
?>
<hr>
<?php
echo $h->times(time());
?>
<hr>
<?php
echo $h->param_paging("actin-method/300");
?>
<hr>
<?php
echo $p->get_paging(100);
?>
<hr>
<?php
echo $p->paging("admin",100,10);
