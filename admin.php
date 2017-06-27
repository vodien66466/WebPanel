<?php
define('VTD','Code Hệ Thống By Võ Tiến Diễn');
include 'VTD_system/VTD_load.php';
$theme="admin";
include ($td_system->path_route($theme,"action","Controller"));
?>