<?php
include 'system/autoload.php';
include ($td->path_route("admin","action","controller"));
?>
<hr>
<?php
echo $td->param_paging();
?>
<hr>
<?php
echo $td->get_paging(100);
?>
<hr>
<?php
echo $td->paging("admin",10000,100);
?>
<hr>
<?php
echo $td->all_param();
?>
<hr>
<?php
echo $td->param(7);
?>
<hr>
<?php
echo $td->url("admin");