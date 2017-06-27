<!DOCTYPE html>
<html>
	<head>
		<?php include ($s->path_incl($theme,"views/incl/head")); ?>
	</head>
	<body>
		<div class="wrapper">
			<?php include ($s->path_incl($theme,"views/incl/sidebar")); ?>
			<div class="main-panel">
				<nav class="navbar navbar-transparent navbar-absolute">
					<?php include ($s->path_incl($theme,"views/incl/menu")); ?>
				</nav>
				<div class="content">
					<?php include ($s->path_route($theme,"method","views")); ?>
				</div>
				<footer class="footer">
					<?php include ($s->path_incl($theme,"views/incl/footer")); ?>
				</footer>
			</div>
		</div>
		<?php include ($s->path_incl($theme,"views/incl/config_theme")); ?>
	</body>
	<?php include ($s->path_incl($theme,"views/incl/script")); ?>
</html>