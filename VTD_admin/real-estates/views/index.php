<!DOCTYPE html>
<html>
	<head>
		<?php include ($s->path_theme($theme)."/incl/head.php"); ?>
	</head>
	<body class="sidebar-mini fixed">
	    <div class="loader-bg">
	        <div class="loader-bar"> </div>
	    </div>
	    <div class="wrapper">
	    	<header class="main-header-top hidden-print">
	    		<?php include ($s->path_theme($theme)."/incl/header.php"); ?>
	    	</header>
	    	<aside class="main-sidebar hidden-print ">
	    		<?php include ($s->path_theme($theme)."/incl/sidebar.php"); ?>
	    	</aside>
	    	<div class="content-wrapper">
				<?php include ($s->path_route($theme,"method","views")); ?>
			</div>
		</div>
		<?php include ($s->path_theme($theme)."/incl/script.php"); ?>
	</body>
</html>


