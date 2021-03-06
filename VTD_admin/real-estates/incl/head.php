<?php
//set màu sắc css
if (isset($_COOKIE['color_css'])) {
	$color_css=$_COOKIE['color_css'];
} else {
	$color_css="inverse";
}
?>
<title><?php if (isset($title)) { echo $title; } ?> | Panel</title>
<!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
 <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 <![endif]-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<!-- Favicon icon -->
<link rel="shortcut icon" href="<?=system::asset(null,"public/assets/images/favicon.png")?>" type="image/x-icon">
<link rel="icon" href="<?=system::asset(null,"public/assets/images/favicon.ico")?>" type="image/x-icon">
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<!-- iconfont -->
<link rel="stylesheet" type="text/css" href="<?=system::asset(null,"public/assets/icon/icofont/css/icofont.css")?>">
<!-- simple line icon -->
<link rel="stylesheet" type="text/css" href="<?=system::asset(null,"public/assets/icon/simple-line-icons/css/simple-line-icons.css")?>">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="<?=system::asset(null,"public/assets/css/bootstrap.min.css")?>">
<!-- Chartlist chart css -->
<link rel="stylesheet" href="<?=system::asset(null,"public/assets/plugins/charts/chartlist/css/chartlist.css")?>" type="text/css" media="all">
<!-- Weather css -->
<link href="<?=system::asset(null,"public/assets/css/svg-weather.css")?>" rel="stylesheet">
<!-- Echart js -->
<script src="<?=system::asset(null,"public/assets/plugins/charts/echarts/js/echarts-all.js")?>"></script>
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="<?=system::asset(null,"public/assets/css/main.css")?>">
<!-- Responsive.css-->
<link rel="stylesheet" type="text/css" href="<?=system::asset(null,"public/assets/css/responsive.css")?>">

<!--Màu sắc css-->
<!--color css-->
<link rel="stylesheet" type="text/css" href="<?=system::asset(null,"public/assets/css/color/".$color_css.".css")?>" id="color" />