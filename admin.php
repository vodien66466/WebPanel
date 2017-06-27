<?php
include 'system/autoload.php';
include ($r->path_route("admin","action","controller"));
?>
<hr>
<?php
echo $h->param_paging();
?>
<hr>
<?php
echo $p->get_paging(100);
?>
<hr>
<?php
echo $p->paging("admin",10000,100);
?>
<hr>
<?php
echo $h->all_param();
?>
<hr>
<?php
echo $h->param(0);