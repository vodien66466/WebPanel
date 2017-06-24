<!DOCTYPE html>
<html>
	<head>
		<?php include ($core->path_view("admin")."/inc/head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<?php include ($core->path_view("admin")."/inc/sidebar.php"); ?>
			<div class="main-panel">
				<nav class="navbar navbar-transparent navbar-absolute">
					<?php include ($core->path_view("admin")."/inc/menu.php"); ?>
				</nav>
			</div>
		</div>
		<?php include ($core->path_view("admin")."/inc/config_theme.php"); ?>
	</body>
	<?php include ($core->path_view("admin")."/inc/script.php"); ?>
</html>