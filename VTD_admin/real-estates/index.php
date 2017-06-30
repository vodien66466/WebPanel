
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
				<?php include ($s->path_route($theme,"method","backend")); ?>
			</div>
		</div>
		<?php include ($s->path_theme($theme)."/incl/script.php"); ?>
		<script type="text/javascript">
			/* --------------------------------------------------------
			 Color picker - demo only
			 --------------------------------------------------------   */
			(function() {
			    $('<div class="color-picker"><a href="#" class="handle"><i class="icofont icofont-color-bucket"></i></a><div class="settings-header"><h3>Setting panel</h3></div><div class="section"><h3 class="color">Normal color schemes:</h3><div class="colors"><a href="#" class="color-1" ></a><a href="#" class="color-2" ></a><a href="#" class="color-3" ></a><a href="#" class="color-4" ></a><a href="#" class="color-5"></a></div></div><div class="section"><h3 class="color">Inverse color:</h3><div><a href="#" class="color-inverse"><img class="img img-fluid img-thumbnail" src="<?=$s->asset(null,"public/assets/images/inverse-layout.jpg")?>" /></a></div></div></div>').appendTo($('body'));
			})();

			/*Gradient Color*/


			/*Normal Color */
			$(".color-1").on('click',function() {
			    var jqxhr = $.ajax("<?=$s->url($theme,"color_css/0/color-1")?>")
				.done(function() {
					$("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/color-1.css")?>");
				});
			    return false;
			});
			$(".color-2").on('click',function(e) {
			    var jqxhr = $.ajax("<?=$s->url($theme,"color_css/0/color-2")?>")
				.done(function() {
					$("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/color-2.css")?>");
				});
			    return false;
			});
			$(".color-3").on('click',function() {
			    var jqxhr = $.ajax("<?=$s->url($theme,"color_css/0/color-3")?>")
				.done(function() {
					$("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/color-3.css")?>");
				});
			    return false;
			});
			$(".color-4").on('click',function() {
				var jqxhr = $.ajax("<?=$s->url($theme,"color_css/0/color-4")?>")
				.done(function() {
					$("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/color-4.css")?>");
				});
			    return false;
			});
			$(".color-5").on('click',function() {
			    var jqxhr = $.ajax("<?=$s->url($theme,"color_css/0/color-5")?>")
				.done(function() {
					$("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/color-5.css")?>");
				});
			    return false;
			});
			$(".color-inverse").on('click',function() {
				var jqxhr = $.ajax("<?=$s->url($theme,"color_css/0/inverse")?>")
				.done(function() {
					$("#color").attr("href", "<?=$s->asset(null,"public/assets/css/color/inverse.css")?>");
				});
			    return false;
			});


			$('.color-picker').animate({
			    right: '-239px'
			});

			$('.color-picker a.handle').on('click',function(e) {
			    e.preventDefault();
			    var div = $('.color-picker');
			    if (div.css('right') === '-239px') {
			        $('.color-picker').animate({
			            right: '0px'
			        });
			    } else {
			        $('.color-picker').animate({
			            right: '-239px'
			        });
			    }
			});
		</script>
	</body>
</html>

