<?php
define('VTD','Code Hệ Thống By Võ Tiến Diễn');
include 'VTD_system/VTD_load.php';
$theme="admin";
include ($s->path_incl($theme,"controller/index"));
?>
